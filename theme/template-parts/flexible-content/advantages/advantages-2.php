<?php
$image = get_sub_field('image');

$image_url = '';
$image_alt = '';

if ($image) {
    if (is_array($image)) {
        $image_url = $image['url'] ?? '';
        $image_alt = $image['alt'] ?? 'Advantage icon';
    } else {
        $image_url = $image;
        $image_alt = 'Advantage icon';
    }
}
?>

<section class="advantages py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-4 display-md-3 fw-bold mb-3 mb-md-4">Title - main idea of the text</h2>
                <p class="fs-6 fs-md-5 lead text-muted">
                    Description - short description of the text
                </p>
            </div>
        </div>

        <div class="row g-4 g-lg-5 justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 text-center">
                <?php if ($image_url): ?>
                <img class="img-fluid mb-3 mb-md-4" src="<?php echo esc_url($image_url); ?>"
                    alt="<?php echo esc_attr($image_alt); ?>" style="max-width: 80px; max-height: 80px;" />
                <?php endif; ?>
                <h3 class="h4 h-lg-3 fw-bold mb-3">
                    Title - main idea of the text Title - main idea of the text
                </h3>
                <p class="fs-6 fs-lg-5 text-muted">
                    Description - short description of the text
                </p>
            </div>

            <div class="col-12 col-md-6 col-lg-4 text-center">
                <?php if ($image_url): ?>
                <img class="img-fluid mb-3 mb-md-4" src="<?php echo esc_url($image_url); ?>"
                    alt="<?php echo esc_attr($image_alt); ?>" style="max-width: 80px; max-height: 80px;" />
                <?php endif; ?>
                <h3 class="h4 h-lg-3 fw-bold mb-3">
                    Title - main idea of the text
                </h3>
                <p class="fs-6 fs-lg-5 text-muted">
                    Description - short description of the text
                </p>
            </div>

            <div class="col-12 col-md-6 col-lg-4 text-center">
                <?php if ($image_url): ?>
                <img class="img-fluid mb-3 mb-md-4" src="<?php echo esc_url($image_url); ?>"
                    alt="<?php echo esc_attr($image_alt); ?>" style="max-width: 80px; max-height: 80px;" />
                <?php endif; ?>
                <h3 class="h4 h-lg-3 fw-bold mb-3">
                    Title - main idea of the text
                </h3>
                <p class="fs-6 fs-lg-5 text-muted">
                    Description - short description of the text
                </p>
            </div>
        </div>
    </div>
</section>