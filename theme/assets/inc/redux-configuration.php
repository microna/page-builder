<?php
/**
 * Redux Framework Configuration File
 * 
 * Add this to your theme's functions.php or create a separate file in /inc/redux-config.php
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

// Only proceed if Redux is loaded
if (!class_exists('Redux')) {
    return;
}

// Configuration
$opt_name = 'page_builder_options'; // This is your global variable name

/**
 * Theme Options Configuration Arguments
 */
$theme = wp_get_theme();
$args = array(
    // Basic Info
    'opt_name'             => $opt_name,
    'display_name'         => 'Page Builder Theme',
    'display_version'      => '1.0.0',
    'menu_type'            => 'menu', // 'menu' or 'submenu'
    'allow_sub_menu'       => true,
    'menu_title'           => __('Page Builder Options', 'page-builder'),
    'page_title'           => __('Page Builder Theme Options', 'page-builder'),
    'page_slug'            => 'page_builder_options',
    
    // Admin Bar
    'admin_bar'            => true,
    'admin_bar_icon'       => 'dashicons-admin-generic',
    'admin_bar_priority'   => 50,
    
    // Styling & Layout
    'page_parent'          => 'themes.php', // For submenu under Appearance
    'page_permissions'     => 'manage_options',
    'menu_icon'            => 'dashicons-admin-generic',
    'last_tab'             => '',
    'page_icon'            => 'icon-themes',
    'page_slug'            => 'page_builder_options',
    'save_defaults'        => true,
    'default_show'         => false,
    'default_mark'         => '*',
    'show_import_export'   => true,
    'show_options_object'  => false,
    
    // Development & Updates
    'dev_mode'             => false, // Set to true for development
    'update_notice'        => false,
    'customizer'           => true,
    'compiler'             => true,
    
    // Appearance
    'output'               => true,
    'output_tag'           => true,
    'footer_credit'        => '&nbsp;',
    'admin_bar_icon'       => 'dashicons-portfolio',
    
    // Google Fonts
    'google_api_key'       => '', // Add your Google Fonts API key
    'google_update_weekly' => false,
    'async_typography'     => false,
    
    // Disable Demo Content
    'demo'                 => false,
    
    // Hints & Help
    'hints' => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
    
    // Disable tracking
    'disable_tracking' => true,
    
    // Templates
    'templates_path'       => get_template_directory() . '/inc/redux-templates/',
);

Redux::setArgs($opt_name, $args);

/**
 * SECTION 1: GENERAL SETTINGS
 */
Redux::setSection($opt_name, array(
    'title'            => __('General', 'page-builder'),
    'id'               => 'general',
    'desc'             => __('General theme settings', 'page-builder'),
    'customizer_width' => '400px',
    'icon'             => 'el el-home',
    'fields'           => array(
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => __('Logo', 'page-builder'),
            'compiler' => 'true',
            'subtitle' => __('Upload your logo', 'page-builder'),
        ),
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'url'      => true,
            'title'    => __('Favicon', 'page-builder'),
            'subtitle' => __('Upload your favicon (32x32px)', 'page-builder'),
        ),
        array(
            'id'       => 'site_layout',
            'type'     => 'button_set',
            'title'    => __('Site Layout', 'page-builder'),
            'subtitle' => __('Choose site layout', 'page-builder'),
            'options'  => array(
                'boxed'     => 'Boxed',
                'wide'      => 'Wide',
                'fullwidth' => 'Full Width'
            ),
            'default'  => 'wide'
        ),
        array(
            'id'       => 'container_width',
            'type'     => 'spinner',
            'title'    => __('Container Width', 'page-builder'),
            'subtitle' => __('Set container max width in pixels', 'page-builder'),
            'default'  => '1200',
            'min'      => '960',
            'step'     => '1',
            'max'      => '1920',
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
            'id'       => 'color_scheme',
            'type'     => 'palette',
            'title'    => __('Color Scheme', 'page-builder'),
            'subtitle' => __('Select a predefined color scheme', 'page-builder'),
            'palettes' => array(
                'blue' => array(
                    '#1e73be',
                    '#00a0d2',
                    '#0085ba',
                ),
                'red' => array(
                    '#dd3333',
                    '#dd9933',
                    '#8b0000',
                ),
                'green' => array(
                    '#81d742',
                    '#049cdb',
                    '#46a546',
                ),
            ),
            'default' => 'blue',
        ),
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => __('Primary Color', 'page-builder'),
            'subtitle'    => __('Main brand color for buttons, links, etc.', 'page-builder'),
            'default'     => '#007cba',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => array(
                'color' => '.primary-color, a',
                'background-color' => '.btn-primary, .bg-primary',
                'border-color' => '.border-primary'
            )
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => __('Secondary Color', 'page-builder'),
            'subtitle'    => __('Secondary color for accents', 'page-builder'),
            'default'     => '#28a745',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => array(
                'background-color' => '.btn-secondary, .bg-secondary'
            )
        ),
        array(
            'id'          => 'accent_color',
            'type'        => 'color',
            'title'       => __('Accent Color', 'page-builder'),
            'subtitle'    => __('Accent color for highlights', 'page-builder'),
            'default'     => '#ffc107',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => array(
                'color' => '.accent-color',
                'background-color' => '.bg-accent'
            )
        ),
        array(
            'id'       => 'link_color',
            'type'     => 'link_color',
            'title'    => __('Link Colors', 'page-builder'),
            'subtitle' => __('Set link colors and hover states', 'page-builder'),
            'default'  => array(
                'regular' => '#007cba',
                'hover'   => '#005a87',
                'active'  => '#005a87',
            ),
            'output'   => array('a')
        ),
        array(
            'id'       => 'background_color',
            'type'     => 'color',
            'title'    => __('Background Color', 'page-builder'),
            'subtitle' => __('Site background color', 'page-builder'),
            'default'  => '#ffffff',
            'validate' => 'color',
            'output'   => array('background-color' => 'body')
        ),
    )
));

