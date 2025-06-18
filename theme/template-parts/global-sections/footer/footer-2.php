<footer>
    <div class="container">
        <div class="footer">
            <div class="footer__content">
                <div class="footer__content-wrapper">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.svg'); ?>"
                        alt="Logo" />
                    <p>&copy; <span id="current-year"><?php echo date('Y'); ?></span> All rights reserved</p>
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
    </div>
</footer>