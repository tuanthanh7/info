<?php
/**
 * Block Product Carousel support.
 *
 * @package Storeship
 */

$storeship_main_slider_content = storeship_get_option('select_main_slider_content');
$storeship_autoplayspeed = storeship_get_option('add_carousel_speed_setting_option');
$storeship_image_placement = storeship_get_option('select_main_slider_image_placement');

$storeship_banner_class = 'aft-slider';
$storeship_slidesToShow = 1;
$storeship_slide_to_scroll = 1;
$storeship_break_point_1_slidesToShow = 1;
$storeship_break_point_1_slidesToScroll = 1;
$storeship_break_point_2_slidesToShow = 1;
$storeship_break_point_2_slidesToScroll = 1;
$storeship_break_point_3_slidesToShow = 1;
$storeship_break_point_3_slidesToScroll = 1;


$storeship_carousel_args = array(
    'slidesToShow' => $storeship_slidesToShow,
    'autoplaySpeed' => $storeship_autoplayspeed,
    'slidesToScroll' => $storeship_slide_to_scroll,
    'responsive' => array(
        array(
            'breakpoint' => 1024,
            'settings' => array(
                'slidesToShow' => $storeship_break_point_2_slidesToShow,
                'slidesToScroll' => $storeship_break_point_3_slidesToScroll,
                'infinite' => true
            ),
        ),
        array(
            'breakpoint' => 769,
            'settings' => array(
                'slidesToShow' => $storeship_break_point_2_slidesToShow,
                'slidesToScroll' => $storeship_break_point_2_slidesToScroll,
                'infinite' => true,
            ),
        ),
        array(
            'breakpoint' => 480,
            'settings' => array(
                'slidesToShow' => $storeship_break_point_3_slidesToShow,
                'slidesToScroll' => $storeship_break_point_3_slidesToScroll,
                'infinite' => true
            ),
        ),
    ),
);

$storeship_carousel_args_encoded = wp_json_encode($storeship_carousel_args);

$storeship_custom_data = storeship_banner_slider_items();

if (isset($storeship_custom_data)) {

    $storeship_boxed = false;
    $storeship_slider_class = 'main-banner-slider-single';
    if ($storeship_boxed) {
        $storeship_slider_class = 'main-banner-slider-center';
    }

    ?>
    <div class="<?php echo esc_attr($storeship_slider_class); ?> main-banner-slider slick-wrapper <?php echo esc_html($storeship_banner_class); ?>"
         data-slick='<?php echo wp_kses_post($storeship_carousel_args_encoded); ?>'>
        <?php
        $storeship_count = 1;
        foreach ($storeship_custom_data as $storeship_c_data) {

            if (!empty($storeship_c_data[2])) {
                $storeship_position = $storeship_c_data[2];
            } else {
                $storeship_position = 'left';
            }

            $storeship_position .= ' data-bg';
            $storeship_position .= ' img-background';

            ?>
            <div class="item">
                <?php if (!empty($storeship_c_data[4])): ?>
                    <a class="aft-link-on-box" href="<?php echo esc_url($storeship_c_data[4]); ?>"></a>
                <?php endif; ?>
                <div class="slider-content-wrapper on-<?php echo esc_attr($storeship_position); ?>"
                     data-background="<?php echo esc_url($storeship_c_data[0]); ?>">
                </div>

                <div class="content-caption-wrapper">
                    <div class="content-caption <?php echo esc_attr($storeship_c_data[6]); ?>">
                        <?php if ($storeship_c_data[1]) { ?>

                            <div class="caption-heading">
                                <h2 class="cap-title">
                                    <?php echo esc_html($storeship_c_data[1]); ?>
                                </h2>
                            </div>

                            <?php if ($storeship_c_data[5]) { ?>
                                <div class="content-desc">
                                    <?php echo wp_kses_post($storeship_c_data[5]); ?>
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