<?php

/**
 * Option Panel
 *
 * @package Storeship
 */

$storeship_default = storeship_get_default_theme_options();

/**
 * Contact options section
 *
 * @package Storeship
 */




//=====================================================
//================== Button and Badge Options ===================
//=====================================================

// Product Search Section.
$wp_customize->add_section('store_button_texts_settings',
    array(
        'title'      => esc_html__('Button and Badge Texts', 'storeship'),
        'priority'   => 50,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);

/*store_single_sale_text*/
$wp_customize->add_setting('store_single_sale_text',
    array(
        'default'           => $storeship_default['store_single_sale_text'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('store_single_sale_text',
    array(
        'label'    => esc_html__('Sale Texts', 'storeship'),
        'section'  => 'store_button_texts_settings',
        'type'     => 'text',
        'priority' => 10,
    )
);



/*store_product_search_placeholder*/
$wp_customize->add_setting('store_single_add_to_cart_text',
    array(
        'default'           => $storeship_default['store_single_add_to_cart_text'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('store_single_add_to_cart_text',
    array(
        'label'    => esc_html__('Single Add to Cart Texts', 'storeship'),
        'section'  => 'store_button_texts_settings',
        'type'     => 'text',
        'priority' => 10,
    )
);

/*store_product_search_placeholder*/
$wp_customize->add_setting('store_simple_add_to_cart_text',
    array(
        'default'           => $storeship_default['store_simple_add_to_cart_text'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('store_simple_add_to_cart_text',
    array(
        'label'    => esc_html__('Simple Product Add to Cart Texts', 'storeship'),
        'section'  => 'store_button_texts_settings',
        'type'     => 'text',
        'priority' => 10,
    )
);





//=====================================================
//================== Product Loop Options ===================
//=====================================================

// Advertisement Section.
$wp_customize->add_section('store_product_loop_settings',
    array(
        'title'      => esc_html__('Product Loop', 'storeship'),
        'priority'   => 50,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);



// Setting - show_site_title_section.
$wp_customize->add_setting('aft_product_loop_category',
    array(
        'default'           => $storeship_default['aft_product_loop_category'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_select',
    )
);

$wp_customize->add_control('aft_product_loop_category',
    array(
        'label'    => esc_html__('Show Product Category', 'storeship'),
        'section'  => 'store_product_loop_settings',
        'type'        => 'select',
        'choices'     => array(
            'yes'              => __( 'Yes', 'storeship' ),
            'no' => __( 'No', 'storeship' ),
        ),
    )
);

// Setting - show_site_title_section.
$wp_customize->add_setting('aft_product_loop_toggle_add_to_cart',
    array(
        'default'           => $storeship_default['aft_product_loop_toggle_add_to_cart'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_select',
    )
);

$wp_customize->add_control('aft_product_loop_toggle_add_to_cart',
    array(
        'label'    => esc_html__('Add to Cart Button', 'storeship'),
        'section'  => 'store_product_loop_settings',
        'type'        => 'select',
        'choices'     => array(
            'aft-hide-add-to-cart' => __( 'Show on Hover', 'storeship' ),
            'aft-show-add-to-cart' => __( 'Show Always', 'storeship' ),
        ),
    )
);

// Setting - show_site_title_section.
$wp_customize->add_setting('aft_product_loop_toggle_rating',
    array(
        'default'           => $storeship_default['aft_product_loop_toggle_rating'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_select',
    )
);

$wp_customize->add_control('aft_product_loop_toggle_rating',
    array(
        'label'    => esc_html__('Show Rating', 'storeship'),
        'section'  => 'store_product_loop_settings',
        'type'        => 'select',
        'choices'     => array(
            'aft-show-empty-rating' => __( 'Also Display Empty Rating', 'storeship' ),
            'aft-hide-empty-rating' => __( 'Only Display Rated One', 'storeship' ),
        ),
    )
);





//=====================================================
//================== Shop Options ===================
//=====================================================

// Shop Section.
$wp_customize->add_section('store_product_shop_page_settings',
    array(
        'title'      => esc_html__('Shop Page', 'storeship'),
        'priority'   => 50,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);


// Setting - show_site_title_section.
$wp_customize->add_setting('store_product_shop_page_row',
    array(
        'default'           => $storeship_default['store_product_shop_page_row'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_select',
    )
);

$wp_customize->add_control('store_product_shop_page_row',
    array(
        'label'    => esc_html__('Shop Product Columns', 'storeship'),
        'section'  => 'store_product_shop_page_settings',
        'type'        => 'select',
        'choices'     => array(

            '3' => __( 'Three', 'storeship' ),
            '4' => __( 'Four', 'storeship' ),


        ),
    )
);





//=====================================================
//================== Product Page Options ===================
//=====================================================
// Shop Section.
$wp_customize->add_section('store_product_page_settings',
    array(
        'title'      => esc_html__('Product Page', 'storeship'),
        'priority'   => 50,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);



// Setting - show_site_title_section.
$wp_customize->add_setting('store_product_page_related_products',
    array(
        'default'           => $storeship_default['store_product_page_related_products'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_select',
    )
);

$wp_customize->add_control('store_product_page_related_products',
    array(
        'label'    => esc_html__('Show Related Products', 'storeship'),
        'section'  => 'store_product_page_settings',
        'type'        => 'select',
        'choices'     => array(
            'yes'              => __( 'Yes', 'storeship' ),
            'no' => __( 'No', 'storeship' ),
        ),
    )
);


// Setting - show_site_title_section.
$wp_customize->add_setting('store_product_page_related_products_per_row',
    array(
        'default'           => $storeship_default['store_product_page_related_products_per_row'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_select',
    )
);

$wp_customize->add_control('store_product_page_related_products_per_row',
    array(
        'label'    => esc_html__('Related Products per Rows', 'storeship'),
        'section'  => 'store_product_page_settings',
        'type'        => 'select',
        'choices'     => array(
            '3' => __( 'Three', 'storeship' ),
            '4' => __( 'Four', 'storeship' ),

        ),
        'active_callback' => 'storeship_product_page_related_products_status'
    )
);