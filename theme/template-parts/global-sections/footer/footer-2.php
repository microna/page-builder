<footer>
    <div class="container">

        <div class="d-flex justify-content-between align-items-end">
            <div class="col-4">

                <a class="footer-logo" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php 
                    $redux_logo = page_builder_simple_option('logo');
                    $logo_url = !empty($redux_logo['url']) ? $redux_logo['url'] : get_template_directory_uri() . '/assets/images/logo.png';
                    ?>
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
                </a>

                <p class="fs-5 pt-3">&copy; <span id="current-year"><?php echo date('Y'); ?></span> All rights reserved
                </p>
            </div>
            <nav class="nav" id="">
                <?php wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container' => false,
                        'menu_class' => 'menu',
                        'menu_id' => 'footer-menu',
                        'fallback_cb' => false,
                    )); ?>
            </nav>
        </div>

    </div>
</footer>