<?php
/**
 * Block Frontpage Section.
 *
 * @package Storeship
 */

$storeship_background_class = '';
$storeship_show_featured_cat_section = storeship_get_option('show_featured_categories_section');
$storeship_show_featured_products_section = storeship_get_option('show_featured_product_section');
$storeship_store_offers_status = storeship_get_option('show_store_offers');
$storeship_show_store_features_section = storeship_get_option('show_store_features_section');
$storeship_content_separator_layout = storeship_get_option('content_separator_layout');
$storeship_separator_layout_class = '';
if($storeship_content_separator_layout != 'none'){
    $storeship_separator_layout_class = 'has-content-separator';
}
$storeship_content_blob_layout = storeship_get_option('content_blob_layout');

?>


<?php if ($storeship_show_store_features_section || $storeship_store_offers_status || $storeship_show_featured_products_section ): ?>
    <div class="frontpage-featured-section-wrapper <?php echo esc_attr($storeship_separator_layout_class); ?>">
        <?php

        if ($storeship_show_store_features_section):
            storeship_get_block('store-features', 'section');
        endif;

        if ($storeship_show_featured_products_section):

            if (class_exists('WooCommerce')):
                ?>
                <section
                        class="frontpage-content-section tabbed">
                    <div class="container-wrapper">
                        <?php storeship_get_block('frontpage-tabbed', 'section'); ?>
                    </div>
                </section>

            <?php
            endif;
        endif;

        if ($storeship_store_offers_status):
            $storeship_show_feature_thumb_on_header = storeship_get_option('show_store_features_thumb_on_section');
            $store_offers_layout = storeship_get_option('store_offers_layout');
            ?>

            <div class="left-grid-section-wrapper <?php echo esc_attr($store_offers_layout); ?>">
                <div class="container-wrapper">
                    <div class="af-container-row clearfix">
                        <?php storeship_get_block('featured-thumb'); ?>
                    </div>
                </div>
            </div>
        <?php
        endif;
        ?>


    </div>
<?php endif;