<?php
// Get ACF fields
$main_title = get_sub_field('main_title') ?: 'Title - main idea of the text';
$text = get_sub_field('title');
$description = get_sub_field('description');

// Individual content block data
$content_blocks = [
    [
        'image' => get_sub_field('block_1_image') ?: './img/placeholder-image.jpg',
        'title' => get_sub_field('block_1_title') ?: 'Title - main idea of the text',
        'description' => get_sub_field('block_1_description') ?: 'Description - short description of the text'
    ],
    [
        'image' => get_sub_field('block_2_image') ?: './img/placeholder-image.jpg',
        'title' => get_sub_field('block_2_title') ?: 'Title - main idea of the text',
        'description' => get_sub_field('block_2_description') ?: 'Description - short description of the text'
    ]
];

// Function to handle image data
function get_image_data($image, $fallback_alt = 'Content block') {
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

<section class="content-block py-5">
    <div class="container">

        <!-- Header Section -->
        <div class="row">
            <div class="col-12 text-center mb-5">

                <!-- Main Title -->
                <h2 class="display-4 display-md-3 fw-bold mb-3 mb-md-4">
                    <?php echo esc_html($main_title); ?>
                </h2>

                <!-- Secondary Title -->
                <?php if ($text): ?>
                <p class="fs-6 fs-md-5 lead fw-semibold mb-3">
                    <?php echo esc_html($text); ?>
                </p>
                <?php endif; ?>

                <!-- Description -->
                <?php if ($description): ?>
                <p class="fs-6 fs-md-5 text-muted lh-base mx-auto" style="max-width: 700px;">
                    <?php echo esc_html($description); ?>
                </p>
                <?php endif; ?>

            </div>
        </div>

        <!-- Content Blocks Grid -->
        <div class="row g-4 g-lg-5 justify-content-center">

            <?php foreach ($content_blocks as $index => $block): 
                $image_data = get_image_data($block['image'], 'Content block ' . ($index + 1));
            ?>

            <div class="col-12 col-md-6 col-lg-5">
                <div class="content-block-item text-center h-100 p-3 p-lg-4">

                    <!-- Block Image -->
                    <?php if ($image_data['url']): ?>
                    <div class="content-block-image-wrapper mb-3 mb-md-4">
                        <img src="<?php echo esc_url($image_data['url']); ?>"
                            alt="<?php echo esc_attr($image_data['alt']); ?>"
                            class="img-fluid content-block-image rounded shadow-sm"
                            style="max-height: 200px; width: auto; object-fit: cover;" loading="lazy">
                    </div>
                    <?php endif; ?>

                    <!-- Block Title -->
                    <h5 class="h4 h-lg-3 fw-bold mb-3 lh-base">
                        <?php echo esc_html($block['title']); ?>
                    </h5>

                    <!-- Block Description -->
                    <p class="fs-6 fs-lg-5 text-muted lh-base mb-0">
                        <?php echo esc_html($block['description']); ?>
                    </p>

                </div>
            </div>

            <?php endforeach; ?>

        </div>

    </div>
</section>