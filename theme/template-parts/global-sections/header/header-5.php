<header class="pt-5">
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'menu',
                        'menu_id' => 'primary-menu',
                        'fallback_cb' => false,
                    )); ?>

            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.png'); ?>"
                        alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
                </a>
            </div>

            <div class="header__buttons">
                <a href="#" class="button-primary">Login</a>
            </div>

            <button class="burger">
                <span></span>
            </button>
        </div>
    </nav>
</header>