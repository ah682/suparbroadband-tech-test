<?php
/**
 * Template Name: Broadband Plans
 * 
 * Displays all broadband plans with filtering and sorting
 * 
 * @package Supabroadband_Theme
 * @since 1.0.0
 */

get_header(); ?>

<main id="main-content" class="site-main">
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Compare Broadband Plans</h1>
            <p>Find the perfect broadband package for your needs</p>
        </div>
    </section>

    <div class="container">
        
        <!-- Filter Section -->
        <section class="filter-section">
            <h2 class="text-center mb-20">Filter & Sort Plans</h2>
            
            <div class="filter-controls">
                
                <!-- Sort by Price -->
                <div class="filter-group">
                    <label for="sort-price">Sort by Price</label>
                    <select id="sort-price">
                        <option value="">-- Select --</option>
                        <option value="low-high">Price: Low to High</option>
                        <option value="high-low">Price: High to Low</option>
                    </select>
                </div>
                
                <!-- Sort by Speed -->
                <div class="filter-group">
                    <label for="sort-speed">Sort by Speed</label>
                    <select id="sort-speed">
                        <option value="">-- Select --</option>
                        <option value="low-high">Speed: Low to High</option>
                        <option value="high-low">Speed: High to Low</option>
                    </select>
                </div>
                
                <!-- Filter by Speed -->
                <div class="filter-group">
                    <label for="filter-speed">Filter by Speed</label>
                    <select id="filter-speed">
                        <option value="">All Speeds</option>
                        <option value="under-100">Under 100 Mbps</option>
                        <option value="100-300">100-300 Mbps</option>
                        <option value="300-500">300-500 Mbps</option>
                        <option value="over-500">500+ Mbps</option>
                    </select>
                </div>
                
                <!-- Filter by Contract -->
                <div class="filter-group">
                    <label for="filter-contract">Contract Length</label>
                    <select id="filter-contract">
                        <option value="all">All Contracts</option>
                        <option value="12">12 months</option>
                        <option value="18">18 months</option>
                        <option value="24">24 months</option>
                    </select>
                </div>
                
                <!-- Reset Button -->
                <button class="reset-filters">Reset All</button>
                
            </div>
        </section>

        <!-- Plans Grid -->
        <section id="plans" class="plans-section">
            <div class="plans-grid">
                <?php
                // Query broadband plans
                $args = array(
                    'post_type'      => 'broadband_plan',
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                );
                
                $plans_query = new WP_Query( $args );
                
                if ( $plans_query->have_posts() ) :
                    while ( $plans_query->have_posts() ) : $plans_query->the_post();
                        
                        // Get plan meta data
                        $provider = get_post_meta( get_the_ID(), '_plan_provider', true );
                        $speed = get_post_meta( get_the_ID(), '_plan_speed', true );
                        $price = get_post_meta( get_the_ID(), '_plan_price', true );
                        $contract = get_post_meta( get_the_ID(), '_plan_contract_length', true );
                        $setup_fee = get_post_meta( get_the_ID(), '_plan_setup_fee', true );
                        ?>
                        
                        <article class="plan-card" 
                                 data-speed="<?php echo esc_attr( $speed ); ?>" 
                                 data-price="<?php echo esc_attr( $price ); ?>"
                                 data-contract="<?php echo esc_attr( $contract ); ?>">
                            
                            <!-- Provider Info -->
                            <div class="plan-provider">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'provider-logo' ) ); ?>
                                <?php endif; ?>
                                <h3 class="provider-name"><?php echo esc_html( $provider ); ?></h3>
                            </div>
                            
                            <!-- Plan Title -->
                            <h4 class="plan-title"><?php the_title(); ?></h4>
                            
                            <!-- Price -->
                            <div class="plan-price">
                                <span class="price-currency">£</span>
                                <span class="price-amount"><?php echo esc_html( number_format( $price, 2 ) ); ?></span>
                                <span class="price-period">/month</span>
                            </div>
                            
                            <!-- Plan Details -->
                            <ul class="plan-details">
                                <li>
                                    <span class="detail-label">Speed:</span>
                                    <span class="detail-value speed-highlight"><?php echo esc_html( $speed ); ?> Mbps</span>
                                </li>
                                <li>
                                    <span class="detail-label">Contract:</span>
                                    <span class="detail-value"><?php echo esc_html( $contract ); ?> months</span>
                                </li>
                                <li>
                                    <span class="detail-label">Setup Fee:</span>
                                    <span class="detail-value">
                                        <?php echo $setup_fee > 0 ? '£' . esc_html( number_format( $setup_fee, 2 ) ) : 'FREE'; ?>
                                    </span>
                                </li>
                            </ul>
                            
                            <!-- CTA Button -->
                            <a href="<?php echo esc_url( home_url( '/enquiry/' ) ); ?>" class="plan-cta">
                                Select Plan
                            </a>
                            
                        </article>
                        
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <div class="no-plans-message">
                        <h3>No Plans Available</h3>
                        <p>Please check back later for available broadband plans.</p>
                    </div>
                    <?php
                endif;
                ?>
            </div>
            
            <!-- No Results Message (Hidden by default) -->
            <div class="no-results">
                <h3>No Plans Match Your Filters</h3>
                <p>Try adjusting your filters or click "Reset All" to see all available plans.</p>
            </div>
            
        </section>

    </div>

</main>

<?php get_footer(); ?>
