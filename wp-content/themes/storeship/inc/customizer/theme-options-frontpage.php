<?php
    
    /**
     * Option Panel
     *
     * @package Storeship
     */
    
    $storeship_default = storeship_get_default_theme_options();

    //Featured Section Options
    require get_template_directory() . '/inc/customizer/theme-options-frontpage-featured.php';


    //Featured Section Options
    require get_template_directory() . '/inc/customizer/theme-options-frontpage-content.php';
    
    /**
     * Frontpage options section
     *
     * @package Storeship
     */


    // Add Frontpage Options Panel.
    $wp_customize->add_panel('frontpage_option_panel',
        array(
            'title' => esc_html__('Frontpage Main Banner Options', 'storeship'),
            'priority' => 150,
            'capability' => 'edit_theme_options',
        )
    );


    // Advertisement Section.
    $wp_customize->add_section('frontpage_advertisement_settings',
        array(
            'title' => esc_html__('Banner Advertisement', 'storeship'),
            'priority' => 50,
            'capability' => 'edit_theme_options',
            'panel' => 'frontpage_option_panel',
        )
    );


// Setting banner_advertisement_section.
    $wp_customize->add_setting('banner_advertisement_section',
        array(
            'default' => $storeship_default['banner_advertisement_section'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );
    
    
    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control($wp_customize, 'banner_advertisement_section',
            array(
                'label' => esc_html__('Banner Section Advertisement', 'storeship'),
                'description' => sprintf(esc_html__('Recommended Size: %1$s px X %2$s px', 'storeship'), 1500, 175),
                'section' => 'frontpage_advertisement_settings',
                'width' => 1500,
                'height' => 175,
                'flex_width' => true,
                'flex_height' => true,
                'priority' => 120,
            )
        )
    );
    
    /*banner_advertisement_section_url*/
    $wp_customize->add_setting('banner_advertisement_section_url',
        array(
            'default' => $storeship_default['banner_advertisement_section_url'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control('banner_advertisement_section_url',
        array(
            'label' => esc_html__('URL Link', 'storeship'),
            'section' => 'frontpage_advertisement_settings',
            'type' => 'text',
            'priority' => 130,
        )
    );

/**
 * Top Categories Section ===============================================================
 * */

// Top Categories Section
$wp_customize->add_section('frontpage_top_categories_section_settings',
    array(
        'title' => esc_html__('Categories and Search Bar', 'storeship'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'frontpage_option_panel',
    )
);


//Setting - show_site_title_section.
$wp_customize->add_setting('show_top_categories_section',
    array(
        'default' => $storeship_default['show_top_categories_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_top_categories_section',
    array(
        'label' => esc_html__('Show Categories and Search Bar', 'storeship'),
        'section' => 'frontpage_top_categories_section_settings',
        'type' => 'checkbox',
        'priority' => 5,

    )
);

//section title
$wp_customize->add_setting('top_categories_option_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Storeship_Section_Title(
        $wp_customize,
        'top_categories_option_section_title',
        array(
            'label' => esc_html__("Top Category Section", 'storeship'),
            'section' => 'frontpage_top_categories_section_settings',
            'priority' => 100,
            'active_callback' => 'storeship_top_categories_section_status'

        )
    )
);


// Setting - show_main_banner_section.
$wp_customize->add_setting('top_categories_section_title',
    array(
        'default' => $storeship_default['top_categories_section_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('top_categories_section_title',
    array(
        'label' => esc_html__('Section Title', 'storeship'),
        'section' => 'frontpage_top_categories_section_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'storeship_top_categories_section_status'

    )
);


// Setting - select_main_slider_section_mode.
$wp_customize->add_setting('show_top_categories_product_count',
    array(
        'default' => $storeship_default['show_top_categories_product_count'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_select',
    )
);

$wp_customize->add_control('show_top_categories_product_count',
    array(
        'label' => esc_html__('Show Product Count', 'storeship'),
        'section' => 'frontpage_top_categories_section_settings',
        'type' => 'select',
        'choices' => array(
            'true' => esc_html__("Yes", 'storeship'),
            'false' => esc_html__("No", 'storeship'),
        ),
        'priority' => 100,
        'active_callback' => 'storeship_top_categories_section_status'
    ));

// Setting - select_main_slider_section_mode.
$wp_customize->add_setting('show_top_categories_product_onsale_count',
    array(
        'default' => $storeship_default['show_top_categories_product_onsale_count'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_select',
    )
);

$wp_customize->add_control('show_top_categories_product_onsale_count',
    array(
        'label' => esc_html__('Show On-sale Product Count', 'storeship'),
        'section' => 'frontpage_top_categories_section_settings',
        'type' => 'select',
        'choices' => array(
            'true' => esc_html__("Yes", 'storeship'),
            'false' => esc_html__("No", 'storeship'),
        ),
        'priority' => 100,
        'active_callback' => 'storeship_top_categories_section_status'
    ));




/**
 * Search Bar Section ===============================================================
 * */


//section title
$wp_customize->add_setting('store_product_option_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Storeship_Section_Title(
        $wp_customize,
        'store_product_option_section_title',
        array(
            'label' => esc_html__("Search Bar Section", 'storeship'),
            'section' => 'frontpage_top_categories_section_settings',
            'priority' => 100,
            'active_callback' => 'storeship_top_categories_section_status'
        )
    )
);

/*store_product_search_placeholder*/
$wp_customize->add_setting('store_product_search_placeholder',
    array(
        'default'           => $storeship_default['store_product_search_placeholder'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('store_product_search_placeholder',
    array(
        'label'    => esc_html__('Search Bar Placeholder', 'storeship'),
        'section'  => 'frontpage_top_categories_section_settings',
        'type'     => 'text',
        'priority' => 100,
        'active_callback' => 'storeship_top_categories_section_status'
    )
);

/*store_product_search_placeholder*/
$wp_customize->add_setting('store_product_search_category_placeholder',
    array(
        'default'           => $storeship_default['store_product_search_category_placeholder'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('store_product_search_category_placeholder',
    array(
        'label'    => esc_html__('Category Bar Placeholder', 'storeship'),
        'section'  => 'frontpage_top_categories_section_settings',
        'type'     => 'text',
        'priority' => 100,
        'active_callback' => 'storeship_top_categories_section_status'
    )
);



/**
 * Main Slider Slider Section ===============================================================
 * */

$wp_customize->add_section('frontpage_main_slider_section_settings',
    array(
        'title' => esc_html__('Featured Categories', 'storeship'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'frontpage_option_panel',
    )
);


// Setting - show_main_banner_section.
$wp_customize->add_setting('show_main_banner_section',
    array(
        'default' => $storeship_default['show_main_banner_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_main_banner_section',
    array(
        'label' => esc_html__('Enable Main Banner', 'storeship'),
        'section' => 'frontpage_main_slider_section_settings',
        'type' => 'checkbox',
        'priority' => 22,

    )
);



$wp_customize->add_setting("slider_custom_background",
    array(
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control($wp_customize, 'slider_custom_background',
        array(
            'label' => esc_html__('Upload Section Background Image', 'storeship'),
            'section' => 'frontpage_main_slider_section_settings',
            'width'=>1280,
            'height'=>760,
            'flex_width' => true,
            'flex_height' => true,
            'priority' => 22,
            'active_callback'=> function($control){
                return(
                storeship_frontpage_main_banner_status($control)
                );
            }

        )
    )
);

// Main banner Sider Section.
$wp_customize->add_section('frontpage_main_slider_section_settings',
    array(
        'title' => esc_html__('Main Slider', 'storeship'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'frontpage_option_panel',
    )
);


$wp_customize->add_setting('select_main_slider_content',
    array(
        'default' => $storeship_default['select_main_slider_content'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_select',
    )
);

$wp_customize->add_control('select_main_slider_content',
    array(
        'label' => esc_html__('Select Slider Content', 'storeship'),
        'section' => 'frontpage_main_slider_section_settings',
        'type' => 'select',
        'choices' => array(
            'page-content' => esc_html__("Page Content", 'storeship'),
            'custom-content' => esc_html__("Custom Content", 'storeship'),
        ),
        'priority' => 23,
        'active_callback'=> function($control){
            return(storeship_frontpage_main_banner_status($control));
        }
    ));






$storeship_slider_number = 3;

for ($storeship_i = 1; $storeship_i <= $storeship_slider_number; $storeship_i++) {

    //Slide Details
    $wp_customize->add_setting('custom_slide_' . $storeship_i . '_section_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new Storeship_Section_Title(
            $wp_customize,
            'custom_slide_' . $storeship_i . '_section_title',
            array(
                'label' => esc_html__('Set Slide ', 'storeship') . ' - ' . $storeship_i,
                'section' => 'frontpage_main_slider_section_settings',
                'priority' => 100,
                'active_callback'=> function($control){
                    return(
                    storeship_frontpage_main_banner_status($control)
                    );
                }

            )
        )
    );

    $wp_customize->add_setting( "slider_page_$storeship_i",
        array(
            'sanitize_callback' => 'storeship_sanitize_dropdown_pages',
        )
    );
    $wp_customize->add_control( "slider_page_$storeship_i",
        array(
            'label'           => esc_html__( 'Select Page', 'storeship' ),
            'section'         => 'frontpage_main_slider_section_settings',
            'type'            => 'dropdown-pages',
            'priority' 		  => 100,
            'active_callback'=> function($control){
                return(
                    storeship_frontpage_main_banner_status($control)
                    &&
                    storeship_frontpage_main_banner_page_content_status($control)
                );
            }
        )
    );



    $wp_customize->add_setting("slider_custom_" . $storeship_i,
        array(
            'sanitize_callback' => 'absint',
        )
    );


    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control($wp_customize, 'slider_custom_' . $storeship_i,
            array(
                'label' => sprintf(esc_html__('Upload Image %d', 'storeship'), $storeship_i),
                //'description' => sprintf(esc_html('Recommended Size: %1$s px X %2$s px', 'storeship'), 1500, 700),
                'section' => 'frontpage_main_slider_section_settings',
                'width'=>1280,
                'height'=>760,
                'flex_width' => true,
                'flex_height' => true,
                'priority' => 100,
                'active_callback'=> function($control){
                    return(
                        storeship_frontpage_main_banner_status($control)
                        &&
                        storeship_frontpage_main_banner_custom_content_status($control)

                    );
                }

            )
        )
    );




    // Setting slider readmore text.
    $wp_customize->add_setting("title_custom_$storeship_i",
        array(
            'default' => $storeship_default['title_custom_' . $storeship_i],
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control("title_custom_$storeship_i",
        array(
            'label' => esc_html__('Title', 'storeship'),
            'section' => 'frontpage_main_slider_section_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback'=> function($control){
                return(
                    storeship_frontpage_main_banner_status($control)
                    &&
                    storeship_frontpage_main_banner_custom_content_status($control)
                );
            }

        )
    );

    // Setting slider readmore text.
    $wp_customize->add_setting("subtitle_custom_$storeship_i",
        array(
            'default' => $storeship_default['subtitle_custom_' . $storeship_i],
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control("subtitle_custom_$storeship_i",
        array(
            'label' => esc_html__('Subtitle', 'storeship'),
            'section' => 'frontpage_main_slider_section_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback'=> function($control){
                return(
                    storeship_frontpage_main_banner_status($control)
                    &&
                    storeship_frontpage_main_banner_custom_content_status($control)
                );
            }

        )
    );




    // Setting slider readmore text.
    $wp_customize->add_setting("button_text_$storeship_i",
        array(
            'default' => $storeship_default['button_text_' . $storeship_i],
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control("button_text_$storeship_i",
        array(
            'label' => esc_html__('Button Text', 'storeship'),
            'section' => 'frontpage_main_slider_section_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback'=> function($control){
                return(
                storeship_frontpage_main_banner_status($control)
                );
            }

        )
    );

    // Setting slider readmore link.
    $wp_customize->add_setting("button_link_$storeship_i",
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control("button_link_$storeship_i",
        array(
            'label' => esc_html__('Button Link', 'storeship'),
            'section' => 'frontpage_main_slider_section_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback'=> function($control){
                return(
                storeship_frontpage_main_banner_status($control)
                );
            }

        )
    );

}
