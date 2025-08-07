<header class="pt-5">
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

            <button class="burger-active" aria-label="Menu">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/burger-icon.svg'); ?>"
                    alt="Menu" />
            </button>
        </div>

    </nav>
</header>