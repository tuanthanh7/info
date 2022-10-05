<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Storeship
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function storeship_woocommerce_setup()
{
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}

add_action('after_setup_theme', 'storeship_woocommerce_setup');

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function storeship_woocommerce_scripts()
{
    wp_enqueue_style('storeship-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array('storeship-style'));

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

//add_action('wp_enqueue_scripts', 'storeship_woocommerce_scripts', 9999);

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
//add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function storeship_woocommerce_active_body_class($classes)
{
    $classes[] = 'woocommerce-active';

    return $classes;
}

add_filter('body_class', 'storeship_woocommerce_active_body_class');


//Shop page control
if (!function_exists('storeship_loop_shop_columns')) {
    function storeship_loop_shop_columns($cols)
    {
        // $cols contains the current number of products per page based on the value stored on Options -> Reading
        // Return the number of products you wanna show per page.
        $cols = storeship_get_option('store_product_shop_page_row');
        return $cols;
    }
}
add_filter('loop_shop_columns', 'storeship_loop_shop_columns', 20);

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function storeship_woocommerce_products_per_page()
{
    $product_loop = storeship_get_option('store_product_shop_page_product_per_page');
    return $product_loop;
}

add_filter('loop_shop_per_page', 'storeship_woocommerce_products_per_page');


add_filter('woocommerce_product_thumbnails_columns', 'storeship_woocommerce_thumbnail_columns');

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function storeship_woocommerce_loop_columns()
{
    $cols = storeship_get_option('store_product_shop_page_row');
    return $cols;
}

add_filter('loop_shop_columns', 'storeship_woocommerce_loop_columns');


/**
 * Remove product zoom
 */
if (!function_exists('storeship_remove_product_zoom')) {
    /**
     * Product columns wrapper.
     *
     * @return  void
     */
    function storeship_remove_product_zoom($tabs)
    {
        $product_zoom = storeship_get_option('store_product_page_product_zoom');
        if ($product_zoom == 'no') {
            remove_theme_support('wc-product-gallery-zoom');
            remove_theme_support('wc-product-gallery-lightbox');
        }
        return $tabs;
    }
}
add_action('wp_loaded', 'storeship_remove_product_zoom', 9999);

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function storeship_woocommerce_thumbnail_columns()
{
    $cols = storeship_get_option('store_product_page_gallery_thumbnail_columns');
    return $cols;
}



/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function storeship_woocommerce_related_products_args($args)
{


    $cols = storeship_get_option('store_product_page_related_products_per_row');
    if($cols == '3'){
        $posts_per_page = 3;
    }else{
        $posts_per_page = 4;
    }

    $defaults = array(
        'posts_per_page' => $posts_per_page,
        'columns' => $cols,
    );

    $args = wp_parse_args($defaults, $args);

    return $args;
}

add_filter('woocommerce_output_related_products_args', 'storeship_woocommerce_related_products_args');


/**
 * Remove related products output
 */
if (!function_exists('storeship_remove_related_products')) {
    /**
     * Product columns wrapper.
     *
     * @return  void
     */
    function storeship_remove_related_products()
    {
        $related_products = storeship_get_option('store_product_page_related_products');
        if ($related_products == 'no') {
            remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
        }

    }
}
add_action('wp_loaded', 'storeship_remove_related_products');


if (!function_exists('storeship_woocommerce_product_columns_wrapper')) {
    /**
     * Product columns wrapper.
     *
     * @return  void
     */
    function storeship_woocommerce_product_columns_wrapper()
    {
        $columns = storeship_woocommerce_loop_columns();
        echo '<div class="columns-' . absint($columns) . '">';
    }
}
add_action('woocommerce_before_shop_loop', 'storeship_woocommerce_product_columns_wrapper', 40);


if (!function_exists('storeship_woocommerce_product_columns_wrapper_close')) {
    /**
     * Product columns wrapper close.
     *
     * @return  void
     */
    function storeship_woocommerce_product_columns_wrapper_close()
    {
        echo '</div>';
    }
}
add_action('woocommerce_after_shop_loop', 'storeship_woocommerce_product_columns_wrapper_close', 40);

/**
 * Remove default WooCommerce wrapper.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
//remove_action('wp_footer', 'woocommerce_demo_store', 10);

if (!function_exists('storeship_woocommerce_wrapper_before')) {
    /**
     * Before Content.
     *
     * Wraps all WooCommerce content in wrappers which match the theme markup.
     *
     * @return void
     */
    function storeship_woocommerce_wrapper_before()
    {
        ?>
        <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
        <?php
    }
}
add_action('woocommerce_before_main_content', 'storeship_woocommerce_wrapper_before');

if (!function_exists('storeship_woocommerce_wrapper_after')) {
    /**
     * After Content.
     *
     * Closes the wrapping divs.
     *
     * @return void
     */
    function storeship_woocommerce_wrapper_after()
    {
        ?>
        </main><!-- #main -->
        </div><!-- #primary -->
        <?php
    }
}
add_action('woocommerce_after_main_content', 'storeship_woocommerce_wrapper_after');


/**
 * Remove related products output
 */
if (!function_exists('storeship_remove_product_ordering')) {
    /**
     * Product columns wrapper.
     *
     * @return  void
     */
    function storeship_remove_product_ordering()
    {
        $sort_products = storeship_get_option('store_product_shop_page_product_sort');
        if ($sort_products == 'no') {
            remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
        }

    }
}
add_action('wp_loaded', 'storeship_remove_product_ordering', 9999);


if (!function_exists('storeship_onsale_product_count')) {
    function storeship_onsale_product_count($category_id = 0)
    {
        $args = array(
            'post_type' => 'product',
            'post_status' => 'published',
            'posts_per_page' => -1,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => $category_id
                ),
                array(
                    'taxonomy' => 'product_visibility',
                    'terms' => array('exclude-from-catalog'),
                    'field' => 'name',
                    'operator' => 'NOT IN',
                ),
            ),
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'relation' => 'OR',
                    array(
                        'key' => '_sale_price',
                        'value' => 0,
                        'compare' => '>',
                        'type' => 'numeric'
                    ),
                    array(
                        'key' => '_min_variation_sale_price',
                        'value' => 0,
                        'compare' => '>',
                        'type' => 'numeric'
                    )
                ),
//                array(
//                    'key' => '_stock_status',
//                    'value' => 'instock'
//                ),
            )
        );

        $query = new WP_Query($args);
        $count = $query->found_posts;
        return absint($count);
    }
}