/**
 * SECTION 3: TYPOGRAPHY
 */
Redux::setSection($opt_name, array(
    'title' => __('Typography', 'page-builder'),
    'id'    => 'typography',
    'icon'  => 'el el-font',
    'fields' => array(
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
                'font-family'   => 'Open Sans',
                'google'        => true,
                'font-size'     => '16px',
                'line-height'   => '1.6'
            ),
        ),
        array(
            'id'          => 'heading_typography',
            'type'        => 'typography',
            'title'       => __('Heading Typography', 'page-builder'),
            'subtitle'    => __('Typography for all headings (H1-H6)', 'page-builder'),
            'google'      => true,
            'font-backup' => true,
            'output'      => array('h1, h2, h3, h4, h5, h6'),
            'units'       => 'px',
            'default'     => array(
                'color'         => '#222222',
                'font-style'    => '600',
                'font-family'   => 'Roboto',
                'google'        => true,
                'font-weight'   => '600'
            ),
        ),
        array(
            'id'          => 'menu_typography',
            'type'        => 'typography',
            'title'       => __('Menu Typography', 'page-builder'),
            'subtitle'    => __('Typography for navigation menu', 'page-builder'),
            'google'      => true,
            'font-backup' => true,
            'output'      => array('.main-navigation a'),
            'units'       => 'px',
            'default'     => array(
                'font-size'     => '16px',
                'font-weight'   => '500',
                'line-height'   => '1.5'
            ),
        ),
        array(
            'id'       => 'custom_fonts',
            'type'     => 'multi_text',
            'title'    => __('Custom Fonts', 'page-builder'),
            'subtitle' => __('Add custom font URLs (Google Fonts, etc.)', 'page-builder'),
            'desc'     => __('Enter font URLs, one per line', 'page-builder'),
        ),
        array(
            'id'       => 'font_display',
            'type'     => 'select',
            'title'    => __('Font Display', 'page-builder'),
            'subtitle' => __('Choose font-display property for web fonts', 'page-builder'),
            'options'  => array(
                'auto'     => 'Auto',
                'block'    => 'Block',
                'swap'     => 'Swap',
                'fallback' => 'Fallback',
                'optional' => 'Optional'
            ),
            'default' => 'swap'
        ),
    )
));

/**
 * SECTION 4: HEADER
 */
