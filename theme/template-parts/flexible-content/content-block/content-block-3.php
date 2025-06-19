<?php

    $text = get_sub_field('title');
    $description = get_sub_field('description');
    $block_image_1 = get_sub_field('block_image_1');
    $block_title_1 = get_sub_field('block_title_1');
    $block_description_1 = get_sub_field('block_description_1');
    $block_image_2 = get_sub_field('block_image_2');
    $block_title_2 = get_sub_field('block_title_2');
    $block_description_2 = get_sub_field('block_description_2');
?>
<div class="content-block">
    <div class="content-block__wrapper">
        <div class="content-block__item">
            <h2 class="header-xl"><?php echo $text; ?></h2>
            <p class="text-m"><?php echo $description; ?></p>
        </div>
        <div class="content-block__aside--left"">
      <div class=" content-block__content-image">
            <img src="<?php echo $block_image_1; ?>" alt="" />
        </div>
        <div class=" content-block__content-text">
            <h5 class="text-bold-l"><?php echo $block_title_1; ?></h5>
            <p class="text-m"><?php echo   $block_description_1  ?></p>
        </div>
    </div>
    <div class="content-block__aside--left"">
      <div class=" content-block__content-image">
        <img src="<?php echo $block_image_2; ?>" alt="" />
    </div>
    <div class="content-block__content-text">
        <h5 class="text-bold-l"><?php echo $block_title_2; ?></h5>
        <p class="text-m"><?php echo $block_title_2; ?></p>
    </div>
</div>

</div>
</div>