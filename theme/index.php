<?php get_header(); ?>

<div class="container">
    <?php
    // Check for flexible content fields
    $flexible_fields = ['hero_sections']; // Fixed: Use your actual field name
    $active_field = null;

    foreach ($flexible_fields as $field) {
        if (have_rows($field)) {
            $active_field = $field;
            break;
        }
    }

    if ($active_field && have_rows($active_field)) {
        while (have_rows($active_field)) {
            the_row();
            $layout = get_row_layout();    
            // Switch case based on layout type
            switch ($layout) {
                case 'hero_section_1': // This might be the actual layout name  
                    set_query_var('section_data', get_row());
                    get_template_part('template-parts/flexible-content/hero/hero-1');
                    break;

                case 'hero_section_2':
                    set_query_var('section_data', get_row());
                    get_template_part('template-parts/flexible-content/hero/hero-2');
                    break;

                case 'hero_section_3':
                    set_query_var('section_data', get_row());
                    get_template_part('template-parts/flexible-content/hero/hero-3');
                    break;

                case 'hero_section_4':
                    set_query_var('section_data', get_row());
                    get_template_part('template-parts/flexible-content/hero/hero-4');
                    break;

                case 'hero_section_5':
                    set_query_var('section_data', get_row());
                    get_template_part('template-parts/flexible-content/hero/hero-5');
                    break;
                    

                default:
                    echo '<p>Unknown layout: ' . $layout . '</p>';
                    break;
            }
        }
    } else {
        echo '<p>This page is empty</p>';
    }
    ?>
</div>

<?php get_footer(); ?>