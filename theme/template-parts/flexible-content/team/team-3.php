<?php
$section_title = get_sub_field('section_title') ?: 'Title is here';
$image = get_sub_field('image');

$member_1_image = get_sub_field('member_1_image') ?: $image;
$member_1_name = get_sub_field('member_1_name') ?: 'Title is here';
$member_1_description = get_sub_field('member_1_description') ?: 'Description - short description of the text';

$member_2_image = get_sub_field('member_2_image') ?: $image;
$member_2_name = get_sub_field('member_2_name') ?: 'Title is here';
$member_2_description = get_sub_field('member_2_description') ?: 'Description - short description of the text';

$member_3_image = get_sub_field('member_3_image') ?: $image;
$member_3_name = get_sub_field('member_3_name') ?: 'Title is here';
$member_3_description = get_sub_field('member_3_description') ?: 'Description - short description of the text';

// Helper function with proper check to prevent redefinition
if (!function_exists('get_team_large_img_url')) {
    function get_team_large_img_url($img) {
        if (is_array($img) && isset($img['url'])) {
            return $img['url'];
        }
        return $img;
    }
}
?>

<section class="team py-5">
    <div class="container">

        <h2 class="fs-1 fw-bold text-center mb-5">
            <?php echo esc_html($section_title); ?>
        </h2>

        <div class="d-flex flex-wrap justify-content-center" style="gap: 10px;">

            <div class="team-member-item text-start" style="flex: 1 1 calc(33.333% - 10px); min-width: 280px;">
                <?php 
                $img_url_1 = get_team_large_img_url($member_1_image);
                if (!empty($img_url_1)): 
                ?>
                <div class="mb-3">
                    <img src="<?php echo esc_url($img_url_1); ?>" alt="<?php echo esc_attr($member_1_name); ?>"
                        class="img-fluid w-100" style="height: 400px; object-fit: cover; display: block;" />
                </div>
                <?php endif; ?>

                <h5 class="fs-3 fw-bold mb-3">
                    <?php echo esc_html($member_1_name); ?>
                </h5>

                <p class="fs-5 mb-0">
                    <?php echo esc_html($member_1_description); ?>
                </p>
            </div>

            <div class="team-member-item text-start" style="flex: 1 1 calc(33.333% - 10px); min-width: 280px;">
                <?php 
                $img_url_2 = get_team_large_img_url($member_2_image);
                if (!empty($img_url_2)): 
                ?>
                <div class="mb-3">
                    <img src="<?php echo esc_url($img_url_2); ?>" alt="<?php echo esc_attr($member_2_name); ?>"
                        class="img-fluid w-100" style="height: 400px; object-fit: cover; display: block;" />
                </div>
                <?php endif; ?>

                <h5 class="fs-3 fw-bold mb-3">
                    <?php echo esc_html($member_2_name); ?>
                </h5>

                <p class="fs-5 mb-0">
                    <?php echo esc_html($member_2_description); ?>
                </p>
            </div>

            <div class="team-member-item text-start" style="flex: 1 1 calc(33.333% - 10px); min-width: 280px;">
                <?php 
                $img_url_3 = get_team_large_img_url($member_3_image);
                if (!empty($img_url_3)): 
                ?>
                <div class="mb-3">
                    <img src="<?php echo esc_url($img_url_3); ?>" alt="<?php echo esc_attr($member_3_name); ?>"
                        class="img-fluid w-100" style="height: 400px; object-fit: cover; display: block;" />
                </div>
                <?php endif; ?>

                <h5 class="fs-3 fw-bold mb-3">
                    <?php echo esc_html($member_3_name); ?>
                </h5>

                <p class="fs-5 mb-0">
                    <?php echo esc_html($member_3_description); ?>
                </p>
            </div>

        </div>

    </div>
</section>