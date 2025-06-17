<header>
    <!-- Navbar -->
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="#"> <img src="./img/logo.svg" alt="" /> </a>
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
                <button class="burger">
                    <span></span>
                </button>
            </div>
        </div>
    </div>
</header>