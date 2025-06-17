<header>
    <!-- Navbar -->
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo"> <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.svg'); ?>"
                            alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
                    </a> </div>
                <nav class="nav" id="nav-menu">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'menu',
                        'menu_id' => 'primary-menu',
                        'fallback_cb' => false,
                    )); ?>
                </nav>


                <button class="burger">
                    <span></span>
                </button>
            </div>
        </div>
    </div>
</header>