<header class="pt-5">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.png'); ?>"
                        alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
                </a>
            </div>

            <button class="burger-active" aria-label="Menu">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/burger-icon.svg'); ?>"
                    alt="Menu" />
            </button>
        </div>

    </nav>
</header>