<?php
/**
 * Block Section Latest Product.
 *
 * @package Storeship
 */


if (!function_exists('storeship_frontpage_product_list_section')) {
    function storeship_frontpage_product_list_section($title = '', $title_note = '', $number = 6, $category = 0, $img_url = '', $img_position = 'left')
    {
        $has_image_class = '';
        $has_image = false;
        $col_class_3 = '';
        $col_class_66 = '';
        if (!empty($img_url)) {
            $has_image_class = 'has-image';
            $has_image = true;
            $col_class_3 = 'col-3';
            $col_class_66 = 'col-66';
        }

        $all_products = storeship_get_products($number, $category);
        $has_image_class .= ' ' . $img_position;

        ?>
        <div class="aft-product-list-mode <?php echo esc_attr($has_image_class); ?>">

            <div class="aft-product-list-wrapper <?php echo esc_attr($col_class_66); ?>">

                <?php if ($has_image == false ): ?>

                        <div class="section-head">
                    <?php if (!empty($title)): ?>
                            <h4 class="section-title aft-center-align">
                                <?php storeship_widget_title_section($title, $title_note); ?>
                            </h4>
                    <?php endif; ?>
                        </div>

                <?php endif; ?>


                <div class="aft-grid-list">

                    <?php
                    if ($has_image == false ):
                        storeship_get_all_products_link($category);
                    endif; ?>

                    <ul class="product-ul clearfix af-container-row ">

                        <?php if ($has_image):
                            $storeship_img_url = wp_get_attachment_url($img_url);
                            ?>
                            <li class="aft-product-view-all-li">
                                <?php storeship_get_all_products_link($category); ?>
                            </li>
                            <li class="aft-product-img-wrapper <?php echo esc_attr($col_class_3); ?>">
                                <?php $cat_link = storeship_get_all_products_link($category, 'link'); ?>
                                <a class="aft-products-link" href="<?php echo esc_url($cat_link); ?>"
                                   title="View all"></a>
                                <div class="feat-offers-img data-bg"
                                     data-background="<?php echo esc_url($storeship_img_url); ?>"></div>
                                <?php if (!empty($title)): ?>
                                    <h4 class="section-title aft-center-align">
                                        <?php storeship_widget_title_section($title, $title_note, true); ?>
                                    </h4>
                                <?php endif; ?>

                            </li>
                        <?php endif; ?>

                        <?php
                        if ($all_products->have_posts()) :

                            while ($all_products->have_posts()): $all_products->the_post();

                                storeship_get_block('list', 'product-loop');

                            endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>


                </div>
            </div>
        </div>
        <?php
    }
}