<?php
// Get ACF fields
$text = get_sub_field('title');
$description = get_sub_field('description');
$button_text_primary = get_sub_field('primary_button_text');
$button_url_primary = get_sub_field('primary_button_link');
$button_text_secondary = get_sub_field('secondary_button_text');
$button_url_secondary = get_sub_field('secondary_button_link');
$image = get_sub_field('image');

// Handle ACF image field (can be array or URL)
$image_url = '';
$image_alt = '';

if ($image) {
    if (is_array($image)) {
        $image_url = $image['url'] ?? '';
        $image_alt = $image['alt'] ?? $text ?? 'Hero image';
    } else {
        $image_url = $image;
        $image_alt = $text ?? 'Hero image';
    }
}
?>

<section id="hero" style="min-height: 100dvh;" class="position-relative min-vh-100 d-flex align-items-center">
    <div class="container ">
        <div class="row align-items-center">

            <div class="col-12 col-lg-6 order-1 order-lg-1 text-center text-lg-start pb-4 pb-lg-0">

                <?php if ($text): ?>
                <h1 class="display-4 display-md-3 display-lg-2 fw-bold mb-3 mb-md-4">
                    <?php echo esc_html($text); ?>
                </h1>
                <?php endif; ?>

                <?php if ($description): ?>
                <p class="fs-5 fs-md-5 fs-lg-4 mb-4 mb-md-5 text-muted lh-base">
                    <?php echo esc_html($description); ?>
                </p>
                <?php endif; ?>

                <?php if ($button_text_primary || $button_text_secondary): ?>
                <div
                    class="d-flex flex-column flex-sm-row gap-3 align-items-center align-sm-items-start align-lg-items-start justify-content-center justify-content-lg-start ">

                    <?php if ($button_text_primary && $button_url_primary): ?>
                    <a href="<?php echo esc_url($button_url_primary); ?>" class="button-primary" role="button">
                        <?php echo esc_html($button_text_primary); ?>
                    </a>
                    <?php endif; ?>

                    <?php if ($button_text_secondary && $button_url_secondary): ?>
                    <a href="<?php echo esc_url($button_url_secondary); ?>" class="button-secondary" role="button">
                        <?php echo esc_html($button_text_secondary); ?>
                    </a>
                    <?php endif; ?>

                </div>
                <?php endif; ?>

            </div>

            <?php if ($image_url): ?>
            <div class="col-12 col-lg-6 order-1 order-lg-2">
                <div class="hero-image-wrapper">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>"
                        class="img-fluid hero-image rounded shadow-sm" loading="lazy"
                        style="max-height: 500px; width: 100%; object-fit: cover;">
                </div>
            </div>
            <?php endif; ?>

        </div>
    </div>
</section>