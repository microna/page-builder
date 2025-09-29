<?php
// Get ACF fields
$section_title = get_sub_field('testimonials_title') ?: 'Testimonials';
$section_description = get_sub_field('testimonials_description') ?: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolores ex nihil omnis laudantium quisquam vel ab ipsum debitis tempore nemo?';

// Testimonials data (you can use ACF repeater)
$testimonials = [
    [
        'avatar' => get_sub_field('testimonial_1_avatar') ?: get_template_directory_uri() . '/assets/images/avatar.svg',
        'name' => get_sub_field('testimonial_1_name') ?: 'User Name',
        'position' => get_sub_field('testimonial_1_position') ?: 'User Position',
        'content' => get_sub_field('testimonial_1_content') ?: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat neque pariatur debitis eos eveniet ipsam consequatur excepturi ipsum ab illo! Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat neque pariatur debitis eos eveniet ipsam consequatur excepturi ipsum ab illo!'
    ],
    [
        'avatar' => get_sub_field('testimonial_2_avatar') ?: get_template_directory_uri() . '/assets/images/avatar.svg',
        'name' => get_sub_field('testimonial_2_name') ?: 'User Name',
        'position' => get_sub_field('testimonial_2_position') ?: 'User Position',
        'content' => get_sub_field('testimonial_2_content') ?: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat neque pariatur debitis eos eveniet ipsam consequatur excepturi ipsum ab illo! Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat neque pariatur debitis eos eveniet ipsam consequatur excepturi ipsum ab illo!'
    ],
    [
        'avatar' => get_sub_field('testimonial_3_avatar') ?: get_template_directory_uri() . '/assets/images/avatar.svg',
        'name' => get_sub_field('testimonial_3_name') ?: 'User Name',
        'position' => get_sub_field('testimonial_3_position') ?: 'User Position',
        'content' => get_sub_field('testimonial_3_content') ?: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat neque pariatur debitis eos eveniet ipsam consequatur excepturi ipsum ab illo! Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat neque pariatur debitis eos eveniet ipsam consequatur excepturi ipsum ab illo!'
    ]
];

// Helper to get image URL
if (!function_exists('get_testimonial_img_url')) {
    function get_testimonial_img_url($img) {
        if (is_array($img) && isset($img['url'])) {
            return $img['url'];
        }
        return $img;
    }
}
?>

<section class="testimonials py-5">
    <div class="container">

        <!-- Section Header -->
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 text-center mb-5">
                <h2 class="display-5 display-md-4 fw-bold mb-3">
                    <?php echo esc_html($section_title); ?>
                </h2>
                <p class="fs-6 fs-md-5 lead text-muted lh-base">
                    <?php echo esc_html($section_description); ?>
                </p>
            </div>
        </div>

        <div class="testimonials-wrapper swiper position-relative">
            <div class="swiper-wrapper">

                <?php foreach ($testimonials as $index => $testimonial): 
                    $avatar_url = get_testimonial_img_url($testimonial['avatar']);
                ?>

                <div class="swiper-slide">
                    <div class="testimonial-card bg-white p-4 p-md-5  h-100">

                        <div class="d-flex gap-3 align-items-start mb-4">
                            <?php if (!empty($avatar_url)): ?>
                            <img class="testimonial-avatar rounded-circle flex-shrink-0"
                                src="<?php echo esc_url($avatar_url); ?>"
                                alt="<?php echo esc_attr($testimonial['name']); ?>"
                                style="width: 60px; height: 60px; object-fit: cover;" />
                            <?php endif; ?>

                            <div>
                                <h5 class="fs-5 fw-bold mb-1">
                                    <?php echo esc_html($testimonial['name']); ?>
                                </h5>
                                <p class="fs-6 text-muted mb-0">
                                    <?php echo esc_html($testimonial['position']); ?>
                                </p>
                            </div>
                        </div>

                        <p class="fs-6 lh-base text-muted mb-0">
                            <?php echo esc_html($testimonial['content']); ?>
                        </p>

                    </div>
                </div>

                <?php endforeach; ?>

            </div>

            <!-- Navigation Arrows -->
            <div class="swiper-button-next testimonials-button-next"></div>
            <div class="swiper-button-prev testimonials-button-prev"></div>

            <!-- Pagination -->
            <div class="swiper-pagination testimonials-pagination mt-4"></div>
        </div>

    </div>
</section>



<script>
// Initialize Swiper (make sure Swiper JS is loaded on your page)
document.addEventListener('DOMContentLoaded', function() {
    if (typeof Swiper !== 'undefined') {
        const testimonialsSwiper = new Swiper('.testimonials-wrapper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.testimonials-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.testimonials-button-next',
                prevEl: '.testimonials-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                }
            }
        });
    }
});
</script>