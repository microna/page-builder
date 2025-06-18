<footer>
    <div class="container">
        <div class="footer">
            <div class="footer__content">
                <div class="footer__content-wrapper">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.svg'); ?>"
                        alt="Logo" />
                    <p>&copy; <span id="current-year">
                            <?php echo date('Y'); ?></span> All rights reserved</p>
                    <div class="footer-socials">
                        <a href="#" class="footer-socials__item">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/twitter.svg'); ?>"
                                alt="twitter" />
                        </a>
                        <a href="#" class="footer-socials__item">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/inst.svg'); ?>"
                                alt="
                            instagram" />
                        </a>
                        <a href="#" class="footer-socials__item">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/facebook.svg'); ?>"
                                alt="facebook" />
                        </a>
                    </div>
                </div>
                <div class="footer__content-wrapper">
                    <h4 class="header-m">Title has its own meaning</h4>
                    <p class="text-m">Short description of the text</p>
                    <div class="footer__content-holder">
                        <div class="input-with-icon">
                            <input id="input-text" class="input-text" placeholder="Input text">
                        </div>
                        <button class="button-primary">Button</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>