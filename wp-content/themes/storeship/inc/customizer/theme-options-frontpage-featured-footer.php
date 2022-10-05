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
    $wp_customize->add_panel('frontpage_featured_footer_section_panel',
        array(
            'title' => esc_html__('Frontpage Footer Featured Section', 'storeship'),
            'priority' => 151,
            'capability' => 'edit_theme_options',
        )
    );


// Footer Section.
    $wp_customize->add_section('site_footer_slider_settings',
        array(
            'title' => esc_html__('Footer Featured Slider', 'storeship'),
            'priority' => 50,
            'capability' => 'edit_theme_options',
            'panel' => 'frontpage_featured_footer_section_panel',
        )
    );
    

    //Brand Section
    
    
    $wp_customize->add_section('site_footer_brand_settings',
        array(
            'title' => esc_html__('Brands', 'storeship'),
            'priority' => 50,
            'capability' => 'edit_theme_options',
            'panel' => 'frontpage_featured_footer_section_panel',
        )
    );
    
    // Setting - show_main_banner_section.
    $wp_customize->add_setting('show_store_features_footer_brand_section',
        array(
            'default' => $storeship_default['show_store_features_footer_brand_section'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'storeship_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control('show_store_features_footer_brand_section',
        array(
            'label' => esc_html__('Enable Brand Section', 'storeship'),
            'section' => 'site_footer_brand_settings',
            'type' => 'checkbox',
            'priority' => 100,
        
        )
    );
    
    
    $wp_customize->add_setting("section_brand_title",
        array(
            'default' => $storeship_default['section_brand_title'],
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control("section_brand_title",
        array(
            'label' => esc_html__('Title', 'storeship'),
            'section' => 'site_footer_brand_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback' => 'storeship_footer_brand_section_mode_status'
        
        )
    );
    


    
    for ($storeship_i = 1; $storeship_i <= 5; $storeship_i++) {
        
        //Slide Details
        $wp_customize->add_setting('brand_section_title_' . $storeship_i,
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        
        $wp_customize->add_control(
            new Storeship_Section_Title(
                $wp_customize,
                'brand_section_title_' . $storeship_i,
                array(
                    'label' => esc_html__('Set Slide ', 'storeship') . ' - ' . $storeship_i,
                    'section' => 'site_footer_brand_settings',
                    'priority' => 100,
                    'active_callback' => 'storeship_footer_brand_section_mode_status'
                
                )
            )
        );

        $wp_customize->add_setting("brand_image_" . $storeship_i,
            array(
                'sanitize_callback' => 'absint',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Cropped_Image_Control($wp_customize, 'brand_image_' . $storeship_i,
                array(
                    'label' => sprintf(esc_html__('Upload Image %d', 'storeship'), $storeship_i),
                    'description' => sprintf(esc_html__('Recommended Size %1$s px X %2$s px', 'storeship'), 936, 897),
                    'section' => 'site_footer_brand_settings',
                    'width' => 936,
                    'height' => 897,
                    'flex_width' => true,
                    'flex_height' => true,
                    'priority' => 100,
                    'active_callback' => 'storeship_footer_brand_section_mode_status'

                )
            )
        );

        

        
        
    }
    

    //Call to action

    
    $wp_customize->add_section('site_footer_cta_settings',
        array(
            'title' => esc_html__('Call To Action', 'storeship'),
            'priority' => 50,
            'capability' => 'edit_theme_options',
            'panel' => 'frontpage_featured_footer_section_panel',
        )
    );
    
    // Setting - show_main_banner_section.
    $wp_customize->add_setting('show_store_features_footer_cta_section',
        array(
            'default' => $storeship_default['show_store_features_footer_cta_section'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'storeship_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control('show_store_features_footer_cta_section',
        array(
            'label' => esc_html__('Enable CTA Section', 'storeship'),
            'section' => 'site_footer_cta_settings',
            'type' => 'checkbox',
            'priority' => 100,
        
        )
    );
    
    
    $wp_customize->add_setting("section_cta_title",
        array(
            'default' => $storeship_default['section_cta_title'],
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control("section_cta_title",
        array(
            'label' => esc_html__('Title', 'storeship'),
            'section' => 'site_footer_cta_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback' => 'storeship_footer_cta_section_mode_status'
        
        )
    );
    
    $wp_customize->add_setting("section_cta_subtitle",
        array(
            'default' => $storeship_default['section_cta_subtitle'],
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control("section_cta_subtitle",
        array(
            'label' => esc_html__('Subtitle', 'storeship'),
            'section' => 'site_footer_cta_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback' => 'storeship_footer_cta_section_mode_status'
        
        )
    );
    

    
    $wp_customize->add_setting("call_to_action_image",
        array(
            'sanitize_callback' => 'absint',
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control($wp_customize, 'call_to_action_image',
            array(
                'label' => __('Upload Image ', 'storeship'),
                'description' => sprintf(esc_html__('Recommended Size %1$s px X %2$s px', 'storeship'), 1500, 800),
                'section' => 'site_footer_cta_settings',
                'width' => 1500,
                'height' => 800,
                'flex_width' => true,
                'flex_height' => true,
                'priority' => 100,
                'active_callback' => 'storeship_footer_cta_section_mode_status'
            
            )
        )
    );
    

    
    
    // Setting slider readmore text.
    $wp_customize->add_setting("cta_button_text",
        array(
            'default' => $storeship_default['cta_button_text'],
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control("cta_button_text",
        array(
            'label' => esc_html__('Button Text', 'storeship'),
            'section' => 'site_footer_cta_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback' => 'storeship_footer_cta_section_mode_status'
        
        
        )
    );
    
    // Setting slider readmore link.
    
    
    $wp_customize->add_setting("cta_button_link",
        array(
            'default' => $storeship_default['cta_button_link'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control("cta_button_link",
        array(
            'label' => esc_html__('Button Link', 'storeship'),
            'section' => 'site_footer_cta_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback' => 'storeship_footer_cta_section_mode_status'
        
        )
    );





