<?php

$text = get_sub_field('title');
$description = get_sub_field('description');
?>
<div class="content-block">
    <div class="content-block__wrapper">
        <div class="content-block__item">
            <h2 class="header-xl"><?php echo $text; ?></h2>
            <p class="text-m"><?php echo $description; ?></p>
        </div>
        <div class="content-block__content">
            <div class="content-block__content-item">
                <img src="./img/placeholder-image.jpg" alt="">
                <h5 class="text-bold-m">Title - main idea of the text</h5>
                <p class="text-m">Description - short description of the text</p>
            </div>
            <div class="content-block__content-item">
                <img src="./img/placeholder-image.jpg" alt="">
                <h5 class="text-bold-m">Title - main idea of the text</h5>
                <p class="text-m">Description - short description of the text</p>
            </div>
        </div>
    </div>
</div>