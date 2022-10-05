<?php
/**
 * Block Section Latest Product.
 *
 * @package Storeship
 */
if (!function_exists('storeship_frontpage_product_carousel_section')) {
    function storeship_frontpage_product_carousel_section($title = '', $title_note = '', $number = 4, $category = 0, $img_url = '', $img_position = 'left')
    {
        $has_image = '';
        $carousel_class = 'product-carousel';
        $col_class_3 = '';
        $col_class_66 = '';

        if (!empty($img_url)) {
            $has_image = 'has-image';
            $has_image .= ' ' . $img_position;
            $carousel_class = 'express-product-carousel';
            $col_class_3 = 'col-3';
            $col_class_66 = 'col-66';
        }

        $all_products = storeship_get_products($number, $category);
        ?>
        <div class="aft-product-grid-mode <?php echo esc_attr($has_image); ?>">
            <?php if (!empty($has_image)):
                $storeship_img_url = wp_get_attachment_url($img_url);
                ?>
                <div class="aft-product-img-wrapper <?php echo esc_attr($col_class_3); ?>">
                    <?php $cat_link = storeship_get_all_products_link($category, 'link'); ?>
                    <a class="aft-products-link" href="<?php echo esc_url($cat_link); ?>" title="View all"></a>
                    <div class="feat-offers-img data-bg"
                         data-background="<?php echo esc_url($storeship_img_url); ?>"></div>
                    <?php if (!empty($title)): ?>
                        <h4 class="section-title aft-center-align">
                            <?php storeship_widget_title_section($title, $title_note, true); ?>
                        </h4>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

            <div class="aft-product-carousel-wrapper <?php echo esc_attr($col_class_66); ?>">
                <?php if (empty($has_image)): ?>
                    <div class="section-head">
                        <?php if (!empty($title)): ?>
                            <h4 class="section-title aft-center-align">
                                <?php storeship_widget_title_section($title, $title_note); ?>
                            </h4>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="aft-slider-carousel">
                    <div class="aft-slider-btn-wrapper"></div>
                    <ul class="products product-ul aft-carousel aft-content-carousel <?php echo esc_attr($carousel_class); ?>">
                        <?php
                        if ($all_products->have_posts()) :
                            while ($all_products->have_posts()): $all_products->the_post();

                                storeship_get_block('default', 'product-loop');

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