<?php
// Get logo from Redux with fallback
$redux_logo = function_exists('page_builder_simple_option') ? page_builder_simple_option('logo') : null;

$logo_url = '';
if (!empty($redux_logo) && is_array($redux_logo) && !empty($redux_logo['url'])) {
    $logo_url = $redux_logo['url'];
} elseif (!empty($redux_logo) && is_string($redux_logo)) {
    $logo_url = $redux_logo;
} else {
    $logo_url = get_template_directory_uri() . '/assets/images/logo.png';
}

$site_name = get_bloginfo('name');
$current_year = date('Y');
?>

<footer class="footer-section py-4 py-md-5">
    <div class="container">
        <div class="row align-items-end g-4">

            <!-- Logo & Copyright Column -->
            <div class="col-12 col-md-6 col-lg-4 text-center text-md-start">
                <a class="footer-logo d-inline-block mb-3" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if (!empty($logo_url)): ?>
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($site_name); ?>"
                        style="max-height: 50px; width: auto;" />
                    <?php else: ?>
                    <span class="h5 mb-0"><?php echo esc_html($site_name); ?></span>
                    <?php endif; ?>
                </a>

                <p class="fs-6 mb-0 text-muted">
                    &copy; <span id="current-year"><?php echo esc_html($current_year); ?></span> All rights reserved
                </p>
            </div>

            <!-- Footer Menu Column -->
            <div class="col-12 col-md-6 col-lg-8 text-center text-md-end">
                <nav class="footer-nav">
                    <?php 
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container' => false,
                        'menu_class' => 'footer-menu d-flex flex-wrap justify-content-center justify-content-md-end gap-3 gap-md-4 mb-0 list-unstyled',
                        'menu_id' => 'footer-menu',
                        'fallback_cb' => '__return_false',
                    )); 
                    ?>
                </nav>
            </div>

        </div>
    </div>
</footer>