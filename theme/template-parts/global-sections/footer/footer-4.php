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

// Get social media URLs from Redux
$twitter_url = function_exists('page_builder_simple_option') ? page_builder_simple_option('twitter_url') : '#';
$instagram_url = function_exists('page_builder_simple_option') ? page_builder_simple_option('instagram_url') : '#';
$facebook_url = function_exists('page_builder_simple_option') ? page_builder_simple_option('facebook_url') : '#';

$site_name = get_bloginfo('name');
$current_year = date('Y');
?>

<footer class="footer-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 text-center">

                <!-- Logo -->
                <div class="footer-logo-wrapper mb-4">
                    <a class="footer-logo d-inline-block" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php if (!empty($logo_url)): ?>
                        <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($site_name); ?>"
                            style="max-height: 60px; width: auto;" />
                        <?php else: ?>
                        <span class="h4 mb-0"><?php echo esc_html($site_name); ?></span>
                        <?php endif; ?>
                    </a>
                </div>

                <!-- Social Media Icons -->
                <div class="footer-socials mb-4">
                    <div class="d-flex justify-content-center align-items-center gap-4">

                        <?php if (!empty($twitter_url)): ?>
                        <a href="<?php echo esc_url($twitter_url); ?>" class="footer-social-link" target="_blank"
                            rel="noopener noreferrer" aria-label="Twitter">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/twitter.svg'); ?>"
                                alt="Twitter" style="width: 24px; height: 24px;" />
                        </a>
                        <?php endif; ?>

                        <?php if (!empty($instagram_url)): ?>
                        <a href="<?php echo esc_url($instagram_url); ?>" class="footer-social-link" target="_blank"
                            rel="noopener noreferrer" aria-label="Instagram">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/inst.svg'); ?>"
                                alt="Instagram" style="width: 24px; height: 24px;" />
                        </a>
                        <?php endif; ?>

                        <?php if (!empty($facebook_url)): ?>
                        <a href="<?php echo esc_url($facebook_url); ?>" class="footer-social-link" target="_blank"
                            rel="noopener noreferrer" aria-label="Facebook">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/facebook.svg'); ?>"
                                alt="Facebook" style="width: 24px; height: 24px;" />
                        </a>
                        <?php endif; ?>

                    </div>
                </div>

                <!-- Copyright -->
                <div class="footer-copyright">
                    <p class="fs-6 mb-0 text-muted">
                        &copy; <span id="current-year"><?php echo esc_html($current_year); ?></span>
                        <?php echo esc_html($site_name); ?>. All rights reserved.
                    </p>
                </div>

            </div>
        </div>
    </div>
</footer>