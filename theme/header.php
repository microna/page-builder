<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    // Simple loop for 'header' custom post type
    $headers = new WP_Query(array(
    'post_type' => 'header',
    'posts_per_page' => -1, // Get all headers, or set to specific number
    'post_status' => 'publish'
    ));

    if ($headers->have_posts()) :
    while ($headers->have_posts()) : $headers->the_post();
    ?>
    <div class="header-item">
        <h2><?php the_title(); ?></h2>

        <?php
            // Display ACF Flexible Content - header_sections
            if (have_rows('header_sections')) :
                while (have_rows('header_sections')) : the_row();
                    $layout = get_row_layout();
                    ?>
        <?php
                    // Use template parts for each header layout
                    switch ($layout) {
                        case 'header_1':
                            set_query_var('section_data', get_row());
                            get_template_part('template-parts/global-sections/header/header-1');
                            break;
                        
                        case 'header_2':
                            set_query_var('section_data', get_row());
                            get_template_part('template-parts/global-sections/header/header-2');
                            break;
                        
                        case 'header_3':
                            set_query_var('section_data', get_row());
                            get_template_part('template-parts/global-sections/header/header-3');
                            break;
                        
                        case 'header_4':
                            set_query_var('section_data', get_row());
                            get_template_part('template-parts/global-sections/header/header-4');
                            break;
                        
                        case 'header_5':
                            set_query_var('section_data', get_row());
                            get_template_part('template-parts/global-sections/header/header-5');
                            break;
                        
                        case 'header_6':
                            set_query_var('section_data', get_row());
                            get_template_part('template-parts/global-sections/header/header-6');
                            break;
                        case 'header_7':
                            set_query_var('section_data', get_row());
                            get_template_part('template-parts/global-sections/header/header-7');
                            break;
                        
                        default:
                            // Fallback for any unhandled layouts
                            echo '<div class="header-section-unknown">Layout "' . esc_html($layout) . '" not found</div>';
                            break;
                    }
                    ?>
        <?php
                endwhile;
            endif;
            ?>

    </div>
    <?php
    endwhile;
    wp_reset_postdata();
else :
    echo '<p>No headers found.</p>';
endif;
?>