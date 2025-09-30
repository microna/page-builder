<?php
// Get theme settings
$container_class = get_theme_container_class();
$is_sticky = is_header_sticky();
$header_classes = 'pt-5';
if ($is_sticky) {
    $header_classes .= ' sticky-header';
}
?>

<header class="<?php echo esc_attr($header_classes); ?>">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="<?php echo esc_attr($container_class); ?>">
            <div class="navbar-brand">
                <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php 
                    // Use our helper function for logo display
                    $logo_url = get_theme_logo(get_template_directory_uri() . '/assets/images/logo.png');
                    $site_title = get_theme_site_title();
                    ?>
                    <?php if ($logo_url): ?>
                        <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($site_title); ?>" />
                    <?php else: ?>
                        <span class="site-title"><?php echo esc_html($site_title); ?></span>
                    <?php endif; ?>
                </a>
            </div>
            
            <div class="navbar-nav">
                <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'menu',
                        'menu_id' => 'primary-menu',
                        'fallback_cb' => false,
                    )); ?>
            </div>
            
            <a href="#" class="button-primary">Login</a>

            <button class="burger">
                <span></span>
            </button>
        </div>
    </nav>
</header>