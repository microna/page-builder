<?php
$text = get_sub_field('title');
$description = get_sub_field('description');

$block_image_1 = get_sub_field('block_image_1');
$block_title_1 = get_sub_field('block_title_1');
$block_description_1 = get_sub_field('block_description_1');

$block_image_2 = get_sub_field('block_image_2');
$block_title_2 = get_sub_field('block_title_2');
$block_description_2 = get_sub_field('block_description_2');

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
        return ['url' => $image, 'alt' => $fallback_alt];
    }
    
    return ['url' => '', 'alt' => $fallback_alt];
}

$image_1_data = get_image_data_safe($block_image_1, 'Content block 1');
$image_2_data = get_image_data_safe($block_image_2, 'Content block 2');
?>

<section class="content-block py-4 py-md-5">
    <div class="container">

        <?php if (!empty($text) || !empty($description)): ?>
        <div class="row">
            <div class="col-12 text-center mb-4 mb-md-5">
                <?php if (!empty($text)): ?>
                <h2 class="display-4 display-md-4 display-lg-3 fw-bold mb-3 mb-md-4">
                    <?php echo esc_html($text); ?>
                </h2>
                <?php endif; ?>

                <?php if (!empty($description)): ?>
                <div class="description-wrapper mx-auto" style="max-width: 700px;">
                    <p class="fs-5 ead text-muted lh-base mb-0">
                        <?php echo esc_html($description); ?>
                    </p>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if (!empty($image_1_data['url']) || !empty($block_title_1) || !empty($block_description_1)): ?>
        <div class="row align-items-center mb-4 mb-md-5 g-3 g-md-4 g-lg-5">

            <div class="col-12 col-lg-7 order-2 order-lg-1">
                <?php if (!empty($image_1_data['url'])): ?>
                <div class="content-image-wrapper position-relative overflow-hidden rounded">
                    <img src="<?php echo esc_url($image_1_data['url']); ?>"
                        alt="<?php echo esc_attr($image_1_data['alt']); ?>" class="img-fluid w-100 content-image"
                        style="max-height: 400px; object-fit: cover; object-position: center;" loading="lazy"
                        onerror="this.style.display='none'; this.parentNode.style.display='none';">
                </div>
                <?php endif; ?>
            </div>

            <div class="col-12 col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                <div class="content-text-wrapper p-2 p-md-3 p-lg-4">
                    <?php if (!empty($block_title_1)): ?>
                    <h3 class="h4 h-md-3 h-lg-2 fw-bold mb-3 mb-lg-4 lh-base">
                        <?php echo esc_html($block_title_1); ?>
                    </h3>
                    <?php endif; ?>

                    <?php if (!empty($block_description_1)): ?>
                    <p class="fs-6 fs-lg-5 text-muted lh-base mb-0">
                        <?php echo esc_html($block_description_1); ?>
                    </p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
        <?php endif; ?>

        <?php if (!empty($image_2_data['url']) || !empty($block_title_2) || !empty($block_description_2)): ?>
        <div class="row align-items-center g-3 g-md-4 g-lg-5">

            <div class="col-12 col-lg-5 order-1 text-center text-lg-start">
                <div class="content-text-wrapper p-2 p-md-3 p-lg-4">
                    <?php if (!empty($block_title_2)): ?>
                    <h3 class="h4 h-md-3 h-lg-2 fw-bold mb-3 mb-lg-4 lh-base">
                        <?php echo esc_html($block_title_2); ?>
                    </h3>
                    <?php endif; ?>

                    <?php if (!empty($block_description_2)): ?>
                    <p class="fs-6 fs-lg-5 text-muted lh-base mb-0">
                        <?php echo esc_html($block_description_2); ?>
                    </p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-12 col-lg-7 order-2">
                <?php if (!empty($image_2_data['url'])): ?>
                <div class="content-image-wrapper position-relative overflow-hidden rounded">
                    <img src="<?php echo esc_url($image_2_data['url']); ?>"
                        alt="<?php echo esc_attr($image_2_data['alt']); ?>" class="img-fluid w-100 content-image"
                        style="max-height: 400px; object-fit: cover; object-position: center;" loading="lazy"
                        onerror="this.style.display='none'; this.parentNode.style.display='none';">
                </div>
                <?php endif; ?>
            </div>

        </div>
        <?php endif; ?>

    </div>
</section>