Redux::setSection($opt_name, array(
    'title' => __('Header', 'page-builder'),
    'id'    => 'header',
    'icon'  => 'el el-website',
    'fields' => array(
        array(
            'id'       => 'header_layout',
            'type'     => 'image_select',
            'title'    => __('Header Layout', 'page-builder'),
            'subtitle' => __('Choose header layout style', 'page-builder'),
            'options'  => array(
                'layout1' => array(
                    'alt' => 'Layout 1',
                    'img' => get_template_directory_uri() . '/images/admin/header-layout-1.png'
                ),
                'layout2' => array(
                    'alt' => 'Layout 2',
                    'img' => get_template_directory_uri() . '/images/admin/header-layout-2.png'
                ),
                'layout3' => array(
                    'alt' => 'Layout 3',
                    'img' => get_template_directory_uri() . '/images/admin/header-layout-3.png'
                ),
            ),
            'default' => 'layout1'
        ),
        array(
            'id'       => 'header_sticky',
            'type'     => 'switch',
            'title'    => __('Sticky Header', 'page-builder'),
            'subtitle' => __('Enable sticky/fixed header on scroll', 'page-builder'),
            'default'  => true,
        ),
        array(
            'id'       => 'header_search',
            'type'     => 'switch',
            'title'    => __('Header Search', 'page-builder'),
            'subtitle' => __('Show search form in header', 'page-builder'),
            'default'  => true,
        ),
        array(
            'id'       => 'header_cart',
            'type'     => 'switch',
            'title'    => __('Header Cart Icon', 'page-builder'),
            'subtitle' => __('Show WooCommerce cart icon in header', 'page-builder'),
            'default'  => true,
            'required' => array('woocommerce_support', '=', '1')
        ),
        array(
            'id'       => 'header_social_icons',
            'type'     => 'sortable',
            'title'    => __('Header Social Icons', 'page-builder'),
            'subtitle' => __('Drag to reorder social icons in header', 'page-builder'),
            'options'  => array(
                'facebook'  => 'Facebook',
                'twitter'   => 'Twitter',
                'instagram' => 'Instagram',
                'linkedin'  => 'LinkedIn',
                'youtube'   => 'YouTube',
            ),
        ),
    )
));

/**
 * SECTION 5: FOOTER
 */
Redux::setSection($opt_name, array(
    'title' => __('Footer', 'page-builder'),
    'id'    => 'footer',
    'icon'  => 'el el-photo',
    'fields' => array(
        array(
            'id'       => 'footer_widgets',
            'type'     => 'select',
            'title'    => __('Footer Widget Columns', 'page-builder'),
            'subtitle' => __('Number of footer widget columns', 'page-builder'),
            'options'  => array(
                '1' => '1 Column',
                '2' => '2 Columns',
                '3' => '3 Columns',
                '4' => '4 Columns',
            ),
            'default' => '4'
        ),
        array(
            'id'       => 'footer_copyright',
            'type'     => 'editor',
            'title'    => __('Copyright Text', 'page-builder'),
            'subtitle' => __('Copyright text in footer', 'page-builder'),
            'default'  => '© 2025 Your Site Name. All rights reserved.',
            'args'     => array(
                'wpautop'       => false,
                'media_buttons' => false,
                'textarea_rows' => 5,
                'teeny'         => false,
                'quicktags'     => false,
            )
        ),
        array(
            'id'       => 'footer_social_icons',
            'type'     => 'sortable',
            'title'    => __('Footer Social Icons', 'page-builder'),
            'subtitle' => __('Drag to reorder social icons in footer', 'page-builder'),
            'options'  => array(
                'facebook'  => 'Facebook',
                'twitter'   => 'Twitter',
                'instagram' => 'Instagram',
                'linkedin'  => 'LinkedIn',
                'youtube'   => 'YouTube',
            ),
        ),
    )
));

/**
 * SECTION 6: BLOG
 */