if (!function_exists('storeship_product_count')) {
    function storeship_product_count($category_id = 0)
    {

        $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            //'no_found_rows' => 1,
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => -1,
            'nopaging' => true,
            'fields' => 'ids',
            'hide_empty' => true,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => $category_id, // Replace with the parent category ID
                    'include_children' => true,

                ),
                array(
                    'taxonomy' => 'product_visibility',
                    'terms' => array('exclude-from-catalog'),
                    'field' => 'name',
                    'operator' => 'NOT IN',
                ),
            ),


        );


        $query = new WP_Query($args);
        $count = $query->found_posts;
        return absint($count);
    }
}


/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
 * <?php
 * if ( function_exists( 'storeship_woocommerce_header_cart' ) ) {
 * storeship_woocommerce_header_cart();
 * }
 * ?>
 */

if (!function_exists('storeship_woocommerce_header_cart')) {
    /**
     * Display Header Cart.
     *
     * @return void
     */
    function storeship_woocommerce_header_cart()
    {

        $storeship_enable_minicart = storeship_get_option('aft_enable_minicart');

        if ($storeship_enable_minicart == false) {
            return;
        }


        if (is_cart()) {
            $class = 'current-menu-item';
        } else {
            $class = '';
        }
        ?>

        <div class="af-cart-wrap">
            <div class="af-cart-icon-and-count dropdown-toggle" data-toggle="" aria-haspopup="true"
                 aria-expanded="true">
                <span class="af-cart-item-count">
                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>"
                       title="<?php esc_attr_e('Cart Page', 'storeship'); ?>">
                    <i class="fa fa-shopping-bag"></i>
                    <span class="item-count gbl-bdge-bck-c"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>
                    </a>
                </span>

            </div>
            <?php $show_minicart_contents = storeship_get_option('aft_product_minicart_contents');
            if ($show_minicart_contents == 'yes'):
                if (!is_checkout()):
                    ?>
                    <div class="top-cart-content primary-bgcolor dropdown-menu">
                        <ul class="site-header-cart">

                            <li>
                                <?php
                                $instance = array(
                                    'title' => '',
                                );

                                the_widget('WC_Widget_Cart', $instance);
                                ?>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <?php
    }
}

