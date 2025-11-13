<?php
/**
 * Template Name: How to Get Started
 */

get_header(); ?>

<main id="main-content" class="site-main how-to-get-started-page">

    <section class="page-header-section">
        <div class="container">
            <div class="page-header-content">
                <h1>How to Get Started</h1>
                <p class="page-subtitle">Everything you need to know to get connected with SupaBroadband. Fast, simple, and hassle-free.</p>
            </div>
        </div>
    </section>

    <section class="steps-section">
        <div class="container">
            <div class="steps-grid">

                <div class="step-card">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h3>Choose Your Plan</h3>
                        <p>Browse our range of broadband plans and compare speeds, prices, and contract lengths. Whether you need basic browsing or ultra-fast speeds for the whole family, we have a plan that fits your needs.</p>
                        <a href="<?php echo home_url('/broadband-plans/'); ?>" class="step-link">View All Plans →</a>
                    </div>
                </div>

                <div class="step-card">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h3>Check Availability</h3>
                        <p>Enter your postcode to check which services are available at your address. Different speeds and technologies may be available depending on your location.</p>
                        <a href="<?php echo home_url('/#availability-checker'); ?>" class="step-link">Check Now →</a>
                    </div>
                </div>

                <div class="step-card">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h3>Complete Your Order</h3>
                        <p>Fill out our simple enquiry form with your details. We'll process your application and contact you within 24 hours to confirm your installation date.</p>
                        <a href="<?php echo home_url('/enquiry/'); ?>" class="step-link">Get Started →</a>
                    </div>
                </div>

                <div class="step-card">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h3>Get Connected</h3>
                        <p>Our expert engineers will install your equipment and get you online. Most installations take less than an hour, and we'll make sure everything is working perfectly before we leave.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="speed-guide-section">
        <div class="container">
            <div class="section-header text-center">
                <h2>Choosing the Right Speed</h2>
                <p>Not sure which speed you need? Here's a quick guide to help you decide.</p>
            </div>

            <div class="speed-guide-grid">

                <div class="speed-guide-card">
                    <div class="speed-badge">67 Mbps</div>
                    <h3>Essential Broadband</h3>
                    <p><strong>Perfect for:</strong></p>
                    <ul>
                        <li>1-2 people</li>
                        <li>Browsing & email</li>
                        <li>HD video streaming</li>
                        <li>Social media</li>
                        <li>Light gaming</li>
                    </ul>
                </div>

                <div class="speed-guide-card featured">
                    <div class="speed-badge">150 Mbps</div>
                    <h3>Fast Broadband</h3>
                    <p><strong>Perfect for:</strong></p>
                    <ul>
                        <li>3-4 people</li>
                        <li>Multiple devices</li>
                        <li>4K streaming</li>
                        <li>Online gaming</li>
                        <li>Video calls</li>
                        <li>Working from home</li>
                    </ul>
                    <div class="popular-badge">Most Popular</div>
                </div>

                <div class="speed-guide-card">
                    <div class="speed-badge">500+ Mbps</div>
                    <h3>Ultrafast Broadband</h3>
                    <p><strong>Perfect for:</strong></p>
                    <ul>
                        <li>5+ people</li>
                        <li>Smart home devices</li>
                        <li>Large file downloads</li>
                        <li>Multiple 4K streams</li>
                        <li>Heavy gaming</li>
                        <li>Content creation</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <section class="faq-section">
        <div class="container">
            <div class="section-header text-center">
                <h2>Frequently Asked Questions</h2>
            </div>

            <div class="faq-grid">

                <div class="faq-item">
                    <h3>How long does installation take?</h3>
                    <p>Most installations are completed within 1-2 hours. Our engineers will arrange a convenient time with you and ensure everything is set up and working perfectly.</p>
                </div>

                <div class="faq-item">
                    <h3>Can I keep my existing phone number?</h3>
                    <p>Yes! If you're switching providers, we can arrange to transfer your existing phone number to your new service with no interruption.</p>
                </div>

                <div class="faq-item">
                    <h3>What equipment do I need?</h3>
                    <p>We provide a high-quality router as part of your package. All you need is a power socket and a phone line or fiber connection point.</p>
                </div>

                <div class="faq-item">
                    <h3>Is there a setup fee?</h3>
                    <p>Setup fees vary by plan and promotions. Check the plan details on our broadband plans page or contact us for current offers.</p>
                </div>

                <div class="faq-item">
                    <h3>What if I have issues after installation?</h3>
                    <p>Our customer support team is available 24/7 to help with any issues. We also offer remote diagnostics and can arrange engineer visits if needed.</p>
                </div>

                <div class="faq-item">
                    <h3>Can I upgrade or downgrade my plan?</h3>
                    <p>Yes, you can change your plan at any time. Contact our support team to discuss your options and any applicable terms.</p>
                </div>

            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container text-center">
            <h2>Ready to Get Started?</h2>
            <p>Choose your plan and get connected today</p>
            <div class="cta-buttons">
                <a href="<?php echo home_url('/broadband-plans/'); ?>" class="btn-primary-large">
                    View All Plans
                </a>
                <a href="<?php echo home_url('/contact/'); ?>" class="btn-secondary">
                    Contact Us
                </a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
