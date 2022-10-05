<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


/**
 * Customizer
 *
 * @class   storeship
 */

if (!function_exists('storeship_custom_style')) {

    function storeship_custom_style()
    {
        $storeship_background_color = get_background_color();
        $storeship_background_color = '#' . $storeship_background_color;
        $storeship_main_banner_text_color = storeship_get_option('store_main_banner_text_color');
        global $storeship_google_fonts;
        $storeship_primary_font = $storeship_google_fonts[storeship_get_option('primary_font')];
        $storeship_secondary_font = $storeship_google_fonts[storeship_get_option('secondary_font')];

        ob_start();
        ?>

        <?php if (!empty($storeship_background_color)): ?>
        #sidr{
        background-color: <?php storeship_esc_custom_style($storeship_background_color) ?>;
        }
    <?php endif; ?>


        <?php if (!empty($storeship_main_banner_text_color)): ?>
        .content-caption .content-desc,
        .content-caption .cap-title {
        color: <?php storeship_esc_custom_style($storeship_main_banner_text_color) ?>;
        }
    <?php endif; ?>

        <?php if (!empty($storeship_primary_font)): ?>

        body,
        body button,
        body input,
        body select,
        body optgroup,
        div.sharedaddy h3.sd-title,
        body .section-title .title-note,
        body textarea {
        font-family: <?php storeship_esc_custom_style( $storeship_primary_font) ?> !important;
        }
    <?php endif; ?>

        <?php if (($storeship_secondary_font)): ?>
        .woocommerce .woocommerce-tabs h2,
        body span.header-after,
        section.related.products h2,
        div#respond h3#reply-title,
        body #sidr span.header-after,
        body #secondary .widget-title span,
        body footer .widget-title .header-after,
        body.woocommerce div.product .product_title,
        body.archive .content-area .page-title,
        body header.entry-header h1.entry-title,

        h1, h2, h3, h4, h5, h6,
        body .main-navigation a,
        body .font-family-1,
        body .trending-posts-line,
        body .exclusive-posts,
        body .widget-title,
        body .section-title,
        body .em-widget-subtitle,
        body .grid-item-metadata .item-metadata,
        body .af-navcontrols .slide-count,
        body .figure-categories .cat-links,
        body .nav-links a {
        font-family: <?php storeship_esc_custom_style( $storeship_secondary_font) ?>;
        }
    <?php endif; ?>


        <?php
        return ob_get_clean();
    }
}

if (!function_exists('storeship_esc_custom_style')) {

    function storeship_esc_custom_style($props)  {

        echo wp_kses( $props, array( "\'", '\"' ) );

    }
}
