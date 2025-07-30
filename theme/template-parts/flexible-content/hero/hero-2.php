<?php
$text = get_sub_field('title');
$description = get_sub_field('description');
$button_text_primary = get_sub_field('primary_button_text');
$button_url_primary = get_sub_field('primary_button_link');
$button_text_secondary = get_sub_field('secondary_button_text');
$button_url_secondary = get_sub_field('secondary_button_link');
?>
<section class="hero">
    <div class="container">
        <div style="height: 60vh;"
            class="col-8 m-auto text-center d-flex flex-column justify-content-center align-items-center vh-10">
            <h1 class="fs-1 pb-3 fw-bold">
                <?php echo $text; ?>
            </h1>
            <p class="fs-5 pb-3">
                <?php echo $description; ?>
            </p>

            <div class="d-flex gap-3 justify-content-center">
                <a href="<?php echo $button_url_primary; ?>"
                    class="button-primary"><?php echo $button_text_primary; ?></a>
                <a href="<?php echo $button_url_secondary; ?>"
                    class="button-secondary"><?php echo $button_text_secondary; ?></a>
            </div>
        </div>
    </div>
</section>