<footer>
    <div class="container">
        <div class="footer">
            <div class="d-flex justify-content-between align-items-center">
                <div class="col-2">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.png'); ?>"
                            alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
                    </a>
                </div>
                <div class="col-3 text-end">
                    <p class="fs-5">&copy; <span id="current-year"><?php echo date('Y'); ?></span> All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>