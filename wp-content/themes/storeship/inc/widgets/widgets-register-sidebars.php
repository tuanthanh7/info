<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function storeship_widgets_init()
{

      register_sidebar(array(
        'name' => esc_html__('Off-canvas Panel', 'storeship'),
        'id' => 'express-off-canvas-panel',
        'description' => esc_html__('Add widgets for off-canvas panel.', 'storeship'),
        'before_widget' => '<div id="%1$s" class="widget storeship-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="header-after">',
        'after_title' => '</span></h2>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Frontpage Content Section', 'storeship'),
        'id' => 'frontpage-content-widgets',
        'description' => esc_html__('Add widgets to Frontpage Content section.', 'storeship'),
        'before_widget' => '<div id="%1$s" class="widget storeship-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="header-after">',
        'after_title' => '</span></h2>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Shop Sidebar', 'storeship'),
        'id' => 'shop-sidebar-widgets',
        'description' => esc_html__('Add widgets to shop sidebar section.', 'storeship'),
        'before_widget' => '<div id="%1$s" class="widget storeship-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="header-after">',
        'after_title' => '</span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Single Product Sidebar', 'storeship'),
        'id' => 'single-product-sidebar-widgets',
        'description' => esc_html__('Add widgets to single product sidebar section.', 'storeship'),
        'before_widget' => '<div id="%1$s" class="widget storeship-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="header-after">',
        'after_title' => '</span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Main Sidebar', 'storeship'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets for main sidebar.', 'storeship'),
        'before_widget' => '<div id="%1$s" class="widget storeship-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="header-after">',
        'after_title' => '</span></h2>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Contact Page Section', 'storeship'),
        'id' => 'contact-page-widgets',
        'description' => esc_html__('Add widgets to contact page lower section.', 'storeship'),
        'before_widget' => '<div id="%1$s" class="widget storeship-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="header-after">',
        'after_title' => '</span></h2>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Footer First Section', 'storeship'),
        'id' => 'footer-first-widgets-section',
        'description' => esc_html__('Displays items on footer first column.', 'storeship'),
        'before_widget' => '<div id="%1$s" class="widget storeship-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="header-after">',
        'after_title' => '</span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Second Section', 'storeship'),
        'id' => 'footer-second-widgets-section',
        'description' => esc_html__('Displays items on footer second column.', 'storeship'),
        'before_widget' => '<div id="%1$s" class="widget storeship-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="header-after">',
        'after_title' => '</span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Third Section', 'storeship'),
        'id' => 'footer-third-widgets-section',
        'description' => esc_html__('Displays items on footer third column.', 'storeship'),
        'before_widget' => '<div id="%1$s" class="widget storeship-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="header-after">',
        'after_title' => '</span></h2>',
    ));

}

add_action('widgets_init', 'storeship_widgets_init');