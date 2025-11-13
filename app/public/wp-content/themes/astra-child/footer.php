<footer class="site-footer">
    <div class="footer-main">
        <div class="container">
            <div class="footer-grid">
                
                <!-- Company Info -->
                <div class="footer-column footer-about">
                    <h3 class="footer-logo"><?php bloginfo( 'name' ); ?></h3>
                    <p class="footer-description">Compare the best broadband deals in the UK. Find faster speeds, better prices, and flexible contracts from leading providers.</p>
                    <!-- Social links can be added here when available -->
                </div>
                
                <!-- Quick Links -->
                <div class="footer-column">
                    <h4 class="footer-heading">Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url( home_url('/') ); ?>">Home</a></li>
                        <li><a href="<?php echo esc_url( home_url('/broadband-plans/') ); ?>">Browse Plans</a></li>
                        <li><a href="<?php echo esc_url( home_url('/compare-plans/') ); ?>">Compare Plans</a></li>
                        <li><a href="<?php echo esc_url( home_url('/enquiry/') ); ?>">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Providers -->
                <div class="footer-column">
                    <h4 class="footer-heading">Providers</h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url( home_url('/broadband-plans/') ); ?>">BT Broadband</a></li>
                        <li><a href="<?php echo esc_url( home_url('/broadband-plans/') ); ?>">Sky Broadband</a></li>
                        <li><a href="<?php echo esc_url( home_url('/broadband-plans/') ); ?>">Virgin Media</a></li>
                        <li><a href="<?php echo esc_url( home_url('/broadband-plans/') ); ?>">TalkTalk</a></li>
                        <li><a href="<?php echo esc_url( home_url('/broadband-plans/') ); ?>">Vodafone</a></li>
                    </ul>
                </div>

                <!-- Resources -->
                <div class="footer-column">
                    <h4 class="footer-heading">Resources</h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url( home_url('/#speed-test') ); ?>">Speed Test</a></li>
                        <li><a href="<?php echo esc_url( home_url('/broadband-plans/') ); ?>">Broadband Plans</a></li>
                        <li><a href="<?php echo esc_url( home_url('/compare-plans/') ); ?>">Compare Plans</a></li>
                        <li><a href="<?php echo esc_url( home_url('/enquiry/') ); ?>">Get Help</a></li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
    
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <p class="footer-copyright">
                    &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
                </p>
                <ul class="footer-legal">
                    <li><a href="<?php echo home_url('/privacy-policy/'); ?>">Privacy Policy</a></li>
                    <li><a href="<?php echo home_url('/terms-conditions/'); ?>">Terms & Conditions</a></li>
                    <li><a href="<?php echo home_url('/cookie-policy/'); ?>">Cookie Policy</a></li>
                </ul>
            </div>
            <p class="footer-disclaimer">
                All trademarks and logos are the property of their respective owners. This is an independent comparison service.
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>