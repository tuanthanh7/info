<?php

/**
 * Option Panel
 *
 * @package Storeship
 */

$storeship_default = storeship_get_default_theme_options();

/**
 * Frontpage Featured Section
 *
 * @package Storeship
 */

// Add Frontpage Options Panel.
$wp_customize->add_panel('frontpage_featured_section_panel',
    array(
        'title' => esc_html__('Frontpage Featured Section', 'storeship'),
        'priority' => 151,
        'capability' => 'edit_theme_options',
    )
);


/**
 * Store Features Section ===========================================================
 * */

// Main banner Sider Section.
$wp_customize->add_section('frontpage_store_features_section_settings',
    array(
        'title' => esc_html__('Store Features and Facilities', 'storeship'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'frontpage_featured_section_panel',
    )
);


// Setting - show_main_banner_section.
$wp_customize->add_setting('show_store_features_section',
    array(
        'default' => $storeship_default['show_store_features_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_store_features_section',
    array(
        'label' => esc_html__('Enable Store Features Section', 'storeship'),
        'section' => 'frontpage_store_features_section_settings',
        'type' => 'checkbox',
        'priority' => 22,

    )
);


$storeship_features_number = 3;

for ($storeship_i = 1; $storeship_i <= $storeship_features_number; $storeship_i++) {

    //Slide Details
    $wp_customize->add_setting('store_features_' . $storeship_i . '_section_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new Storeship_Section_Title(
            $wp_customize,
            'store_features_' . $storeship_i . '_section_title',
            array(
                'label' => esc_html__('Set Features ', 'storeship') . ' - ' . $storeship_i,
                'section' => 'frontpage_store_features_section_settings',
                'priority' => 100,
                'active_callback' => 'storeship_store_features_section_status'

            )
        )
    );

    $wp_customize->add_setting("store_features_title_" . $storeship_i,
        array(
            'default' => $storeship_default["store_features_title_" . $storeship_i],
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control("store_features_title_" . $storeship_i,
        array(
            'label' => esc_html__('Feature Title', 'storeship'),
            'section' => 'frontpage_store_features_section_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback' => 'storeship_store_features_section_status'

        )
    );

    $wp_customize->add_setting("store_features_icon_" . $storeship_i,
        array(
            'default' => $storeship_default["store_features_icon_" . $storeship_i],
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control("store_features_icon_" . $storeship_i,
        array(
            'label' => esc_html__('Feature Icon (Font Awesome)', 'storeship'),
            'section' => 'frontpage_store_features_section_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback' => 'storeship_store_features_section_status'

        )
    );

    $wp_customize->add_setting("store_features_desc_" . $storeship_i,
        array(
            'default' => $storeship_default["store_features_desc_" . $storeship_i],
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control("store_features_desc_" . $storeship_i,
        array(
            'label' => esc_html__('Feature Descriptions', 'storeship'),
            'section' => 'frontpage_store_features_section_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback' => 'storeship_store_features_section_status'

        )
    );

}

/**
 * Featured Product Section ===============================================================
 * */

// Main banner Sider Section.
$wp_customize->add_section('frontpage_featured_product_section_settings',
    array(
        'title' => esc_html__('Featured Products', 'storeship'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'frontpage_featured_section_panel',
    )
);


// Setting - show_main_banner_section.
$wp_customize->add_setting('show_featured_product_section',
    array(
        'default' => $storeship_default['show_featured_product_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_featured_product_section',
    array(
        'label' => esc_html__('Enable Featured Product Section', 'storeship'),
        'section' => 'frontpage_featured_product_section_settings',
        'type' => 'checkbox',
        'priority' => 22,

    )
);

// Setting - show_main_banner_section.
$wp_customize->add_setting('featured_product_section_title',
    array(
        'default' => $storeship_default['featured_product_section_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('featured_product_section_title',
    array(
        'label' => esc_html__('Section Title', 'storeship'),
        'section' => 'frontpage_featured_product_section_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'storeship_store_features_tab_section_status'

    )
);

// Setting - show_main_banner_section.
$wp_customize->add_setting('featured_product_section_title_note',
    array(
        'default' => $storeship_default['featured_product_section_title_note'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('featured_product_section_title_note',
    array(
        'label' => esc_html__('Section Title Note', 'storeship'),
        'section' => 'frontpage_featured_product_section_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'storeship_store_features_tab_section_status'

    )
);

$wp_customize->add_setting("featured_product_categories_1",
    array(
        'default' => $storeship_default["featured_product_categories_1"],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(new Storeship_Dropdown_Taxonomies_Control($wp_customize, 'featured_product_categories_1',
    array(
        'label' => esc_html__('Product Category 1', 'storeship'),
        'section' => 'frontpage_featured_product_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'product_cat',
        'priority' => 100,
        'active_callback' => 'storeship_store_features_tab_section_status'
    )));


// Setting - show_main_banner_section.
$wp_customize->add_setting('show_featured_products_only',
    array(
        'default' => $storeship_default['show_featured_products_only'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_featured_products_only',
    array(
        'label' => esc_html__('Show Featured Products Only', 'storeship'),
        'section' => 'frontpage_featured_product_section_settings',
        'type' => 'checkbox',
        'priority' => 100,
        'active_callback' => 'storeship_store_features_tab_section_status'

    )
);



/**
 * Featured Thumbnail Section ===============================================================
 * */

// Main banner Sider Section.
$wp_customize->add_section('store_offers_section_settings',
    array(
        'title' => esc_html__('Store Offers', 'storeship'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'frontpage_featured_section_panel',
    )
);


$wp_customize->add_setting('show_store_offers',
    array(
        'default' => $storeship_default['show_store_offers'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_store_offers',
    array(
        'label' => esc_html__('Enable Offers Sections', 'storeship'),
        'section' => 'store_offers_section_settings',
        'type' => 'checkbox',
        'priority' => 22,

    )
);



$storeship_store_offers_number = 2;

for ($storeship_i = 1; $storeship_i <= $storeship_store_offers_number; $storeship_i++) {


    //Slide Details
    $wp_customize->add_setting('store_offers_' . $storeship_i . '_section_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new Storeship_Section_Title(
            $wp_customize,
            'store_offers_' . $storeship_i . '_section_title',
            array(
                'label' => esc_html__('Set Offer ', 'storeship') . ' - ' . $storeship_i,
                'section' => 'store_offers_section_settings',
                'priority' => 100,
                'active_callback' => 'storeship_store_offers_section_status'
            )
        )
    );

    //Slide Details
    $wp_customize->add_setting("store_offers_" . $storeship_i,
        array(
            'sanitize_callback' => 'absint',
        )
    );


    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control($wp_customize, 'store_offers_' . $storeship_i,
            array(
                'label' => sprintf(esc_html__('Select Image %d', 'storeship'), $storeship_i),
                //'description' => sprintf(esc_html('Recommended Size %1$s px X %2$s px', 'storeship'), 500, 350),
                'section' => 'store_offers_section_settings',
                'width' => 500,
                'height' => 350,
                'flex_width' => true,
                'flex_height' => true,
                'priority' => 100,
                'active_callback' => 'storeship_store_offers_section_status'
            )
        )
    );


    // Setting - select_main_slider_section_mode.
    $wp_customize->add_setting('store_offers_title_' . $storeship_i,
        array(
            'default' => $storeship_default['store_offers_title_' . $storeship_i],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control('store_offers_title_' . $storeship_i,
        array(
            'label' => esc_html__('Slide Title', 'storeship'),
            'section' => 'store_offers_section_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback' => 'storeship_store_offers_section_status'
        ));


    // Setting - select_main_slider_section_mode.
    $wp_customize->add_setting('store_offers_subtitle_' . $storeship_i,
        array(
            'default' => $storeship_default['store_offers_subtitle_' . $storeship_i],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control('store_offers_subtitle_' . $storeship_i,
        array(
            'label' => esc_html__('Slide Subtitle', 'storeship'),
            'section' => 'store_offers_section_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback' => 'storeship_store_offers_section_status'
        ));


    // Setting - select_main_slider_section_mode.
    $wp_customize->add_setting('store_offers_button_' . $storeship_i,
        array(
            'default' => $storeship_default['store_offers_button_' . $storeship_i],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control('store_offers_button_' . $storeship_i,
        array(
            'label' => esc_html__('Slide Button', 'storeship'),
            'section' => 'store_offers_section_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback' => 'storeship_store_offers_section_status'
        ));

    // Setting - select_main_slider_section_mode.
    $wp_customize->add_setting('store_offers_link_' . $storeship_i,
        array(
            'default' => $storeship_default['store_offers_link_' . $storeship_i],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control('store_offers_link_' . $storeship_i,
        array(
            'label' => esc_html__('Slide Link', 'storeship'),
            'section' => 'store_offers_section_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback' => 'storeship_store_offers_section_status'
        ));

}