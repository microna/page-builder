<?php

include 'assets/inc/redux-config.php';

function enqueue_theme_styles() {
        wp_enqueue_style(
            'bootstrap-css',
            get_template_directory_uri() . '/assets/css/bootstrap.min.css',
            array(),
            '1.0.0'
        );
        wp_enqueue_style(
            'swiper-bundle-css',
            get_template_directory_uri() . '/assets/css/swiper-bundle.min.css',
            array('bootstrap-css'),
            '1.0.0'
        );
        wp_enqueue_style(
            'theme-style',
            get_template_directory_uri() . '/assets/css/main.css',
            array('bootstrap-css', 'swiper-bundle-css'),
            '1.0.0'
        );
}
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');


function enqueue_theme_scripts() {
    wp_enqueue_script(
        'theme-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        '1.0.0',       
        true            
    );
    wp_enqueue_script(
        'swiper-bundle-js',
        get_template_directory_uri() . '/assets/js/swiper-bundle.min.js',
        '1.0.0',       
        true           
    );
    
}
add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');


add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);

function remove_gutenberg_css() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style'); 
}
add_action('wp_enqueue_scripts', 'remove_gutenberg_css', 100);

function remove_gutenberg_admin_bar() {
    remove_action('admin_bar_menu', 'wp_admin_bar_edit_post_link', 10);
}
add_action('admin_bar_menu', 'remove_gutenberg_admin_bar', 5);


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



function register_theme_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'your-theme-text-domain'),
        'footer' => __('Footer Menu', 'your-theme-text-domain')
    ));
}
add_action('init', 'register_theme_menus');

function add_svg_support($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'add_svg_support');

function fix_svg_thumb_display() {
    echo '<style>
        td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail { 
            width: 100% !important; 
            height: auto !important; 
        }
    </style>';
}
add_action('admin_head', 'fix_svg_thumb_display');

function sanitize_svg($file) {
    if ($file['type'] === 'image/svg+xml') {
        if (!function_exists('simplexml_load_file')) {
            return $file;
        }
        $file_content = file_get_contents($file['tmp_name']);
        if (strpos($file_content, '<svg') === false) {
            return $file;
        }

        $file_content = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $file_content);
        $file_content = preg_replace('#<onclick(.*?)>(.*?)</onclick>#is', '', $file_content);
        $file_content = preg_replace('#<onload(.*?)>(.*?)</onload>#is', '', $file_content);
        
        file_put_contents($file['tmp_name'], $file_content);
    }
    return $file;
}
add_filter('wp_handle_upload_prefilter', 'sanitize_svg');

