<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * <?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Storeship
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses storeship_header_style()
 */
function storeship_custom_header_setup()
{
    add_theme_support('custom-header', apply_filters('storeship_custom_header_args', array(
        'default-image' => '',
        'default-text-color' => '111111',
        'width' => 1500,
        'height' => 300,
        'flex-height' => true,
        'wp-head-callback' => 'storeship_header_style',
    )));

}

add_action('after_setup_theme', 'storeship_custom_header_setup');

if (!function_exists('storeship_header_style')) :
    /**
     * Styles the header image and text displayed on the blog.
     *
     * @see storeship_custom_header_setup().
     */
    function storeship_header_style()
    {
        $header_text_color = get_header_textcolor();
        $site_title_font_size = storeship_get_option('site_title_font_size');

        /*
         * If no custom options for text are set, let's bail.
         * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
         */
//        if (get_theme_support('custom-header', 'default-text-color') === $header_text_color) {
//            return;
//        }

        // If we get this far, we have custom styles. Let's do this.
        ?>
        <style type="text/css">
            <?php
            // Has the text been hidden?
            if ( ! display_header_text() ) :
                ?>
            .site-title,
            .site-description {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
                display:none;
            }

            <?php
            // If the user has set a custom color for the text use that.
            else :
                ?>
            body .header-style-3 .logo-brand .site-title a,
            body .header-style-3 .logo-brand .site-title a:hover,
            body .header-style-3 .logo-brand .site-title a:visited,
            body .header-style-3 .logo-brand .site-description{

                color: #<?php echo esc_attr( $header_text_color ); ?>;
            }

            body .logo-brand .site-title {
                font-size: <?php echo esc_attr( $site_title_font_size ); ?>px;
            }

            <?php endif; ?>
        </style>
        <?php
    }
endif;
