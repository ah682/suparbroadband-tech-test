<?php
/**
 * Template Name: Contact Us
 */

get_header(); ?>

<main id="main-content" class="site-main contact-us-page">

    <section class="page-header-section">
        <div class="container">
            <div class="page-header-content">
                <h1>Contact Us</h1>
                <p class="page-subtitle">We're here to help. Get in touch with our team and we'll respond as quickly as possible.</p>
            </div>
        </div>
    </section>


    <section class="contact-info-section">
        <div class="container">
            <div class="contact-info-grid">

                <div class="contact-card">
                    <div class="contact-icon">📞</div>
                    <h3>Phone</h3>
                    <p>Speak to our team</p>
                    <a href="tel:08001234567" class="contact-value">0800 123 4567</a>
                    <p class="contact-hours">Mon-Fri: 8am-8pm<br>Sat-Sun: 9am-5pm</p>
                </div>

                <div class="contact-card">
                    <div class="contact-icon">✉️</div>
                    <h3>Email</h3>
                    <p>Send us a message</p>
                    <a href="mailto:hello@supabroadband.co.uk" class="contact-value">hello@supabroadband.co.uk</a>
                    <p class="contact-hours">We'll reply within 24 hours</p>
                </div>

                <div class="contact-card">
                    <div class="contact-icon">💬</div>
                    <h3>Live Chat</h3>
                    <p>Chat with our team</p>
                    <a href="#" class="contact-value launch-chat">Start Chat</a>
                    <p class="contact-hours">Available during business hours</p>
                </div>

                <div class="contact-card">
                    <div class="contact-icon">📍</div>
                    <h3>Address</h3>
                    <p>Visit our office</p>
                    <address class="contact-value">
                        123 Broadband Street<br>
                        London, UK<br>
                        SW1A 1AA
                    </address>
                </div>

            </div>
        </div>
    </section>


    <section class="contact-form-section">
        <div class="container">
            <div class="contact-form-wrapper">
                <div class="form-intro">
                    <h2>Send Us a Message</h2>
                    <p>Fill out the form below and we'll get back to you as soon as possible.</p>
                </div>

                <?php
                // Display the page content (which should contain the Contact Form 7 shortcode)
                while ( have_posts() ) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
    </section>


    <section class="support-topics-section">
        <div class="container">
            <div class="section-header text-center">
                <h2>Common Questions</h2>
                <p>Quick links to help you find answers faster</p>
            </div>

            <div class="support-topics-grid">

                <div class="topic-card">
                    <div class="topic-icon">🚀</div>
                    <h3>Getting Started</h3>
                    <p>Learn how to choose a plan and get connected</p>
                    <a href="<?php echo home_url('/how-to-get-started/'); ?>" class="topic-link">View Guide →</a>
                </div>

                <div class="topic-card">
                    <div class="topic-icon">📊</div>
                    <h3>Compare Plans</h3>
                    <p>See all available plans side-by-side</p>
                    <a href="<?php echo home_url('/compare-plans/'); ?>" class="topic-link">Compare Now →</a>
                </div>

                <div class="topic-card">
                    <div class="topic-icon">💰</div>
                    <h3>Pricing & Offers</h3>
                    <p>View current deals and promotions</p>
                    <a href="<?php echo home_url('/broadband-plans/'); ?>" class="topic-link">See Prices →</a>
                </div>

                <div class="topic-card">
                    <div class="topic-icon">🔧</div>
                    <h3>Technical Support</h3>
                    <p>Having issues? We're here to help</p>
                    <a href="tel:08001234567" class="topic-link">Call Support →</a>
                </div>

            </div>
        </div>
    </section>


    <section class="business-hours-section">
        <div class="container">
            <div class="hours-notice">
                <h3>📅 Our Business Hours</h3>
                <div class="hours-grid">
                    <div class="hours-item">
                        <strong>Monday - Friday:</strong>
                        <span>8:00 AM - 8:00 PM</span>
                    </div>
                    <div class="hours-item">
                        <strong>Saturday:</strong>
                        <span>9:00 AM - 5:00 PM</span>
                    </div>
                    <div class="hours-item">
                        <strong>Sunday:</strong>
                        <span>9:00 AM - 5:00 PM</span>
                    </div>
                    <div class="hours-item">
                        <strong>Bank Holidays:</strong>
                        <span>10:00 AM - 4:00 PM</span>
                    </div>
                </div>
                <p class="hours-note">For urgent technical support outside of business hours, please call our 24/7 emergency support line.</p>
            </div>
        </div>
    </section>

</main>

<script>
// Launch chat functionality (you can integrate with your actual chat system)
document.addEventListener('DOMContentLoaded', function() {
    const chatLinks = document.querySelectorAll('.launch-chat');
    chatLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            // Add your live chat integration here
            // Example: window.LiveChatWidget.call('maximize');
            alert('Live chat would open here. Please integrate your preferred chat solution.');
        });
    });
});
</script>

<?php get_footer(); ?>
