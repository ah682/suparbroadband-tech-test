/**
 * Supabroadband Filter and Sort Functionality
 * 
 * @package Supabroadband_Theme
 * @since 1.0.0
 */

(function($) {
    'use strict';

    /**
     * Initialize on document ready
     */
    $(document).ready(function() {
        initializeFilters();
        addOrderAttributes(); // Move inside ready for better performance
    });

    /**
     * Initialize filter and sort functionality
     */
    function initializeFilters() {
        const $planCards = $('.plan-card');
        const $noResults = $('.no-results');
        const $sortPrice = $('#sort-price');
        const $sortSpeed = $('#sort-speed');
        const $filterSpeed = $('#filter-speed');
        const $filterContract = $('#filter-contract');
        const $resetBtn = $('.reset-filters');

        // Return if no plans exist
        if ($planCards.length === 0) {
            return;
        }

        /**
         * Filter plans based on current selections
         */
        function filterPlans() {
            const speedFilter = $filterSpeed.val();
            const contractFilter = $filterContract.val();
            let visibleCount = 0;

            $planCards.each(function() {
                const $card = $(this);
                const cardSpeed = parseInt($card.data('speed')) || 0;
                const cardContract = String($card.data('contract'));
                let isVisible = true;

                // Speed filter logic
                if (speedFilter) {
                    switch(speedFilter) {
                        case 'under-100':
                            isVisible = isVisible && cardSpeed < 100;
                            break;
                        case '100-300':
                            isVisible = isVisible && (cardSpeed >= 100 && cardSpeed < 300);
                            break;
                        case '300-500':
                            isVisible = isVisible && (cardSpeed >= 300 && cardSpeed < 500);
                            break;
                        case 'over-500':
                            isVisible = isVisible && cardSpeed >= 500;
                            break;
                    }
                }

                // Contract filter logic
                if (contractFilter && contractFilter !== '' && contractFilter !== 'all') {
                    isVisible = isVisible && (cardContract === contractFilter);
                }

                // Show/hide card - INSTANT with CSS
                if (isVisible) {
                    $card.show(); // Instant, no animation
                    visibleCount++;
                } else {
                    $card.hide(); // Instant, no animation
                }
            });

            // Show/hide no results message
            if (visibleCount === 0) {
                $noResults.addClass('visible').show();
            } else {
                $noResults.removeClass('visible').hide();
            }
        }

        /**
         * Sort plans by price
         */
        function sortByPrice() {
            const sortOrder = $sortPrice.val();
            
            if (!sortOrder) {
                return;
            }

            const $container = $('.plans-grid');
            const $cards = $planCards.sort(function(a, b) {
                const priceA = parseFloat($(a).data('price')) || 0;
                const priceB = parseFloat($(b).data('price')) || 0;

                if (sortOrder === 'low-high') {
                    return priceA - priceB;
                } else {
                    return priceB - priceA;
                }
            });

            // Reorder instantly
            $cards.detach().appendTo($container);

            // Reset speed sort
            $sortSpeed.val('');
        }

        /**
         * Sort plans by speed
         */
        function sortBySpeed() {
            const sortOrder = $sortSpeed.val();
            
            if (!sortOrder) {
                return;
            }

            const $container = $('.plans-grid');
            const $cards = $planCards.sort(function(a, b) {
                const speedA = parseInt($(a).data('speed')) || 0;
                const speedB = parseInt($(b).data('speed')) || 0;

                if (sortOrder === 'low-high') {
                    return speedA - speedB;
                } else {
                    return speedB - speedA;
                }
            });

            // Reorder instantly
            $cards.detach().appendTo($container);

            // Reset price sort
            $sortPrice.val('');
        }

        /**
         * Reset all filters and sorting
         */
        function resetFilters() {
            // Reset all selects
            $sortPrice.val('');
            $sortSpeed.val('');
            $filterSpeed.val('');
            $filterContract.val('');

            // Show all cards instantly
            $planCards.show();
            $noResults.removeClass('visible').hide();

            // Reset to original order
            const $container = $('.plans-grid');
            const $cards = $planCards.sort(function(a, b) {
                return parseInt($(a).data('order')) - parseInt($(b).data('order'));
            });

            $cards.detach().appendTo($container);
        }

        /**
         * Event Listeners
         */
        
        // Filter events
        $filterSpeed.on('change', filterPlans);
        $filterContract.on('change', filterPlans);

        // Sort events
        $sortPrice.on('change', sortByPrice);
        $sortSpeed.on('change', sortBySpeed);

        // Reset button
        $resetBtn.on('click', function(e) {
            e.preventDefault();
            resetFilters();
        });

        /**
         * Plan selection for enquiry form
         */
        $('.plan-cta').on('click', function(e) {
            const $planCard = $(this).closest('.plan-card');
            const planName = $planCard.find('.plan-title').text().trim();
            const planPrice = $planCard.data('price');
            const planSpeed = $planCard.data('speed');
            const planProvider = $planCard.find('.provider-name').text().trim();

            // Store plan details in sessionStorage for the form page
            if (typeof(Storage) !== 'undefined') {
                sessionStorage.setItem('selectedPlan', planName);
                sessionStorage.setItem('selectedPrice', planPrice);
                sessionStorage.setItem('selectedSpeed', planSpeed);
                sessionStorage.setItem('selectedProvider', planProvider);
            }
        });

        /**
         * Populate form with selected plan (on enquiry page)
         */
        if (typeof(Storage) !== 'undefined') {
            const selectedPlan = sessionStorage.getItem('selectedPlan');
            
            if (selectedPlan && $('#selected-plan-field').length) {
                const selectedPrice = sessionStorage.getItem('selectedPrice');
                const selectedSpeed = sessionStorage.getItem('selectedSpeed');
                const selectedProvider = sessionStorage.getItem('selectedProvider');
                
                $('#selected-plan-field').val(selectedPlan);
                
                // Display plan info
                if ($('.selected-plan-info').length) {
                    $('.selected-plan-info').html(
                        '<h3>Selected Plan</h3>' +
                        '<p><strong>' + selectedProvider + ' - ' + selectedPlan + '</strong></p>' +
                        '<p>Speed: ' + selectedSpeed + ' Mbps | Price: £' + selectedPrice + '/month</p>'
                    );
                }

                // Clear session storage after populating
                sessionStorage.removeItem('selectedPlan');
                sessionStorage.removeItem('selectedPrice');
                sessionStorage.removeItem('selectedSpeed');
                sessionStorage.removeItem('selectedProvider');
            }
        }

        /**
         * Smooth scroll to plans section
         */
        $('a[href="#plans"]').on('click', function(e) {
            e.preventDefault();
            if ($('.plans-grid').length) {
                $('html, body').animate({
                    scrollTop: $('.plans-grid').offset().top - 100
                }, 600);
            }
        });

        /**
         * Add loading state to form submission
         */
        $('.wpcf7-form').on('submit', function() {
            const $submitBtn = $(this).find('input[type="submit"]');
            $submitBtn.prop('disabled', true).val('Sending...');
        });

        /**
         * Highlight featured plan
         */
        highlightFeaturedPlan();
    }

    /**
     * Highlight the middle plan or best value plan as featured
     */
    function highlightFeaturedPlan() {
        const $planCards = $('.plan-card:visible');
        
        if ($planCards.length >= 3) {
            // Remove existing featured class
            $('.plan-card').removeClass('featured');
            
            // Highlight the middle plan
            const middleIndex = Math.floor($planCards.length / 2);
            $planCards.eq(middleIndex).addClass('featured');
        }
    }

    /**
     * Add number ordering data attribute for sorting
     */
    function addOrderAttributes() {
        $('.plan-card').each(function(index) {
            $(this).attr('data-order', index);
        });
    }

})(jQuery);