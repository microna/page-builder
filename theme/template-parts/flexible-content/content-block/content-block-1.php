<?php

$text = get_sub_field('title');
$description = get_sub_field('description');
?>


<section class="content-block">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center pb-5">
            <h2 class="fs-1 fw-bold pb-3">Title - main idea of the text</h2>
            <p class="fs-5">xl"><?php echo $text; ?></h2>
            <p class="text-m"><?php echo $description; ?>< < /p>
        </div>
        <div class="d-flex align-items-center justify-content-center gap-5">
            <div class="col-4 text-center">
                <img class="pb-3" src="./img/placeholder-image.jpg" alt="">
                <h5 class="fs-3 fw-bold">Title - main idea of the text</h5>
                <p class="fs-5">Description - short description of the text</p>
            </div>
            <div class="col-4 text-center">
                <img class="pb-3" src="./img/placeholder-image.jpg" alt="">
                <h5 class="fs-3 fw-bold">Title - main idea of the text</h5>
                <p class="fs-5">Description - short description of the text</p>
            </div>
        </div>
    </div>
</section>