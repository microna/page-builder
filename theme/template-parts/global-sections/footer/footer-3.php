<footer>
    <div class="container">

        <div class="d-flex flex-column align-items-center col-6 align-items-center m-auto">

            <a class="footer-logo" href="<?php echo esc_url(home_url('/')); ?>">
                <?php 
                    $redux_logo = page_builder_simple_option('logo');
                    $logo_url = !empty($redux_logo['url']) ? $redux_logo['url'] : get_template_directory_uri() . '/assets/images/logo.png';
                    ?>
                <img class="mb-3" src="<?php echo esc_url($logo_url); ?>"
                    alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
            </a>
            <?php wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container' => false,
                        'menu_class' => 'menu',
                        'menu_id' => 'footer-menu',
                        'fallback_cb' => false,
                    )); ?>

            <p class="fs-5 pt-5 mb-3">&copy; <span id="current-year"><?php echo date('Y'); ?></span> All rights reserved
            </p>
        </div>

    </div>
</footer>