Redux::setSection($opt_name, array(
    'title' => __('Blog', 'page-builder'),
    'id'    => 'blog',
    'icon'  => 'el el-pencil',
    'fields' => array(
        array(
            'id'       => 'blog_layout',
            'type'     => 'image_select',
            'title'    => __('Blog Layout', 'page-builder'),
            'subtitle' => __('Choose blog listing layout', 'page-builder'),
            'options'  => array(
                'list' => array(
                    'alt' => 'List View',
                    'img' => get_template_directory_uri() . '/images/admin/blog-list.png'
                ),
                'grid' => array(
                    'alt' => 'Grid View',
                    'img' => get_template_directory_uri() . '/images/admin/blog-grid.png'
                ),
                'masonry' => array(
                    'alt' => 'Masonry',
                    'img' => get_template_directory_uri() . '/images/admin/blog-masonry.png'
                ),
            ),
            'default' => 'list'
        ),
        array(
            'id'       => 'blog_sidebar',
            'type'     => 'button_set',
            'title'    => __('Blog Sidebar', 'page-builder'),
            'subtitle' => __('Choose sidebar position for blog', 'page-builder'),
            'options'  => array(
                'left'  => 'Left',
                'right' => 'Right',
                'none'  => 'No Sidebar'
            ),
            'default' => 'right'
        ),
        array(
            'id'       => 'excerpt_length',
            'type'     => 'spinner',
            'title'    => __('Excerpt Length', 'page-builder'),
            'subtitle' => __('Number of words in post excerpts', 'page-builder'),
            'default'  => '30',
            'min'      => '10',
            'step'     => '1',
            'max'      => '100',
        ),
        array(
            'id'       => 'show_post_meta',
            'type'     => 'checkbox',
            'title'    => __('Post Meta', 'page-builder'),
            'subtitle' => __('Choose which post meta to display', 'page-builder'),
            'options'  => array(
                'date'     => 'Date',
                'author'   => 'Author',
                'category' => 'Category',
                'tags'     => 'Tags',
                'comments' => 'Comments'
            ),
            'default' => array(
                'date'     => '1',
                'author'   => '1',
                'category' => '1',
            )
        ),
    )
));

/**
 * SECTION 7: WooCommerce (if WooCommerce is active)
 */
if (class_exists('WooCommerce')) {
    Redux::setSection($opt_name, array(
        'title' => __('WooCommerce', 'page-builder'),
        'id'    => 'woocommerce',
        'icon'  => 'el el-shopping-cart',
        'fields' => array(
            array(
                'id'       => 'woocommerce_support',
                'type'     => 'switch',
                'title'    => __('WooCommerce Support', 'page-builder'),
                'subtitle' => __('Enable WooCommerce integration', 'page-builder'),
                'default'  => true,
            ),
            array(
                'id'       => 'shop_columns',
                'type'     => 'button_set',
                'title'    => __('Shop Columns', 'page-builder'),
                'subtitle' => __('Number of columns in shop page', 'page-builder'),
                'options'  => array(
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                ),
                'default'  => '4',
                'required' => array('woocommerce_support', '=', '1')
            ),
            array(
                'id'       => 'products_per_page',
                'type'     => 'spinner',
                'title'    => __('Products Per Page', 'page-builder'),
                'subtitle' => __('Number of products to show per page', 'page-builder'),
                'default'  => '12',
                'min'      => '4',
                'step'     => '1',
                'max'      => '48',
                'required' => array('woocommerce_support', '=', '1')
            ),
        )
    ));
}

/**
 * SECTION 8: ADVANCED
 */
Redux::setSection($opt_name, array(
    'title' => __('Advanced', 'page-builder'),
    'id'    => 'advanced',
    'icon'  => 'el el-cog',
    'fields' => array(
        array(
            'id'       => 'custom_css',
            'type'     => 'ace_editor',
            'title'    => __('Custom CSS', 'page-builder'),
            'subtitle' => __('Add your custom CSS code', 'page-builder'),
            'mode'     => 'css',
            'theme'    => 'monokai',
            'desc'     => 'Paste your custom CSS code here.',
            'default'  => "/* Your custom CSS here */\n"
        ),
        array(
            'id'       => 'custom_js',
            'type'     => 'ace_editor',
            'title'    => __('Custom JavaScript', 'page-builder'),
            'subtitle' => __('Add your custom JavaScript code', 'page-builder'),
            'mode'     => 'javascript',
            'theme'    => 'chrome',
            'desc'     => 'Paste your custom JavaScript code here.',
            'default'  => "/* Your custom JavaScript here */\n"
        ),
        array(
            'id'       => 'google_analytics',
            'type'     => 'textarea',
            'title'    => __('Google Analytics', 'page-builder'),
            'subtitle' => __('Paste your Google Analytics tracking code', 'page-builder'),
            'rows'     => 10,
        ),
        array(
            'id'       => 'performance_optimize',
            'type'     => 'checkbox',
            'title'    => __('Performance Optimizations', 'page-builder'),
            'subtitle' => __('Enable performance features', 'page-builder'),
            'options'  => array(
                'minify_css'    => 'Minify CSS',
                'minify_js'     => 'Minify JavaScript',
                'lazy_load'     => 'Lazy Load Images',
                'preload_fonts' => 'Preload Fonts',
            ),
        ),
    )
));

