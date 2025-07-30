<?php
$text = get_sub_field('title');
$description = get_sub_field('description');
$button_text = get_sub_field('button_text');
$button_url = get_sub_field('button_link');
?>
<section class="hero">
    <div class="container">
        <div style="height: 60vh;"
            class="col-8 m-auto text-center d-flex flex-column justify-content-center align-items-center">
            <h1 class="fs-1 fw-bold pb-3">
                <?php echo $text; ?>
            </h1>
            <p class="fs-5 pb-3">
                <?php echo $description;  ?>

            </p>

            <div class="d-flex align-items-center justify-content-center">
                <a href="<?php echo $button_url; ?>" class="button-primary"> <?php echo $button_text; ?></a>
            </div>
        </div>
    </div>
</section>