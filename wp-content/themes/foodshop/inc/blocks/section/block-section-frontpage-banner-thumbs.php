<?php
/**
 * Block Section Latest Product.
 *
 * @package Storeship
 */
?>

<?php
$storeship_custom_data = array();
for ($storeship_i = 0; $storeship_i <= 2; $storeship_i++) {
    $storeship_slider_custom_image = storeship_get_option('slider_custom_thumbs_' . $storeship_i);
    $storeship_slider_custom_title = storeship_get_option('title_custom_thumbs_' . $storeship_i);
    if (!empty($storeship_slider_custom_image)){
        $storeship_custom_data['data_' . $storeship_i][] = $storeship_slider_custom_image;
        $storeship_custom_data['data_' . $storeship_i][] = storeship_get_option('title_custom_thumbs_' . $storeship_i);
        $storeship_custom_data['data_' . $storeship_i][] = storeship_get_option('custom_thumbs_caption_position_' . $storeship_i);
        $storeship_custom_data['data_' . $storeship_i][] = storeship_get_option('thumbs_button_text_' . $storeship_i);
        $storeship_custom_data['data_' . $storeship_i][] = storeship_get_option('thumbs_button_link_' . $storeship_i);
        $storeship_custom_data['data_' . $storeship_i][] = storeship_get_option('subtitle_custom_thumbs_' . $storeship_i);

    }

}

?>
<?php
if (isset($storeship_custom_data)) {


    ?>
    <div class="aft-custom-thumbs">
        <?php
        $storeship_count = 1;
        foreach ($storeship_custom_data as $storeship_c_data) {

            $storeship_img_url = wp_get_attachment_url($storeship_c_data[0]);


            if (!empty($storeship_c_data[2])) {
                $storeship_position = $storeship_c_data[2];
            } else {
                $storeship_position = 'left';
            }

            $storeship_img_bg_url = $storeship_img_url;
            $storeship_position .= ' data-bg';


            ?>
            <div class="aft-thumbs-item">
                <div class="thumbs-content-wrapper on-<?php echo esc_attr($storeship_position); ?>"
                     data-background="<?php echo esc_url($storeship_img_bg_url); ?>">
                    <?php if (!empty($storeship_c_data[4])): ?>
                        <a class="aft-link-on-box" href="<?php echo esc_url($storeship_c_data[4]); ?>"></a>
                    <?php endif; ?>
                </div>
                    <div class="thumbs-caption-wrapper">
                        <div class="content-caption">
                            <?php if ($storeship_c_data[1]) { ?>

                                <div class="caption-heading">
                                    <h4 class="cap-title">
                                        <?php echo esc_html($storeship_c_data[1]); ?>
                                    </h4>
                                </div>

                                <?php if ($storeship_c_data[5]) { ?>
                                    <div class="content-desc">
                                        <?php echo esc_html($storeship_c_data[5]); ?>
                                    </div>
                                <?php }
                            }


                            if ($storeship_c_data[3]): ?>
                                <div class="aft-btn-warpper btn-style1">
                                    <a href="<?php echo esc_url($storeship_c_data[4]); ?>">
                                        <?php echo esc_html($storeship_c_data[3]); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

            <?php
            $storeship_count++;
        } ?>
    </div>
<?php } ?>