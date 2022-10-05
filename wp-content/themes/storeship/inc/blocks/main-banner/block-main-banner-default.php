<?php
/**
 * Block Section Main Banner.
 *
 * @package Storeship
 */

    $storeship_show_main_banner_section = storeship_get_option('show_main_banner_section');
    $storeship_show_top_categories_section = storeship_get_option('show_top_categories_section');
    if ($storeship_show_main_banner_section || $storeship_show_top_categories_section):
        if ($storeship_show_top_categories_section == false) {
            $col_class_30 = 'col-1';
            $col_class_80 = 'col-1 aft-full-banner-slider';
        } else {
            $col_class_30 = 'col-4';
            $col_class_80 = 'col-75';
        }

        $storeship_check_category = storeship_get_product_categories();

        if (empty($storeship_check_category)) {
            $col_class_30 = 'col-1';
            $col_class_80 = 'col-1 aft-full-banner-slider';
        }


        ?>
        <div class="banner-slider-5 clearfix row-sm">
        <?php if ($storeship_show_top_categories_section): ?>
        <div class="<?php echo esc_attr($col_class_30); ?> float-l pad">
            <?php storeship_vertical_categories_section(); ?>
        </div>
    <?php endif; ?>


        <?php if ($storeship_show_main_banner_section || $storeship_show_top_categories_section): ?>
        <div class="<?php echo esc_attr($col_class_80); ?> float-l pad banner-slider banner-slider-section">
            <?php if ($storeship_show_top_categories_section): ?>
                <div class="search">
                    <?php storeship_product_search_form(); ?>
                </div>
            <?php endif; ?>

            <?php if ($storeship_show_main_banner_section): ?>
                <?php
                $storeship_slider_mode = storeship_get_option('select_main_slider_section_mode');
                storeship_get_block('slider-custom');
                ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
        </div>


    <?php endif;