function add_class_to_nav_menu_links($atts, $item, $args) {
    $atts['class'] = 'fs-5';
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_class_to_nav_menu_links', 10, 3);

function generate_redux_colors_css() {
    $primary_color = page_builder_simple_option('primary_color', '#007cba');
    $secondary_color = page_builder_simple_option('secondary_color', '#28a745');
    
    $css = "
    <style type='text/css'>
        :root {
            --primary-color: {$primary_color};
            --secondary-color: {$secondary_color};
        }
        .button-primary {
            background-color: {$primary_color} !important;
            border-color: {$primary_color} !important;
            color: #fff !important;
        }
        .button-secondary{
         color: {$secondary_color} !important;
         border-color: {$secondary_color} !important;
        }
        .button-primary:hover,
        .button-secondary:hover{
        opacity: 0.7;    
        }
    </style>
    ";
    
    echo $css;
}
add_action('wp_head', 'generate_redux_colors_css');



/**
 * Enqueue Google Fonts from Redux Typography Settings
 */
function page_builder_enqueue_redux_google_fonts() {
    if (!class_exists('Redux')) {
        return;
    }
    
    $body_font = page_builder_simple_option('body_typography');
    $heading_font = page_builder_simple_option('heading_typography');
    $custom_fonts = page_builder_simple_option('custom_google_fonts');
    
    $fonts_to_load = array();
    
    if (!empty($body_font['font-family']) && !empty($body_font['google'])) {
        $font_family = str_replace(' ', '+', $body_font['font-family']);
        $font_weight = !empty($body_font['font-weight']) ? ':wght@' . $body_font['font-weight'] : '';
        $fonts_to_load[] = $font_family . $font_weight;
    }
    
    if (!empty($heading_font['font-family']) && !empty($heading_font['google'])) {
        $font_family = str_replace(' ', '+', $heading_font['font-family']);
        $font_weight = !empty($heading_font['font-weight']) ? ':wght@' . $heading_font['font-weight'] : '';
        
        $heading_font_key = $font_family . $font_weight;
        if (!in_array($heading_font_key, $fonts_to_load)) {
            $fonts_to_load[] = $heading_font_key;
        }
    }
    
    if (!empty($fonts_to_load)) {
        $fonts_url = 'https://fonts.googleapis.com/css2?family=' . implode('&family=', $fonts_to_load) . '&display=swap';
        wp_enqueue_style('page-builder-google-fonts', $fonts_url, array(), null);
    }
    
    if (!empty($custom_fonts) && is_array($custom_fonts)) {
        foreach ($custom_fonts as $index => $font_url) {
            if (!empty($font_url)) {
                wp_enqueue_style('page-builder-custom-font-' . $index, esc_url($font_url), array(), null);
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'page_builder_enqueue_redux_google_fonts');

/**
 * Output Custom Typography CSS from Redux
 */
function page_builder_output_typography_css() {
    if (!class_exists('Redux')) {
        return;
    }
    
    $body_font = page_builder_simple_option('body_typography');
    $heading_font = page_builder_simple_option('heading_typography');
    
    $css = '<style type="text/css">';
    
    if (!empty($body_font)) {
        $css .= 'body {';
        if (!empty($body_font['font-family'])) {
            $css .= 'font-family: "' . esc_attr($body_font['font-family']) . '", sans-serif;';
        }
        if (!empty($body_font['font-size'])) {
            $css .= 'font-size: ' . esc_attr($body_font['font-size']) . ';';
        }
        if (!empty($body_font['line-height'])) {
            $css .= 'line-height: ' . esc_attr($body_font['line-height']) . ';';
        }
        if (!empty($body_font['color'])) {
            $css .= 'color: ' . esc_attr($body_font['color']) . ';';
        }
        if (!empty($body_font['font-weight'])) {
            $css .= 'font-weight: ' . esc_attr($body_font['font-weight']) . ';';
        }
        $css .= '}';
    }
    
    if (!empty($heading_font)) {
        $css .= 'h1, h2, h3, h4, h5, h6 {';
        if (!empty($heading_font['font-family'])) {
            $css .= 'font-family: "' . esc_attr($heading_font['font-family']) . '", sans-serif;';
        }
        if (!empty($heading_font['color'])) {
            $css .= 'color: ' . esc_attr($heading_font['color']) . ';';
        }
        if (!empty($heading_font['font-weight'])) {
            $css .= 'font-weight: ' . esc_attr($heading_font['font-weight']) . ';';
        }
        $css .= '}';
    }
    
    $css .= '</style>';
    
    echo $css;
}
add_action('wp_head', 'page_builder_output_typography_css');

/**
 * Output Dark Theme CSS Based on Redux Setting
 */
function page_builder_dark_theme_css() {
    // Check if dark theme is enabled
    $enable_dark = page_builder_simple_option('enable_dark_theme', false);
    
    if (!$enable_dark) {
        return; // Exit if dark theme is not enabled
    }
    
    // Get dark theme colors
    $dark_bg = page_builder_simple_option('dark_bg_color', '#1a1a1a');
    $dark_text = page_builder_simple_option('dark_text_color', '#e0e0e0');
    $dark_card_bg = page_builder_simple_option('dark_card_bg_color', '#2a2a2a');
    $dark_border = page_builder_simple_option('dark_border_color', '#3a3a3a');
    
    ?>
<style id="dark-theme-css">
/* Dark Theme - Applied Globally */
body {
    background-color: <?php echo esc_attr($dark_bg);
    ?> !important;
    color: <?php echo esc_attr($dark_text);
    ?> !important;
}

/* Cards and Sections */
.bg-white,
.card,
.testimonial-card,
.team-member,
.team-card,
.advantage-item,
.advantage-card,
.content-block-item,
.content-card,
.trigger__text,
.swiper-slide {
    background-color: <?php echo esc_attr($dark_card_bg);
    ?> !important;
    color: <?php echo esc_attr($dark_text);
    ?> !important;
}

/* Headers and Footers */
header,
footer,
.footer-section,
.header-main,
nav,
.navbar {
    background-color: <?php echo esc_attr($dark_card_bg);
    ?> !important;
    border-color: <?php echo esc_attr($dark_border);
    ?> !important;
}

/* Text Colors */
.text-muted {
    color: #b0b0b0 !important;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    color: <?php echo esc_attr($dark_text);
    ?> !important;
}

p,
span,
div {
    color: inherit;
}

/* Form Elements */
.form-control,
input[type="text"],
input[type="email"],
textarea,
select {
    background-color: <?php echo esc_attr($dark_card_bg);
    ?> !important;
    border-color: <?php echo esc_attr($dark_border);
    ?> !important;
    color: <?php echo esc_attr($dark_text);
    ?> !important;
}

.form-control:focus,
input:focus,
textarea:focus {
    background-color: <?php echo esc_attr($dark_bg);
    ?> !important;
    border-color: #0d6efd !important;
    color: <?php echo esc_attr($dark_text);
    ?> !important;
}

.form-control::placeholder {
    color: #888 !important;
}

/* Borders */
.border,
.border-top,
.border-bottom,
.shadow,
.shadow-sm,
.shadow-lg {
    border-color: <?php echo esc_attr($dark_border);
    ?> !important;
}

/* Background Sections */
.cta,
.testimonials,
.team,
.advantages,
section {
    background-color: <?php echo esc_attr($dark_bg);
    ?> !important;
}

/* Images - slight opacity reduction */
img {
    opacity: 0.9;
}

img:hover {
    opacity: 1;
}

/* Links */
a {
    color: #6ea8fe;
}

a:hover {
    color: #9ec5fe;
}

/* Buttons - keep original colors but adjust for dark theme */
.btn-primary,
.button-primary {
    /* Keep button colors but ensure visibility */
}

.btn-outline-secondary,
.button-secondary {
    border-color: <?php echo esc_attr($dark_text);
    ?> !important;
    color: <?php echo esc_attr($dark_text);
    ?> !important;
}

.btn-outline-secondary:hover,
.button-secondary:hover {
    background-color: <?php echo esc_attr($dark_text);
    ?> !important;
    color: <?php echo esc_attr($dark_bg);
    ?> !important;
}

/* Social Icons */
.footer-social-link {
    background: <?php echo esc_attr($dark_card_bg);
    ?> !important;
}

.footer-social-link:hover {
    background: <?php echo esc_attr($dark_border);
    ?> !important;
}

/* Menu Items */
.menu a,
.navbar-nav a {
    color: <?php echo esc_attr($dark_text);
    ?> !important;
}

.menu a:hover,
.navbar-nav a:hover {
    color: #6ea8fe !important;
}
</style>
<?php
}
add_action('wp_head', 'page_builder_dark_theme_css', 100);



/**
 * Enqueue GSAP Libraries
 */
function page_builder_enqueue_gsap() {
    $enable_smooth_scroll = page_builder_simple_option('enable_smooth_scroll', true);
    $enable_fade_in = page_builder_simple_option('enable_fade_in', true);
    
    // Only load if at least one animation is enabled
    if ($enable_smooth_scroll || $enable_fade_in) {
        // GSAP Core
        wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), '3.12.5', true);
        
        // ScrollTrigger Plugin
        wp_enqueue_script('gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', array('gsap'), '3.12.5', true);
        
        // ScrollSmoother Plugin (for smooth scroll)
        if ($enable_smooth_scroll) {
            wp_enqueue_script('gsap-scrollsmoother', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollSmoother.min.js', array('gsap', 'gsap-scrolltrigger'), '3.12.5', true);
        }
        
        // Custom animations script
        wp_enqueue_script('page-builder-animations', get_template_directory_uri() . '/assets/js/animations.js', array('gsap', 'gsap-scrolltrigger'), '1.0.0', true);
        
        // Pass settings to JavaScript
        wp_localize_script('page-builder-animations', 'animationSettings', array(
            'smoothScroll' => $enable_smooth_scroll,
            'smoothScrollSpeed' => page_builder_simple_option('smooth_scroll_speed', 1),
            'fadeIn' => $enable_fade_in,
            'fadeInDuration' => page_builder_simple_option('fade_in_duration', 1),
            'fadeInDistance' => page_builder_simple_option('fade_in_distance', 50),
        ));
    }
}
add_action('wp_enqueue_scripts', 'page_builder_enqueue_gsap');


function page_builder_animation_css() {
    if (page_builder_simple_option('enable_smooth_scroll', true)) {
        ?>
<style>
#smooth-wrapper {
    overflow: hidden;
}

#smooth-content {
    overflow: visible;
    width: 100%;
}
</style>
<?php
    }
}
add_action('wp_head', 'page_builder_animation_css');