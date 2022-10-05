<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Storeship
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}


$global_layout = storeship_get_option('global_content_alignment');

$page_layout = $global_layout;


if ( class_exists('WooCommerce') ) {

    $hide_sidebar_for_cart_page = storeship_get_option('aft_hide_sidebar_for_cart_and_checkout');

    if ( is_cart() || is_checkout() ) {

        if (($hide_sidebar_for_cart_page == true)) {
            return;
        }

    }
}

if ($page_layout == 'full-width-content') {
    return;
}

?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
