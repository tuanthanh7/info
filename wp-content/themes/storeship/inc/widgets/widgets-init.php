<?php
// Load widget base.
    require_once get_template_directory() . '/inc/widgets/widgets-base.php';
    
    /* Theme Widget sidebars. */
    require get_template_directory() . '/inc/widgets/widgets-register-sidebars.php';
    
    /* Theme Widget sidebars. */
    require get_template_directory() . '/inc/widgets/widgets-common-functions.php';

    require get_template_directory() . '/inc/widgets/widget-store-social-menu.php';
    require get_template_directory() . '/inc/widgets/widget-store-author-info.php';
    require get_template_directory() .'/inc/widgets/widget-featured-product-carousel.php';
    require get_template_directory() .'/inc/widgets/widget-featured-product-list.php';
    require get_template_directory() .'/inc/widgets/widget-featured-product-grid.php';

    
    
    /* Register site widgets */
    if ( ! function_exists( 'storeship_widgets' ) ) :
        
        /**
         * Load widgets.
         *
         * @since 1.0.0
         */
        function storeship_widgets() {
            
            /**
             * Load WooCommerce compatibility file.
             */
            if ( class_exists( 'WooCommerce' ) ) {

                register_widget( 'Storeship_Featured_Product_Carousel' );
                register_widget( 'Storeship_Featured_Product_List' );
                register_widget( 'Storeship_Featured_Product_Grid' );

            }


            register_widget( 'Storeship_Author_Info' );
            register_widget( 'Storeship_Social_Menu' );
            
            
        }
    endif;
    
    add_action( 'widgets_init', 'storeship_widgets' );



