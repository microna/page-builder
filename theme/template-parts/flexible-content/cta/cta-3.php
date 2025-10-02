<?php
$title = get_sub_field('title') ?: 'Title is here';
$description = get_sub_field('description') ?: 'Description - short description of the text';

$button_text_primary = get_sub_field('primary_button_text') ?: 'Button';
$button_url_primary = get_sub_field('primary_button_url') ?: '#';

$button_text_secondary = get_sub_field('secondary_button_text') ?: 'Button';
$button_url_secondary = get_sub_field('secondary_button_url') ?: '#';
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
                <p class="fs-5 mb-4 mb-md-5 text-muted lh-base">
                    <?php echo esc_html($description); ?>
                </p>
                <?php endif; ?>

                <?php if (!empty($button_text_primary) || !empty($button_text_secondary)): ?>
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center align-items-center">

                    <!-- Primary Button -->
                    <?php if (!empty($button_text_primary) && !empty($button_url_primary)): ?>
                    <a href="<?php echo esc_url($button_url_primary); ?>" class="button-primary" role="button">
                        <?php echo esc_html($button_text_primary); ?>
                    </a>
                    <?php endif; ?>

                    <!-- Secondary Button -->
                    <?php if (!empty($button_text_secondary) && !empty($button_url_secondary)): ?>
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