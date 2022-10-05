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





// Advertisement Section.
$wp_customize->add_section('store_contact_settings',
    array(
        'title'      => esc_html__('Contact Options', 'storeship'),
        'priority'   => 50,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);


//section title
$wp_customize->add_setting('store_basic_address_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Storeship_Section_Title(
        $wp_customize,
        'store_basic_address_section_title',
        array(
            'label' => esc_html__("Basic Address Section", 'storeship'),
            'section' => 'store_contact_settings',
            'priority' => 130,

        )
    )
);

/*store_contact_address*/
$wp_customize->add_setting('store_contact_address',
    array(
        'default'           => $storeship_default['store_contact_address'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('store_contact_address',
    array(
        'label'    => esc_html__('Store Address', 'storeship'),
        'section'  => 'store_contact_settings',
        'type'     => 'text',
        'priority' => 130,
    )
);

/*store_contact_phone*/
$wp_customize->add_setting('store_contact_phone',
    array(
        'default'           => $storeship_default['store_contact_phone'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('store_contact_phone',
    array(
        'label'    => esc_html__('Store Phone', 'storeship'),
        'section'  => 'store_contact_settings',
        'type'     => 'text',
        'priority' => 130,
    )
);

/*store_contact_email*/
$wp_customize->add_setting('store_contact_email',
    array(
        'default'           => $storeship_default['store_contact_email'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('store_contact_email',
    array(
        'label'    => esc_html__('Store Email', 'storeship'),
        'section'  => 'store_contact_settings',
        'type'     => 'text',
        'priority' => 130,
    )
);