<?php
/**
 * Supabroadband Theme Functions
 * 
 * @package Supabroadband_Theme
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue parent and child theme styles
 */
function supabroadband_enqueue_styles() {
    $css_dir = get_stylesheet_directory_uri() . '/assets/css';
    $version = '1.0.5'; // Increment to bust cache

    // Enqueue parent theme stylesheet
    wp_enqueue_style(
        'astra-parent-style',
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme()->parent()->get('Version')
    );

    // Enqueue child theme stylesheet
    wp_enqueue_style(
        'supabroadband-child-style',
        get_stylesheet_uri(),
        array( 'astra-parent-style' ),
        wp_get_theme()->get('Version')
    );

    // Enqueue modular CSS files in correct order
    // Variables first
    wp_enqueue_style( 'supabroadband-colors', $css_dir . '/variables/colors.css', array( 'supabroadband-child-style' ), $version );
    wp_enqueue_style( 'supabroadband-typography', $css_dir . '/variables/typography.css', array( 'supabroadband-colors' ), $version );
    wp_enqueue_style( 'supabroadband-dark-mode', $css_dir . '/variables/dark-mode.css', array( 'supabroadband-typography' ), $version );

    // Base styles
    wp_enqueue_style( 'supabroadband-reset', $css_dir . '/base/reset.css', array( 'supabroadband-dark-mode' ), $version );
    wp_enqueue_style( 'supabroadband-layout', $css_dir . '/base/layout.css', array( 'supabroadband-reset' ), $version );

    // Components
    wp_enqueue_style( 'supabroadband-header', $css_dir . '/components/header.css', array( 'supabroadband-layout' ), $version );
    wp_enqueue_style( 'supabroadband-hero', $css_dir . '/components/hero.css', array( 'supabroadband-layout' ), $version );
    wp_enqueue_style( 'supabroadband-buttons', $css_dir . '/components/buttons.css', array( 'supabroadband-layout' ), $version );
    wp_enqueue_style( 'supabroadband-cards', $css_dir . '/components/cards.css', array( 'supabroadband-layout' ), $version );
    wp_enqueue_style( 'supabroadband-forms', $css_dir . '/components/forms.css', array( 'supabroadband-layout' ), $version );
    wp_enqueue_style( 'supabroadband-comparison-table', $css_dir . '/components/comparison-table.css', array( 'supabroadband-layout' ), $version );
    wp_enqueue_style( 'supabroadband-speed-test-widget', $css_dir . '/components/speed-test-widget.css', array( 'supabroadband-layout' ), $version );
    wp_enqueue_style( 'supabroadband-footer', $css_dir . '/components/footer.css', array( 'supabroadband-layout' ), $version );

    // Sections
    wp_enqueue_style( 'supabroadband-benefits', $css_dir . '/sections/benefits.css', array( 'supabroadband-layout' ), $version );
    wp_enqueue_style( 'supabroadband-powered-by', $css_dir . '/sections/powered-by.css', array( 'supabroadband-layout' ), $version );
    wp_enqueue_style( 'supabroadband-steps', $css_dir . '/sections/steps.css', array( 'supabroadband-layout' ), $version );
    wp_enqueue_style( 'supabroadband-plans', $css_dir . '/sections/plans.css', array( 'supabroadband-layout' ), $version );
    wp_enqueue_style( 'supabroadband-speed-test', $css_dir . '/sections/speed-test.css', array( 'supabroadband-layout' ), $version );
    wp_enqueue_style( 'supabroadband-cta', $css_dir . '/sections/cta.css', array( 'supabroadband-layout' ), $version );
    wp_enqueue_style( 'supabroadband-coming-soon', $css_dir . '/sections/coming-soon.css', array( 'supabroadband-layout' ), $version );
    wp_enqueue_style( 'supabroadband-comparison', $css_dir . '/sections/comparison.css', array( 'supabroadband-layout' ), $version );
    wp_enqueue_style( 'supabroadband-enquiry', $css_dir . '/sections/enquiry.css', array( 'supabroadband-layout' ), $version );

    // Utilities
    wp_enqueue_style( 'supabroadband-animations', $css_dir . '/utilities/animations.css', array( 'supabroadband-layout' ), $version );
    wp_enqueue_style( 'supabroadband-helpers', $css_dir . '/utilities/helpers.css', array( 'supabroadband-layout' ), $version );

    // Vendor
    wp_enqueue_style( 'supabroadband-cf7', $css_dir . '/vendor/contact-form-7.css', array( 'supabroadband-layout' ), $version );

    // Enqueue filter/sort JavaScript
    wp_enqueue_script(
        'supabroadband-filter-sort',
        get_stylesheet_directory_uri() . '/assets/js/filter-sort.js',
        array( 'jquery' ),
        $version,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'supabroadband_enqueue_styles', 15 );

/**
 * Theme setup
 */
function supabroadband_theme_setup() {
    // Add theme support for various features
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    
    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'supabroadband-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'supabroadband_theme_setup' );

/**
 * Register Custom Post Type: Broadband Plans
 */
function supabroadband_register_broadband_plans() {
    $labels = array(
        'name'                  => _x( 'Broadband Plans', 'Post Type General Name', 'supabroadband-theme' ),
        'singular_name'         => _x( 'Broadband Plan', 'Post Type Singular Name', 'supabroadband-theme' ),
        'menu_name'             => __( 'Broadband Plans', 'supabroadband-theme' ),
        'name_admin_bar'        => __( 'Broadband Plan', 'supabroadband-theme' ),
        'archives'              => __( 'Plan Archives', 'supabroadband-theme' ),
        'attributes'            => __( 'Plan Attributes', 'supabroadband-theme' ),
        'parent_item_colon'     => __( 'Parent Plan:', 'supabroadband-theme' ),
        'all_items'             => __( 'All Plans', 'supabroadband-theme' ),
        'add_new_item'          => __( 'Add New Plan', 'supabroadband-theme' ),
        'add_new'               => __( 'Add New', 'supabroadband-theme' ),
        'new_item'              => __( 'New Plan', 'supabroadband-theme' ),
        'edit_item'             => __( 'Edit Plan', 'supabroadband-theme' ),
        'update_item'           => __( 'Update Plan', 'supabroadband-theme' ),
        'view_item'             => __( 'View Plan', 'supabroadband-theme' ),
        'view_items'            => __( 'View Plans', 'supabroadband-theme' ),
        'search_items'          => __( 'Search Plan', 'supabroadband-theme' ),
        'not_found'             => __( 'Not found', 'supabroadband-theme' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'supabroadband-theme' ),
        'featured_image'        => __( 'Provider Logo', 'supabroadband-theme' ),
        'set_featured_image'    => __( 'Set provider logo', 'supabroadband-theme' ),
        'remove_featured_image' => __( 'Remove provider logo', 'supabroadband-theme' ),
        'use_featured_image'    => __( 'Use as provider logo', 'supabroadband-theme' ),
        'insert_into_item'      => __( 'Insert into plan', 'supabroadband-theme' ),
        'uploaded_to_this_item' => __( 'Uploaded to this plan', 'supabroadband-theme' ),
        'items_list'            => __( 'Plans list', 'supabroadband-theme' ),
        'items_list_navigation' => __( 'Plans list navigation', 'supabroadband-theme' ),
        'filter_items_list'     => __( 'Filter plans list', 'supabroadband-theme' ),
    );
    
    $args = array(
        'label'                 => __( 'Broadband Plan', 'supabroadband-theme' ),
        'description'           => __( 'Broadband plans and packages', 'supabroadband-theme' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-networking',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    
    register_post_type( 'broadband_plan', $args );
}
add_action( 'init', 'supabroadband_register_broadband_plans', 0 );

/**
 * Add Meta Boxes for Broadband Plan Details
 */
function supabroadband_add_plan_meta_boxes() {
    add_meta_box(
        'plan_details',
        __( 'Plan Details', 'supabroadband-theme' ),
        'supabroadband_plan_details_callback',
        'broadband_plan',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'supabroadband_add_plan_meta_boxes' );

/**
 * Meta Box Callback Function
 */
function supabroadband_plan_details_callback( $post ) {
    // Add nonce for security
    wp_nonce_field( 'supabroadband_save_plan_details', 'supabroadband_plan_nonce' );
    
    // Get existing values
    $provider = get_post_meta( $post->ID, '_plan_provider', true );
    $speed = get_post_meta( $post->ID, '_plan_speed', true );
    $price = get_post_meta( $post->ID, '_plan_price', true );
    $contract_length = get_post_meta( $post->ID, '_plan_contract_length', true );
    $setup_fee = get_post_meta( $post->ID, '_plan_setup_fee', true );
    ?>
    
    <table class="form-table">
        <tr>
            <th><label for="plan_provider"><?php _e( 'Provider Name', 'supabroadband-theme' ); ?></label></th>
            <td>
                <input type="text" id="plan_provider" name="plan_provider" value="<?php echo esc_attr( $provider ); ?>" class="regular-text" required />
                <p class="description"><?php _e( 'e.g., BT, Sky, Virgin Media, TalkTalk', 'supabroadband-theme' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="plan_speed"><?php _e( 'Speed (Mbps)', 'supabroadband-theme' ); ?></label></th>
            <td>
                <input type="number" id="plan_speed" name="plan_speed" value="<?php echo esc_attr( $speed ); ?>" class="small-text" min="1" required />
                <p class="description"><?php _e( 'Download speed in Mbps (e.g., 67, 150, 500)', 'supabroadband-theme' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="plan_price"><?php _e( 'Monthly Price (£)', 'supabroadband-theme' ); ?></label></th>
            <td>
                <input type="number" id="plan_price" name="plan_price" value="<?php echo esc_attr( $price ); ?>" class="small-text" step="0.01" min="0" required />
                <p class="description"><?php _e( 'Monthly cost in pounds (e.g., 24.99)', 'supabroadband-theme' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="plan_contract_length"><?php _e( 'Contract Length (months)', 'supabroadband-theme' ); ?></label></th>
            <td>
                <select id="plan_contract_length" name="plan_contract_length" required>
                    <option value="">-- Select --</option>
                    <option value="12" <?php selected( $contract_length, '12' ); ?>>12 months</option>
                    <option value="18" <?php selected( $contract_length, '18' ); ?>>18 months</option>
                    <option value="24" <?php selected( $contract_length, '24' ); ?>>24 months</option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="plan_setup_fee"><?php _e( 'Setup Fee (£)', 'supabroadband-theme' ); ?></label></th>
            <td>
                <input type="number" id="plan_setup_fee" name="plan_setup_fee" value="<?php echo esc_attr( $setup_fee ); ?>" class="small-text" step="0.01" min="0" required />
                <p class="description"><?php _e( 'One-time setup cost (use 0 for free setup)', 'supabroadband-theme' ); ?></p>
            </td>
        </tr>
    </table>
    
    <?php
}

/**
 * Save Meta Box Data
 */
function supabroadband_save_plan_details( $post_id ) {
    // Check if nonce is set
    if ( ! isset( $_POST['supabroadband_plan_nonce'] ) ) {
        return;
    }
    
    // Verify nonce
    if ( ! wp_verify_nonce( $_POST['supabroadband_plan_nonce'], 'supabroadband_save_plan_details' ) ) {
        return;
    }
    
    // Check for autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    
    // Check user permissions
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    
    // Save/Update meta data
    $fields = array( 'plan_provider', 'plan_speed', 'plan_price', 'plan_contract_length', 'plan_setup_fee' );
    
    foreach ( $fields as $field ) {
        if ( isset( $_POST[ $field ] ) ) {
            $value = sanitize_text_field( $_POST[ $field ] );
            update_post_meta( $post_id, '_' . $field, $value );
        }
    }
}
add_action( 'save_post_broadband_plan', 'supabroadband_save_plan_details' );

/**
 * Customize admin columns for Broadband Plans
 */
function supabroadband_plan_columns( $columns ) {
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['title'] = __( 'Plan Name', 'supabroadband-theme' );
    $new_columns['provider'] = __( 'Provider', 'supabroadband-theme' );
    $new_columns['speed'] = __( 'Speed', 'supabroadband-theme' );
    $new_columns['price'] = __( 'Price', 'supabroadband-theme' );
    $new_columns['contract'] = __( 'Contract', 'supabroadband-theme' );
    $new_columns['date'] = $columns['date'];
    
    return $new_columns;
}
add_filter( 'manage_broadband_plan_posts_columns', 'supabroadband_plan_columns' );

/**
 * Populate custom columns
 */
function supabroadband_plan_column_content( $column, $post_id ) {
    switch ( $column ) {
        case 'provider':
            $provider = get_post_meta( $post_id, '_plan_provider', true );
            echo esc_html( $provider ? $provider : '—' );
            break;
            
        case 'speed':
            $speed = get_post_meta( $post_id, '_plan_speed', true );
            echo $speed ? esc_html( $speed ) . ' Mbps' : '—';
            break;
            
        case 'price':
            $price = get_post_meta( $post_id, '_plan_price', true );
            echo $price ? '£' . esc_html( number_format( $price, 2 ) ) . '/mo' : '—';
            break;
            
        case 'contract':
            $contract = get_post_meta( $post_id, '_plan_contract_length', true );
            echo $contract ? esc_html( $contract ) . ' months' : '—';
            break;
    }
}
add_action( 'manage_broadband_plan_posts_custom_column', 'supabroadband_plan_column_content', 10, 2 );

/**
 * Speed Test Widget Shortcode
 * Usage: [speed_test_widget]
 */
function supabroadband_speed_test_shortcode() {
    ob_start();
    include get_stylesheet_directory() . '/template-parts/speed-test-widget.php';
    return ob_get_clean();
}
add_shortcode( 'speed_test_widget', 'supabroadband_speed_test_shortcode' );

/**
 * Helper Function: Get Plan Meta Data
 * Reusable function to retrieve all plan data
 * 
 * @param int $post_id Plan post ID
 * @return array Plan data
 */
function supabroadband_get_plan_data( $post_id ) {
    return array(
        'provider'        => get_post_meta( $post_id, '_plan_provider', true ),
        'speed'           => get_post_meta( $post_id, '_plan_speed', true ),
        'price'           => get_post_meta( $post_id, '_plan_price', true ),
        'contract_length' => get_post_meta( $post_id, '_plan_contract_length', true ),
        'setup_fee'       => get_post_meta( $post_id, '_plan_setup_fee', true ),
    );
}

/**
 * Helper Function: Format Price
 * Reusable price formatting
 * 
 * @param float $price Price value
 * @return string Formatted price
 */
function supabroadband_format_price( $price ) {
    return '£' . number_format( floatval( $price ), 2 );
}

/**
 * Helper Function: Calculate Total Cost
 * Calculate total cost over contract period
 * 
 * @param float $monthly_price Monthly price
 * @param int $contract_length Contract length in months
 * @param float $setup_fee Setup fee
 * @return float Total cost
 */
function supabroadband_calculate_total_cost( $monthly_price, $contract_length, $setup_fee = 0 ) {
    return ( floatval( $monthly_price ) * intval( $contract_length ) ) + floatval( $setup_fee );
}

/**
 * Add custom query vars for filtering
 */
function supabroadband_query_vars( $vars ) {
    $vars[] = 'plan_speed';
    $vars[] = 'plan_contract';
    $vars[] = 'plan_provider';
    return $vars;
}
add_filter( 'query_vars', 'supabroadband_query_vars' );

/**
 * SEO: Add Schema.org structured data for broadband plans
 * Improves SEO by providing structured data to search engines
 */
function supabroadband_add_schema_data() {
    if ( is_singular( 'broadband_plan' ) ) {
        $post_id = get_the_ID();
        $plan_data = supabroadband_get_plan_data( $post_id );
        
        $schema = array(
            '@context'    => 'https://schema.org',
            '@type'       => 'Product',
            'name'        => get_the_title(),
            'description' => get_the_excerpt(),
            'brand'       => array(
                '@type' => 'Brand',
                'name'  => $plan_data['provider']
            ),
            'offers'      => array(
                '@type'         => 'Offer',
                'price'         => $plan_data['price'],
                'priceCurrency' => 'GBP',
                'availability'  => 'https://schema.org/InStock',
            ),
        );
        
        echo '<script type="application/ld+json">' . wp_json_encode( $schema ) . '</script>';
    }
}
add_action( 'wp_head', 'supabroadband_add_schema_data' );

/**
 * Add page-specific body classes for easier styling
 */
function supabroadband_body_classes( $classes ) {
    if ( is_page_template( 'page-broadband-plans.php' ) ) {
        $classes[] = 'broadband-plans-page';
    }
    if ( is_page_template( 'page-comparison.php' ) ) {
        $classes[] = 'comparison-page';
    }
    if ( is_singular( 'broadband_plan' ) ) {
        $classes[] = 'single-plan-page';
    }
    return $classes;
}
add_filter( 'body_class', 'supabroadband_body_classes' );

/**
 * Modify excerpt length for plan descriptions
 */
function supabroadband_excerpt_length( $length ) {
    if ( is_post_type_archive( 'broadband_plan' ) || is_singular( 'broadband_plan' ) ) {
        return 20;
    }
    return $length;
}
add_filter( 'excerpt_length', 'supabroadband_excerpt_length' );

/**
 * Add custom excerpt for plans if none exists
 */
function supabroadband_generate_plan_excerpt( $excerpt ) {
    global $post;
    
    if ( empty( $excerpt ) && get_post_type() === 'broadband_plan' ) {
        $plan_data = supabroadband_get_plan_data( $post->ID );
        $excerpt = sprintf(
            '%s Mbps broadband from %s for %s per month on a %s month contract.',
            $plan_data['speed'],
            $plan_data['provider'],
            supabroadband_format_price( $plan_data['price'] ),
            $plan_data['contract_length']
        );
    }
    
    return $excerpt;
}
add_filter( 'get_the_excerpt', 'supabroadband_generate_plan_excerpt' );

/**
 * Add Open Graph meta tags for social sharing
 */
function supabroadband_add_og_tags() {
    if ( is_singular( 'broadband_plan' ) ) {
        $post_id = get_the_ID();
        $plan_data = supabroadband_get_plan_data( $post_id );
        ?>
        <meta property="og:title" content="<?php echo esc_attr( get_the_title() ); ?>" />
        <meta property="og:description" content="<?php echo esc_attr( get_the_excerpt() ); ?>" />
        <meta property="og:type" content="product" />
        <meta property="og:url" content="<?php echo esc_url( get_permalink() ); ?>" />
        <?php if ( has_post_thumbnail() ) : ?>
            <meta property="og:image" content="<?php echo esc_url( get_the_post_thumbnail_url( $post_id, 'large' ) ); ?>" />
        <?php endif; ?>
        <?php
    }
}
add_action( 'wp_head', 'supabroadband_add_og_tags' );

/**
 * Register template-parts directory
 */
function supabroadband_register_template_parts() {
    $template_parts_dir = get_stylesheet_directory() . '/template-parts';
    if ( ! file_exists( $template_parts_dir ) ) {
        wp_mkdir_p( $template_parts_dir );
    }
}
add_action( 'after_setup_theme', 'supabroadband_register_template_parts' );

/**
 * Comparison Table Shortcode
 * Usage: [comparison_table]
 * Optional: [comparison_table limit="3"]
 */
function supabroadband_comparison_table_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'limit' => 5, // Number of plans to compare (default 5)
    ), $atts );
    
    ob_start();
    
    // Query broadband plans
    $args = array(
        'post_type'      => 'broadband_plan',
        'posts_per_page' => intval( $atts['limit'] ),
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    );
    
    $plans_query = new WP_Query( $args );
    
    if ( ! $plans_query->have_posts() ) {
        return '<p>No plans available for comparison.</p>';
    }
    
    // Store plans data
    $plans_data = array();
    while ( $plans_query->have_posts() ) : $plans_query->the_post();
        $plan_id = get_the_ID();

        // Get meta values
        $speed = get_post_meta( $plan_id, '_plan_speed', true );
        $provider = get_post_meta( $plan_id, '_plan_provider', true );
        $price = get_post_meta( $plan_id, '_plan_price', true );
        $contract = get_post_meta( $plan_id, '_plan_contract_length', true );
        $setup = get_post_meta( $plan_id, '_plan_setup_fee', true );

        $plans_data[] = array(
            'id'       => $plan_id,
            'title'    => get_the_title(),
            'provider' => $provider,
            'speed'    => $speed,
            'price'    => $price,
            'contract' => $contract,
            'setup'    => $setup,
            'thumbnail' => get_the_post_thumbnail( $plan_id, 'thumbnail' ),
        );
    endwhile;
    wp_reset_postdata();
    ?>

    <div class="comparison-widget">
        <div class="comparison-table-wrapper">
            <table class="comparison-table">
                <thead>
                    <tr>
                        <th class="feature-column">Features</th>
                        <?php foreach ( $plans_data as $plan ) : ?>
                            <th class="plan-column">
                                <div class="plan-header">
                                    <?php if ( $plan['thumbnail'] ) : ?>
                                        <?php echo $plan['thumbnail']; ?>
                                    <?php endif; ?>
                                    <h3><?php echo esc_html( $plan['provider'] ); ?></h3>
                                    <p class="plan-name"><?php echo esc_html( $plan['title'] ); ?></p>
                                </div>
                            </th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <!-- Download Speed -->
                    <tr class="highlight-row">
                        <td class="feature-label"><strong>Download Speed</strong></td>
                        <?php foreach ( $plans_data as $plan ) : ?>
                            <td class="plan-value">
                                <?php
                                $speed = $plan['speed'];
                                if ( !empty( $speed ) && $speed !== '0' ) : ?>
                                    <div class="speed-container">
                                        <span class="speed-value"><?php echo esc_html( $speed ); ?></span>
                                        <span class="speed-unit">Mbps</span>
                                    </div>
                                <?php else : ?>
                                    <div class="speed-container">
                                        <span class="speed-value" style="color: #999;">—</span>
                                    </div>
                                <?php endif; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                    
                    <!-- Monthly Price -->
                    <tr class="highlight-row">
                        <td class="feature-label"><strong>Monthly Price</strong></td>
                        <?php foreach ( $plans_data as $plan ) : ?>
                            <td class="plan-value">
                                <span class="price-value">£<?php echo esc_html( number_format( $plan['price'], 2 ) ); ?></span>
                                <span class="price-period">/month</span>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                    
                    <!-- Contract Length -->
                    <tr>
                        <td class="feature-label">Contract Length</td>
                        <?php foreach ( $plans_data as $plan ) : ?>
                            <td class="plan-value"><?php echo esc_html( $plan['contract'] ); ?> months</td>
                        <?php endforeach; ?>
                    </tr>
                    
                    <!-- Setup Fee -->
                    <tr>
                        <td class="feature-label">Setup Fee</td>
                        <?php foreach ( $plans_data as $plan ) : ?>
                            <td class="plan-value">
                                <?php 
                                if ( $plan['setup'] > 0 ) {
                                    echo '£' . esc_html( number_format( $plan['setup'], 2 ) );
                                } else {
                                    echo '<span class="free-badge">FREE</span>';
                                }
                                ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                    
                    <!-- Total Cost -->
                    <tr class="total-row">
                        <td class="feature-label"><strong>Total First Year</strong></td>
                        <?php foreach ( $plans_data as $plan ) : ?>
                            <td class="plan-value">
                                <strong>£<?php echo esc_html( number_format( ($plan['price'] * 12) + $plan['setup'], 2 ) ); ?></strong>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                    
                    <!-- CTA -->
                    <tr class="cta-row">
                        <td class="feature-label"></td>
                        <?php foreach ( $plans_data as $plan ) : ?>
                            <td class="plan-value">
                                <a href="<?php echo esc_url( home_url( '/enquiry/' ) ); ?>" class="comparison-cta-btn">
                                    Select
                                </a>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <?php
    return ob_get_clean();
}
add_shortcode( 'comparison_table', 'supabroadband_comparison_table_shortcode' );
