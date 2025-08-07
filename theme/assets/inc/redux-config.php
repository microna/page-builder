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
        echo '<div class="notice notice-error"><p><strong>Redux Framework Required:</strong> Please install and activate the Redux Framework plugin to use theme options.</p></div>';
    });
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
    global $page_builder_simple_options;
    
    if (empty($page_builder_simple_options)) {
        $page_builder_simple_options = get_option('page_builder_simple_options', array());
    }
    
    return isset($page_builder_simple_options[$key]) ? $page_builder_simple_options[$key] : $default;
}

/**
 * Initialize Redux options global variable
 */
function page_builder_simple_initialize_redux_options() {
    global $page_builder_simple_options;
    $page_builder_simple_options = get_option('page_builder_simple_options');
}
add_action('init', 'page_builder_simple_initialize_redux_options');