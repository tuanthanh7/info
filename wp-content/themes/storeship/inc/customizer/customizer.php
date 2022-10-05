<?php
/**
 * Storeship Theme Customizer
 *
 * @package Storeship
 */

if (!function_exists('storeship_get_option')):
/**
 * Get theme option.
 *
 * @since 1.0.0
 *
 * @param string $key Option key.
 * @return mixed Option value.
 */
function storeship_get_option($key) {

	if (empty($key)) {
		return;
	}

	$value = '';

	$default       = storeship_get_default_theme_options();
	$default_value = null;

	if (is_array($default) && isset($default[$key])) {
		$default_value = $default[$key];
	}

	if (null !== $default_value) {
		$value = get_theme_mod($key, $default_value);
	} else {
		$value = get_theme_mod($key);
	}

	return $value;
}
endif;

// Load customize default values.
require get_template_directory().'/inc/customizer/customizer-callback.php';

// Load customize default values.
require get_template_directory().'/inc/customizer/customizer-default.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function storeship_customize_register($wp_customize) {
    $storeship_default = storeship_get_default_theme_options();

	// Load customize controls.
	require get_template_directory().'/inc/customizer/customizer-control.php';

	// Load customize sanitize.
	require get_template_directory().'/inc/customizer/customizer-sanitize.php';

	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial('blogname', array(
				'selector'        => '.site-title a',
				'render_callback' => 'storeship_customize_partial_blogname',
			));
		$wp_customize->selective_refresh->add_partial('blogdescription', array(
				'selector'        => '.site-description',
				'render_callback' => 'storeship_customize_partial_blogdescription',
			));
	}

    $default = storeship_get_default_theme_options();

    // Setting - secondary_font.
    $wp_customize->add_setting('site_title_font_size',
        array(
            'default'           => $default['site_title_font_size'],
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control('site_title_font_size',
        array(
            'label'    => esc_html__('Site Title Size', 'storeship'),
            'section'  => 'title_tagline',
            'type'     => 'number',
            'priority' => 50,
        )
    );
    // use get control
    $wp_customize->get_control( 'header_textcolor')->label = __( 'Site Title/Tagline Color', 'storeship' );
    $wp_customize->get_control( 'header_textcolor')->section = 'colors';
    $wp_customize->get_control( 'header_textcolor')->priority = 5;

	/*theme option panel info*/
	require get_template_directory().'/inc/customizer/theme-options.php';

    // Setting - header overlay.
    $wp_customize->add_setting('header_image_url',
        array(
            'default'           => $default['header_image_url'],
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control('header_image_url',
        array(
            'label'    => esc_html__('Header Image URL', 'storeship'),
            'section'  => 'header_image',
            'type'     => 'text',
            'priority' => 50,
        )
    );

    // Setting - slider_caption_bg_color.
    $wp_customize->add_setting('store_main_banner_text_color',
        array(
            'default'           => $storeship_default['store_main_banner_text_color'],
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(

        new WP_Customize_Color_Control(
            $wp_customize,
            'store_main_banner_text_color',
            array(
                'label'    => esc_html__('Main Banner Texts Color', 'storeship'),
                'section'  => 'colors',
                'type'     => 'color',
                'priority' => 5,
                //'active_callback' => 'storeship_global_color_mode_status',
            )
        )
    );


// Setting - select_main_slider_section_mode.
    $wp_customize->add_setting("store_main_banner_text_background_mode",
        array(
            'default' => $storeship_default["store_main_banner_text_background_mode"],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'storeship_sanitize_select',
        )
    );


    $wp_customize->add_control("store_main_banner_text_background_mode",
        array(
            'label' => esc_html__('Texts Background Color', 'storeship'),
            'section' => 'colors',
            'type' => 'select',
            'choices' => array(
                'none' => esc_html__("None", 'storeship'),
                'custom-color-dark' => esc_html__("Dark", 'storeship'),
            ),
            'priority' => 5,
        ));

    // Register custom section types.
    $wp_customize->register_section_type( 'Storeship_Customize_Section_Upsell' );

    // Register sections.
    $wp_customize->add_section(
        new Storeship_Customize_Section_Upsell(
            $wp_customize,
            'theme_upsell',
            array(
                'title'    => esc_html__( 'Storeship Pro', 'storeship' ),
                'pro_text' => esc_html__( 'Upgrade now', 'storeship' ),
                'pro_url'  => 'https://www.afthemes.com/products/storeship-pro/',
                'priority'  => 1,
            )
        )
    );



}
add_action('customize_register', 'storeship_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function storeship_customize_partial_blogname() {
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function storeship_customize_partial_blogdescription() {
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function storeship_customize_preview_js() {
	wp_enqueue_script('storeship-customizer', get_template_directory_uri().'/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'storeship_customize_preview_js');


function storeship_customizer_css() {
    wp_enqueue_script( 'storeship-customize-controls', get_template_directory_uri() . '/inc/customizer/js/customizer-upsell.js', array( 'customize-controls' ) );

    wp_enqueue_style( 'storeship-customize-controls-style', get_template_directory_uri() . '/inc/customizer/css/customizer-upsell.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'storeship_customizer_css',0 );



