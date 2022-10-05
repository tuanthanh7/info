<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Storeship
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if (function_exists('wp_body_open')) {
    wp_body_open();
} else {
    do_action('wp_body_open');
} ?>

<?php
$storeship_enable_preloader = storeship_get_option('enable_site_preloader');
if (1 == $storeship_enable_preloader):
    ?>
    <div id="af-preloader">
        <div class="af-spinner-container">
            <div class="af-spinners">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
<?php endif; ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'storeship'); ?></a>

    <?php $storeship_header_style = storeship_get_option('header_layout'); ?>
    <header id="masthead" class="site-header <?php echo esc_attr($storeship_header_style); ?>">

        <div class="banner-top-header-wrapper">
            <div class="container-wrapper">
                <?php do_action('storeship_action_top_header_section'); ?>
            </div>
        </div>
        <?php do_action('storeship_action_header_image'); ?>
        <?php storeship_get_block('default', 'header'); ?>
    </header><!-- #masthead -->





    <?php if (is_front_page()): ?>
        <?php if (class_exists('WooCommerce')) :

            $storeship_show_main_banner_section = storeship_get_option('show_main_banner_section');
            $storeship_show_top_categories_section = storeship_get_option('show_top_categories_section');

            $storeship_show_banner_advertisement_section = storeship_get_option('banner_advertisement_section');

            if (($storeship_show_main_banner_section == true) || ($storeship_show_top_categories_section == true) || ($storeship_show_banner_advertisement_section != '')):?>

                <?php

                $storeship_class = '';

                $storeship_banner_separator_layout = storeship_get_option('banner_separator_layout');

                $storeship_banner_image_placement = storeship_get_option('select_main_slider_image_placement');


                if ($storeship_banner_separator_layout == 'none') {
                    $storeship_class .= ' no-separator';
                }

                $storeship_class .= ' banner-img-position-background';

                $storeship_banner_type = storeship_get_option('select_main_slider_section_type');

                $storeship_class .= ' banner-layout-' . $storeship_banner_type;

                $storeship_banner_layout = storeship_get_option('select_main_slider_layout_mode');

                $storeship_class .= ' banner-layout-type-' . $storeship_banner_layout;

                $storeship_banner_layout = storeship_get_option('store_main_banner_text_background_mode');

                $storeship_class .= ' banner-title-background-' . $storeship_banner_layout;

                $storeship_banner_background = storeship_get_option('slider_custom_background');

                $storeship_banner_background_url = '';
                if (!empty($storeship_banner_background)) {
                    $storeship_class .= ' data-bgg';
                    $storeship_banner_background_url = wp_get_attachment_url($storeship_banner_background);
                }

                $storeship_class .= ' banner-layout-type-' . $storeship_banner_layout;

                // get current page we are on. If not set we can assume we are on page 1.
                $storeship_lite_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                // are we on page one?
                if (1 == $storeship_lite_paged):

                    ?>

                    <section class="main-banner-section-wrapper <?php echo esc_attr($storeship_class); ?>"
                             data-background="<?php echo esc_url($storeship_banner_background_url); ?>">

                        <?php

                        if ($storeship_banner_layout == 'wide-layout') {
                            $storeship_layout_class = 'wide-layout';
                        } else {
                            $storeship_layout_class = 'boxed-layout';
                        }

                        ?>
                        <div class="<?php echo esc_html($storeship_layout_class); ?>">
                            <?php storeship_get_block('banner-promotion'); ?>


                            <?php
                            if ($storeship_show_main_banner_section || $storeship_show_top_categories_section):

                                    storeship_get_block('default', 'main-banner');

                              endif; ?>


                        </div>


                    </section>

                    <?php if (is_shop()): ?>
                    <?php storeship_get_block('primary', 'featured'); ?>
                <?php endif; ?>

                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>



    <?php

    $storeship_container_class = (is_page_template('tmpl-front-page.php')) ? '' : 'container-wrapper';

    ?>

    <div id="content" class="site-content <?php echo esc_attr($storeship_container_class); ?>">

        <?php echo do_action('storeship_before_main_content'); ?>



