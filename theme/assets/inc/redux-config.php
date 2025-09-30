<?php
/**
 * Simple Redux Framework Configuration - No Extensions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Include Redux Framework - Plugin should be activated in WordPress admin
if (!class_exists('Redux')) {
    // Show admin notice if Redux is not available
    add_action('admin_notices', function() {
        echo '<div class="notice notice-error"><p><strong>Redux Framework Required:</strong> Please install and activate the Redux Framework plugin to use theme options. <a href="https://wordpress.org/plugins/redux-framework/" target="_blank">Download Redux Framework</a></p></div>';
    });
    
    // Create a fallback function for when Redux is not available
    function page_builder_simple_option($key, $default = '') {
        // Return default values when Redux is not available
        $fallback_options = array(
            'primary_color' => '#007cba',
            'secondary_color' => '#28a745',
            'site_title' => get_bloginfo('name'),
            'container_width' => 'container',
            'header_sticky' => false,
            'footer_style' => 'footer-1',
            'social_icons_style' => 'rounded',
        );
        
        return isset($fallback_options[$key]) ? $fallback_options[$key] : $default;
    }
    
    return; // Exit if Redux is not available
}

// Configuration
$opt_name = 'page_builder_simple_options';

/**
 * Simple Theme Options Configuration Arguments
 */
$args = array(
    // Basic Info
    'opt_name'             => $opt_name,
    'display_name'         => 'Page Builder Theme',
    'display_version'      => '1.0.0',
    'menu_type'            => 'menu',
    'allow_sub_menu'       => true,
    'menu_title'           => __('Theme Options', 'page-builder'),
    'page_title'           => __('Page Builder Theme Options', 'page-builder'),
    'page_slug'            => 'page_builder_simple_options',
    
    // Admin Bar
    'admin_bar'            => true,
    'admin_bar_icon'       => 'dashicons-admin-generic',
    
    // Styling & Layout
    'page_parent'          => 'themes.php',
    'page_permissions'     => 'manage_options',
    'menu_icon'            => 'dashicons-admin-generic',
    'save_defaults'        => true,
    'default_show'         => false,
    'show_import_export'   => true,
    
    // Disable problematic features
    'dev_mode'             => false,
    'update_notice'        => false,
    'customizer'           => false,
    'compiler'             => false,
    'output'               => false,
    'output_tag'           => false,
    
    // Disable tracking
    'disable_tracking'     => true,
);

Redux::setArgs($opt_name, $args);

/**
 * SECTION 1: GENERAL SETTINGS
 */
Redux::setSection($opt_name, array(
    'title'            => __('General', 'page-builder'),
    'id'               => 'general',
    'desc'             => __('General theme settings', 'page-builder'),
    'icon'             => 'el el-home',
    'fields'           => array(
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => __('Logo', 'page-builder'),
            'subtitle' => __('Upload your logo', 'page-builder'),
        ),
        array(
            'id'       => 'site_title',
            'type'     => 'text',
            'title'    => __('Site Title', 'page-builder'),
            'subtitle' => __('Enter your site title', 'page-builder'),
            'default'  => get_bloginfo('name'),
        ),
    )
));

/**
 * SECTION 2: COLORS
 */
Redux::setSection($opt_name, array(
    'title' => __('Colors', 'page-builder'),
    'id'    => 'colors',
    'desc'  => __('Color settings for your theme', 'page-builder'),
    'icon'  => 'el el-brush',
    'fields' => array(
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => __('Primary Color', 'page-builder'),
            'subtitle'    => __('Main brand color for buttons, links, etc.', 'page-builder'),
            'default'     => '#007cba',
            'validate'    => 'color',
            'transparent' => false,
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => __('Secondary Color', 'page-builder'),
            'subtitle'    => __('Secondary color for accents', 'page-builder'),
            'default'     => '#28a745',
            'validate'    => 'color',
            'transparent' => false,
        ),
    )
));

/**
 * SECTION 3: TYPOGRAPHY & GOOGLE FONTS
 */
