<?php


if (!function_exists('storeship_top_header_section')) {
    add_action('storeship_action_top_header_section', 'storeship_top_header_section', 40);

    function storeship_top_header_section()
    {
        $show_top_header = storeship_get_option('show_top_header');

        if($show_top_header){
            do_action('storeship_action_top_menu_section');
            do_action('storeship_action_top_header_contact_section');
            do_action('storeship_action_social_nav_menu');
        }

    }
}

//Top header contact
if (!function_exists('storeship_top_header_contact_section')) {

    add_action('storeship_action_top_header_contact_section', 'storeship_top_header_contact_section', 40);

    function storeship_top_header_contact_section()
    {
        $show_top_header_store_contacts = storeship_get_option('show_top_header_store_contacts');
        if ($show_top_header_store_contacts):

            $storeship_contact_address = storeship_get_option('store_contact_address');
            $storeship_contact_phone = storeship_get_option('store_contact_phone');
            $storeship_contact_email = storeship_get_option('store_contact_email');
            $storeship_contact_hours = storeship_get_option('store_contact_hours');
            ?>
            <span class="top-bar-contact">
                <ul class="top-bar-menu">
                    <?php if (!empty($storeship_contact_address)): ?>
                        <li>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span><?php echo esc_html($storeship_contact_address); ?></span>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($storeship_contact_phone)): ?>
                        <li>
                            <i class="fa fa-phone-square" aria-hidden="true"></i>
                            <a href="tel:<?php echo esc_html($storeship_contact_phone); ?>">
                                <?php echo esc_html($storeship_contact_phone); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($storeship_contact_email)): ?>
                        <li>
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <a href="mailto:<?php echo esc_html($storeship_contact_email); ?>"><?php echo esc_html($storeship_contact_email); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </span>
        <?php endif;
    }
}
//Top nav menu
if (!function_exists('storeship_top_menu_section')) {
    add_action('storeship_action_top_menu_section', 'storeship_top_menu_section', 40);

    function storeship_top_menu_section()
    {
        if (has_nav_menu('aft-top-nav')) {
        ?>
        <span class="aft-small-menu">
                     <?php

                         wp_nav_menu(array(
                             'theme_location' => 'aft-top-nav',
                             'menu_id' => 'top-menu',
                             'depth' => 1,
                             'container' => 'div',
                             'container_class' => 'top-navigation'
                         ));


                     ?>
            </span>
    <?php }
        }
}

//Social nav menu
if (!function_exists('storeship_social_nav_menu_section')) {
    add_action('storeship_action_social_nav_menu', 'storeship_social_nav_menu_section', 40);

    function storeship_social_nav_menu_section()
    {
        $show_top_header_social_contacts = storeship_get_option('show_top_header_social_contacts');
        if ($show_top_header_social_contacts):
            if (has_nav_menu('aft-social-nav')):
                ?>
                <span class="aft-small-social-menu">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'aft-social-nav',
                    'link_before' => '<span class="screen-reader-text">',
                    'link_after' => '</span>',
                    'menu_id' => 'social-menu',
                    'container' => 'div',
                    'container_class' => 'social-navigation'
                ));
                ?>
            </span>
            <?php
            endif;
        endif;
    }
}

if (!function_exists('storeship_header_image_section')) {
    add_action('storeship_action_header_image', 'storeship_header_image_section', 40);

    function storeship_header_image_section()
    {
        $storeship_header_image = get_header_image();
        $storeship_header_image_url = storeship_get_option('header_image_url');
        $storeship_header_image_url_target = storeship_get_option('header_image_url_target');
        $storeship_target = ('' != $storeship_header_image_url_target) ? '_blank' : '';


        if (!empty($storeship_header_image)): ?>
            <a class="aft-header-image" href="<?php echo esc_url($storeship_header_image_url); ?>" target="<?php echo esc_attr($storeship_target); ?>">
                <img src="<?php echo esc_url($storeship_header_image); ?>" alt="header-image" />
            </a>
        <?php endif;
    }
}




//Off convas
if (!function_exists('storeship_off_canvas_section')) {
    add_action('storeship_action_off_canvas_section', 'storeship_off_canvas_section', 40);

    function storeship_off_canvas_section()
    {
        $show_offcanvas = true;
        if (is_active_sidebar('express-off-canvas-panel')): ?>
            <div class="express-off-canvas-panel">
                         <span class="offcanvas">
                              <a href="#offcanvasCollapse" class="offcanvas-nav">
                                  <div class="offcanvas-menu">
                                      <span class="mbtn-top"></span>
                                      <span class="mbtn-mid"></span>
                                      <span class="mbtn-bot"></span>
                                  </div>
                              </a>
                         </span>
                <div id="sidr" class="primary-background">
                    <a class="sidr-class-sidr-button-close" href="#sidr-nav"><i class="fa fa-window-close-o"
                                                                                aria-hidden="true"></i></a>
                    <?php dynamic_sidebar('express-off-canvas-panel'); ?>
                </div>
            </div>

        <?php endif;
    }
}

//Myaccount icon
if (!function_exists('storeship_my_account_section')) {

    add_action('storeship_action_my_account_section', 'storeship_my_account_section', 40);

    function storeship_my_account_section()
    {

        if (!class_exists('WooCommerce')) {
            return;
        }

        storeship_my_account_dropdown();

    }
}
//Yith wishlist icon
if (!function_exists('storeship_wishlist_section')) {


    add_action('storeship_action_wishlist_section', 'storeship_wishlist_section', 40);

    function storeship_wishlist_section()
    {
        if (function_exists('YITH_WCWL')): ?>
            <div class="wishlist-shop">
                            <span class="wishlist-icon">
                                <?php storeship_woocommerce_header_wishlist(); ?>
                            </span>
            </div>
        <?php endif;
    }
}

function storeship_cart_group()
{

    ?>

    <div class="cart-group">
        <?php
        $storeship_disable_header_wishlist_menu = storeship_get_option('disable_header_wishlist_menu');
        $storeship_disable_header_account_menu = storeship_get_option('disable_header_account_menu');
        $storeship_disable_header_cart_menu = storeship_get_option('disable_header_cart_menu');
        ?>

        <?php
        //myaccount
        if ($storeship_disable_header_account_menu == false) {

            do_action('storeship_action_my_account_section');
        }
        ?>

        <!--        --><?php
        //        if ($storeship_disable_header_wishlist_menu == false) {
        //            do_action('storeship_action_wishlist_section');
        //        }
        //
        ?>
        <?php if (class_exists('WooCommerce')): ?>
            <?php
            if ($storeship_disable_header_cart_menu == false): ?>
                <div class="cart-shop">
                    <div class="af-cart-wrapper dropdown">
                        <?php storeship_woocommerce_header_cart(); ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>


    </div>
    <?php
}

add_action('storeship_action_cart_group', 'storeship_cart_group');