<header class="header">
    <div class="container">
        <div class="navbar">
            <!-- Logo -->
            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.svg'); ?>"
                        alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
                </a>
            </div>

            <!-- Navigation -->
            <nav class="nav" id="nav-menu">
                <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'menu',
                        'menu_id' => 'primary-menu',
                        'fallback_cb' => false,
                    )); ?>
            </nav>

            <!-- Header Buttons -->
            <div class="header__buttons">
                <a href="#" class="button-primary">Login</a>
            </div>
            <!-- Mobile Menu Button -->
            <button class="burger" aria-label="Toggle Menu">
                <span></span>
            </button>
        </div>
    </div>
</header>