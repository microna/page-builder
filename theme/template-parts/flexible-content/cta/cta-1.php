<?php

$title = get_sub_field('title');
$description = get_sub_field('description');


?>
<section class="cta">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center">
            <h2 class="fs-1 fw-bold pb-3"><?php echo $title; ?></h2>
            <p class="fs-5 pb-3">
                <?php echo $description; ?>
            </p>
            <form class="d-flex gap-2 w-40">
                <div class="input-with-icon">
                    <input class="input-text" type="text" placeholder="Name" />
                </div>
                <input type="Submit" class="button-primary"></input>
            </form>
        </div>
    </div>
</section>