/**
 * SECTION 9: IMPORT/EXPORT
 */
Redux::setSection($opt_name, array(
    'title' => __('Import / Export', 'page-builder'),
    'id'    => 'import_export',
    'icon'  => 'el el-refresh',
    'fields' => array(
        array(
            'id'   => 'import_export_info',
            'type' => 'info',
            'desc' => __('You can backup your theme settings and restore them later using the import/export functionality.', 'page-builder')
        ),
    )
));

/**
 * Add callback functions for compiler hooks
 */
if (!function_exists('compiler_action')) {
    function compiler_action($options, $css, $changed_values) {
        // Compile SCSS files or other actions when options change
        // This runs when Redux detects changes in fields with 'compiler' => true
        
        // Example: Write custom CSS file
        $upload_dir = wp_upload_dir();
        $css_file = $upload_dir['basedir'] . '/page-builder-compiled.css';
        
        // Generate CSS from options
        $compiled_css = page_builder_generate_css($options);
        
        // Write file
        file_put_contents($css_file, $compiled_css);
    }
    add_action("redux/options/{$opt_name}/compiler", 'compiler_action', 10, 3);
}

/**
 * Generate CSS from Redux options
 */
function page_builder_generate_css($options) {
    $css = '';
    
    // Add CSS based on options
    if (!empty($options['primary_color'])) {
        $css .= "
        :root {
            --primary-color: {$options['primary_color']};
        }
        .btn-primary {
            background-color: {$options['primary_color']};
            border-color: {$options['primary_color']};
        }
        ";
    }
    
    if (!empty($options['container_width'])) {
        $css .= "
        .container {
            max-width: {$options['container_width']}px;
        }
        ";
    }
    
    // Add custom CSS
    if (!empty($options['custom_css'])) {
        $css .= $options['custom_css'];
    }
    
    return $css;
}

/**
 * Remove demo content and ads
 */
function page_builder_remove_redux_demo() {
    if (class_exists('ReduxFrameworkPlugin')) {
        remove_filter('plugin_row_meta', array(
            ReduxFrameworkPlugin::instance(),
            'plugin_metalinks'
        ), null, 2);
        
        remove_action('admin_notices', array(
            ReduxFrameworkPlugin::instance(),
            'admin_notices'
        ));
    }
}
add_action('init', 'page_builder_remove_redux_demo');

/**
 * Helper function to get Redux option
 */
function page_builder_option($key, $default = '') {
    global $page_builder_options;
    
    if (empty($page_builder_options)) {
        $page_builder_options = get_option('page_builder_options', array());
    }
    
    return isset($page_builder_options[$key]) ? $page_builder_options[$key] : $default;
}

/**
 * Initialize Redux options global variable
 */
function page_builder_initialize_redux_options() {
    global $page_builder_options;
    $page_builder_options = get_option('page_builder_options');
}
add_action('init', 'page_builder_initialize_redux_options');

/**
 * Enqueue compiled CSS if it exists
 */
function page_builder_enqueue_compiled_css() {
    $upload_dir = wp_upload_dir();
    $css_file = $upload_dir['basedir'] . '/page-builder-compiled.css';
    $css_url = $upload_dir['baseurl'] . '/page-builder-compiled.css';
    
    if (file_exists($css_file)) {
        wp_enqueue_style(
            'page-builder-compiled',
            $css_url,
            array(),
            filemtime($css_file)
        );
    }
}
add_action('wp_enqueue_scripts', 'page_builder_enqueue_compiled_css');

/**
 * Add Redux options to customizer
 */
function page_builder_redux_to_customizer($wp_customize) {
    // Only if Redux options exist
    if (function_exists('page_builder_option')) {
        // Add sections and controls based on Redux options
        $wp_customize->add_section('page_builder_redux_colors', array(
            'title' => __('Theme Colors (Redux)', 'page-builder'),
            'priority' => 30,
        ));
        
        $wp_customize->add_setting('page_builder_options[primary_color]', array(
            'type' => 'option',
            'default' => page_builder_option('primary_color', '#007cba'),
            'sanitize_callback' => 'sanitize_hex_color',
        ));
        
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'page_builder_primary_color',
            array(
                'label' => __('Primary Color', 'page-builder'),
                'section' => 'page_builder_redux_colors',
                'settings' => 'page_builder_options[primary_color]',
            )
        ));
    }
}
add_action('customize_register', 'page_builder_redux_to_customizer');
?>