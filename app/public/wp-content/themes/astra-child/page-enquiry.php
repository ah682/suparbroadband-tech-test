<?php
/**
 * Template Name: Enquiry Form
 * 
 * Template for the broadband enquiry page
 * 
 * @package Supabroadband_Theme
 * @since 1.0.0
 */

get_header(); ?>

<main id="main-content" class="site-main enquiry-page">
    
    <div class="container">
        
        <!-- Page Intro -->
        <div class="enquiry-page-intro">
            <h1>Get Connected Today</h1>
            <p>Complete the form below and we'll help you get set up with your chosen broadband plan. We'll be in touch within 24 hours.</p>
        </div>

        <!-- Selected Plan Info (will be populated by JavaScript) -->
        <div class="selected-plan-info" style="display: none;">
            <h3>Your Selected Plan</h3>
            <p id="plan-info-display"></p>
        </div>

        <!-- Contact Form -->
        <div class="enquiry-form-wrapper">
            <?php
            // Display the page content (which should contain the Contact Form 7 shortcode)
            while ( have_posts() ) :
                the_post();
                the_content();
            endwhile;
            ?>
        </div>

    </div>

</main>

<script>
// Populate selected plan from sessionStorage
document.addEventListener('DOMContentLoaded', function() {
    if (typeof(Storage) !== 'undefined') {
        const selectedPlan = sessionStorage.getItem('selectedPlan');
        const selectedPrice = sessionStorage.getItem('selectedPrice');
        const selectedSpeed = sessionStorage.getItem('selectedSpeed');

        if (selectedPlan) {
            // Show the info box
            const infoBox = document.querySelector('.selected-plan-info');
            if (infoBox) {
                infoBox.style.display = 'block';
            }

            // Display plan details
            const planDisplay = document.getElementById('plan-info-display');
            if (planDisplay) {
                planDisplay.innerHTML = '<strong>' + selectedPlan + '</strong><br>' +
                    'Speed: ' + selectedSpeed + ' Mbps | Price: £' + selectedPrice + '/month';
            }

            // Fill the hidden field in the form
            const planField = document.getElementById('selected-plan-field');
            if (planField) {
                planField.value = selectedPlan + ' (' + selectedSpeed + ' Mbps - £' + selectedPrice + '/mo)';
            }

            // Clear session storage
            sessionStorage.removeItem('selectedPlan');
            sessionStorage.removeItem('selectedPrice');
            sessionStorage.removeItem('selectedSpeed');
        }
    }
});
</script>

<?php get_footer(); ?>
