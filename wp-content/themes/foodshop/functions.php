<?php
/*This file is part of foodshop child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

function foodshop_enqueue_child_styles()
{
    $min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    $parent_style = 'storeship-style';
    $parent_woocommerce_style = 'storeship-woocommerce-style';

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap' . $min . '.css');
    wp_enqueue_style('sidr', get_template_directory_uri() . '/assets/sidr/css/jquery.sidr.dark.css');



    /**
     * Load WooCommerce compatibility file.
     */
    if (class_exists('WooCommerce')) {
        wp_enqueue_style($parent_woocommerce_style, get_template_directory_uri() . '/woocommerce.css');

        $font_path = WC()->plugin_url() . '/assets/fonts/';
        $inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

        wp_add_inline_style($parent_woocommerce_style, $inline_font);
    }
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'foodshop-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('bootstrap', $parent_style),
        wp_get_theme()->get('Version'));


}

add_action('wp_enqueue_scripts', 'foodshop_enqueue_child_styles');


function foodshop_filter_default_theme_options($defaults) {
    $defaults['store_main_banner_text_color']    = '#ffffff';
    $defaults['store_main_banner_text_background_mode']    = 'custom-color-dark';
    $defaults['show_content_section_3'] = 0;
    $defaults['number_of_content_section_1_product'] = 4;
    $defaults['number_of_content_section_2_product'] = 6;

    return $defaults;
}

add_filter('storeship_filter_default_theme_options', 'foodshop_filter_default_theme_options', 1);

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function foodshop_customize_register($wp_customize)
{
    $storeship_default = storeship_get_default_theme_options();
    $storeship_thumbs_number = 2;

    for ($storeship_i = 1; $storeship_i <= $storeship_thumbs_number; $storeship_i++) {

        //Slide Details
        $wp_customize->add_setting('custom_thumbs_slide_' . $storeship_i . '_section_title',
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            new Storeship_Section_Title(
                $wp_customize,
                'custom_thumbs_slide_' . $storeship_i . '_section_title',
                array(
                    'label' => esc_html__('Set Thumbnail ', 'storeship') . ' - ' . $storeship_i,
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



        $wp_customize->add_setting("slider_custom_thumbs_" . $storeship_i,
            array(
                'sanitize_callback' => 'absint',
            )
        );


        $wp_customize->add_control(
            new WP_Customize_Cropped_Image_Control($wp_customize, 'slider_custom_thumbs_' . $storeship_i,
                array(
                    'label' => sprintf(esc_html__('Upload Image %d', 'storeship'), $storeship_i),
                    'section' => 'frontpage_main_slider_section_settings',
                    'flex_width' => true,
                    'flex_height' => true,
                    'priority' => 100,
                    'active_callback'=> function($control){
                        return(
                            storeship_frontpage_main_banner_status($control)


                        );
                    }

                )
            )
        );




        // Setting slider readmore text.
        $wp_customize->add_setting("title_custom_thumbs_$storeship_i",
            array(
                'default' => $storeship_default['title_custom_thumbs_' . $storeship_i],
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control("title_custom_thumbs_$storeship_i",
            array(
                'label' => esc_html__('Title', 'storeship'),
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

        // Setting slider readmore text.
        $wp_customize->add_setting("subtitle_custom_thumbs_$storeship_i",
            array(
                'default' => $storeship_default['subtitle_custom_thumbs_' . $storeship_i],
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control("subtitle_custom_thumbs_$storeship_i",
            array(
                'label' => esc_html__('Subtitle', 'storeship'),
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




        // Setting slider readmore text.
        $wp_customize->add_setting("thumbs_button_text_$storeship_i",
            array(
                'default' => $storeship_default['thumbs_button_text_' . $storeship_i],
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control("thumbs_button_text_$storeship_i",
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
        $wp_customize->add_setting("thumbs_button_link_$storeship_i",
            array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control("thumbs_button_link_$storeship_i",
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

}

add_action('customize_register', 'foodshop_customize_register', 9999);