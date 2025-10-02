<?php
$title = get_sub_field('title') ?: 'Title is here';
$description = get_sub_field('description') ?: 'Description - short description of the text';
$button_text = get_sub_field('button_text') ?: 'Button';
$placeholder_text = get_sub_field('placeholder_text') ?: 'Enter your name';
?>

<section class="cta py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">

                <div class="cta-content text-center">

                    <?php if (!empty($title)): ?>
                    <h2 class="display-5 display-md-4 fw-bold mb-3 mb-md-4">
                        <?php echo esc_html($title); ?>
                    </h2>
                    <?php endif; ?>

                    <?php if (!empty($description)): ?>
                    <p class="fs-6 fs-md-5 mb-4 mb-md-5 text-muted lh-base">
                        <?php echo esc_html($description); ?>
                    </p>
                    <?php endif; ?>

                    <form
                        class="cta-form d-flex flex-column flex-sm-row gap-3 justify-content-center align-items-stretch"
                        action="#" method="post">
                        <div class="form-input-wrapper flex-grow-1" style="max-width: 400px;">
                            <input type="email" name="email" id="cta-email" class="form-control"
                                placeholder="<?php echo esc_attr($placeholder_text); ?>" required
                                aria-label="Email address">
                        </div>

                        <button type="submit" class="button-primary">
                            <?php echo esc_html($button_text); ?>
                        </button>

                    </form>

                </div>

            </div>
        </div>
    </div>
</section>