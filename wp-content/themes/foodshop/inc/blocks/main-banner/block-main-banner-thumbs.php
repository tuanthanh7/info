<?php
/**
 * Block Section Main Banner.
 *
 * @package Storeship
 */

    $storeship_show_main_banner_section = storeship_get_option('show_main_banner_section');
    $storeship_show_top_categories_section = storeship_get_option('show_top_categories_section');

if ($storeship_show_top_categories_section) {
    storeship_cat_and_search();
}

    if ($storeship_show_main_banner_section):
        $col_class_30 = 'col-30';
        $col_class_80 = 'col-70';
        ?>

        <div class="banner-slider-5 clearfix row-sm">
        <div class="<?php echo esc_attr($col_class_80); ?> float-l pad banner-slider banner-slider-section">
            <?php
                $storeship_slider_mode = storeship_get_option('select_main_slider_section_mode');
                storeship_get_block('slider-custom');
          ?>
        </div>

        <div class="<?php echo esc_attr($col_class_30); ?> float-l pad">
            <?php storeship_get_block('frontpage-banner-thumbs', 'section'); ?>
        </div>
        </div>

    <?php endif;