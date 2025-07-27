<footer class="site-footer">
    <div class="container">

        <?php
    // Simple loop for 'footer' custom post type
    $footers = new WP_Query(array(
    'post_type' => 'footer',
    'posts_per_page' => -1, // Get all footers, or set to specific number
    'post_status' => 'publish'
    ));

    if ($footers->have_posts()) :
    while ($footers->have_posts()) : $footers->the_post();
    ?>
        <div class="footer-item">


            <?php
            // Display ACF Flexible Content - footer_sections
            if (have_rows('footer_sections')) :
                while (have_rows('footer_sections')) : the_row();
                    $layout = get_row_layout();
                    ?>
            <?php
                    // Use template parts for each footer layout
                    switch ($layout) {
                        case 'footer_1':
                            set_query_var('section_data', get_row());
                            get_template_part('template-parts/global-sections/footer/footer-1');
                            break;
                        
                        case 'footer_2':
                            set_query_var('section_data', get_row());
                            get_template_part('template-parts/global-sections/footer/footer-2');
                            break;
                        
                        case 'footer_3':
                            set_query_var('section_data', get_row());
                            get_template_part('template-parts/global-sections/footer/footer-3');
                            break;
                        
                        case 'footer_4':
                            set_query_var('section_data', get_row());
                            get_template_part('template-parts/global-sections/footer/footer-4');
                            break;
                        
                        case 'footer_5':
                            set_query_var('section_data', get_row());
                            get_template_part('template-parts/global-sections/footer/footer-5');
                            break;
                        
                       
                        
                        default:
                            // Fallback for any unhandled layouts
                            echo '<div class="footer-section-unknown">Layout "' . esc_html($layout) . '" not found</div>';
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
    echo '<p>No footers found.</p>';
endif;
?>

    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>