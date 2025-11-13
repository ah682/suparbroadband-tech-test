<?php
/**
 * Template Name: Compare Plans
 * 
 * @package Supabroadband_Theme
 * @since 1.0.0
 */

get_header(); ?>

<main id="main-content" class="site-main compare-plans-page">
    
    <!-- Page Header -->
    <section class="page-header-section">
        <div class="container">
            <div class="page-header-content">
                <h1>Compare Broadband Plans</h1>
                <p class="page-subtitle">Side-by-side comparison of all available plans. Find the perfect broadband deal for your needs.</p>
            </div>
        </div>
    </section>

    <!-- Comparison Table Section -->
    <section class="comparison-section">
        <div class="container">
            <div class="section-header text-center">
                <h2>All Available Plans</h2>
                <p>Compare speeds, prices, and contract lengths</p>
            </div>
            
            <?php echo do_shortcode('[comparison_table]'); ?>
            
            <div class="comparison-info">
                <div class="info-grid">
                    <div class="info-card">
                        <div class="info-icon">💡</div>
                        <h3>Need Help Choosing?</h3>
                        <p>Not sure which plan is right for you? Check out our speed guide or contact our team for personalized recommendations.</p>
                        <a href="<?php echo home_url('/contact/'); ?>" class="info-link">Get Help →</a>
                    </div>
                    <div class="info-card">
                        <div class="info-icon">📊</div>
                        <h3>Understanding Speeds</h3>
                        <p>67 Mbps is great for browsing and streaming. 150+ Mbps is ideal for households with multiple devices and 4K streaming.</p>
                        <a href="<?php echo home_url('/how-to-get-started/'); ?>" class="info-link">Learn More →</a>
                    </div>
                    <div class="info-card">
                        <div class="info-icon">⚡</div>
                        <h3>Test Your Speed</h3>
                        <p>Already have broadband? Test your current speed to see if you could benefit from an upgrade.</p>
                        <a href="<?php echo home_url('/#speed-test'); ?>" class="info-link">Run Speed Test →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="compare-cta-section">
        <div class="container text-center">
            <h2>Ready to Switch?</h2>
            <p>Browse all plans or start your enquiry today</p>
            <div class="cta-buttons">
                <a href="<?php echo home_url('/broadband-plans/'); ?>" class="btn-primary-large">
                    View All Plans
                </a>
                <a href="<?php echo home_url('/'); ?>" class="btn-secondary">
                    Back to Home
                </a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>