if (!function_exists('storeship_woocommerce_cart_link_fragment')) {
    /**
     * Cart Fragments.
     *
     * Ensure cart contents update when products are added to the cart via AJAX.
     *
     * @param array $fragments Fragments to refresh via AJAX.
     * @return array Fragments to refresh via AJAX.
     */
    function storeship_woocommerce_cart_link_fragment($fragments)
    {
        ob_start();
        storeship_woocommerce_cart_icon();
        $fragments['.af-cart-icon-and-count'] = ob_get_clean();

        return $fragments;
    }
}
add_filter('woocommerce_add_to_cart_fragments', 'storeship_woocommerce_cart_link_fragment');


if (!function_exists('storeship_woocommerce_cart_icon')) {
    /**
     * Cart Link.
     *
     * Displayed a link to the cart including the number of items present and the cart total.
     *
     * @return void
     */
    function storeship_woocommerce_cart_icon()
    {
        $header_cart_icon = storeship_get_option('header_cart_icon');

        ?>
        <div class="af-cart-icon-and-count dropdown-toggle" data-toggle="" aria-haspopup="true"
             aria-expanded="true">
            <span class="af-cart-item-count">
                <a href="<?php echo esc_url(wc_get_cart_url()); ?>"
                   title="<?php esc_attr_e('Cart Page', 'storeship'); ?>">
                <i class="fa <?php echo esc_attr($header_cart_icon); ?>"></i>
                <span class="item-count gbl-bdge-bck-c"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>
                    <?php $show_minicart_total = storeship_get_option('aft_product_minicart_total');

                    if ($show_minicart_total == 'yes'):
                        ?>
                        <span class="amount"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span>
                    <?php endif; ?>
                </a>
            </span>
        </div>
        <?php
    }
}

if (!function_exists('storeship_woocommerce_cart_link')) {
    /**
     * Cart Link.
     *
     * Displayed a link to the cart including the number of items present and the cart total.
     *
     * @return void
     */
    function storeship_woocommerce_cart_link()
    {
        ?>
        <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>"
           title="<?php esc_attr_e('View your shopping cart', 'storeship'); ?>">
            <?php
            $item_count_text = sprintf(
            /* translators: number of items in the mini cart. */
                _n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'storeship'),
                WC()->cart->get_cart_contents_count()
            );
            ?>
            <span class="count"><?php echo esc_html($item_count_text); ?></span>
            <?php

            $show_minicart_total = storeship_get_option('aft_product_minicart_total');


            if ($show_minicart_total == 'yes'):
                ?>
                <span class="amount"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span>
            <?php endif; ?>

        </a>
        <?php
    }
}


/**
 * Remove the breadcrumbs
 */
add_action('wp_loaded', 'storeship_replace_wc_breadcrumbs');
function storeship_replace_wc_breadcrumbs(){
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
    $enable_breadcrumbs = storeship_get_option('store_enable_breadcrumbs');
    if ($enable_breadcrumbs == 'yes') {
        add_action('storeship_before_main_content', 'woocommerce_breadcrumb', 20, 0);
    }

}


