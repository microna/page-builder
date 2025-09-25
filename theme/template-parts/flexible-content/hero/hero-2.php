<?php
// Get ACF fields
$text = get_sub_field('title');
$description = get_sub_field('description');
$button_text_primary = get_sub_field('primary_button_text');
$button_url_primary = get_sub_field('primary_button_link');
$button_text_secondary = get_sub_field('secondary_button_text');
$button_url_secondary = get_sub_field('secondary_button_link');
?>

<section id="hero" style=" min-height: 100dvh;" class="position-relative min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 text-center">

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
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center align-items-center">

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
        </div>
    </div>
</section>