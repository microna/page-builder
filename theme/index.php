<?php get_header(); ?>


<?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            
            // Define all section types and their corresponding layouts
            $sections_config = [
                'hero_sections' => [
                    'hero_section_1' => 'hero/hero-1',
                    'hero_section_2' => 'hero/hero-2',
                    'hero_section_3' => 'hero/hero-3',
                    'hero_section_4' => 'hero/hero-4',
                    'hero_section_5' => 'hero/hero-5'
                ],
                'content_block_sections' => [
                    'content_block_1' => 'content-block/content-block-1',
                    'content_block_2' => 'content-block/content-block-2',
                    'content_block_3' => 'content-block/content-block-3',
                    'content_block_4' => 'content-block/content-block-4'
                ],
                'cta_sections' => [
                    'cta_1' => 'cta/cta-1',
                    'cta_2' => 'cta/cta-2',
                    'cta_3' => 'cta/cta-3',
                    'cta_4' => 'cta/cta-4'
                ],
                'team_sections' => [
                    'team_1' => 'team/team-1',
                    'team_2' => 'team/team-2',
                    'team_3' => 'team/team-3',
                    'team_4' => 'team/team-4'
                ],
                'advatages_sections' => [
                    'advantages_1' => 'advantages/advantages-1',
                    'advantages_2' => 'advantages/advantages-2',
                    'advantages_3' => 'advantages/advantages-3'
                ],
                'faq_sections' => [
                    'faq_1' => 'faq/faq-1',
                    'faq_2' => 'faq/faq-2'
                ],
                'testimonials_sections' => [
                    'testimonials_1' => 'testimonials/testimonials-1',
                    'testimonials_2' => 'testimonials/testimonials-2'
                ]
            ];
            
            // Process each section type
            foreach ($sections_config as $field_name => $layouts) {
                echo "<!-- Debug: Checking field: {$field_name} -->";
                
                if (have_rows($field_name)) {
                    echo "<!-- Debug: Found rows for field: {$field_name} -->";
                    
                    while (have_rows($field_name)) {
                        the_row();
                        $layout = get_row_layout();
                        echo "<!-- Debug: Processing layout: {$layout} -->";
                        
                        // Check if layout exists in our configuration
                        if (isset($layouts[$layout])) {
                            set_query_var('section_data', get_row());
                            get_template_part('template-parts/flexible-content/' . $layouts[$layout]);
                            echo "<!-- Debug: Template loaded: {$layouts[$layout]} -->";
                        } else {
                            echo "<!-- Debug: Unknown layout: {$layout} for field: {$field_name} -->";
                            echo "<p>Unknown layout: {$layout}</p>";
                        }
                    }
                } else {
                    echo "<!-- Debug: No rows found for field: {$field_name} -->";
                }
            }
        }
    } else {
        echo '<p>No posts found</p>';
    }
    ?>


<?php get_footer(); ?>