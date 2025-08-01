<footer>
    <div class="container">
        <div class="footer">
            <div class=" col-6 m-auto text-center">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img class="pb-5"
                        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.png'); ?>"
                        alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
                </a>
                <div class="pb-5 col-3 d-flex justify-content-between align-items-center m-auto pb-5">
                    <a href="#" class="footer-socials__item">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/twitter.svg'); ?>"
                            alt="twitter" />
                    </a>
                    <a href="#" class="footer-socials__item">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/inst.svg'); ?>" alt="
                            instagram" />
                    </a>
                    <a href="#" class="footer-socials__item">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/facebook.svg'); ?>"
                            alt="facebook" />
                    </a>
                </div>
                <p>&copy; <span id="current-year"><?php echo date('Y'); ?></span> All rights reserved</p>
            </div>


        </div>
    </div>
</footer>