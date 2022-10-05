<?php
/**
 * Block Header .
 *
 * @package Storeship
 */
?>



<?php
$storeship_header_layout_transparency = storeship_get_option('header_layout_transparency');
?>
<div class="header-style-3 header-style-default <?php echo esc_attr($storeship_header_layout_transparency); ?>">
    <div class="desktop-header clearfix">
        <?php

        $storeship_show_top_categories_section = storeship_get_option('show_top_categories_section');

        ?>



        <?php
        $storeship_class = '';
        $storeship_background = '';
        if (has_header_image()) {
            $storeship_class = 'data-bg';
            $storeship_background = get_header_image();
        }

        ?>

        <div id="site-primary-navigation"
             class="navigation-section-wrapper clearfix <?php echo esc_attr($storeship_header_layout_transparency); ?>">
            <div class="container-wrapper">
                <div class="af-flex-grid">


                    <div class="header-left-part">
                        <?php storeship_get_block('logo', 'header'); ?>
                    </div>
                    <div class="header-middle-part">
                        <div class="header-menu-part">
                            <div class="navigation-container">
                                <nav id="site-navigation" class="main-navigation">
                                    <span class="toggle-menu" aria-controls="primary-menu" aria-expanded="false">
                                        <a href="javascript:void(0)" class="aft-void-menu">
                                <span class="screen-reader-text">
                                    <?php esc_html_e('Primary Menu', 'storeship'); ?></span>
                                        <i class="ham"></i>
                                        </a>
                                    </span>
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'aft-primary-nav',
                                        'menu_id' => 'primary-menu',
                                        'container' => 'div',
                                        'container_class' => 'menu main-menu'
                                    ));
                                    ?>
                                </nav><!-- #site-navigation -->
                            </div>
                        </div>
                        <div class="header-cart-part">


                            <?php do_action('storeship_action_cart_group'); ?>

                            <?php
                            $storeship_show_custom_link = storeship_get_option('enable_custom_link_option');
                            if ($storeship_show_custom_link) {
                                $storeship_custom_button_text = storeship_get_option('header_custom_link_text');
                                $storeship_custom_button_link = storeship_get_option('header_custom_text_link');
                                if ($storeship_custom_button_link) {
                                    ?>
                                    <div class="header-right-part">
                                        <div class="custom-link">
                                            <a href="<?php echo esc_url($storeship_custom_button_link) ?>"><?php echo esc_html($storeship_custom_button_text); ?></a>
                                        </div>
                                    </div>
                                <?php }
                            }

                            do_action('storeship_action_off_canvas_section');
                            ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
