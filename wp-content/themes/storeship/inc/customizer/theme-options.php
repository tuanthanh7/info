<?php

/**
 * Option Panel
 *
 * @package Storeship
 */

$storeship_default = storeship_get_default_theme_options();
/*theme option panel info*/
require get_template_directory() . '/inc/customizer/theme-options-frontpage.php';

//contact page options
require get_template_directory() . '/inc/customizer/theme-options-contacts.php';


//Featured footer option
require get_template_directory() . '/inc/customizer/theme-options-frontpage-featured-footer.php';

if (class_exists('WooCommerce')) {
//woocommerce options
    require get_template_directory() . '/inc/customizer/theme-options-woocommerce.php';
}

// Add Theme Options Panel.
$wp_customize->add_panel('theme_option_panel',
    array(
        'title' => esc_html__('Theme Options', 'storeship'),
        'priority' => 151,
        'capability' => 'edit_theme_options',
    )
);


// Preloader Section.
$wp_customize->add_section('site_preloader_settings',
    array(
        'title' => esc_html__('Preloader Options', 'storeship'),
        'priority' => 4,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

// Setting - preloader.
$wp_customize->add_setting('enable_site_preloader',
    array(
        'default' => $storeship_default['enable_site_preloader'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_checkbox',
    )
);

$wp_customize->add_control('enable_site_preloader',
    array(
        'label' => esc_html__('Enable preloader', 'storeship'),
        'section' => 'site_preloader_settings',
        'type' => 'checkbox',
        'priority' => 10,
    )
);


/**
 * Header section
 *
 * @package Storeship
 */

//// Frontpage Section.
$wp_customize->add_section('top_header_options_settings',
    array(
        'title' => esc_html__('Top Header Options', 'storeship'),
        'priority' => 49,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


//// Setting - show_site_title_section.
$wp_customize->add_setting('show_top_header',
    array(
        'default' => $storeship_default['show_top_header'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_top_header',
    array(
        'label' => esc_html__('Show Top Header', 'storeship'),
        'section' => 'top_header_options_settings',
        'type' => 'checkbox',
        'priority' => 5,

    )
);

// Setting - show_site_title_section.
$wp_customize->add_setting('show_top_header_store_contacts',
    array(
        'default' => $storeship_default['show_top_header_store_contacts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_top_header_store_contacts',
    array(
        'label' => esc_html__('Show Store Address and Contacts', 'storeship'),
        'section' => 'top_header_options_settings',
        'type' => 'checkbox',
        'priority' => 10,
        'active_callback' => 'storeship_top_header_status'
    )
);


//// Setting - show_site_title_section.
$wp_customize->add_setting('show_top_header_social_contacts',
    array(
        'default' => $storeship_default['show_top_header_social_contacts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_top_header_social_contacts',
    array(
        'label' => esc_html__('Show Social Menu', 'storeship'),
        'section' => 'top_header_options_settings',
        'type' => 'checkbox',
        'priority' => 10,
        'active_callback' => 'storeship_top_header_status'
    )
);


//=====================================================
//================== Language and/or Currency switcher Options ===================
//=====================================================


// Frontpage Section.
$wp_customize->add_section('header_options_settings',
    array(
        'title' => esc_html__('Header Options', 'storeship'),
        'priority' => 49,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);



if (class_exists('WooCommerce')) {


//=====================================================
//================== Account Options ===================
//=====================================================


//section title
    $wp_customize->add_setting('header_account_menu_section_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new Storeship_Section_Title(
            $wp_customize,
            'header_account_menu_section_title',
            array(
                'label' => esc_html__("Header Account Menu", 'storeship'),
                'section' => 'header_options_settings',
                'priority' => 10,

            )
        )
    );


// Setting - sticky_header_option.
    $wp_customize->add_setting('disable_header_account_menu',
        array(
            'default' => $storeship_default['disable_header_account_menu'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'storeship_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('disable_header_account_menu',
        array(
            'label' => esc_html__('Disable Header Account Menu', 'storeship'),
            'section' => 'header_options_settings',
            'type' => 'checkbox',
            'priority' => 10,

        )
    );



    //=====================================================
//================== Minicart Options ===================
//=====================================================


//section title
    $wp_customize->add_setting('header_cart_menu_section_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new Storeship_Section_Title(
            $wp_customize,
            'header_cart_menu_section_title',
            array(
                'label' => esc_html__("Header Minicart Menu", 'storeship'),
                'section' => 'header_options_settings',
                'priority' => 10,

            )
        )
    );


// Setting - sticky_header_option.
    $wp_customize->add_setting('disable_header_cart_menu',
        array(
            'default' => $storeship_default['disable_header_cart_menu'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'storeship_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('disable_header_cart_menu',
        array(
            'label' => esc_html__('Disable Header Cart Menu', 'storeship'),
            'section' => 'header_options_settings',
            'type' => 'checkbox',
            'priority' => 10,

        )
    );

//section title
    $wp_customize->add_setting('aft_product_minicart_total_notice',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new Storeship_Simple_Notice_Custom_Control(
            $wp_customize,
            'aft_product_minicart_total_notice',
            array(
                'description' => esc_html__('Changes may need cart refresh.', 'storeship'),
                'section' => 'header_options_settings',
                'priority' => 10,
                'active_callback' => 'storeship_minicart_status'
            )
        )
    );

}


//section title
$wp_customize->add_setting('custom_link_option_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Storeship_Section_Title(
        $wp_customize,
        'custom_link_option_section_title',
        array(
            'label' => esc_html__("Custom Menu Section", 'storeship'),
            'section' => 'header_options_settings',
            'priority' => 10,

        )
    )
);



// Setting - header custom link text.
$wp_customize->add_setting('header_custom_link_text',
    array(
        'default' => $storeship_default['header_custom_link_text'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('header_custom_link_text',
    array(
        'label' => esc_html__('Custom Link Text', 'storeship'),
        'description' => esc_html__('Add Text', 'storeship'),
        'section' => 'header_options_settings',
        'type' => 'text',
        'priority' => 10,

    ));


// Setting - header custom link.
$wp_customize->add_setting('header_custom_text_link',
    array(
        'default' => $storeship_default['header_custom_text_link'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);

$wp_customize->add_control('header_custom_text_link',
    array(
        'label' => esc_html__('Custom Text Link', 'storeship'),
        'description' => esc_html__('Add Link', 'storeship'),
        'section' => 'header_options_settings',
        'type' => 'text',
        'priority' => 10,

    ));


/**
 * Layout options section
 *
 * @package Storeship
 */

// Layout Section.
$wp_customize->add_section('site_layout_settings',
    array(
        'title' => esc_html__('Global Layout Options', 'storeship'),
        'priority' => 9,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting('global_content_alignment',
    array(
        'default' => $storeship_default['global_content_alignment'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_select',
    )
);

$wp_customize->add_control('global_content_alignment',
    array(
        'label' => esc_html__('Global Content Alignment', 'storeship'),
        'description' => esc_html__('All other pages, posts, archives, etc.', 'storeship'),
        'section' => 'site_layout_settings',
        'type' => 'select',
        'choices' => array(
            'align-content-left' => esc_html__('Content - Sidebar', 'storeship'),
            'align-content-right' => esc_html__('Sidebar - Content', 'storeship'),
            'full-width-content' => esc_html__('Full Width Content', 'storeship')
        ),
        'priority' => 130,
    ));


if (class_exists('WooCommerce')) {


// Setting - show_site_title_section.
    $wp_customize->add_setting('store_enable_breadcrumbs',
        array(
            'default' => $storeship_default['store_enable_breadcrumbs'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'storeship_sanitize_select',
        )
    );

    $wp_customize->add_control('store_enable_breadcrumbs',
        array(
            'label' => esc_html__('Enable WooCommerce Breadcrumbs', 'storeship'),
            'section' => 'site_layout_settings',
            'type' => 'select',
            'choices' => array(
                'yes' => __('Yes', 'storeship'),
                'no' => __('No', 'storeship'),
            ),
        )
    );

    // Setting - show_site_title_section.
    $wp_customize->add_setting('store_global_alignment',
        array(
            'default' => $storeship_default['store_global_alignment'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'storeship_sanitize_select',
        )
    );

    $wp_customize->add_control('store_global_alignment',
        array(
            'label' => esc_html__('Shop/Single Content Alignment', 'storeship'),
            'section' => 'site_layout_settings',
            'type' => 'select',
            'choices' => array(
                'align-content-left' => esc_html__('Content - Sidebar', 'storeship'),
                'align-content-right' => esc_html__('Sidebar - Content', 'storeship'),
                'full-width-content' => esc_html__('Full Width Content', 'storeship')
            ),
        )
    );

}


////========== footer latest posts options ===============
// Footer Section.
$wp_customize->add_section('site_latest_posts_settings',
    array(
        'title' => esc_html__('Latest Posts', 'storeship'),
        'priority' => 100,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

// Setting - latest posts.
$wp_customize->add_setting('frontpage_show_latest_posts',
    array(
        'default' => $storeship_default['frontpage_show_latest_posts'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storeship_sanitize_checkbox',
    )
);


$wp_customize->add_control('frontpage_show_latest_posts',
    array(
        'label' => __('Show above footer', 'storeship'),
        'section' => 'site_latest_posts_settings',
        'type' => 'checkbox',
        'priority' => 100,
    )
);

// Setting - instagram username of news.
$wp_customize->add_setting('frontpage_latest_posts_section_title',
    array(
        'default' => $storeship_default['frontpage_latest_posts_section_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('frontpage_latest_posts_section_title',
    array(
        'label' => __('Section Title', 'storeship'),
        'section' => 'site_latest_posts_settings',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'storeship_latest_news_section_status'
    )
);

//========= secure payment icon option
// Advertisement Section.
$wp_customize->add_section('secure_payment_badge_settings',
    array(
        'title' => esc_html__('Secure Payment Badge', 'storeship'),
        'priority' => 100,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);


// Setting banner_advertisement_section.
$wp_customize->add_setting('secure_payment_badge',
    array(
        'default' => $storeship_default['secure_payment_badge'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control($wp_customize, 'secure_payment_badge',
        array(
            'label' => esc_html__('Payment Icon', 'storeship'),
            'description' => sprintf(esc_html__('Recommended Size %1$s px X %2$s px', 'storeship'), 600, 190),
            'section' => 'secure_payment_badge_settings',
            'width' => 600,
            'height' => 190,
            'flex_width' => true,
            'flex_height' => true,
            'priority' => 120,
        )
    )
);

//========== footer section options ===============
// Footer Section.
$wp_customize->add_section('site_footer_settings',
    array(
        'title' => esc_html__('Footer Options', 'storeship'),
        'priority' => 100,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_option_panel',
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting('footer_copyright_text',
    array(
        'default' => $storeship_default['footer_copyright_text'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('footer_copyright_text',
    array(
        'label' => __('Copyright Text', 'storeship'),
        'section' => 'site_footer_settings',
        'type' => 'text',
        'priority' => 100,
    )
);