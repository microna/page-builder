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
        <div class="d-flex justify-content-center align-items-center gap-5">
            <div class="col-6 text-start">
                <h1 class="fs-1 fw-bold pb-3">><?php echo $text; ?></h1>
                <p class="fs-5 pb-3"><?php echo $description; ?></p>
                <div class="d-flex gap-3">
                    <a href="<?php echo $button_url_primary; ?><"
                        class="button-primary"><?php echo $button_text_primary; ?>
                    </a>
                    <a href="<?php echo $button_url_secondary; ?><"
                        class="button-secondary"><?php echo $button_text_secondary; ?></a>
                </div>
            </div>
            <div class="col-6">
                <img style="background-image: url(<?php echo $image; ?>);" alt="hero-image" class="w-100">
            </div>
        </div>
    </div>
</section>