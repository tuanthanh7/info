<?php
/**
 * Customizer callback functions for active_callback.
 *
 * @package Storeship
 */

/*select page for slider*/
if (!function_exists('storeship_frontpage_content_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_frontpage_content_status($control)
    {

        if ('page' == $control->manager->get_setting('show_on_front')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for trending news*/
if (!function_exists('storeship_flash_posts_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_flash_posts_section_status($control)
    {

        if (true == $control->manager->get_setting('show_flash_news_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for trending news*/
if (!function_exists('storeship_top_header_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_top_header_status($control)
    {

        if (true == $control->manager->get_setting('show_top_header')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for trending news*/
if (!function_exists('storeship_header_image_background_option_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_header_image_background_option_status($control)
    {

        if ('cover' != $control->manager->get_setting('header_image_background_option')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for trending news*/
if (!function_exists('storeship_header_image_background_option_repeat_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_header_image_background_option_repeat_status($control)
    {

        if (true == $control->manager->get_setting('header_image_background_option_repeat')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*show custom link option */
if (!function_exists('storeship_show_custom_link_text_option')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_show_custom_link_text_option($control)
    {

        if (true == $control->manager->get_setting('enable_custom_link_option')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

//Top categories
if (!function_exists('storeship_top_categories_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_top_categories_section_status($control)
    {

        if (true == $control->manager->get_setting('show_top_categories_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('storeship_frontpage_main_banner_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_frontpage_main_banner_status($control)
    {

        if (true == $control->manager->get_setting('show_main_banner_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;



/*select page for slider*/
if (!function_exists('storeship_frontpage_main_banner_page_content_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_frontpage_main_banner_page_content_status($control)
    {

        if ('page-content' == $control->manager->get_setting('select_main_slider_content')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('storeship_frontpage_main_banner_custom_content_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_frontpage_main_banner_custom_content_status($control)
    {

        if ('custom-content' == $control->manager->get_setting('select_main_slider_content')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('storeship_frontpage_main_banner_thumbs_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_frontpage_main_banner_thumbs_status($control)
    {

        if ('thumbs' == $control->manager->get_setting('select_main_slider_section_type')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('storeship_main_slider_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_main_slider_section_status($control)
    {

        if (true == $control->manager->get_setting('show_main_banner_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('storeship_main_slider_image_placement_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_main_slider_image_placement_status($control)
    {

        if ('full-background' == $control->manager->get_setting('select_main_slider_image_placement')->value()) {
            return false;
        } else {
            return true;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('storeship_footer_carousel_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_footer_carousel_section_status($control)
    {

        if ('carousel' == $control->manager->get_setting('select_footer_slider_section_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


//Slider and Carousel

if (!function_exists('storeship_footer_slider_section_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_footer_slider_section_mode_status($control)
    {

        if ('slider' == $control->manager->get_setting('select_footer_slider_section_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('storeship_footer_carousel_section_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_footer_carousel_section_mode_status($control)
    {

        if ('carousel' == $control->manager->get_setting('select_footer_slider_section_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('storeship_footer_brand_section_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_footer_brand_section_mode_status($control)
    {

        if (true == $control->manager->get_setting('show_store_features_footer_brand_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('storeship_footer_testimonial_section_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_footer_testimonial_section_mode_status($control)
    {

        if (true == $control->manager->get_setting('show_store_features_footer_testimonial_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('storeship_footer_cta_section_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_footer_cta_section_mode_status($control)
    {

        if (true == $control->manager->get_setting('show_store_features_footer_cta_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;
/*select page for slider*/
if (!function_exists('storeship_featured_footer_slider_section_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_featured_footer_slider_section_mode_status($control)
    {

        if (true == $control->manager->get_setting('show_store_features_footer_slider_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('storeship_store_features_tab_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_store_features_tab_section_status($control)
    {

        if (true == $control->manager->get_setting('show_featured_product_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('storeship_store_features_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_store_features_section_status($control)
    {

        if (true == $control->manager->get_setting('show_store_features_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('storeship_featured_product_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_featured_product_section_status($control)
    {

        if (true == $control->manager->get_setting('show_featured_products_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('storeship_show_express_product_lists_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_show_express_product_lists_section_status($control)
    {

        if (true == $control->manager->get_setting('show_express_product_lists_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('storeship_store_offers_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_store_offers_section_status($control)
    {

        if (true == $control->manager->get_setting('show_store_offers')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('storeship_featured_category_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_featured_category_section_status($control)
    {

        if (true == $control->manager->get_setting('show_featured_categories_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('storeship_latest_news_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_latest_news_section_status($control)
    {

        if (true == $control->manager->get_setting('frontpage_show_latest_posts')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('storeship_footer_show_store_contact_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_footer_show_store_contact_status($control)
    {

        if (true == $control->manager->get_setting('footer_show_store_contact')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('storeship_archive_image_status')) :

    /**
     * Check if archive no image is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_archive_image_status($control)
    {

        if ('archive-layout-list' == $control->manager->get_setting('archive_layout')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*related posts*/
if (!function_exists('storeship_related_posts_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_related_posts_status($control)
    {

        if (true == $control->manager->get_setting('single_show_related_posts')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*related posts*/
if (!function_exists('storeship_minicart_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_minicart_status($control)
    {

        if (false == $control->manager->get_setting('disable_header_cart_menu')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*Wishlist icon*/
if (!function_exists('storeship_wishlist_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_wishlist_status($control)
    {

        if (false == $control->manager->get_setting('disable_header_wishlist_menu')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*Wishlist icon*/
if (!function_exists('storeship_my_account_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_my_account_status($control)
    {

        if (false == $control->manager->get_setting('disable_header_account_menu')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;



/*related posts*/
if (!function_exists('storeship_product_page_related_products_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_product_page_related_products_status($control)
    {

        if ('yes' == $control->manager->get_setting('store_product_page_related_products')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*mailchimp*/
if (!function_exists('storeship_mailchimp_subscriptions_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_mailchimp_subscriptions_status($control)
    {

        if (true == $control->manager->get_setting('footer_show_mailchimp_subscriptions')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('storeship_footer_instagram_posts_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_footer_instagram_posts_status($control)
    {

        if (true == $control->manager->get_setting('footer_show_instagram_post_carousel')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('storeship_list_top_categories_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_list_top_categories_section_status($control)
    {

        if ('list-only' == $control->manager->get_setting('select_top_categories_section_mode')->value() || 'show-nested-subcategories' == $control->manager->get_setting('select_top_categories_section_mode')->value() || 'show-subcategories-and-products' == $control->manager->get_setting('select_top_categories_section_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('storeship_on_hover_top_categories_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_on_hover_top_categories_section_status($control)
    {

        if ('list-only' == $control->manager->get_setting('select_top_categories_section_mode')->value() || 'selected-categories' == $control->manager->get_setting('select_top_categories_section_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('storeship_selected_top_categories_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_selected_top_categories_section_status($control)
    {

        if ('selected-categories' == $control->manager->get_setting('select_top_categories_section_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*storeship_product_loop_color_status*/
if (!function_exists('storeship_product_loop_color_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_product_loop_color_status($control)
    {

        if ('custom-color' == $control->manager->get_setting('aft_product_loop_color')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*storeship_product_loop_color_status*/
if (!function_exists('storeship_product_search_color_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_product_search_color_status($control)
    {

        if ('custom-color' == $control->manager->get_setting('store_product_search_color')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*storeship_global_color_mode_status*/
//if (!function_exists('storeship_global_color_mode_status')) :
//
//    /**
//     * Check if slider section page/post is active.
//     *
//     * @param WP_Customize_Control $control WP_Customize_Control instance.
//     *
//     * @return bool Whether the control is active to the current preview.
//     * @since 1.0.0
//     *
//     */
//    function storeship_global_color_mode_status($control)
//    {
//
//        if ('default' == $control->manager->get_setting('global_color_mode')->value()) {
//            return true;
//        } else {
//            return false;
//        }
//
//    }
//
//endif;

/*storeship_dark_color_mode_status*/
//if (!function_exists('storeship_dark_color_mode_status')) :
//
//    /**
//     * Check if slider section page/post is active.
//     *
//     * @param WP_Customize_Control $control WP_Customize_Control instance.
//     *
//     * @return bool Whether the control is active to the current preview.
//     * @since 1.0.0
//     *
//     */
//    function storeship_dark_color_mode_status($control)
//    {
//
//        if ('aft-dark-mode' == $control->manager->get_setting('global_color_mode')->value()) {
//            return true;
//        } else {
//            return false;
//        }
//
//    }
//
//endif;

if (!function_exists('storeship_content_section_1')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_content_section_1($control)
    {

        if (true == $control->manager->get_setting('show_content_section_1')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

if (!function_exists('storeship_content_section_2')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_content_section_2($control)
    {

        if (true == $control->manager->get_setting('show_content_section_2')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

if (!function_exists('storeship_content_section_3')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_content_section_3($control)
    {

        if (true == $control->manager->get_setting('show_content_section_3')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


if (!function_exists('storeship_content_section_4')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_content_section_4($control)
    {

        if (true == $control->manager->get_setting('show_content_section_4')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


if (!function_exists('storeship_content_section_5')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_content_section_5($control)
    {

        if (true == $control->manager->get_setting('show_content_section_5')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


// Images section show/hide
if (!function_exists('storeship_content_section_image_1')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_content_section_image_1($control)
    {

        if ('carousel' == $control->manager->get_setting('content_section_1_type')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

if (!function_exists('storeship_content_section_image_2')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_content_section_image_2($control)
    {

        if ('carousel' == $control->manager->get_setting('content_section_2_type')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

if (!function_exists('storeship_content_section_image_3')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_content_section_image_3($control)
    {

        if ('carousel' == $control->manager->get_setting('content_section_3_type')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

if (!function_exists('storeship_content_section_image_3')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_content_section_image_3($control)
    {

        if ('carousel' == $control->manager->get_setting('content_section_3_type')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

if (!function_exists('storeship_content_section_image_4')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_content_section_image_4($control)
    {

        if ('carousel' == $control->manager->get_setting('content_section_4_type')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

if (!function_exists('storeship_content_section_image_5')) :

    /**
     * Check if slider section page/post is active.
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     * @since 1.0.0
     *
     */
    function storeship_content_section_image_5($control)
    {

        if ('carousel' == $control->manager->get_setting('content_section_5_type')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;




