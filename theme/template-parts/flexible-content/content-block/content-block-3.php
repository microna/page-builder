<?php
// Get ACF fields with proper validation
$text = get_sub_field('title');
$description = get_sub_field('description');

// Block 1 fields
$block_image_1 = get_sub_field('block_image_1');
$block_title_1 = get_sub_field('block_title_1');
$block_description_1 = get_sub_field('block_description_1');

// Block 2 fields
$block_image_2 = get_sub_field('block_image_2');
$block_title_2 = get_sub_field('block_title_2');
$block_description_2 = get_sub_field('block_description_2');

// Enhanced function to handle image data with comprehensive error handling
function get_image_data_robust($image, $fallback_alt = 'Content block image') {
    // Handle null, false, or empty values
    if (empty($image) || $image === false || is_null($image)) {
        return ['url' => '', 'alt' => $fallback_alt, 'valid' => false];
    }
    
    // Handle ACF image array format
    if (is_array($image)) {
        $url = '';
        $alt = $fallback_alt;
        
        // Check for URL in different possible array keys
        if (isset($image['url']) && !empty($image['url']) && filter_var($image['url'], FILTER_VALIDATE_URL)) {
            $url = $image['url'];
        } elseif (isset($image['sizes']['medium']) && !empty($image['sizes']['medium'])) {
            $url = $image['sizes']['medium'];
        } elseif (isset($image['sizes']['large']) && !empty($image['sizes']['large'])) {
            $url = $image['sizes']['large'];
        }
        
        // Get alt text
        if (isset($image['alt']) && !empty(trim($image['alt']))) {
            $alt = trim($image['alt']);
        } elseif (isset($image['title']) && !empty(trim($image['title']))) {
            $alt = trim($image['title']);
        }
        
        return ['url' => $url, 'alt' => $alt, 'valid' => !empty($url)];
    }
    
    // Handle direct URL string
    if (is_string($image) && !empty(trim($image))) {
        $clean_url = trim($image);
        // Basic URL validation
        if (filter_var($clean_url, FILTER_VALIDATE_URL) || strpos($clean_url, '/') !== false) {
            return ['url' => $clean_url, 'alt' => $fallback_alt, 'valid' => true];
        }
    }
    
    return ['url' => '', 'alt' => $fallback_alt, 'valid' => false];
}

// Prepare image data with validation
$image_1_data = get_image_data_robust($block_image_1, 'Content block 1 image');
$image_2_data = get_image_data_robust($block_image_2, 'Content block 2 image');

// Check if we have any content to display
$has_content = (!empty($text) || !empty($description) || 
               $image_1_data['valid'] || !empty($block_title_1) || !empty($block_description_1) ||
               $image_2_data['valid'] || !empty($block_title_2) || !empty($block_description_2));

// Only render if we have content
if (!$has_content) return;
?>

<section class="content-block py-4 py-md-5" id="content-block-<?php echo uniqid(); ?>">
    <div class="container">

        <!-- Header Section -->
        <?php if (!empty($text) || !empty($description)): ?>
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10 text-center mb-4 mb-md-5">
                <?php if (!empty($text) && is_string($text)): ?>
                <h2 class="display-5 display-md-4 display-lg-3 fw-bold mb-3 mb-md-4 text-break">
                    <?php echo wp_kses_post($text); ?>
                </h2>
                <?php endif; ?>

                <?php if (!empty($description) && is_string($description)): ?>
                <div class="description-wrapper mx-auto" style="max-width: 700px;">
                    <p class="fs-6 fs-md-5 lead text-muted lh-base mb-0 text-break">
                        <?php echo wp_kses_post($description); ?>
                    </p>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Content Block 1 -->
        <?php if ($image_1_data['valid'] || !empty($block_title_1) || !empty($block_description_1)): ?>
        <div class="row align-items-center mb-4 mb-md-5 g-3 g-md-4 content-row">

            <!-- Image Column -->
            <div class="col-12 col-md-6 order-2 order-md-1">
                <?php if ($image_1_data['valid']): ?>
                <div class="content-image-wrapper position-relative overflow-hidden rounded ">
                    <img src="<?php echo esc_url($image_1_data['url']); ?>"
                        alt="<?php echo esc_attr($image_1_data['alt']); ?>" class="img-fluid w-100 content-image"
                        style="max-height: 400px; object-fit: cover; object-position: center;" loading="lazy"
                        decoding="async" onload="this.style.opacity='1';"
                        onerror="this.closest('.content-image-wrapper').classList.add('image-error');">
                    <div class="image-loading-placeholder"></div>
                </div>
                <?php else: ?>
                <div class="content-image-placeholder d-flex align-items-center justify-content-center rounded bg-light text-muted"
                    style="max-height: 400px;">
                    <span class="fs-6">No image available</span>
                </div>
                <?php endif; ?>
            </div>

            <!-- Text Column -->
            <div class="col-12 col-md-6 order-1 order-md-2 text-center text-md-start">
                <div class="content-text-wrapper p-3 p-md-4">
                    <?php if (!empty($block_title_1) && is_string($block_title_1)): ?>
                    <h3 class="h4 h-md-3 h-lg-2 fw-bold mb-3 mb-md-4 lh-base text-break">
                        <?php echo wp_kses_post($block_title_1); ?>
                    </h3>
                    <?php endif; ?>

                    <?php if (!empty($block_description_1) && is_string($block_description_1)): ?>
                    <div class="content-description">
                        <p class="fs-6 fs-md-5 text-muted lh-base mb-0 text-break">
                            <?php echo wp_kses_post($block_description_1); ?>
                        </p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
        <?php endif; ?>

        <!-- Content Block 2 -->
        <?php if ($image_2_data['valid'] || !empty($block_title_2) || !empty($block_description_2)): ?>
        <div class="row align-items-center g-3 g-md-4 content-row">

            <!-- Image Column -->
            <div class="col-12 col-md-6 order-2 order-md-1">
                <?php if ($image_2_data['valid']): ?>
                <div class="content-image-wrapper position-relative overflow-hidden rounded">
                    <img src="<?php echo esc_url($image_2_data['url']); ?>"
                        alt="<?php echo esc_attr($image_2_data['alt']); ?>" class="img-fluid w-100 content-image"
                        style="max-height: 400px; object-fit: cover; object-position: center;" loading="lazy"
                        decoding="async" onload="this.style.opacity='1';"
                        onerror="this.closest('.content-image-wrapper').classList.add('image-error');">
                    <div class="image-loading-placeholder"></div>
                </div>
                <?php else: ?>
                <div class="content-image-placeholder d-flex align-items-center justify-content-center rounded bg-light text-muted"
                    style="max-height: 400px;">
                    <span class="fs-6">No image available</span>
                </div>
                <?php endif; ?>
            </div>

            <!-- Text Column -->
            <div class="col-12 col-md-6 order-1 order-md-2 text-center text-md-start">
                <div class="content-text-wrapper p-3 p-md-4">
                    <?php if (!empty($block_title_2) && is_string($block_title_2)): ?>
                    <h3 class="h4 h-md-3 h-lg-2 fw-bold mb-3 mb-md-4 lh-base text-break">
                        <?php echo wp_kses_post($block_title_2); ?>
                    </h3>
                    <?php endif; ?>

                    <?php if (!empty($block_description_2) && is_string($block_description_2)): ?>
                    <div class="content-description">
                        <p class="fs-6 fs-md-5 text-muted lh-base mb-0 text-break">
                            <?php echo wp_kses_post($block_description_2); ?>
                        </p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
        <?php endif; ?>

    </div>
</section>