/*Display YITH Wishlist Buttons at shop page*/
if (!function_exists('storeship_display_yith_wishlist_loop')) {
    /**
     * Display YITH Wishlist Buttons at product archive page
     *
     */
    function storeship_display_yith_wishlist_loop()
    {

        if (!function_exists('YITH_WCWL')) {
            return;
        }

        echo '<div class="yith-btn">';
        echo do_shortcode("[yith_wcwl_add_to_wishlist]");
        echo '</div>';
    }
}

//$enable_wishlists_on_listings = storeship_get_option('enable_wishlists_on_listings', true);
//if( $enable_wishlists_on_listings ){
add_action('storeship_woocommerce_add_to_wishlist_button', 'storeship_display_yith_wishlist_loop', 16);
//}


if (!function_exists('storeship_woocommerce_header_wishlist')) {
    /**
     * Display Header Wishlist.
     *
     * @return void
     */
    function storeship_woocommerce_header_wishlist()
    {
        ?>
        <div class="aft-wishlist aft-woo-nav">
            <div class="aft-wooicon">
                <a class="aft-wishlist-trigger" href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>">
                    <?php
                    $header_wishlist_icon = storeship_get_option('header_wishlist_icon'); ?>

                    <i class="fa <?php echo esc_attr($header_wishlist_icon); ?>"></i>
                    <span class="aft-woo-counter gbl-bdge-bck-c"><?php echo absint(yith_wcwl_count_all_products()); ?></span>
                </a>
            </div>
        </div>
        <?php
    }
}

if (!function_exists('storeship_update_wishlist_count')) {
    /**
     * Return Wishlist product count.
     */
    function storeship_update_wishlist_count()
    {
        if (class_exists('YITH_WCWL')) {

            wp_send_json(array(
                'count' => yith_wcwl_count_all_products()
            ));
        }
    }
}
add_action('wp_ajax_storeship_update_wishlist_count', 'storeship_update_wishlist_count');
add_action('wp_ajax_nopriv_storeship_update_wishlist_count', 'storeship_update_wishlist_count');

if (!function_exists('storeship_display_wishlist_message')) {
    /**
     * Return Wishlist product added message.
     */
    function storeship_display_wishlist_message($msg)
    {
        if (class_exists('YITH_WCWL')) {
            if (property_exists('YITH_WCWL', 'details')) {
                $details = YITH_WCWL()->details;
                if (is_array($details) && isset($details['add_to_wishlist'])) {
                    $product_id = $details['add_to_wishlist'];
                    $product = wc_get_product($product_id);
                    if (!is_wp_error($product)) {
                        $product_title = sprintf(__('   %s has been added to your wishist.', 'storeship'), '<strong>' . $product->get_title() . '</strong>');
                        $product_image = $product->get_image();

                        ob_start();
                        ?>
                        <div class="aft-notification-header">
                            <h3><?php esc_html_e('WishList Items', 'storeship') ?></h3>
                        </div>
                        <div class="aft-notification">
                            <div class="aft-notification-image">
                                <?php echo wp_kses_post($product_image); ?>
                            </div>
                            <div class="aft-notification-title">
                                <?php echo wp_kses_post($product_title); ?>
                            </div>
                        </div>
                        <div class="aft-notification-button">
                            <a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>">
                                <?php esc_html_e('View Wishlist', 'storeship') ?>
                            </a>
                        </div>

                        <?php
                        $msg = ob_get_clean();
                    }
                }
            }
        }
        return $msg;
    }
}
add_filter('yith_wcwl_product_added_to_wishlist_message', 'storeship_display_wishlist_message');