Redux::setSection($opt_name, array(
    'title' => __('Typography', 'page-builder'),
    'id'    => 'typography',
    'desc'  => __('Typography and Google Fonts settings', 'page-builder'),
    'icon'  => 'el el-font',
    'fields' => array(
        array(
            'id'       => 'google_fonts_api_key',
            'type'     => 'text',
            'title'    => __('Google Fonts API Key', 'page-builder'),
            'subtitle' => __('Enter your Google Fonts API key for better performance (optional)', 'page-builder'),
            'desc'     => __('Get your API key from: https://developers.google.com/fonts/docs/developer_api', 'page-builder'),
        ),
        array(
            'id'          => 'body_typography',
            'type'        => 'typography',
            'title'       => __('Body Typography', 'page-builder'),
            'subtitle'    => __('Typography for body text', 'page-builder'),
            'google'      => true,
            'font-backup' => true,
            'output'      => array('body'),
            'units'       => 'px',
            'default'     => array(
                'color'         => '#333333',
                'font-style'    => '400',
                'font-family'   => 'Inter',
                'google'        => true,
                'font-size'     => '16px',
                'line-height'   => '1.6'
            ),
        ),
        array(
            'id'          => 'heading_typography',
            'type'        => 'typography',
            'title'       => __('Heading Typography (H1-H6)', 'page-builder'),
            'subtitle'    => __('Typography for all headings', 'page-builder'),
            'google'      => true,
            'font-backup' => true,
            'output'      => array('h1, h2, h3, h4, h5, h6'),
            'units'       => 'px',
            'default'     => array(
                'color'         => '#222222',
                'font-style'    => '600',
                'font-family'   => 'Inter',
                'google'        => true,
                'font-weight'   => '600'
            ),
        ),

       
       
        array(
            'id'       => 'custom_google_fonts',
            'type'     => 'multi_text',
            'title'    => __('Additional Google Fonts', 'page-builder'),
            'subtitle' => __('Add custom Google Font URLs', 'page-builder'),
            'desc'     => __('Enter Google Font URLs, one per line. Example: https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap', 'page-builder'),
        ),
    )
));

/**
 * Helper function to get Redux option
 */
function page_builder_simple_option($key, $default = '') {
    // Check if Redux is available
    if (class_exists('Redux')) {
        return Redux::getOption('page_builder_simple_options', $key, $default);
    }
    
    // Fallback to simple options when Redux is not available
    global $page_builder_simple_options;
    
    if (empty($page_builder_simple_options)) {
        $page_builder_simple_options = get_option('page_builder_simple_options', array());
    }
    
    return isset($page_builder_simple_options[$key]) ? $page_builder_simple_options[$key] : $default;
}

/**
 * SECTION 4: LAYOUT SETTINGS
 */
Redux::setSection($opt_name, array(
    'title' => __('Layout', 'page-builder'),
    'id'    => 'layout',
    'desc'  => __('Layout and container settings', 'page-builder'),
    'icon'  => 'el el-screen',
    'fields' => array(
        array(
            'id'       => 'container_width',
            'type'     => 'select',
            'title'    => __('Container Width', 'page-builder'),
            'subtitle' => __('Choose the maximum width for your content', 'page-builder'),
            'options'  => array(
                'container-fluid' => 'Full Width (100%)',
                'container' => 'Bootstrap Container (1200px)',
                'container-sm' => 'Small Container (576px)',
                'container-md' => 'Medium Container (768px)',
                'container-lg' => 'Large Container (992px)',
                'container-xl' => 'Extra Large Container (1140px)',
            ),
            'default'  => 'container',
        ),
        array(
            'id'       => 'header_sticky',
            'type'     => 'switch',
            'title'    => __('Sticky Header', 'page-builder'),
            'subtitle' => __('Enable sticky header navigation', 'page-builder'),
            'default'  => false,
        ),
        array(
            'id'       => 'footer_style',
            'type'     => 'select',
            'title'    => __('Footer Style', 'page-builder'),
            'subtitle' => __('Choose footer layout style', 'page-builder'),
            'options'  => array(
                'footer-1' => 'Footer Style 1',
                'footer-2' => 'Footer Style 2',
                'footer-3' => 'Footer Style 3',
                'footer-4' => 'Footer Style 4',
                'footer-5' => 'Footer Style 5',
            ),
            'default'  => 'footer-1',
        ),
    )
));

/**
 * SECTION 5: SOCIAL MEDIA
 */
