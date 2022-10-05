<section class="banner-promotion-section">

    <?php
    if (('' != storeship_get_option('banner_advertisement_section'))) { ?>
        <?php if (('' != storeship_get_option('banner_advertisement_section'))):

            $storeship_banner_advertisement = storeship_get_option('banner_advertisement_section');
            $storeship_banner_advertisement = absint($storeship_banner_advertisement);
            $storeship_banner_advertisement = wp_get_attachment_image($storeship_banner_advertisement, 'full');
            $storeship_banner_advertisement_url = storeship_get_option('banner_advertisement_section_url');
            $storeship_banner_advertisement_url = isset($storeship_banner_advertisement_url) ? esc_url($storeship_banner_advertisement_url) : '#';

            ?>
            <div class="banner-promotions-wrapper">
                <div class="promotion-section">
                    <a href="<?php echo esc_url($storeship_banner_advertisement_url); ?>">
                        <?php
                        $storeship_allowed_html = storeship_allowed_html();
                        echo wp_kses($storeship_banner_advertisement, $storeship_allowed_html);
                        ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        <!-- Trending line END -->
    <?php } ?>

</section>