/*Display YITH Quickview Buttons at shop page*/
if (!function_exists('storeship_display_yith_quickview_loop')) {
    /**
     * Display YITH Wishlist Buttons at product archive page
     *
     */
    function storeship_display_yith_quickview_loop()
    {
        if (!function_exists('yith_wcqv_install')) {
            return;
        }

        echo '<div class="yith-btn">';
        global $product, $post;
        $product_id = $post->ID;

        if (!$product_id) {
            $product instanceof WC_Product && $product_id = yit_get_prop($product, 'id', true);
        }

        if ($product_id) {
            // get label
            ?>

            <a href="#" class="button yith-wcqv-button" data-product_id="<?php echo esc_attr($product_id); ?>">
                <div data-toggle="tooltip" data-placement="top" title="Quick View"><i class="fa fa-search"
                                                                                      aria-hidden="true"></i></div>
            </a>

        <?php }

        echo '</div>';


    }
}

//$enable_wishlists_on_listings = storeship_get_option('enable_wishlists_on_listings', true);
//if( $enable_wishlists_on_listings ){
add_action('storeship_woocommerce_yith_quick_view_button', 'storeship_display_yith_quickview_loop', 16);
//}

/*Display YITH Compare Buttons at shop page*/
if (!function_exists('storeship_display_yith_compare_loop')) {
    /**
     * Display YITH Wishlist Buttons at product archive page
     *
     */
    function storeship_display_yith_compare_loop()
    {
        if (!class_exists('YITH_Woocompare')) {
            return;
        }


        echo '<div class="yith-btn">';
        global $product, $post;
        $product_id = $post->ID;

        if (!$product_id) {
            $product instanceof WC_Product && $product_id = yit_get_prop($product, 'id', true);
        }

        if ($product_id) {

            echo do_shortcode('[yith_compare_button type="link"  button_text="<span class="aft-tooltip" data-toggle="tooltip" data-placement="top" title="Compare"></span><i class="fa fa-refresh" aria-hidden="true" ></i>"]');

        }

        echo '</div>';


    }
}

//$enable_wishlists_on_listings = storeship_get_option('enable_wishlists_on_listings', true);
//if( $enable_wishlists_on_listings ){
add_action('storeship_woocommerce_yith_compare_button', 'storeship_display_yith_compare_loop', 16);
//}

if (!function_exists('storeship_sale_flash')) {
    function storeship_sale_flash($content, $post, $product)
    {
        $sale_flash = storeship_get_option('store_single_sale_text');
        if (!empty($sale_flash)) {
            $content = '<span class="onsale">' . $sale_flash . '</span>';
        }

        return $content;
    }
}
add_filter('woocommerce_sale_flash', 'storeship_sale_flash', 10, 3);


/*Display YITH Quickview Buttons at shop page*/
if (!function_exists('storeship_add_to_cart_text')) {

    function storeship_add_to_cart_text($add_to_cart_texts)
    {
        global $product;

        if( method_exists( $product,'get_type' ) ){
            $product_type = $product->get_type();
        }else{
            $product_type = $product->product_type;
        }


        $simple = storeship_get_option('store_simple_add_to_cart_text');


        if ($product_type == 'simple') {
            return $simple;
        }



        return $add_to_cart_texts;

    }

}
    

// Single Product
add_filter('woocommerce_product_add_to_cart_text', 'storeship_add_to_cart_text', 10, 2);


/*Display YITH Quickview Buttons at shop page*/
if (!function_exists('storeship_single_add_to_cart_text')) {

    function storeship_single_add_to_cart_text()
    {
        $button_texts = storeship_get_option('store_single_add_to_cart_text');
        return $button_texts; // Change this to change the text on the Single Product Add to cart button.
    }

}
// Single Product
add_filter('woocommerce_product_single_add_to_cart_text', 'storeship_single_add_to_cart_text');


if (!function_exists('storeship_woocommerce_template_loop_hooks')) :

    function storeship_woocommerce_template_loop_hooks()
    {
    
        add_action('storeship_woocommerce_show_product_loop_sale_flash', 'woocommerce_show_product_loop_sale_flash');

        remove_action('woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title');
        remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);


        if (function_exists('YITH_WCQV_Frontend')) {
            remove_action('woocommerce_after_shop_loop_item', array(YITH_WCQV_Frontend(), 'yith_add_quick_view_button'), 15);
        }

    }
