<?php
// Get ACF fields with proper error handling
$text = get_sub_field('title');
$description = get_sub_field('description');

// Individual block fields (you can modify these field names as needed)
$block_1_title = get_sub_field('block_1_title') ?: 'Title - main idea of the text';
$block_1_description = get_sub_field('block_1_description') ?: 'Description - short description of the text';
$block_1_image = get_sub_field('block_1_image') ?: './img/placeholder-image.jpg';

$block_2_title = get_sub_field('block_2_title') ?: 'Title - main idea of the text';
$block_2_description = get_sub_field('block_2_description') ?: 'Description - short description of the text';
$block_2_image = get_sub_field('block_2_image') ?: './img/placeholder-image.jpg';

// Function to handle image data
function get_image_data_safe($image, $fallback_alt = 'Content block') {
    if (empty($image)) {
        return ['url' => '', 'alt' => $fallback_alt];
    }
    
    if (is_array($image)) {
        $url = isset($image['url']) && !empty($image['url']) ? $image['url'] : '';
        $alt = isset($image['alt']) && !empty($image['alt']) ? $image['alt'] : $fallback_alt;
        return ['url' => $url, 'alt' => $alt];
    }
    
    if (is_string($image)) {
        return ['url' => trim($image), 'alt' => $fallback_alt];
    }
    
    return ['url' => '', 'alt' => $fallback_alt];
}

// Prepare image data
$image_1_data = get_image_data_safe($block_1_image, 'Content block 1');
$image_2_data = get_image_data_safe($block_2_image, 'Content block 2');
?>

<section class="content-block py-4 py-md-5">
    <div class="container">

        <!-- Header Section -->
        <?php if (!empty($text) || !empty($description)): ?>
        <div class="row">
            <div class="col-12 text-center mb-4 mb-md-5">
                <?php if (!empty($text)): ?>
                <h2 class="display-5 display-md-4 display-lg-3 fw-bold mb-3 mb-md-4">
                    <?php echo esc_html($text); ?>
                </h2>
                <?php endif; ?>

                <?php if (!empty($description)): ?>
                <p class="fs-5 lead text-muted lh-base mx-auto" style="max-width: 700px;">
                    <?php echo esc_html($description); ?>
                </p>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Content Block 1 - Text Left, Image Right -->
        <?php if (!empty($image_1_data['url']) || !empty($block_1_title) || !empty($block_1_description)): ?>
        <div class="row align-items-center mb-4 mb-md-5 g-3 g-md-4">

            <!-- Text Column -->
            <div class="col-12 col-lg-5 order-1 text-center text-lg-start">
                <div class="content-text-wrapper p-3 p-lg-4">
                    <?php if (!empty($block_1_title)): ?>
                    <h3 class="h3 h-lg-2 fw-bold mb-3 mb-lg-4 lh-base">
                        <?php echo esc_html($block_1_title); ?>
                    </h3>
                    <?php endif; ?>

                    <?php if (!empty($block_1_description)): ?>
                    <p class="fs-6 fs-lg-5 text-muted lh-base mb-0">
                        <?php echo esc_html($block_1_description); ?>
                    </p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Image Column -->
            <div class="col-12 col-lg-7 order-2">
                <?php if (!empty($image_1_data['url'])): ?>
                <div class="content-image-wrapper overflow-hidden rounded">
                    <img src="<?php echo esc_url($image_1_data['url']); ?>"
                        alt="<?php echo esc_attr($image_1_data['alt']); ?>" class="img-fluid w-100 content-image"
                        style="height: 350px; object-fit: cover; object-position: center;" loading="lazy"
                        onerror="this.style.display='none'; this.parentNode.style.display='none';">
                </div>
                <?php endif; ?>
            </div>

        </div>
        <?php endif; ?>

        <!-- Content Block 2 - Text Left, Image Right -->
        <?php if (!empty($image_2_data['url']) || !empty($block_2_title) || !empty($block_2_description)): ?>
        <div class="row align-items-center g-3 g-md-4">

            <!-- Text Column -->
            <div class="col-12 col-lg-5 order-1 text-center text-lg-start">
                <div class="content-text-wrapper p-3 p-lg-4">
                    <?php if (!empty($block_2_title)): ?>
                    <h3 class="h3 h-lg-2 fw-bold mb-3 mb-lg-4 lh-base">
                        <?php echo esc_html($block_2_title); ?>
                    </h3>
                    <?php endif; ?>

                    <?php if (!empty($block_2_description)): ?>
                    <p class="fs-6 fs-lg-5 text-muted lh-base mb-0">
                        <?php echo esc_html($block_2_description); ?>
                    </p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Image Column -->
            <div class="col-12 col-lg-7 order-2">
                <?php if (!empty($image_2_data['url'])): ?>
                <div class="content-image-wrapper overflow-hidden rounded ">
                    <img src="<?php echo esc_url($image_2_data['url']); ?>"
                        alt="<?php echo esc_attr($image_2_data['alt']); ?>" class="img-fluid w-100 content-image"
                        style="height: 350px; object-fit: cover; object-position: center;" loading="lazy"
                        onerror="this.style.display='none'; this.parentNode.style.display='none';">
                </div>
                <?php endif; ?>
            </div>

        </div>
        <?php endif; ?>

    </div>
</section>