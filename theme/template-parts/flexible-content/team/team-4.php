<?php
$image = get_sub_field('image');
?>
<div class="team">
    <div class="container">
        <div class="team__inner-top">
            <h2 class="header-xl team__title">Title is here</h2>
            <p class="text-m team__description">
                Description - short description of the text. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Quisquam, quos.
            </p>
        </div>

        <div class="team__wrapper">
            <div class="team__item text-left">
                <img src="<?php echo $image; ?>" alt="" />
                <h5 class="header-m team__item-title">Title is here</h5>
                <p class="text-m team__item-description">
                    Description - short description of the text
                </p>
            </div>
            <div class="team__item text-left">
                <img src="<?php echo $image; ?>" alt="" />
                <h5 class="header-m team__item-title">Title is here</h5>
                <p class="text-m team__item-description">
                    Description - short description of the text
                </p>
            </div>
            <div class="team__item text-left">
                <img src="<?php echo $image; ?>" alt="" />
                <h5 class="header-m team__item-title">Title is here</h5>
                <p class="text-m team__item-description">
                    Description - short description of the text
                </p>
            </div>
            <!-- <div class="team__item">
        <img src="../../img/team-image.png" alt="" />
        <h5 class="header-m team__item-title">Title is here</h5>
        <p class="text-m team__item-description">
          Description - short description of the text
        </p>
      </div> -->
        </div>
    </div>
</div>