endif;

add_action('wp_loaded', 'storeship_woocommerce_template_loop_hooks');

if (!function_exists('storeship_woocommerce_template_loop_product_title')) {
    function storeship_woocommerce_template_loop_product_title()
    {

        $cat_display = storeship_get_option('aft_product_loop_category');
        if ($cat_display == 'yes'):
            storeship_post_categories();
        endif;

        echo '<h2 class="' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')) . '"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
}

add_action('woocommerce_shop_loop_item_title', 'storeship_woocommerce_template_loop_product_title', 10);


if (!function_exists('storeship_product_sale_flash_in_percentage')) {
    function storeship_product_sale_flash_in_percentage($output, $post, $product)
    {

        $sale_in_percentage = true;
        if ($sale_in_percentage) {
            global $product;
            if ($product->is_on_sale()) {
                if ($product->is_type('variable')) {
                    $regular_price = $product->get_variation_regular_price();
                    $sale_price = $product->get_variation_price();
                } else {
                    $regular_price = $product->get_regular_price();
                    $sale_price = $product->get_sale_price();
                }

                if (!empty($sale_price)) {
                    $percent_off = (($regular_price - $sale_price) / $regular_price) * 100;
                    return '<span class="onsale">' . round($percent_off) . __('% Off', 'storeship') . '</span>';

                } else {
                    return $output;
                }

            }
        } else {
            return $output;
        }


    }

}
add_filter('woocommerce_sale_flash', 'storeship_product_sale_flash_in_percentage', 11, 3);

/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 */
function storeship_wc_scripts_enqueues()
{

          wp_enqueue_script(
            'storeship-wc',
            get_template_directory_uri() . '/assets/woocommerce-script.js',
            array('jquery'),
            '1.0.0',
            true
        );
        wp_localize_script(
            'storeship-wc',
            'global',
            array(
                'ajax' => admin_url('admin-ajax.php'),
            )
        );
    
}

add_action('wp_enqueue_scripts', 'storeship_wc_scripts_enqueues');



function storeship_woocommerce_version_check( $version = '3.0' ) {
    if ( class_exists( 'WooCommerce' ) ) {
        global $woocommerce;
        if( version_compare( $woocommerce->version, $version, ">=" ) ) {
            return true;
        }
    }
    return false;
}


/**
 * Live wc search feature.
 *
 * @since 1.0.0
 */
function storeship_ajax_search()
{
    
    $args = array(
        'post_type' => array('product'),
        'post_status' => 'publish',
        'nopaging' => true,
        'posts_per_page' => 100,
        's' => wp_unslash($_POST['search']),

    );

    if( storeship_woocommerce_version_check() ){
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'exclude-from-catalog',
                'operator' => 'NOT IN',
            ),
        );
    } else {
        $args['meta_query'] = array(
            array(
                'key'       => '_visibility',
                'value'     => 'hidden',
                'compare'   => '!=',
            )
        );

    }



    $results = new WP_Query($args);

    $items = array();

    if (!empty($results->posts)) {
        foreach ($results->posts as $result) {
            $items[] = $result->post_title;
        }
    }
    wp_send_json_success($items);
        exit;
    
}

add_action('wp_ajax_search_site', 'storeship_ajax_search');
add_action('wp_ajax_nopriv_search_site', 'storeship_ajax_search');


add_filter('body_class', 'storeship_body_class');
function storeship_body_class($classes)
{

    //    foreach ( $classes as $key => $value ) {
    //        if ( $value == 'woocommerce-page' ) unset( $classes[ $key ] );
    //    }

    if (!is_woocommerce()) {
        $classes[] = 'woocommerce';
    }

    return $classes;

}

