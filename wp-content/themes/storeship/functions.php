<?php
    /**
     * Storeship functions and definitions
     *
     * @link https://developer.wordpress.org/themes/basics/theme-functions/
     *
     * @package Storeship
     */

    if (!function_exists('storeship_setup')) :
        /**
         * Sets up theme defaults and registers support for various WordPress features.
         *
         * Note that this function is hooked into the after_setup_theme hook, which
         * runs before the init hook. The init hook is too late for some features, such
         * as indicating support for post thumbnails.
         */
        function storeship_setup()
        {
            /*
             * Make theme available for translation.
             * Translations can be filed in the /languages/ directory.
             * If you're building a theme based on Storeship, use a find and replace
             * to change 'storeship' to the name of your theme in all the template files.
             */
            load_theme_textdomain('storeship', get_template_directory() . '/languages');

            // Add default posts and comments RSS feed links to head.
            add_theme_support('automatic-feed-links');

            /*
             * Let WordPress manage the document title.
             * By adding theme support, we declare that this theme does not use a
             * hard-coded <title> tag in the document head, and expect WordPress to
             * provide it for us.
             */
            add_theme_support('title-tag');

            /*
             * Enable support for Post Thumbnails on posts and pages.
             *
             * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
             */
            add_theme_support('post-thumbnails');

            // Add featured image sizes
            //add_image_size('storeship-slider-full', 1500, 600, true); // width, height, crop
            add_image_size('storeship-featured', 1024, 0, false); // width, height, crop
            //add_image_size('storeship-medium-center', 936, 897, true); // width, height, crop
            add_image_size('storeship-medium-slider', 720, 450, true); // width, height, crop
            add_image_size('storeship-thumbnail', 450, 410, true); // width, height, crop

            /*
         * Enable support for Post Formats on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/post-formats/
         */
            add_theme_support('post-formats', array('image', 'video'));

            // This theme uses wp_nav_menu() in one location.
            register_nav_menus(array(
                'aft-primary-nav' => esc_html__('Primary Menu', 'storeship'),
                'aft-top-nav' => esc_html__('Top Menu', 'storeship'),
                'aft-social-nav' => esc_html__('Social Menu', 'storeship'),
                'aft-footer-nav' => esc_html__('Footer Menu', 'storeship'),
            ));

            /*
             * Switch default core markup for search form, comment form, and comments
             * to output valid HTML5.
             */
            add_theme_support('html5', array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ));

            // Set up the WordPress core custom background feature.
            add_theme_support('custom-background', apply_filters('storeship_custom_background_args', array(
                'default-color' => 'fff',
                'default-image' => '',
            )));

            // Add theme support for selective refresh for widgets.
            add_theme_support('customize-selective-refresh-widgets');

            /**
             * Add support for core custom logo.
             *
             * @link https://codex.wordpress.org/Theme_Logo
             */
            add_theme_support('custom-logo', array(
                'height' => 250,
                'width' => 250,
                'flex-width' => true,
                'flex-height' => true,
            ));


            /*
            * Add theme support for gutenberg block
            */
            add_theme_support('align-wide');
            add_theme_support( 'responsive-embeds' );



        }
    endif;
    add_action('after_setup_theme', 'storeship_setup');

    /**
     * Set the content width in pixels, based on the theme's design and stylesheet.
     *
     * Priority 0 to make it available to lower priority callbacks.
     *
     * @global int $content_width
     */
    function storeship_content_width()
    {
        // This variable is intended to be overruled from themes.
        // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
        // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
        $GLOBALS['content_width'] = apply_filters('storeship_content_width', 640);
    }

    add_action('after_setup_theme', 'storeship_content_width', 0);

    /**
     * function for google fonts
     */
    if (!function_exists('storeship_fonts_url')):

        /**
         * Return fonts URL.
         *
         * @return string Fonts URL.
         * @since 1.0.0
         */
        function storeship_fonts_url()
        {

            $fonts_url = '';
            $fonts = array();
            $subsets = 'latin,latin-ext';

            $storeship_primary_font = storeship_get_option('primary_font');
            $storeship_secondary_font = storeship_get_option('secondary_font');

            $storeship_fonts = array();
            $storeship_fonts[] = $storeship_primary_font;
            $storeship_fonts[] = $storeship_secondary_font;

            $i = 0;
            for ($i = 0; $i < count($storeship_fonts); $i++) {

                if ('off' !== sprintf(_x('on', '%s font: on or off', 'storeship'), $storeship_fonts[$i])) {
                    $fonts[] = $storeship_fonts[$i];
                }

            }

            if ($fonts) {
                $fonts_url = add_query_arg(array(
                    'family' => urldecode(implode('|', $fonts)),
                    'subset' => urldecode($subsets),
                ), 'https://fonts.googleapis.com/css');
            }

            return $fonts_url;
        }
    endif;

    /**
     * Load Init for Hook files.
     */
    require get_template_directory() . '/inc/custom-style.php';

    /**
     * Enqueue scripts and styles.
     */
    function storeship_styles()
    {

        $min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap' . $min . '.css');
        wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome' . $min . '.css');
        wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/slick/css/slick.css');
        wp_enqueue_style('sidr', get_template_directory_uri() . '/assets/sidr/css/jquery.sidr.dark.css');



        $fonts_url = storeship_fonts_url();

        if (!empty($fonts_url)) {
            wp_enqueue_style('storeship-google-fonts', $fonts_url, array(), null);
        }


        /**
         * Load WooCommerce compatibility file.
         */
        if (class_exists('WooCommerce')) {
            wp_enqueue_style('storeship-woocommerce-style', get_template_directory_uri() . '/woocommerce.css');

            $font_path = WC()->plugin_url() . '/assets/fonts/';
            $inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';
            wp_add_inline_style('storeship-woocommerce-style', $inline_font);
        }
        wp_enqueue_style('storeship-style', get_stylesheet_uri());
        wp_add_inline_style('storeship-style', storeship_custom_style());


    }

    add_action('wp_enqueue_scripts', 'storeship_styles');

    function storeship_scripts()
    {

        $min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
        wp_enqueue_script('matchheight', get_template_directory_uri() . '/assets/jquery-match-height/jquery.matchHeight' . $min . '.js', array('jquery'), '', true);
        wp_enqueue_script('storeship-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
        wp_enqueue_script('storeship-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-accordion');
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap' . $min . '.js', array('jquery'), '', true);
        wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/slick/js/slick' . $min . '.js', array('jquery'), '', true);
        wp_enqueue_script('sidr', get_template_directory_uri() . '/assets/sidr/js/jquery.sidr' . $min . '.js', array('jquery'), '', true);
        if (function_exists('YITH_WCWL')) {
            wp_enqueue_script('storeship-wishlist-script', get_template_directory_uri() . '/assets/wishlist.js', array('jquery'), '', true);
        }



        wp_enqueue_script('storeship-script', get_template_directory_uri() . '/assets/script.js', array('jquery', 'jquery-ui-accordion'), '', true);



    }

    add_action('wp_enqueue_scripts', 'storeship_scripts');


    /**
     * Enqueue admin scripts and styles.
     *
     * @since Storeship 1.0.0
     */
    function storeship__admin_scripts($hook)
    {
        if ('widgets.php' === $hook) {
            wp_enqueue_script('jquery');
            if ( ! did_action( 'wp_enqueue_media' ) ) {
                wp_enqueue_media();
            }
            wp_enqueue_script('storeship-widgets', get_template_directory_uri() . '/assets/widgets.js', array('jquery'), '1.0.0');
        }
    }

    add_action('admin_enqueue_scripts', 'storeship__admin_scripts');


    /**
     * Implement the Custom Header feature.
     */
    require get_template_directory() . '/inc/custom-header.php';

    /**
     * Custom template tags for this theme.
     */
    require get_template_directory() . '/inc/template-tags.php';

    /**
     * Functions which enhance the theme by hooking into WordPress.
     */
    require get_template_directory() . '/inc/template-functions.php';

    /**
     * Block Functions which enhance the theme by hooking into WordPress.
     */
    require get_template_directory() . '/inc/blocks/block-functions.php';

    /**
     * Customizer additions.
     */
    require get_template_directory() . '/inc/customizer/customizer.php';

    /**
     * Customizer additions.
     */
    require get_template_directory() . '/inc/init.php';

    /**
    * Customizer additions.
    */
    require get_template_directory() . '/inc/ocdi.php';

    /**
     * Load Jetpack compatibility file.
     */
    if (defined('JETPACK__VERSION')) {
        require get_template_directory() . '/inc/jetpack.php';
    }

    /**
     * Load WooCommerce compatibility file.
     */
    if (class_exists('WooCommerce')) {
        require get_template_directory() . '/inc/woocommerce.php';
    }
    
    

    function storeship_print_pre($args){
        if(!empty($args)){
            echo "<pre>";
            print_r($args);
            echo "</pre>";
        }else{
            echo "<pre>";
            print_r('Its empty!');
            echo "</pre>";
        }

    }
