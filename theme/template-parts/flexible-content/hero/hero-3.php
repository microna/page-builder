<?php
$text = get_sub_field('title');
$description = get_sub_field('description');
$button_text_primary = get_sub_field('primary_button_text');
$button_url_primary = get_sub_field('primary_button_link');
$button_text_secondary = get_sub_field('secondary_button_text');
$button_url_secondary = get_sub_field('secondary_button_link');
$image = get_sub_field('image');
?>



<div class="hero">
    <h1 class="header-xl">
        <?php echo $text; ?>
    </h1>
    <p class="text-m">
        <?php echo $description; ?>
    </p>

    <div class="hero__buttons">
        <a href="<?php echo $button_url_primary ; ?>" class="button-primary"> <?php echo $button_text_primary ; ?></a>
        <a href="<?php echo $button_url_secondary ; ?>" class="button-secondary"><?php echo $button_text_secondary ; ?>
        </a>
    </div>
    <div class="hero__image" style="background-image: url(<?php echo $image; ?>);">
        <!-- <img src="./img/placeholder-image.jpg" alt=""> -->
    </div>
</div>