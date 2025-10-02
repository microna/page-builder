<?php
$text = get_sub_field('title');
$description = get_sub_field('description');
$button_text = get_sub_field('button_text');
$button_url = get_sub_field('button_link');
?>
<section id="hero" class="position-relative min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">
                <h1 class="display-4 display-md-3 display-lg-2 fw-bold mb-3 mb-md-4">
                    <?php echo esc_html($text); ?>
                </h1>

                <p class="fs-5 fs-lg-4 mb-4 mb-md-5 text-muted lh-base">
                    <?php echo esc_html($description); ?>
                </p>
                <?php if ($button_text && $button_url): ?>
                <div class="d-flex justify-content-center">
                    <a href="<?php echo esc_url($button_url); ?>" class="button-primary " role="button">
                        <?php echo esc_html($button_text); ?>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>