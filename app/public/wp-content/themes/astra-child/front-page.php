<?php
/**
 * Homepage Template - Chattr Style
 * 
 * @package Supabroadband_Theme
 * @since 1.0.0
 */

get_header(); ?>

<main id="main-content" class="site-main chattr-style">
    
    <!-- Hero Section -->
    <section class="hero-section-chattr">
        <div class="container">
            <div class="hero-content">
                <h1>Find the Perfect Broadband for Your Home</h1>
                <p class="hero-subtitle">Compare the UK's best broadband deals. Fast speeds, great prices, and flexible contracts.</p>
                <div class="hero-cta-group">
                    <a href="<?php echo esc_url( home_url( '/broadband-plans/' ) ); ?>" class="btn-primary-large">
                        Compare Broadband Plans
                    </a>
                </div>
            </div>
        </div>
    </section>

   <!-- Powered By Section -->
    <section class="powered-by-section">
        <div class="container text-center">
            <p class="powered-text">We compare plans from leading UK providers</p>
            <div class="provider-logos">
                <div class="provider-logo-item">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logos/bt-logo.svg" alt="BT" class="provider-logo-img" onerror="this.parentElement.innerHTML='<span class=\'provider-badge\'>BT</span>'">
                </div>
                <div class="provider-logo-item">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logos/sky-logo.svg" alt="Sky" class="provider-logo-img" onerror="this.parentElement.innerHTML='<span class=\'provider-badge\'>Sky</span>'">
                </div>
                <div class="provider-logo-item">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logos/virgin-logo.svg" alt="Virgin Media" class="provider-logo-img" onerror="this.parentElement.innerHTML='<span class=\'provider-badge\'>Virgin Media</span>'">
                </div>
                <div class="provider-logo-item">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logos/talktalk-logo.svg" alt="TalkTalk" class="provider-logo-img" onerror="this.parentElement.innerHTML='<span class=\'provider-badge\'>TalkTalk</span>'">
                </div>
                <div class="provider-logo-item">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logos/vodafone-logo.svg" alt="Vodafone" class="provider-logo-img" onerror="this.parentElement.innerHTML='<span class=\'provider-badge\'>Vodafone</span>'">
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits-section">
        <div class="container">
            <div class="section-header text-center">
                <h2>Get Connected for Less</h2>
                <p>Find incredible savings on broadband with our comparison tool</p>
            </div>
            
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">⚡</div>
                    <h3>Lightning-Fast Speeds</h3>
                    <p>Compare plans from 67 Mbps to ultrafast 900+ Mbps connections for seamless streaming, gaming, and working from home.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">💷</div>
                    <h3>Best Value Deals</h3>
                    <p>Find the most competitive prices across all major providers. Filter by price to find plans that fit your budget.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">📋</div>
                    <h3>Flexible Contracts</h3>
                    <p>Choose from 12, 18, or 24-month contracts. Compare contract lengths to find the commitment that works for you.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Speed Test Section -->
    <section class="speed-test-section">
        <div class="container">
            <div class="section-header text-center">
                <h2>Check Your Current Speed</h2>
                <p>Test your connection and see if you could benefit from faster broadband</p>
            </div>
            <?php echo do_shortcode('[speed_test_widget]'); ?>
        </div>
    </section>

    <!-- Comparison Table Section -->
    <section class="comparison-section">
        <div class="container">
            <div class="section-header text-center">
                <h2>Compare Our Most Popular Plans</h2>
                <p>Side-by-side comparison of our top broadband deals</p>
            </div>
            <?php echo do_shortcode('[comparison_table limit="3"]'); ?>
            <div class="comparison-cta text-center">
                <a href="<?php echo esc_url( home_url( '/broadband-plans/' ) ); ?>" class="btn-secondary">
                    View All Plans →
                </a>
                <a href="<?php echo esc_url( home_url( '/compare-plans/' ) ); ?>" class="btn-secondary">
                    Full Comparison →
                </a>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works-section">
        <div class="container">
            <div class="section-header text-center">
                <h2>How It Works</h2>
                <p>Finding your perfect broadband is simple</p>
            </div>
            
            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h3>Compare Plans</h3>
                    <p>Browse our selection of broadband plans from top UK providers</p>
                </div>
                <div class="step-card">
                    <div class="step-number">2</div>
                    <h3>Filter & Sort</h3>
                    <p>Use our tools to filter by speed, price, and contract length</p>
                </div>
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h3>Select Your Plan</h3>
                    <p>Choose your ideal plan and complete a simple enquiry form</p>
                </div>
                <div class="step-card">
                    <div class="step-number">4</div>
                    <h3>Get Connected</h3>
                    <p>We'll connect you with the provider to finalize your setup</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="final-cta-section">
        <div class="container text-center">
            <h2>Ready to Switch?</h2>
            <p>Compare broadband plans and find your perfect deal today</p>
            <a href="<?php echo esc_url( home_url( '/broadband-plans/' ) ); ?>" class="btn-primary-large">
                View All Broadband Plans
            </a>
        </div>
    </section>

</main>

<?php get_footer(); ?>