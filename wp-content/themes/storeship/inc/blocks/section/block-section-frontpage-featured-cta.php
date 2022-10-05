<?php
$storeship_section_subtitle = storeship_get_option('section_cta_subtitle');
$storeship_cta_custom_image = storeship_get_option('call_to_action_image');
$storeship_cta_button_text = storeship_get_option('cta_button_text');
$storeship_cta_button_link = storeship_get_option('cta_button_link');
$storeship_cta_schedule = storeship_get_option('cta_schedule_date');
$storeship_strtotime = strtotime($storeship_cta_schedule);
$storeship_newformat = date('Y-m-d', $storeship_strtotime);
$storeship_enable_background_fix = storeship_get_option('features_footer_cta_background_image_fixed');
$storeship_bg_class = '';
$storeship_img_url = '';

if ($storeship_cta_custom_image) {

    $storeship_img_url = wp_get_attachment_url($storeship_cta_custom_image);
    if ($storeship_enable_background_fix) {
        $storeship_bg_class = 'data-bg aft-fixed-background';
    } else {
        $storeship_bg_class = 'data-bg';
    }

} ?>

<div class="section-call-action">

    <div class="aft-call-to-action-img <?php echo esc_html($storeship_bg_class); ?>"
         data-background="<?php echo esc_url($storeship_img_url); ?>"></div>
        <div class="container-wrapper">

            <?php
            $storeship_section_title = storeship_get_option('section_cta_title');
            ?>
            <div class="section-head">
                <?php if (!empty($storeship_section_title)): ?>
                    <h4 class="section-title aft-center-align">
                        <?php storeship_widget_title_section($storeship_section_title); ?>
                    </h4>
                <?php endif; ?>
                <span class="subtitle">
                    <?php echo esc_html($storeship_section_subtitle); ?>
                </span>
            </div>

            <div class="cta-button-link">
                <a href="<?php echo esc_url($storeship_cta_button_link); ?>"><?php echo esc_html($storeship_cta_button_text); ?></a>
            </div>

    </div>
</div>
    