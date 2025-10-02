<?php
// Get ACF fields with fallbacks
$title = get_sub_field('title') ?: 'Title is here';
$description = get_sub_field('description') ?: 'Description - short description of the text';
$button_text = get_sub_field('button_text') ?: 'Button';
$button_url = get_sub_field('button_url') ?: '#';
?>

<section class="cta py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 text-center">

                <?php if (!empty($title)): ?>
                <h2 class="display-5 display-md-4 fw-bold mb-3 mb-md-4">
                    <?php echo esc_html($title); ?>
                </h2>
                <?php endif; ?>

                <?php if (!empty($description)): ?>
                <p class="fs-4 fs-md-5 mb-4 mb-md-5 text-muted lh-base">
                    <?php echo esc_html($description); ?>
                </p>
                <?php endif; ?>

                <?php if (!empty($button_text) && !empty($button_url)): ?>
                <a href="<?php echo esc_url($button_url); ?>" class="button-primary" role="button">
                    <?php echo esc_html($button_text); ?>
                </a>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>