<?php
$text = get_sub_field('title');
$description = get_sub_field('description');
$button_text_primary = get_sub_field('primary_button_text');
$button_url_primary = get_sub_field('primary_button_link');
$button_text_secondary = get_sub_field('secondary_button_text');
$button_url_secondary = get_sub_field('secondary_button_link');
$image = get_sub_field('image');
?>
<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-5 col-lg-6 order-md-1">
                <h1 class="fs-1 fw-bold pb-3"><?php echo $text; ?></h1>
                <p class="fs-5 pb-3"><?php echo $description = get_sub_field('description');?></p>
                <div class="d-flex gap-3">
                    <a href="<?php echo $button_url_primary ?>"
                        class="button-primary"><?php echo $button_text_primary;?></a>

                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-6 order-md-2 aos-init aos-animate">
                <img src="<?php echo $image; ?>" alt="hero-image" class="w-100">
            </div>
        </div>
    </div>
    </div>
</section>