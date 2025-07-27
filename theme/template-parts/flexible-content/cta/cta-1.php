<?php

$title = get_sub_field('title');
$description = get_sub_field('description');


?>
<div class="cta">
    <div class="container">
        <h2 class="header-xl cta__title"><?php echo $title; ?></h2>
        <p class="text-m cta__description">
            <?php echo $description; ?>
        </p>
        <form class="cta__inner">
            <div class="input-with-icon">
                <input class="input-text" type="text" placeholder="Name" />
            </div>
            <a class="button-primary">Button</a>
        </form>
    </div>
</div>