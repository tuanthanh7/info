<?php
/**
 * Block Section Latest Product.
 *
 * @package Storeship
 */
?>

<?php

$storeship_title = storeship_get_option('featured_product_section_title');
$storeship_title_note = storeship_get_option('featured_product_section_title_note');
$storeship_number_of_items = storeship_get_option('number_of_featured_product');
$storeship_show_featured_products_only = storeship_get_option('show_featured_products_only');
$storeship_show = '';
if($storeship_show_featured_products_only){
    $storeship_show = 'featured';
}



$storeship_categories = array();

for ($storeship_i = 1; $storeship_i <= 2; $storeship_i++) {
    $storeship_category_id = storeship_get_option('featured_product_categories_' . $storeship_i);
    if (!empty($storeship_category_id)) {
        $storeship_categories[] = $storeship_category_id;
    }
}

?>

<div class="aft-product-grid-mode tabbed-products">

        <div class="section-head">
            <?php if (!empty($storeship_title)): ?>
                <h4 class="section-title">
                    <?php storeship_widget_title_section($storeship_title, $storeship_title_note); ?>
                </h4>
            <?php endif; ?>
        </div>

    <?php if (isset($storeship_categories)): ?>
        <div class="section-body">
            <div class="tabbed-head">
                <ul class="nav nav-tabs af-tabs tab-warpper" role="tablist">
                    <li class="tab">
                        <?php storeship_get_all_products_link(); ?>
                    </li>

                </ul>
            </div>

            <div class="tab-content">
                <?php
                $storeship_count = 1;
                foreach ($storeship_categories as $storeship_category):
                    $storeship_all_posts = storeship_get_products($storeship_number_of_items, $storeship_category, $storeship_show);
                    $storeship_class = ($storeship_count == 1) ? 'active' : '';
                    ?>
                    <div id="tabbed-product-<?php echo esc_attr($storeship_count); ?>"
                         role="tabpanel"
                         class="tab-pane product-section-wrapper <?php echo esc_attr($storeship_class); ?>">
                        <ul class="products product-ul">
                            <?php
                            if ($storeship_all_posts->have_posts()) :
                                while ($storeship_all_posts->have_posts()): $storeship_all_posts->the_post();
                                    ?>
                                    <?php storeship_get_block('default', 'product-loop'); ?>
                                <?php endwhile;
                            endif;
                            wp_reset_postdata(); ?>
                        </ul>
                    </div>
                    <?php
                    $storeship_count++;
                endforeach; ?>
                <!--  First tab ends-->
            </div>
        </div>

    <?php endif; ?>
</div>