function storeship_woocommerce_shop_loop_subcategory_title($category)
{
    $product_count = 'true';
    $onsale_product_count = 'true';
    $products_count = storeship_product_count($category->term_id);
    $products_count = ($product_count == 'true') ? $products_count : 0;
    $product_onsale = storeship_onsale_product_count($category->term_id);
    $product_onsale = ($onsale_product_count == 'true') ? $product_onsale : 0;
    ?>
    <h2 class="woocommerce-loop-category__title">
        <?php echo esc_html($category->name); ?>
    </h2>
    <?php if (absint($products_count) > 0): ?>
    <div class="product-onsale-count clearfix">
    <span class="product-count">
           <?php printf(_n('<span class="item-count">%s</span>
            <span class="item-texts">item</span>', '<span class="item-count">%s</span><span class="item-texts">items</span>', $products_count, 'storeship'), number_format_i18n($products_count)); ?>

       </span>
<?php endif;

    if (absint($product_onsale) > 0):
        $sale_flash_text = storeship_get_option('store_single_sale_text');
        ?>
        <span class="product-count onsale-product-count">

            <span class="item-count"> <?php echo esc_html($product_onsale); ?></span>
            <span class="item-texts item-texts-onsale"><?php echo esc_html($sale_flash_text); ?></span></span>
    <?php
    endif; ?>
    </div>
    <?php


}

add_action('woocommerce_shop_loop_subcategory_title', 'storeship_woocommerce_shop_loop_subcategory_title');


if (!function_exists('storeship_wishlistqvcomp_iconset')) :
    /**
     *
     */
    function storeship_wishlistqvcomp_iconset()
    {

        $iconset = 0;
        $YITH_WCWL = false;
        $yith_wcqv_install = false;
        $YITH_Woocompare = false;

        $icons = array();
        if (class_exists('YITH_WCWL')) {
            $iconset += 1;
            $YITH_WCWL = true;
        }
        if (function_exists('yith_wcqv_install')) {
            $iconset += 1;
            $yith_wcqv_install = true;

        }
        if (class_exists('YITH_Woocompare')) {
            $iconset += 1;
            $YITH_Woocompare = true;
        }
        if ($iconset > 0):
            ?>
            <ul class="product-item-meta">
                <?php if ($YITH_WCWL == true): ?>
                    <li><?php do_action('storeship_woocommerce_add_to_wishlist_button'); ?></li>
                <?php endif; ?>
                <?php if ($yith_wcqv_install == true): ?>
                    <li><?php do_action('storeship_woocommerce_yith_quick_view_button'); ?></li>
                <?php endif; ?>
                <?php if ($YITH_Woocompare == true): ?>
                    <li><?php do_action('storeship_woocommerce_yith_compare_button'); ?></li>
                <?php endif; ?>

            </ul>
        <?php
        endif;
    }
endif;

add_action('woocommerce_before_shop_loop_item_title', 'storeship_wishlistqvcomp_iconset');

if (!function_exists('storeship_iconset_class')) :
    /**
     * @return string
     */
    function storeship_iconset_class()
    {
        $iconset = 0;
        if (class_exists('YITH_WCWL')) {
            $iconset += 1;
        }
        if (function_exists('yith_wcqv_install')) {
            $iconset += 1;
        }
        if (class_exists('YITH_Woocompare')) {
            $iconset += 1;
        }

        $iconset_class = 'aft-iconset-' . $iconset;
        return $iconset_class;
    }
endif;


if (!function_exists('storeship_language_and_currency_switcher')) :
    /**
     *
     */
    function storeship_language_and_currency_switcher()
    {
        ?>
        <?php if (class_exists('WooCommerce')): ?>
        <?php
        $language_switcher_shortcode = storeship_get_option('aft_language_switcher_shortcode');
        $currency_switcher_shortcode = storeship_get_option('aft_currency_switcher_shortcode');
        if (!empty($language_switcher_shortcode) || !empty($currency_switcher_shortcode)):
            ?>
            <div class="aft-language-currency-switcher">
                <?php
                if (!empty($language_switcher_shortcode)):
                    ?>
                    <div class="language-currency-switcher language-switcher">
                        <?php echo do_shortcode($language_switcher_shortcode); ?>
                    </div>
                <?php endif; ?>

                <?php

                if (!empty($currency_switcher_shortcode)):
                    ?>
                    <div class="language-currency-switcher currency-switcher">
                        <?php echo do_shortcode($currency_switcher_shortcode); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
        <?php
    }
endif;

if (!function_exists('storeship_my_account_dropdown')) :
    /**
     * @param string $display_account_texts
     */
    function storeship_my_account_dropdown($display_account_texts = 'true')
    {


        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            //$account_texts = __('My Account', 'storeship');
            $account_texts = $current_user->display_name;
        } else {
            $account_texts = __('Login', 'storeship');
            if (get_option('users_can_register')) {
                $account_texts = __('Login/Register', 'storeship');
            }
        }

        $myaccount_page_url ='';
        $myaccount_page_id = get_option('woocommerce_myaccount_page_id');
        if ($myaccount_page_id) {
            $myaccount_page_url = get_permalink($myaccount_page_id);
            $header_my_account_icon = storeship_get_option('header_my_account_icon');
        }


        ?>
        <?php if(!empty($myaccount_page_url)): ?>
        <div class="account-user">
        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
            <i class="fa <?php echo esc_attr($header_my_account_icon); ?>"></i>
        </a>
        <ul class="af-my-account-menu prime-color">
            <?php if ($display_account_texts == 'true'): ?>
                <li><a class="af-my-account-admin"
                       href="<?php echo esc_url($myaccount_page_url); ?>"><?php echo esc_html($account_texts); ?></a>
                </li>
            <?php endif; ?>
            <?php if (is_user_logged_in()):


                $orders = get_option('woocommerce_myaccount_orders_endpoint', 'orders');
                $edit_account = get_option('woocommerce_myaccount_edit_account_endpoint', 'edit-account');
                $customer_logout = get_option('woocommerce_logout_endpoint', 'customer-logout');

                ?>
                <li><a class="af-my-account-order"
                       href="<?php echo esc_url(wc_get_account_endpoint_url($orders)); ?>"><?php echo esc_html('My Orders', 'storeship'); ?></a>
                </li>
                <li><a class="af-my-account-edit"
                       href="<?php echo esc_url(wc_get_account_endpoint_url($edit_account)); ?>"><?php echo esc_html('Edit Account', 'storeship'); ?></a>
                </li>
                <li><a class="af-my-account-log"
                       href="<?php echo esc_url(wc_get_account_endpoint_url($customer_logout)); ?>"><?php echo esc_html('Logout', 'storeship'); ?></a>
                </li>
            <?php endif; ?>
        </ul>
        </div>
    <?php endif; ?>
        <?php
    }
endif;


// -------------
//  Show Custom Buttons on Single Product and Cart page

add_action('woocommerce_before_quantity_input_field', 'storeship_display_quantity_plus');

function storeship_display_quantity_plus()
{
    echo '<button type="button" class="aft-custom-qty-btn plus" >+</button>';
}

add_action('woocommerce_after_quantity_input_field', 'storeship_display_quantity_minus');

function storeship_display_quantity_minus()
{
    echo '<button type="button" class="aft-custom-qty-btn  minus" >-</button>';
}

//show empty star rating always
function storeship_woocommerce_product_get_rating_html( $rating_html, $rating, $count ) {

    $aft_product_loop_toggle_rating = storeship_get_option('aft_product_loop_toggle_rating');

    if( $aft_product_loop_toggle_rating == 'aft-show-empty-rating' ){
        $rating_html  = '<div class="star-rating">';
        $rating_html .= wc_get_star_rating_html( $rating, $count );
        $rating_html .= '</div>';
        return $rating_html;
    } else {
        return $rating_html;
    }


};
add_filter( 'woocommerce_product_get_rating_html', 'storeship_woocommerce_product_get_rating_html', 10, 3 );