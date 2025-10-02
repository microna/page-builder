<?php
// Get ACF fields
$main_title = get_sub_field('main_title') ?: 'Title is here';
$main_description = get_sub_field('main_description') ?: 'Description - short description of the text Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam natus repudiandae, quas odio exercitationem dolorem cumque blanditiis eveniet magnam vel?';

// Handle image
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

// Individual advantage data
$advantages = [
    [
        'title' => get_sub_field('advantage_1_title') ?: 'Title - main idea of the text',
        'description' => get_sub_field('advantage_1_description') ?: 'Description - short description of the text'
    ],
    [
        'title' => get_sub_field('advantage_2_title') ?: 'Title - main idea of the text',
        'description' => get_sub_field('advantage_2_description') ?: 'Description - short description of the text'
    ],
    [
        'title' => get_sub_field('advantage_3_title') ?: 'Title - main idea of the text',
        'description' => get_sub_field('advantage_3_description') ?: 'Description - short description of the text'
    ]
];
?>

<section id="advantages" class="py-5">
    <div class="container">

        <div class="row align-items-start mb-5 g-4">
            <div class="col-12 col-lg-6">
                <h2 class="display-4 display-md-3 fw-bold mb-3 mb-lg-0">
                    <?php echo esc_html($main_title); ?>
                </h2>
            </div>

            <div class="col-12 col-lg-6">
                <p class="fs-5 lead text-muted lh-base mb-0">
                    <?php echo esc_html($main_description); ?>
                </p>
            </div>
        </div>

        <div class="row g-4 g-lg-5 justify-content-center">

            <?php foreach ($advantages as $index => $advantage): ?>
            <div class="col-12 col-md-6 col-lg-4 text-center">
                <div class="advantage-item h-100 p-3">

                    <?php if ($image_url): ?>
                    <div class="advantage-icon-wrapper mb-3 mb-md-4">
                        <img src="<?php echo esc_url($image_url); ?>"
                            alt="<?php echo esc_attr($image_alt . ' ' . ($index + 1)); ?>"
                            class="img-fluid advantage-icon"
                            style="max-width: 80px; max-height: 80px; width: auto; height: auto;" loading="lazy">
                    </div>
                    <?php endif; ?>

                    <h3 class="h4 h-lg-3 fw-bold mb-3 lh-base">
                        <?php echo esc_html($advantage['title']); ?>
                    </h3>

                    <p class="fs-6 fs-lg-5 text-muted lh-base mb-0">
                        <?php echo esc_html($advantage['description']); ?>
                    </p>

                </div>
            </div>
            <?php endforeach; ?>

        </div>

    </div>
</section>