<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Storeship
 */


$storeship_global_layout = storeship_get_option('store_global_alignment');
$storeship_page_layout = $storeship_global_layout;

if ($storeship_page_layout == 'full-width-content') {
    return;
}

if (is_singular('product')):
    if (!is_active_sidebar('single-product-sidebar-widgets')) {
        return;
    }
    ?>

    <aside id="secondary" class="widget-area">
        <?php dynamic_sidebar('single-product-sidebar-widgets'); ?>
    </aside><!-- #secondary -->
<?php else:
    if (!is_active_sidebar('shop-sidebar-widgets')) {
        return;
    }

    ?>
    <aside id="secondary" class="widget-area">
        <?php dynamic_sidebar('shop-sidebar-widgets'); ?>
    </aside><!-- #secondary -->

<?php endif; ?>