Redux::setSection($opt_name, array(
    'title' => __('Social Media', 'page-builder'),
    'id'    => 'social',
    'desc'  => __('Social media links and settings', 'page-builder'),
    'icon'  => 'el el-share',
    'fields' => array(
        array(
            'id'       => 'facebook_url',
            'type'     => 'text',
            'title'    => __('Facebook URL', 'page-builder'),
            'subtitle' => __('Enter your Facebook page URL', 'page-builder'),
            'validate' => 'url',
        ),
        array(
            'id'       => 'twitter_url',
            'type'     => 'text',
            'title'    => __('Twitter URL', 'page-builder'),
            'subtitle' => __('Enter your Twitter profile URL', 'page-builder'),
            'validate' => 'url',
        ),
        array(
            'id'       => 'instagram_url',
            'type'     => 'text',
            'title'    => __('Instagram URL', 'page-builder'),
            'subtitle' => __('Enter your Instagram profile URL', 'page-builder'),
            'validate' => 'url',
        ),
        array(
            'id'       => 'linkedin_url',
            'type'     => 'text',
            'title'    => __('LinkedIn URL', 'page-builder'),
            'subtitle' => __('Enter your LinkedIn profile URL', 'page-builder'),
            'validate' => 'url',
        ),
        array(
            'id'       => 'youtube_url',
            'type'     => 'text',
            'title'    => __('YouTube URL', 'page-builder'),
            'subtitle' => __('Enter your YouTube channel URL', 'page-builder'),
            'validate' => 'url',
        ),
        array(
            'id'       => 'social_icons_style',
            'type'     => 'select',
            'title'    => __('Social Icons Style', 'page-builder'),
            'subtitle' => __('Choose the style for social media icons', 'page-builder'),
            'options'  => array(
                'rounded' => 'Rounded',
                'square' => 'Square',
                'circle' => 'Circle',
                'minimal' => 'Minimal',
            ),
            'default'  => 'rounded',
        ),
    )
));

/**
 * SECTION 6: CONTACT INFORMATION
 */
Redux::setSection($opt_name, array(
    'title' => __('Contact Info', 'page-builder'),
    'id'    => 'contact',
    'desc'  => __('Contact information and settings', 'page-builder'),
    'icon'  => 'el el-phone',
    'fields' => array(
        array(
            'id'       => 'contact_phone',
            'type'     => 'text',
            'title'    => __('Phone Number', 'page-builder'),
            'subtitle' => __('Enter your contact phone number', 'page-builder'),
        ),
        array(
            'id'       => 'contact_email',
            'type'     => 'text',
            'title'    => __('Email Address', 'page-builder'),
            'subtitle' => __('Enter your contact email address', 'page-builder'),
            'validate' => 'email',
        ),
        array(
            'id'       => 'contact_address',
            'type'     => 'textarea',
            'title'    => __('Address', 'page-builder'),
            'subtitle' => __('Enter your business address', 'page-builder'),
        ),
        array(
            'id'       => 'contact_hours',
            'type'     => 'text',
            'title'    => __('Business Hours', 'page-builder'),
            'subtitle' => __('Enter your business hours (e.g., Mon-Fri 9AM-5PM)', 'page-builder'),
        ),
    )
));

/**
 * SECTION 7: SEO & ANALYTICS
 */
Redux::setSection($opt_name, array(
    'title' => __('SEO & Analytics', 'page-builder'),
    'id'    => 'seo',
    'desc'  => __('SEO and analytics settings', 'page-builder'),
    'icon'  => 'el el-search',
    'fields' => array(
        array(
            'id'       => 'google_analytics_id',
            'type'     => 'text',
            'title'    => __('Google Analytics ID', 'page-builder'),
            'subtitle' => __('Enter your Google Analytics tracking ID (e.g., GA-XXXXXXXXX)', 'page-builder'),
        ),
        array(
            'id'       => 'google_tag_manager_id',
            'type'     => 'text',
            'title'    => __('Google Tag Manager ID', 'page-builder'),
            'subtitle' => __('Enter your Google Tag Manager container ID (e.g., GTM-XXXXXXX)', 'page-builder'),
        ),
        array(
            'id'       => 'facebook_pixel_id',
            'type'     => 'text',
            'title'    => __('Facebook Pixel ID', 'page-builder'),
            'subtitle' => __('Enter your Facebook Pixel ID', 'page-builder'),
        ),
        array(
            'id'       => 'meta_description',
            'type'     => 'textarea',
            'title'    => __('Default Meta Description', 'page-builder'),
            'subtitle' => __('Default meta description for pages without custom description', 'page-builder'),
            'rows'     => 3,
        ),
    )
));

/**
 * Initialize Redux options global variable
 */
function page_builder_simple_initialize_redux_options() {
    global $page_builder_simple_options;
    $page_builder_simple_options = get_option('page_builder_simple_options');
}
add_action('init', 'page_builder_simple_initialize_redux_options');