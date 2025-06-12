<?php
$text = get_sub_field('title');
$description = get_sub_field('description');
$button_text = get_sub_field('button_text');
$button_url = get_sub_field('button_link');
?>
<div class="hero">
    <h1 class="header-xl">
        <?php echo $text; ?>
    </h1>
    <p class="text-m">
        <?php echo $description; ?>
    </p>
    <div class="hero__buttons">
        <a href="<?php echo $button_url; ?>" class="button-primary"> <?php echo $button_text; ?></a>
    </div>
</div>