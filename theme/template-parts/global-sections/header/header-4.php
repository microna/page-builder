<header class="pt-3">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <div class="navbar-brand">
                <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php 
                    $redux_logo = page_builder_simple_option('logo');
                    $logo_url = !empty($redux_logo['url']) ? $redux_logo['url'] : get_template_directory_uri() . '/assets/images/logo.png';
                    ?>
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
                </a>
            </div>

            <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'menu',
                        'menu_id' => 'primary-menu',
                        'fallback_cb' => false,
                    )); ?>
            <div class="header__buttons">
                <a href="#" class="button-primary">Login</a>
            </div>

            <button class="burger">
                <span></span>
            </button>
        </div>
    </nav>
</header>