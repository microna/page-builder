<?php

function enqueue_theme_styles() {
    wp_enqueue_style(
        'theme-style',
        get_template_directory_uri() . '/assets/css/main.css',
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