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

// Newsletter settings
$newsletter_title = get_sub_field('newsletter_title') ?: 'Title has its own meaning';
$newsletter_description = get_sub_field('newsletter_description') ?: 'Short description of the text';
$newsletter_button_text = get_sub_field('newsletter_button_text') ?: 'Button';

$site_name = get_bloginfo('name');
$current_year = date('Y');
?>

<footer class="footer-section py-5">
    <div class="container">
        <div class="row g-4 g-lg-5">

            <div class="col-12 col-lg-4">

                <a class="footer-logo d-inline-block mb-3" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if (!empty($logo_url)): ?>
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($site_name); ?>"
                        style="max-height: 50px; width: auto;" />
                    <?php else: ?>
                    <span class="h5 mb-0"><?php echo esc_html($site_name); ?></span>
                    <?php endif; ?>
                </a>

                <p class="fs-6 mb-3 text-muted">
                    &copy; <span id="current-year"><?php echo esc_html($current_year); ?></span> All rights reserved
                </p>

                <div class="footer-socials d-flex gap-3 align-items-center">

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

            <div class="col-12 col-lg-8">

                <div class="newsletter-section">

                    <h4 class="h3 h-lg-2 fw-bold mb-3">
                        <?php echo esc_html($newsletter_title); ?>
                    </h4>

                    <p class="fs-6 mb-4 text-muted">
                        <?php echo esc_html($newsletter_description); ?>
                    </p>

                    <form class="newsletter-form d-flex flex-column flex-sm-row gap-3" action="#" method="post">
                        <div class="flex-grow-1">
                            <input type="email" name="email" id="newsletter-email" class="form-control form-control-lg"
                                placeholder="Enter your email" required aria-label="Email address">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg px-4">
                            <?php echo esc_html($newsletter_button_text); ?>
                        </button>
                    </form>

                </div>

            </div>

        </div>
    </div>
</footer>