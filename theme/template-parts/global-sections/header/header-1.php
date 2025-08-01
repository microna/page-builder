<header class="pt-5">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- <div class="navbar"> -->
            <div class="navbar-brand">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.png'); ?>"
                        alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
                </a>
            </div>
            <div class="navbar-nav">

                <!-- <ul class="nav" id="nav-menu"> -->
                <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'menu',
                        'menu_id' => 'primary-menu',
                        'fallback_cb' => false,
                    )); ?>
                <!-- </ul> -->

            </div>
            <a href="#" class="button-primary">Login</a>

            <button class="burger">
                <span></span>
            </button>
            <!-- </div> -->
        </div>
    </nav>
</header>