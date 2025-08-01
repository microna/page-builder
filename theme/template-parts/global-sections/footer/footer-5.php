<footer>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="col-4">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img class="pb-5"
                        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.png'); ?>"
                        alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
                </a>
                <p class="fs-5">&copy; <span id="current-year">
                        <?php echo date('Y'); ?></span> All rights reserved</p>
                <div class="pb-5 d-flex justify-content-between align-items-start col-3">
                    <a href=" #">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/twitter.svg'); ?>"
                            alt="twitter" />
                    </a>
                    <a href="#" class="">
                        <img src=" <?php echo esc_url(get_template_directory_uri() . '/assets/images/inst.svg'); ?>"
                            alt="
                            instagram" />
                    </a>
                    <a href="#" class="">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/facebook.svg'); ?>"
                            alt="facebook" />
                    </a>
                </div>
            </div>
            <div class="col-6 text-end">
                <h4 class="fs-2 text-start">Title has its own meaning</h4>
                <p class="fs-5 text-start">Short description of the text</p>
                <div class="footer__content-holder">
                    <div class="input-with-icon">
                        <input id="input-text" class="input-text" placeholder="Input text">
                    </div>
                    <button class="button-primary">Button</button>
                </div>

            </div>
        </div>
    </div>

</footer>