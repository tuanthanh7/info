<?php
/**
 * Default theme options.
 *
 * @package Storeship
 */

if (!function_exists('storeship_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function storeship_get_default_theme_options() {

    $defaults = array();
    // Preloader options section
    $defaults['enable_site_preloader'] = 1;

    // Header options section
    $defaults['header_layout'] = 'default';
    $defaults['header_layout_transparency'] = 'default';
    $defaults['header_top_bottom_padding'] = 35;
    $defaults['header_custom_link_text'] = __('Visit Store','storeship');
    $defaults['disable_header_cart_menu'] = 0;
    $defaults['disable_header_wishlist_menu'] = 0;
    $defaults['disable_header_account_menu'] = 0;
    $defaults['disable_header_search_bar'] = 0;
    $defaults['enable_custom_link_option'] = 1;
    $defaults['header_custom_text_link'] = '';
    
    $store_offers_number = 3;
    $defaults['show_store_offers'] = 0;
    $defaults['store_offers_layout'] = 'default';

    for ($i = 1; $i <= $store_offers_number; $i++) {
        $defaults['store_offers_discount_texts_' . $i] = __('50% Off','storeship');
        $defaults['store_offers_title_' . $i] = __('Discover over 850 Brands','storeship');
        $defaults['store_offers_subtitle_' . $i] = __('Visit our shop to see amazing products','storeship');
        $defaults['store_offers_button_' . $i] = __('Grab the Offer','storeship');
        $defaults['store_offers_link_' . $i] = '#';
    }

    $defaults['show_top_header'] = 1;
    $defaults['show_top_header_store_contacts'] = 1;
    $defaults['show_top_header_social_contacts'] = 1;

    $defaults['footer_show_store_contact'] = 1;
    $defaults['footer_store_contact_scopes'] = 'front-page';

    $defaults['show_top_menu'] = 0;
    $defaults['show_social_menu_section'] = 1;
    $defaults['show_minicart_section'] = 1;



    $defaults['header_my_account_icon'] = 'fa-user-circle-o';
    $defaults['header_cart_icon'] = 'fa-shopping-bag';
    $defaults['header_wishlist_icon'] = 'fa-heart-o';

    $defaults['add_to_wishlist_icon'] = 'fa fa-heart-o';
    $defaults['already_in_wishlist_icon'] = 'fa fa-heart';

    $defaults['header_image_background_option'] = 'cover';
    $defaults['header_image_background_option_fixed'] = 0;
    $defaults['header_image_background_option_repeat'] = 0;
    $defaults['header_image_background_position'] = 'center';
    $defaults['header_image_background_option_repeat_dir'] = 'repeat';
    $defaults['header_image_url'] = '#';
    $defaults['header_image_url_target'] = 0;

    $defaults['show_offpanel_menu_section'] = 1;

    $defaults['frontpage_main_banner_status'] =0;
    $defaults['banner_advertisement_section'] = '';
    $defaults['banner_advertisement_section_url'] = '';
    $defaults['banner_advertisement_open_on_new_tab'] = 0;



    // breadcrumb options section
    $defaults['enable_general_breadcrumb'] = 'yes';
    $defaults['select_breadcrumb_mode'] = 'simple';



    $defaults['show_latest_product_section'] = 0;
    $defaults['latest_product_section_title'] = 'Latest Products';
    $defaults['latest_product_section_title_note'] = 'New';
    $defaults['latest_product_categories'] = 0;
    $defaults['number_of_latest_product'] = 4;

    $defaults['show_main_banner_section'] = 0;

    $defaults['show_top_categories_section'] = 1;
    $defaults['top_categories_section_title'] = 'Shop by Categories';
    $defaults['top_categories_1'] = 0;
    $defaults['top_categories_2'] = 0;
    $defaults['top_categories_3'] = 0;
    $defaults['top_categories_4'] = 0;
    $defaults['top_categories_5'] = 0;
    $defaults['top_categories_6'] = 0;
    $defaults['top_categories_7'] = 0;
    $defaults['top_categories_8'] = 0;
    $defaults['top_categories_9'] = 0;
    $defaults['top_categories_10'] = 0;
    $defaults['show_top_categories_product_count'] = 'true';
    $defaults['show_top_categories_product_onsale_count'] = 'true';
    $defaults['select_top_categories_section_mode'] = 'list-only';

    $defaults['select_top_categories_on_hover'] = 'top-3-products';
    $defaults['select_top_categories_orderby'] = 'name';
    $defaults['select_top_categories_order'] = 'ASC';





    // Slider
    $defaults['slider_autoplay_status']         = true;
    $defaults['slider_pager_status']            = true;
    $defaults['slider_transition_effect']       = 'fade';
    $defaults['slider_transition_delay']        = 3;

    $defaults['title_custom_1'] = 'Title For Main Banner Custom Slide';
    $defaults['title_custom_2'] = 'Title For Main Banner Custom Slide';
    $defaults['title_custom_3'] = 'Title For Main Banner Custom Slide';
    $defaults['title_custom_4'] = 'Title For Main Banner Custom Slide';
    $defaults['title_custom_5'] = 'Title For Main Banner Custom Slide';

    $defaults['subtitle_custom_1'] = 'Main Banner Subtitle';
    $defaults['subtitle_custom_2'] = 'Main Banner Subtitle';
    $defaults['subtitle_custom_3'] = 'Main Banner Subtitle';
    $defaults['subtitle_custom_4'] = 'Main Banner Subtitle';
    $defaults['subtitle_custom_5'] = 'Main Banner Subtitle';

    $defaults['button_text_1'] = 'Shop Now';
    $defaults['button_text_3'] = 'Read More';
    $defaults['button_text_2'] = 'Explore';
    $defaults['button_text_4'] = 'View More';
    $defaults['button_text_5'] = 'Shop More';

    $defaults['button_link_1'] = '#';
    $defaults['button_link_3'] = '#';
    $defaults['button_link_2'] = '#';
    $defaults['button_link_4'] = '#';
    $defaults['button_link_5'] = '#';

    $defaults['banner_title_animation_1'] = 'title-animation-default';
    $defaults['banner_title_animation_3'] = 'title-animation-default';
    $defaults['banner_title_animation_2'] = 'title-animation-default';
    $defaults['banner_title_animation_4'] = 'title-animation-default';
    $defaults['banner_title_animation_5'] = 'title-animation-default';


    $defaults['custom_caption_position_1']             = 'left';
    $defaults['custom_caption_position_2']             = 'left';
    $defaults['custom_caption_position_3']             = 'left';
    $defaults['custom_caption_position_4']             = 'left';
    $defaults['custom_caption_position_5']             = 'left';

    //thumbs
    $defaults['title_custom_thumbs_1'] = 'Banner Offer Title';
    $defaults['title_custom_thumbs_2'] = 'Banner Sale Title';

    $defaults['subtitle_custom_thumbs_1'] = 'Offer Subtitle';
    $defaults['subtitle_custom_thumbs_2'] = 'Sale Subtitle';

    $defaults['thumbs_button_text_1'] = 'Grab the Offer';
    $defaults['thumbs_button_text_2'] = 'Purchase Now';

    $defaults['thumbs_button_link_1'] = '#';
    $defaults['thumbs_button_link_2'] = '#';

    $defaults['custom_thumbs_caption_position_1']             = 'left';
    $defaults['custom_thumbs_caption_position_2']             = 'right';

    
    
    //featured-footer
    $defaults['title_custom_footer_1'] = 'Fermentum';
    $defaults['title_custom_footer_2'] = 'Semper';
    $defaults['title_custom_footer_3'] = 'Nihil';
    $defaults['title_custom_footer_4'] = 'Velit';
    $defaults['title_custom_footer_5'] = 'Rhoncus';
    
    $defaults['subtitle_custom_footer_1'] = 'Nihil vel congue tenetur';
    $defaults['subtitle_custom_footer_2'] = 'Velit, rutrum, morbi!';
    $defaults['subtitle_custom_footer_3'] = 'Semper cum hendrerit, fuga?';
    $defaults['subtitle_custom_footer_4'] = 'Rhoncus lorem amet';
    $defaults['subtitle_custom_footer_5'] = 'Fermentum voluptatum nisi distinctio';
    
    $defaults['button_text_footer_1'] = 'Shop Now';
    $defaults['button_text_footer_3'] = 'Read More';
    $defaults['button_text_footer_2'] = 'Explore';
    $defaults['button_text_footer_4'] = 'View More';
    $defaults['button_text_footer_5'] = 'Shop More';
    
    $defaults['button_link_footer_1'] = '#';
    $defaults['button_link_footer_3'] = '#';
    $defaults['button_link_footer_2'] = '#';
    $defaults['button_link_footer_4'] = '#';
    $defaults['button_link_footer_5'] = '#';
    
    
    $defaults['custom_caption_position_footer_1']             = 'left';
    $defaults['custom_caption_position_footer_2']             = 'right';
    $defaults['custom_caption_position_footer_3']             = 'left';
    $defaults['custom_caption_position_footer_4']             = 'right';
    $defaults['custom_caption_position_footer_5']             = 'left';

    $defaults['show_store_features_footer_slider_section']=0;
    
    //Brands
    $defaults['section_brand_title'] = __('Brands','storeship');
    $defaults['show_brand_section_on'] = 'default-footer';
    $defaults['show_store_features_footer_brand_section'] =0;
    
    //Testimonials
    $defaults['section_testimonial_title'] = __('Testimonials','storeship');
    $defaults['show_store_features_footer_testimonial_section']=0;
    $defaults['testimonial_layout_option']='layout-1';

    //Call to action
    $defaults['section_cta_title']=__('Step out in this Summer','storeship');
    $defaults['section_cta_subtitle'] = __('25% Off On 6 Genius Gadgets To Keep You Cool','storeship');
    $defaults['show_cta_section_on'] = 'default-footer';
    
    $defaults['cta_button_text'] = __('Shop Now','storeship');
    $defaults['cta_button_link'] = '#';
    $defaults['features_footer_cta_background_image_fixed'] =1;
    $defaults['show_store_features_footer_cta_section']=1;
    
    
    
    
    // Frontpage Section.
    
    $defaults['show_flash_news_section'] = 1;
    $defaults['flash_news_title'] = __('Flash Story', 'storeship');
    $defaults['select_flash_news_category'] = 0;
    $defaults['number_of_flash_news'] = 5;
    $defaults['banner_flash_news_scope'] = 'front-page-only';



    $defaults['main_news_slider_title'] = __('Main Story', 'storeship');
    $defaults['select_slider_news_category'] = 0;
    $defaults['select_main_slider_content'] = 'page-content';
    $defaults['select_main_slider_section_type'] = 'default';
    $defaults['select_main_slider_section_mode'] = 'slider';
    $defaults['select_main_slider_layout_mode'] = 'boxed-layout';
    $defaults['select_main_slider_image_placement'] = 'background';
    $defaults['banner_separator_layout'] = 'none';
    $defaults['banner_blob_layout'] = 'none';
    $defaults['number_of_slides'] = 5;
    
    $defaults['select_carousel_setting_option'] = 'carousel-3';
    $defaults['add_carousel_speed_setting_option'] = '8000';
    $defaults['add_carousel_slide_to_scroll_option'] =1;
    
    
    $defaults['select_footer_slider_section_mode'] = 'slider';
    $defaults['select_footer_carousel_setting_option'] = 'carousel-3';
    $defaults['add_footer_carousel_speed_setting_option'] = 8000;
    $defaults['add_footer_carousel_slide_to_scroll_option'] = 1;



    $defaults['show_store_features_section'] = 1;
    $defaults['show_store_features_on_section'] = 'header-default';

    $defaults['show_store_features_thumb_section_title']= __('Store Features Thumb','storeship');

    $defaults['show_store_features_thumb_on_section'] = 'header-default';
    $defaults['store_features_icon_1'] = 'fa fa-paper-plane';
    $defaults['store_features_icon_2'] = 'fa fa-gift';
    $defaults['store_features_icon_3'] = 'fa fa-life-ring';
    $defaults['store_features_icon_4'] = '';
    $defaults['store_features_title_1'] = 'Free Shipping';
    $defaults['store_features_title_2'] = 'Get Discount';
    $defaults['store_features_title_3'] = '24/7 Suport';
    $defaults['store_features_title_4'] = '';
    $defaults['store_features_desc_1'] = 'On all orders over $75.00';
    $defaults['store_features_desc_2'] = 'Get Coupon & Discount';
    $defaults['store_features_desc_3'] = 'We will be at your service';
    $defaults['store_features_desc_4'] = '';


    $defaults['store_features_link_1'] = '';
    $defaults['store_features_link_2'] = '';
    $defaults['store_features_link_3'] = '';
    $defaults['store_features_link_4'] = '';


    $defaults['show_featured_categories_section'] = 0;
    $defaults['featured_categories_section_title'] = 'Featured Categories';
    $defaults['featured_categories_section_title_note'] = '';
    $defaults['featured_categories_1'] = 0;
    $defaults['featured_categories_2'] = 0;
    $defaults['featured_categories_3'] = 0;
    $defaults['featured_categories_4'] = 0;
    $defaults['featured_categories_5'] = 0;
    $defaults['featured_categories_6'] = 0;
    $defaults['show_featured_categories_product_count'] = 'true';
    $defaults['show_featured_categories_product_onsale_count'] = 'true';

    
    $defaults['show_featured_product_section'] = 0;
    $defaults['featured_product_section_title'] = 'Featured Products';
    $defaults['featured_product_section_title_note'] = '';
    $defaults['featured_product_categories_1'] = 0;
    $defaults['featured_product_categories_2'] = 0;
    $defaults['number_of_featured_product'] = 4;
    $defaults['show_featured_products_only'] = 0;



    $defaults['content_separator_layout'] = 'none';
    $defaults['content_blob_layout'] = 'none';

    $defaults['show_content_section_1'] = 1;
    $defaults['show_content_section_2'] = 1;
    $defaults['show_content_section_3'] = 1;
    $defaults['show_content_section_4'] = 0;
    $defaults['show_content_section_5'] = 0;


    $defaults['content_section_1_type'] = 'grid';
    $defaults['content_section_2_type'] = 'list';
    $defaults['content_section_3_type'] = 'grid';
    $defaults['content_section_4_type'] = '';
    $defaults['content_section_5_type'] = '';


    $defaults['content_section_1_layout'] = 'default';
    $defaults['content_section_2_layout'] = 'default';
    $defaults['content_section_3_layout'] = 'default';
    $defaults['content_section_4_layout'] = 'default';
    $defaults['content_section_5_layout'] = 'default';


    $defaults['content_section_1_title'] = 'Product Grid Section';
    $defaults['content_section_2_title'] = 'Product List Section';
    $defaults['content_section_3_title'] = 'Product Grid Section';
    $defaults['content_section_4_title'] = '';
    $defaults['content_section_5_title'] = '';




    $defaults['content_section_1_title_note'] = 'Exciting Sale';
    $defaults['content_section_2_title_note'] = '50% Discount';
    $defaults['content_section_3_title_note'] = 'Summer Offer';
    $defaults['content_section_4_title_note'] = '';
    $defaults['content_section_5_title_note'] = '';


    $defaults['content_section_1_image'] = '';
    $defaults['content_section_2_image'] = '';
    $defaults['content_section_3_image'] = '';
    $defaults['content_section_4_image'] = '';
    $defaults['content_section_5_image'] = '';

    $defaults['content_section_1_image_pos'] = 'left';
    $defaults['content_section_2_image_pos'] = 'left';
    $defaults['content_section_3_image_pos'] = 'left';
    $defaults['content_section_4_image_pos'] = 'left';
    $defaults['content_section_5_image_pos'] = 'left';


    $defaults['content_section_1_product_categories'] = 0;
    $defaults['content_section_2_product_categories'] = 0;
    $defaults['content_section_3_product_categories'] = 0;
    $defaults['content_section_4_product_categories'] = 0;
    $defaults['content_section_5_product_categories'] = 0;


    $defaults['number_of_content_section_1_product'] = 5;
    $defaults['number_of_content_section_2_product'] = 4;
    $defaults['number_of_content_section_3_product'] = 4;
    $defaults['number_of_content_section_4_product'] = 4;
    $defaults['number_of_content_section_5_product'] = 4;



    $defaults['frontpage_content_alignment'] = 'align-content-left';

    //layout options
    $defaults['global_content_layout'] = 'default-content-layout';
    $defaults['global_content_alignment'] = 'align-content-left';
    $defaults['global_image_alignment'] = 'full-width-image';
    $defaults['global_post_date_author_setting'] = 'show-date-author';
    $defaults['global_excerpt_length'] = 20;
    $defaults['global_read_more_texts'] = __('Read more', 'storeship');

    $defaults['archive_layout'] = 'archive-layout-grid';
    $defaults['archive_image_alignment'] = 'archive-image-left';
    $defaults['archive_content_view'] = 'archive-content-excerpt';
    $defaults['disable_main_banner_on_blog_archive'] = 0;

    //Related posts
    $defaults['single_show_related_posts'] = 1;
    $defaults['single_related_posts_title']     = __( 'More Stories', 'storeship' );
    $defaults['single_number_of_related_posts']  = 6;

    //Related posts
    $defaults['store_contact_name'] = __( 'Make Contact with Us', 'storeship' );
    $defaults['store_contact_address'] = '107-95 West Brooklyn, USA';
    $defaults['store_contact_phone']     = '+1 212-0123456789';
    $defaults['store_contact_email']  = 'contact@mail.com';


    //Secure Payment Options
    $defaults['secure_payment_badge'] = '';
    $defaults['secure_payment_badge_url'] = '';
    $defaults['secure_payment_badge_open_in_new_tab'] = 1;

    //Pagination.
    $defaults['site_pagination_type'] = 'default';

    //Mailchimp
    $defaults['footer_show_mailchimp_subscriptions'] = 0;
    $defaults['footer_mailchimp_subscriptions_scopes'] = 'front-page';
    $defaults['footer_mailchimp_title']     = __( 'Subscribe To  Our Newsletter', 'storeship' );
    $defaults['footer_mailchimp_subtitle']     = __( 'Magna aspernatur eget potenti molestias beatae!', 'storeship' );
    $defaults['footer_mailchimp_shortcode']  = '';
    $defaults['footer_mailchimp_subscriptions_layout']  = 'layout-1';



    // Footer.
    // Latest posts
    $defaults['frontpage_show_latest_posts'] = 1;
    $defaults['footer_latest_posts_scopes'] = 'front-page';
    $defaults['frontpage_latest_posts_section_title'] = __('Latest Posts', 'storeship');
    $defaults['frontpage_latest_posts_category'] = 0;
    $defaults['number_of_frontpage_latest_posts'] = 4;

    //Instagram
    $defaults['footer_show_instagram_post_carousel'] = 1;
    $defaults['footer_instagram_post_carousel_scopes'] = 'front-page';
    $defaults['instagram_username'] = 'your_username';
    $defaults['instagram_access_token'] = 'IGQVJWcVlmYmo0RWV6b1pQN2lXWExmenIwMjRKS3EyNXlnSnZAOUVk3TmE5OXNPSHNqaGlXeU5Rdi1QclJqU2hHSjVLSk5vUVNKbVR1R0djbDdkczY1TVhrRF9NRU8yM0Y5ckNjUHZAjc0NOWDJSYm51NgZDZD';
    $defaults['number_of_instagram_posts'] = 10;

    $defaults['footer_scroll_to_top_position'] = 'right-side';
    $defaults['footer_scroll_to_top_icon'] = 'fa fa-angle-up';



    $defaults['footer_copyright_text'] = esc_html__('Copyright &copy; All rights reserved.', 'storeship');
    $defaults['hide_footer_menu_section']  = 0;
    $defaults['hide_footer_site_title_section']  = 0;
    $defaults['hide_footer_copyright_credits']  = 0;
    $defaults['number_of_footer_widget']  = 3;




    // font and color options


    $defaults['site_preloader_background'] = '#ffffff';
    $defaults['site_preloader_spinner_color'] = '#E65339';
    $defaults['footer_mailchimp_background_color']  = '#111111';
    $defaults['footer_mailchimp_texts_color']  = '#ffffff';
    $defaults['primary_footer_background_color']  = '#252525';
    $defaults['primary_footer_texts_color']  = '#ffffff';
    $defaults['secondary_footer_background_color']  = '#222222';
    $defaults['secondary_footer_texts_color']  = '#ffffff';
    $defaults['footer_credits_background_color']  = '#111111';
    $defaults['footer_credits_texts_color']  = '#ffffff';
    $defaults['primary_color']     = '#111111';
    $defaults['secondary_title_color']     = '#111111';
    $defaults['tertiary_title_color']     = '#ffffff';
    $defaults['secondary_color']     = '#E65339';
    $defaults['texts_over_secondary_color']     = '#ffffff';
    $defaults['secondary_background_color']     = '#ffffff';
    $defaults['tertiary_background_color']     = '#f9f9f9';
    $defaults['link_color']     = '#3b195b';
    $defaults['primary_title_color']     = '#111111';

    $defaults['primary_border_color']     = '#ffffff';
    $defaults['main_navigation_background_color']     = '#ffffff';
    $defaults['main_navigation_link_color']     = '#111111';
    $defaults['main_navigation_icon_color']     = '#111111';
    $defaults['menu_badge_background']     = '#e65238';
    $defaults['menu_badge_color']     = '#ffffff';
    $defaults['global_badge_background']     = '#e65238';
    $defaults['global_badge_color']     = '#ffffff';
    $defaults['sale_badge_background']     = '#6dc34a';
    $defaults['sale_badge_color']     = '#ffffff';

    $defaults['title_over_image_color']     = '#ffffff';
    $defaults['store_product_search_custom_background_color']    = '#ffffff';
    $defaults['store_product_search_custom_text_color']    = '#ffffff';
    $defaults['store_main_banner_background_color_1']    = '#eaeaea';
    $defaults['store_main_banner_background_color_2']    = '#e9eaea';
    $defaults['store_main_banner_text_color']    = '#111111';
    $defaults['store_main_banner_text_background_mode']    = 'none';



    //font option




//font options additional value
    global $storeship_google_fonts;
    $storeship_google_fonts = array(
        'ABeeZee:400,400italic'                     => 'ABeeZee',
        'Abel'                                      => 'Abel',
        'Abril+Fatface'                             => 'Abril Fatface',
        'Aldrich'                                   => 'Aldrich',
        'Alegreya:400,400italic,700,900'            => 'Alegreya',
        'Alex+Brush'                                => 'Alex Brush',
        'Alfa+Slab+One'                             => 'Alfa Slab One',
        'Amaranth:400,400italic,700'                => 'Amaranth',
        'Andada'                                    => 'Andada',
        'Anton'                                     => 'Anton',
        'Archivo+Black'                             => 'Archivo Black',
        'Arapey:400,400i'                           => 'Arapey',
        'Archivo+Narrow:400,400italic,700'          => 'Archivo Narrow',
        'Arimo:400,400italic,700'                   => 'Arimo',
        'Arvo:400,400italic,700'                    => 'Arvo',
        'Asap:400,400italic,700'                    => 'Asap',
        'Bangers'                                   => 'Bangers',
        'BenchNine:400,700'                         => 'BenchNine',
        'Bevan'                                     => 'Bevan',
        'Bitter:400,400italic,700'                  => 'Bitter',
        'Bree+Serif'                                => 'Bree Serif',
        'Cabin:400,400italic,500,600,700'           => 'Cabin',
        'Cabin+Condensed:400,500,600,700'           => 'Cabin Condensed',
        'Cantarell:400,400italic,700'               => 'Cantarell',
        'Carme'                                     => 'Carme',
        'Cherry+Cream+Soda'                         => 'Cherry Cream Soda',
        'Cinzel:400,700,900'                        => 'Cinzel',
        'Comfortaa:400,300,700'                     => 'Comfortaa',
        'Cookie'                                    => 'Cookie',
        'Cormorant+Garamond:400,400i,500,500i,700,700i'  => 'Cormorant Garamond',
        'Covered+By+Your+Grace'                     => 'Covered By Your Grace',
        'Crete+Round:400,400italic'                 => 'Crete Round',
        'Crimson+Text:400,400italic,600,700'        => 'Crimson Text',
        'Cuprum:400,400italic'                      => 'Cuprum',
        'Dancing+Script:400,700'                    => 'Dancing Script',
        'Didact+Gothic'                             => 'Didact Gothic',
        'DM+Serif+Display:400,400i'                 => 'DM Serif Display',
        'DM+Serif+Text:400,400i'                    => 'DM Serif Text',
        'Domine:400,700'                            => 'Domine',
        'Dosis:400,300,600,800'                     => 'Dosis',
        'Droid+Sans:400,700'                        => 'Droid Sans',
        'Droid+Serif:400,400italic,700'             => 'Droid Serif',
        'Economica:400,700,400italic'               => 'Economica',
        'Expletus+Sans:400,400i,700,700i'           => 'Expletus Sans',
        'EB+Garamond'                               => 'EB Garamond',
        'Exo:400,300,400italic,600,800'             => 'Exo',
        'Exo+2:400,300,400italic,600,700,900'       => 'Exo 2',
        'Fira+Sans:400,500'                         => 'Fira Sans',
        'Fjalla+One'                                => 'Fjalla One',
        'Francois+One'                              => 'Francois One',
        'Fredericka+the+Great'                      => 'Fredericka the Great',
        'Fredoka+One'                               => 'Fredoka One',
        'Fugaz+One'                                 => 'Fugaz One',
        'Gayathri:100,400,700'                      => 'Gayathri',
        'Great+Vibes'                               => 'Great Vibes',
        'Handlee'                                   => 'Handlee',
        'Hammersmith+One'                           => 'Hammersmith One',
        'Heebo:100,300,400,500,700,800,900'         => 'Heebo',
        'Hind:400,300,600,700'                      => 'Hind',
        'IBM+Plex+Serif:400,400i,500,500i,600,600i,700,700i'  => 'IBM Plex Serif',
        'Inconsolata:400,700'                       => 'Inconsolata',
        'Indie+Flower'                              => 'Indie Flower',
        'Istok+Web:400,400italic,700'               => 'Istok Web',
        'Josefin+Sans:400,600,700,400italic'        => 'Josefin Sans',
        'Josefin+Slab:400,400italic,700,600'        => 'Josefin Slab',
        'Jura:400,300,500,600'                      => 'Jura',
        'Karla:400,400italic,700'                   => 'Karla',
        'Kaushan+Script'                            => 'Kaushan Script',
        'Kreon:400,300,700'                         => 'Kreon',
        'Lateef'                                    => 'Lateef',
        'Lato:400,300,400italic,900,700'            => 'Lato',
        'Libre+Baskerville:400,400italic,700'       => 'Libre Baskerville',
        'Limelight'                                 => 'Limelight',
        'Lobster'                                   => 'Lobster',
        'Lobster+Two:400,700,700italic'             => 'Lobster Two',
        'Lora:400,400italic,700,700italic'          => 'Lora',
        'Maven+Pro:400,500,700,900'                 => 'Maven Pro',
        'Merriweather:400,400italic,300,900,700'    => 'Merriweather',
        'Merriweather+Sans:400,400italic,700,800'   => 'Merriweather Sans',
        'Monda:400,700'                             => 'Monda',
        'Montserrat:400,700'                        => 'Montserrat',
        'Muli:400,300italic,300'                    => 'Muli',
        'News+Cycle:400,700'                        => 'News Cycle',
        'Noticia+Text:400,400italic,700'            => 'Noticia Text',
        'Noto+Sans:400,400italic,700'               => 'Noto Sans',
        'Noto+Serif:400,400italic,700'              => 'Noto Serif',
        'Nunito:400,300,700'                        => 'Nunito',
        'Old+Standard+TT:400,400italic,700'         => 'Old Standard TT',
        'Open+Sans:400,400italic,600,700'           => 'Open Sans',
        'Open+Sans+Condensed:300,300italic,700'     => 'Open Sans Condensed',
        'Oswald:300,400,700'                        => 'Oswald',
        'Oxygen:400,300,700'                        => 'Oxygen',
        'Pacifico'                                  => 'Pacifico',
        'Passion+One:400,700,900'                   => 'Passion One',
        'Pathway+Gothic+One'                        => 'Pathway Gothic One',
        'Patua+One'                                 => 'Patua One',
        'Poiret+One'                                => 'Poiret One',
        'Pontano+Sans'                              => 'Pontano Sans',
        'Poppins:300,400,500,600,700'               => 'Poppins',
        'Play:400,700'                              => 'Play',
        'Playball'                                  => 'Playball',
        'Playfair+Display:400,400italic,700,900'    => 'Playfair Display',
        'PT+Sans:400,400italic,700'                 => 'PT Sans',
        'PT+Sans+Caption:400,700'                   => 'PT Sans Caption',
        'PT+Sans+Narrow:400,700'                    => 'PT Sans Narrow',
        'PT+Serif:400,400italic,700'                => 'PT Serif',
        'Quattrocento+Sans:400,700,400italic'       => 'Quattrocento Sans',
        'Questrial'                                 => 'Questrial',
        'Quicksand:400,700'                         => 'Quicksand',
        'Raleway:400,300,500,600,700,900'           => 'Raleway',
        'Righteous'                                 => 'Righteous',
        'Roboto:100,300,400,500,700'                => 'Roboto',
        'Roboto+Condensed:400,300,400italic,700'    => 'Roboto Condensed',
        'Roboto+Slab:400,300,700'                   => 'Roboto Slab',
        'Rokkitt:400,700'                           => 'Rokkitt',
        'Ropa+Sans:400,400italic'                   => 'Ropa Sans',
        'Rubik:300,300i,400,400i,500,500i,700,700i,900,900i'  => 'Rubik',
        'Russo+One'                                 => 'Russo One',
        'Sanchez:400,400italic'                     => 'Sanchez',
        'Satisfy'                                   => 'Satisfy',
        'Shadows+Into+Light'                        => 'Shadows Into Light',
        'Sigmar+One'                                => 'Sigmar One',
        'Signika:400,300,700'                       => 'Signika',
        'Six+Caps'                                  => 'Six Caps',
        'Slabo+27px'                                => 'Slabo 27px',
        'Source+Sans+Pro:400,400i,700,700i' => 'Source Sans Pro',
        'Source+Serif+Pro:400,700'                  => 'Source Serif Pro',
        'Squada+One'                                => 'Squada One',
        'Tangerine:400,700'                         => 'Tangerine',
        'Tinos:400,400italic,700'                   => 'Tinos',
        'Titillium+Web:400,300,400italic,700,900'   => 'Titillium Web',
        'Ubuntu:400,400italic,500,700'              => 'Ubuntu',
        'Ubuntu+Condensed'                          => 'Ubuntu Condensed',
        'Varela+Round'                              => 'Varela Round',
        'Vollkorn:400,400italic,700'                => 'Vollkorn',
        'Voltaire'                                  => 'Voltaire',
        'Yanone+Kaffeesatz:400,300,700'             => 'Yanone Kaffeesatz',
    );

    //font option
    $defaults['primary_font']      = 'Lato:400,300,400italic,900,700';
    $defaults['secondary_font']    = 'Roboto:100,300,400,500,700';


    //font size
    $defaults['site_title_font_size']    = 32;
    $defaults['general_font_size']    = 16;
    $defaults['letter_spacing']    = 0;
    $defaults['line_height']    = 1.5;
    $defaults['font_weight']    = 500;
    $defaults['main_banner_silder_caption_font_size']    = 32;

    $defaults['storeship_primary_title_font_size']    = 32;
    $defaults['storeship_secondary_title_font_size']    = 22;
    $defaults['storeship_tertiary_title_font_size']    = 18;
    $defaults['content_widget_article_title_font_size']    = 20;

    //woocommerce
    $defaults['store_global_alignment']    = 'align-content-left';
    $defaults['store_enable_breadcrumbs']    = 'yes';
    $defaults['store_single_sale_text']    = 'Sale!';
    $defaults['store_single_add_to_cart_text']    = 'Add to cart';
    $defaults['store_simple_add_to_cart_text']    = 'Add to cart';
    $defaults['store_variable_add_to_cart_text']    = 'Select options';
    $defaults['store_grouped_add_to_cart_text']    = 'View options';
    $defaults['store_external_add_to_cart_text']    = 'Read More';

    $defaults['store_product_search_autocomplete']    = 'yes';
    $defaults['store_product_search_placeholder']    = 'Search...';
    $defaults['store_product_search_category_placeholder']    = 'Categories';
    $defaults['store_product_search_show_popular_tags']    = 1;



    $defaults['aft_hide_sidebar_for_cart_and_checkout']    = 1;
    $defaults['aft_enable_minicart']    = 1;
    $defaults['aft_product_minicart_counter']    = 'yes';
    $defaults['aft_product_minicart_total']    = 'yes';
    $defaults['aft_product_minicart_contents']    = 'yes';
    $defaults['aft_language_switcher_shortcode']    = '';
    $defaults['aft_currency_switcher_shortcode']    = '';


    $defaults['aft_product_loop_button_display']    = 'show-on-hover';
    $defaults['aft_product_loop_category']    = 'yes';
    $defaults['aft_product_loop_toggle_add_to_cart']    = 'aft-show-add-to-cart';
    $defaults['aft_product_loop_toggle_rating']    = 'aft-show-empty-rating';
    $defaults['aft_product_loop_column_for_mobile']    = 'aft-one-col-product-loop';

    $defaults['store_product_shop_page_row']    = '4';
    $defaults['store_product_shop_page_product_per_page']    = '12';
    $defaults['store_product_shop_page_product_sort']    = 'yes';

    $defaults['store_product_page_product_zoom']    = 'yes';
    $defaults['store_product_page_gallery_thumbnail_columns']    = '4';
    $defaults['store_product_page_related_products']    = 'yes';
    $defaults['store_product_page_related_products_per_row']    = '4';
    $defaults['store_product_page_related_products_per_page']    = '4';
    $defaults['store_product_page_review_tab']    = 'yes';



    // Pass through filter.
    $defaults = apply_filters('storeship_filter_default_theme_options', $defaults);

	return $defaults;

}

endif;
