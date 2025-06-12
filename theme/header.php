<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="header">
        <div class="container">

            <!-- Logo -->
            <div class="logo">
                <a href="<?php echo home_url(); ?>">
                    <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                    <?php else : ?>
                    <h1><?php bloginfo('name'); ?></h1>
                    <?php endif; ?>
                </a>
            </div>



            <!-- Navigation -->
            <nav class="nav" id="nav-menu">
                <?php wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'nav-list'
            )); ?>
            </nav>

        </div>
    </header>