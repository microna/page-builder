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

<section id="hero" class="position-relative min-vh-100 d-flex align-items-center" style="min-height: 100dvh;">
    <div class=" container">

        <div class="row justify-content-center mb-5">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 text-center pb-4 pb-lg-0">

                <?php if ($text): ?>
                <h1 class="display-4 display-md-3 display-lg-2 fw-bold mb-3 mb-md-4">
                    <?php echo esc_html($text); ?>
                </h1>
                <?php endif; ?>

                <?php if ($description): ?>
                <p class="fs-5 fs-lg-4 mb-4 mb-md-5 text-muted lh-base">
                    <?php echo esc_html($description); ?>
                </p>
                <?php endif; ?>

                <?php if ($button_text_primary || $button_text_secondary): ?>
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center align-items-center">

                    <?php if ($button_text_primary && $button_url_primary): ?>
                    <a href="<?php echo esc_url($button_url_primary); ?>" class="button-primary" role="button">
                        <?php echo esc_html($button_text_primary); ?>
                    </a>
                    <?php endif; ?>

                    <?php if ($button_text_secondary && $button_url_secondary): ?>
                    <a href="<?php echo esc_url($button_url_secondary); ?>" class=" button-secondary" role="button">
                        <?php echo esc_html($button_text_secondary); ?>
                    </a>
                    <?php endif; ?>

                </div>
                <?php endif; ?>

            </div>
        </div>

        <?php if ($image_url): ?>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 text-center">
                <div class="hero-image-container position-relative overflow-hidden ">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>"
                        class="img-fluid w-100 hero-image" </div>
                </div>
            </div>
            <?php endif; ?>

        </div>
</section>