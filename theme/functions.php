<?php

function enqueue_theme_styles() {
        wp_enqueue_style(
            'theme-style',
            get_template_directory_uri() . '/assets/css/main.css',
            array(),
            '1.0.0'
        );
        wp_enqueue_style(
            'swiper-bundle-css',
            get_template_directory_uri() . '/assets/css/swiper-bundle.min.css',
            array(),
            '1.0.0'
        );
        wp_enqueue_style(
            'bootstrap-css',
            get_template_directory_uri() . '/assets/css/bootstrap.min.css',
            array(),
            '1.0.0'
        );
}
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');


function enqueue_theme_scripts() {
    wp_enqueue_script(
        'theme-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'), // Dependencies
        '1.0.0',        // Version
        true            // Load in footer
    );
    wp_enqueue_script(
        'swiper-bundle-js',
        get_template_directory_uri() . '/assets/js/swiper-bundle.min.js',
        '1.0.0',        // Version
        true            // Load in footer
    );
    
}
add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');


// Disable Gutenberg Block Editor
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);

// Remove Gutenberg CSS
function remove_gutenberg_css() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style'); // WooCommerce blocks if used
}
add_action('wp_enqueue_scripts', 'remove_gutenberg_css', 100);

// Remove Gutenberg from admin bar
function remove_gutenberg_admin_bar() {
    remove_action('admin_bar_menu', 'wp_admin_bar_edit_post_link', 10);
}
add_action('admin_bar_menu', 'remove_gutenberg_admin_bar', 5);


// Register Header CPT
function create_header_cpt() {
    register_post_type('header', array(
        'labels' => array(
            'name' => 'Headers',
            'singular_name' => 'Header',
            'add_new_item' => 'Add New Header',
            'edit_item' => 'Edit Header',
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'supports' => array('title', 'editor', 'custom-fields'),
        'menu_icon' => 'dashicons-editor-kitchensink',
        'has_archive' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
    ));
}
add_action('init', 'create_header_cpt');


// Register Header CPT
function create_footer_cpt() {
    register_post_type('footer', array(
        'labels' => array(
            'name' => 'Footer',
            'singular_name' => 'Footer',
            'add_new_item' => 'Add New Footer',
            'edit_item' => 'Edit Footer',
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'supports' => array('title', 'editor', 'custom-fields'),
        'menu_icon' => 'dashicons-editor-kitchensink',
        'has_archive' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
    ));
}
add_action('init', 'create_footer_cpt');



// Register Navigation Menus
function register_theme_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'your-theme-text-domain'),
        'footer' => __('Footer Menu', 'your-theme-text-domain')
    ));
}
add_action('init', 'register_theme_menus');

// Allow SVG Upload
function add_svg_support($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'add_svg_support');

// Fix SVG display in Media Library
function fix_svg_thumb_display() {
    echo '<style>
        td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail { 
            width: 100% !important; 
            height: auto !important; 
        }
    </style>';
}
add_action('admin_head', 'fix_svg_thumb_display');

// Sanitize SVG uploads
function sanitize_svg($file) {
    if ($file['type'] === 'image/svg+xml') {
        if (!function_exists('simplexml_load_file')) {
            return $file;
        }

        // Load the SVG file
        $file_content = file_get_contents($file['tmp_name']);
        
        // Check if the file is actually an SVG
        if (strpos($file_content, '<svg') === false) {
            return $file;
        }

        // Basic sanitization
        $file_content = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $file_content);
        $file_content = preg_replace('#<onclick(.*?)>(.*?)</onclick>#is', '', $file_content);
        $file_content = preg_replace('#<onload(.*?)>(.*?)</onload>#is', '', $file_content);
        
        // Save the sanitized content
        file_put_contents($file['tmp_name'], $file_content);
    }
    return $file;
}
add_filter('wp_handle_upload_prefilter', 'sanitize_svg');

// Register ACF Options Page
// if (function_exists('acf_add_options_page')) {
//     acf_add_options_page(array(
//         'page_title'    => 'Theme Settings',
//         'menu_title'    => 'Theme Settings',
//         'menu_slug'     => 'theme-settings',
//         'capability'    => 'edit_posts',
//         'redirect'      => false
//     ));
// }