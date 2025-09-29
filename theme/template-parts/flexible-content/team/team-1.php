<?php
// Get ACF fields - simplified with no functions
$section_title = get_sub_field('section_title');
if (empty($section_title)) {
    $section_title = 'Title is here';
}

$default_image = get_sub_field('image');

// Member 1
$member_1_image = get_sub_field('member_1_image');
if (empty($member_1_image)) {
    $member_1_image = $default_image;
}
$member_1_name = get_sub_field('member_1_name');
if (empty($member_1_name)) {
    $member_1_name = 'Title is here';
}
$member_1_description = get_sub_field('member_1_description');
if (empty($member_1_description)) {
    $member_1_description = 'Description - short description of the text';
}

// Member 2
$member_2_image = get_sub_field('member_2_image');
if (empty($member_2_image)) {
    $member_2_image = $default_image;
}
$member_2_name = get_sub_field('member_2_name');
if (empty($member_2_name)) {
    $member_2_name = 'Title is here';
}
$member_2_description = get_sub_field('member_2_description');
if (empty($member_2_description)) {
    $member_2_description = 'Description - short description of the text';
}

// Member 3
$member_3_image = get_sub_field('member_3_image');
if (empty($member_3_image)) {
    $member_3_image = $default_image;
}
$member_3_name = get_sub_field('member_3_name');
if (empty($member_3_name)) {
    $member_3_name = 'Title is here';
}
$member_3_description = get_sub_field('member_3_description');
if (empty($member_3_description)) {
    $member_3_description = 'Description - short description of the text';
}

// Helper inline to get image URL
function get_img_url($img) {
    if (is_array($img) && isset($img['url'])) {
        return $img['url'];
    }
    return $img;
}
?>

<section class="team py-5">
    <div class="container">

        <!-- Section Title -->
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 display-md-4 fw-bold">
                    <?php echo esc_html($section_title); ?>
                </h2>
            </div>
        </div>

        <!-- Team Members Grid -->
        <div class="row gap-0 justify-content-center">

            <!-- Member 1 -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="team-member text-center p-3 p-lg-4">
                    <?php 
                    $img_url_1 = get_img_url($member_1_image);
                    if (!empty($img_url_1)): 
                    ?>
                    <div class="mb-3 mb-md-4">
                        <img src="<?php echo esc_url($img_url_1); ?>" alt="<?php echo esc_attr($member_1_name); ?>"
                            class="img-fluid shadow-sm"
                            style="width: 100%; height: 380px; object-fit: cover; border-radius: 0 !important;">
                    </div>
                    <?php endif; ?>

                    <h5 class="h4 fw-bold mb-3">
                        <?php echo esc_html($member_1_name); ?>
                    </h5>

                    <p class="fs-6 text-muted mb-0">
                        <?php echo esc_html($member_1_description); ?>
                    </p>
                </div>
            </div>

            <!-- Member 2 -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="team-member text-center p-3 p-lg-4">
                    <?php 
                    $img_url_2 = get_img_url($member_2_image);
                    if (!empty($img_url_2)): 
                    ?>
                    <div class="mb-3 mb-md-4">
                        <img src="<?php echo esc_url($img_url_2); ?>" alt="<?php echo esc_attr($member_2_name); ?>"
                            class="img-fluid shadow-sm"
                            style="width: 100%; height: 380px; object-fit: cover; border-radius: 0 !important;">
                    </div>
                    <?php endif; ?>

                    <h5 class="h4 fw-bold mb-3">
                        <?php echo esc_html($member_2_name); ?>
                    </h5>

                    <p class="fs-6 text-muted mb-0">
                        <?php echo esc_html($member_2_description); ?>
                    </p>
                </div>
            </div>

            <!-- Member 3 -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="team-member text-center p-3 p-lg-4">
                    <?php 
                    $img_url_3 = get_img_url($member_3_image);
                    if (!empty($img_url_3)): 
                    ?>
                    <div class="mb-3 mb-md-4">
                        <img src="<?php echo esc_url($img_url_3); ?>" alt="<?php echo esc_attr($member_3_name); ?>"
                            class="img-fluid shadow-sm"
                            style="width: 100%; height: 380px; object-fit: cover; border-radius: 0 !important;">
                    </div>
                    <?php endif; ?>

                    <h5 class="h4 fw-bold mb-3">
                        <?php echo esc_html($member_3_name); ?>
                    </h5>

                    <p class="fs-6 text-muted mb-0">
                        <?php echo esc_html($member_3_description); ?>
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>