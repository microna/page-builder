<?php
$main_title = get_sub_field('main_title') ?: 'Title - main idea of the text';
$advantages = get_sub_field('advantages'); // Assuming this is a repeater field

$default_advantages = [
    [
        'image' => get_sub_field('image_1') ?: get_sub_field('image'),
        'title' => get_sub_field('title_1') ?: 'Title - main idea of the text',
        'description' => get_sub_field('description_1') ?: 'Description - short description of the text'
    ],
    [
        'image' => get_sub_field('image_2') ?: get_sub_field('image'),
        'title' => get_sub_field('title_2') ?: 'Title - main idea of the text',
        'description' => get_sub_field('description_2') ?: 'Description - short description of the text'
    ],
    [
        'image' => get_sub_field('image_3') ?: get_sub_field('image'),
        'title' => get_sub_field('title_3') ?: 'Title - main idea of the text',
        'description' => get_sub_field('description_3') ?: 'Description - short description of the text'
    ]
];

$advantages_data = $advantages ?: $default_advantages;

function get_image_data($image, $fallback_alt = 'Advantage icon') {
    if (!$image) return ['url' => '', 'alt' => $fallback_alt];
    
    if (is_array($image)) {
        return [
            'url' => $image['url'] ?? '',
            'alt' => $image['alt'] ?? $fallback_alt
        ];
    }
    
    return ['url' => $image, 'alt' => $fallback_alt];
}
?>

<section class="advantages py-5">
    <div class="container">

        <?php if ($main_title): ?>
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-4 display-md-3 fw-bold mb-3">
                    <?php echo esc_html($main_title); ?>
                </h2>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($advantages_data): ?>
        <div class="row g-4 g-md-5 justify-content-center">

            <?php foreach ($advantages_data as $index => $advantage): 
                $image_data = get_image_data($advantage['image'], 'Advantage ' . ($index + 1));
            ?>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="advantage-item text-center h-100 p-3 p-md-4">

                    <?php if ($image_data['url']): ?>
                    <div class="advantage-icon-wrapper mb-3 mb-md-4">
                        <img src="<?php echo esc_url($image_data['url']); ?>"
                            alt="<?php echo esc_attr($image_data['alt']); ?>" class="img-fluid advantage-icon"
                            style="max-width: 80px; max-height: 80px; width: auto; height: auto;" loading="lazy">
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($advantage['title'])): ?>
                    <h3 class="h4 h-md-3 fw-bold mb-3 lh-base">
                        <?php echo esc_html($advantage['title']); ?>
                    </h3>
                    <?php endif; ?>

                    <?php if (!empty($advantage['description'])): ?>
                    <p class="fs-6 fs-md-5 text-muted lh-base mb-0">
                        <?php echo esc_html($advantage['description']); ?>
                    </p>
                    <?php endif; ?>

                </div>
            </div>

            <?php endforeach; ?>

        </div>
        <?php endif; ?>

    </div>
</section>