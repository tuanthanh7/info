<?php
/**
 * Recommended plugins
 *
 * @package CoverNews
 */

if ( ! function_exists( 'storeship_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function storeship_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'WooCommerce', 'storeship' ),
                'slug'     => 'woocommerce',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'YITH WooCommerce Wishlist', 'storeship' ),
                'slug'     => 'yith-woocommerce-wishlist',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Blockspare – Beautiful Page Building Gutenberg Blocks for WordPress', 'storeship' ),
                'slug'     => 'blockspare',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Latest Posts Block Lite', 'storeship' ),
                'slug'     => 'latest-posts-block-lite',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Magic Content Box Lite', 'storeship' ),
                'slug'     => 'magic-content-box-lite',
                'required' => false,
            ),

            array(
                'name'     => esc_html__( 'WP Post Author', 'storeship' ),
                'slug'     => 'wp-post-author',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'AF Companion', 'storeship' ),
                'slug'     => 'af-companion',
                'required' => false,
            )
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'storeship_recommended_plugins' );
