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
$wp_customize->add_panel('frontpage_content_section_panel',
    array(
        'title' => esc_html__('Frontpage Content Section', 'storeship'),
        'priority' => 151,
        'capability' => 'edit_theme_options',
    )
);


/**
 * Frontpage Content Section ===============================================================
 * */
$storeship_frontpage_section_number = 3;

for ($storeship_count = 1; $storeship_count <= $storeship_frontpage_section_number; $storeship_count++) {
// Main banner Sider Section.
    $wp_customize->add_section('frontpage_content_section_' . $storeship_count . '_settings',
        array(
            'title' => sprintf(esc_html__('Products Section  %d', 'storeship'), $storeship_count),
            'priority' => 50,
            'capability' => 'edit_theme_options',
            'panel' => 'frontpage_content_section_panel',
        )
    );


    $wp_customize->add_setting('show_content_section_' . $storeship_count,
        array(
            'default' => $storeship_default['show_content_section_' . $storeship_count],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'storeship_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('show_content_section_' . $storeship_count,
        array(
            'label' => sprintf(esc_html__('Enable Section %d', 'storeship'),$storeship_count),
            'section' => 'frontpage_content_section_' . $storeship_count . '_settings',
            'type' => 'checkbox',
            'priority' => 22,
            

        )
    );

// Setting - select_main_slider_section_mode.
    $wp_customize->add_setting('content_section_' . $storeship_count . '_type',
        array(
            'default' => $storeship_default['content_section_' . $storeship_count . '_type'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'storeship_sanitize_select',
        )
    );

    $wp_customize->add_control('content_section_' . $storeship_count . '_type',
        array(
            'label' => esc_html__('Select Section Type', 'storeship'),
            'section' => 'frontpage_content_section_' . $storeship_count . '_settings',
            'type' => 'select',
            'choices' => array(
                'list' => esc_html__("Product List", 'storeship'),
                'grid' => esc_html__("Product Grid", 'storeship'),



            ),
            'priority' => 100,
            'active_callback' => 'storeship_content_section_'.$storeship_count
        ));




// Setting - show_main_banner_section.
    $wp_customize->add_setting('content_section_' . $storeship_count . '_title',
        array(
            'default' => $storeship_default['content_section_' . $storeship_count . '_title'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control('content_section_' . $storeship_count . '_title',
        array(
            'label' => esc_html__('Section Title', 'storeship'),
            'section' => 'frontpage_content_section_' . $storeship_count . '_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback' => 'storeship_content_section_'.$storeship_count

        )
    );

// Setting - show_main_banner_section.
    $wp_customize->add_setting('content_section_' . $storeship_count . '_title_note',
        array(
            'default' => $storeship_default['content_section_' . $storeship_count . '_title_note'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control('content_section_' . $storeship_count . '_title_note',
        array(
            'label' => esc_html__('Section Title Note', 'storeship'),
            'section' => 'frontpage_content_section_' . $storeship_count . '_settings',
            'type' => 'text',
            'priority' => 100,
            'active_callback' => 'storeship_content_section_'.$storeship_count

        )
    );




    $wp_customize->add_setting('content_section_' . $storeship_count . '_product_categories',
        array(
            'default' => $storeship_default['content_section_' . $storeship_count . '_product_categories'],
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(new Storeship_Dropdown_Taxonomies_Control($wp_customize, 'content_section_' . $storeship_count . '_product_categories',
        array(
            'label' => esc_html__('Product Categories', 'storeship'),
            'section' => 'frontpage_content_section_' . $storeship_count . '_settings',
            'type' => 'dropdown-taxonomies',
            'taxonomy' => 'product_cat',
            'priority' => 100,
            'active_callback' => 'storeship_content_section_'.$storeship_count
        )));

// Setting - show_main_banner_section.
    $wp_customize->add_setting('number_of_content_section_' . $storeship_count . '_product',
        array(
            'default' => $storeship_default['number_of_content_section_' . $storeship_count . '_product'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control('number_of_content_section_' . $storeship_count . '_product',
        array(
            'label' => esc_html__('No. of Products', 'storeship'),
            'section' => 'frontpage_content_section_' . $storeship_count . '_settings',
            'type' => 'number',
            'priority' => 100,
            'active_callback' => 'storeship_content_section_'.$storeship_count

        )
    );

}