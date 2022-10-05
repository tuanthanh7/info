<?php
/**
 * Block Product Carousel support.
 *
 * @package Storeship
 */


require get_template_directory() . '/inc/blocks/section/block-section-frontpage-grid.php';
require get_template_directory() . '/inc/blocks/section/block-section-frontpage-list.php';
require get_template_directory() . '/inc/blocks/section/block-section-frontpage-carousel.php';




/**
 * Display or retrieve the HTML list of product categories.
 *
 * @since 2.1.0
 * @since 4.4.0 Introduced the `hide_title_if_empty` and `separator` arguments. The `current_category` argument was modified to
 *              optionally accept an array of values.
 * */
if (!function_exists('storeship_banner_slider_items')):
    function storeship_banner_slider_items()
    {
        $storeship_custom_data = array();
        $storeship_main_slider_content = storeship_get_option('select_main_slider_content');
        for ($storeship_i = 0; $storeship_i <= 5; $storeship_i++) {

            if ($storeship_main_slider_content == 'page-content') {
                $storeship_slider_page_id = storeship_get_option('slider_page_' . $storeship_i);
                if(!empty($storeship_slider_page_id)){
                    $storeship_slider_page_image = storeship_get_featured_image($storeship_slider_page_id, 'full');
                    $storeship_slider_page_title = get_the_title($storeship_slider_page_id);
                    $storeship_slider_page_subtitle = apply_filters('the_content', get_post_field('post_content', $storeship_slider_page_id));

                    $storeship_custom_data['data_' . $storeship_i][] = $storeship_slider_page_image;
                    $storeship_custom_data['data_' . $storeship_i][] = $storeship_slider_page_title;
                    $storeship_custom_data['data_' . $storeship_i][] = storeship_get_option('custom_caption_position_' . $storeship_i);
                    $storeship_custom_data['data_' . $storeship_i][] = storeship_get_option('button_text_' . $storeship_i);
                    $storeship_custom_data['data_' . $storeship_i][] = storeship_get_option('button_link_' . $storeship_i);
                    $storeship_custom_data['data_' . $storeship_i][] = $storeship_slider_page_subtitle;
                    $storeship_custom_data['data_' . $storeship_i][] = storeship_get_option('banner_title_animation_' . $storeship_i);
                }

            } else {
                $storeship_slider_custom_image = storeship_get_option('slider_custom_' . $storeship_i);
                if (!empty($storeship_slider_custom_image)) {
                    $storeship_custom_data['data_' . $storeship_i][] = wp_get_attachment_url($storeship_slider_custom_image);
                    $storeship_custom_data['data_' . $storeship_i][] = storeship_get_option('title_custom_' . $storeship_i);
                    $storeship_custom_data['data_' . $storeship_i][] = storeship_get_option('custom_caption_position_' . $storeship_i);
                    $storeship_custom_data['data_' . $storeship_i][] = storeship_get_option('button_text_' . $storeship_i);
                    $storeship_custom_data['data_' . $storeship_i][] = storeship_get_option('button_link_' . $storeship_i);
                    $storeship_custom_data['data_' . $storeship_i][] = storeship_get_option('subtitle_custom_' . $storeship_i);
                    $storeship_custom_data['data_' . $storeship_i][] = storeship_get_option('banner_title_animation_' . $storeship_i);
                }
            }
        }

        return $storeship_custom_data;
    }
endif;


function storeship_render_frontend_section_action($section = '0', $section_type = 'grid')
{


    if ($section_type == 'list') {
        $title = storeship_get_option('content_section_' . $section . '_title');
        $title_note = storeship_get_option('content_section_' . $section . '_title_note');
        $category1 = storeship_get_option('content_section_' . $section . '_product_categories');
        $number = storeship_get_option('number_of_content_section_' . $section . '_product');
        $img_url = storeship_get_option('content_section_' . $section . '_image');
        $img_position = storeship_get_option('content_section_' . $section . '_image_pos');
        storeship_frontpage_product_list_section($title, $title_note, $number, $category1, $img_url, $img_position);
    }

    if ($section_type == 'grid') {
        $title = storeship_get_option('content_section_' . $section . '_title');
        $title_note = storeship_get_option('content_section_' . $section . '_title_note');
        $category1 = storeship_get_option('content_section_' . $section . '_product_categories');
        $number = storeship_get_option('number_of_content_section_' . $section . '_product');
        $img_url = storeship_get_option('content_section_' . $section . '_image');
        $img_position = storeship_get_option('content_section_' . $section . '_image_pos');
        storeship_frontpage_product_grid_section($title, $title_note, $number, $category1, $img_url, $img_position);
    }
    


}

add_action('storeship_render_frontend_section', 'storeship_render_frontend_section_action', 10, 2);


/**
 * Display or retrieve the HTML list of product categories.
 *
 * @since 2.1.0
 * @since 4.4.0 Introduced the `hide_title_if_empty` and `separator` arguments. The `current_category` argument was modified to
 *              optionally accept an array of values.
 * */
if (!function_exists('storeship_product_mega_menu')):
    function storeship_product_mega_menu($cat_id)
    {
        $cat_product = storeship_get_products(3, $cat_id);
        $output = '';
        if ($cat_product->have_posts()) :
            $output .= '<ul class="product-ul">';
            while ($cat_product->have_posts()): $cat_product->the_post();

                ob_start();
                storeship_get_block('list', 'product-loop');
                $product_lists = ob_get_contents();
                ob_end_clean();
                $output .= $product_lists;

            endwhile;

            $output .= '</ul>';

        endif;
        wp_reset_postdata();
        return $output;
    }
endif;



if (!function_exists('storeship_get_all_products_link')) {
    function storeship_get_all_products_link($cat = 0, $output = 'html')
    {
        if (absint($cat) != 0) {
            $cat_link = get_term_link($cat);
        } else {
            $cat_link = get_permalink(wc_get_page_id('shop'));
        }

        if ($output == 'link') {
            return $cat_link;
        }

        ?>
        <a class="aft-view-all-products-link" href="<?php echo esc_url($cat_link); ?>" title="View all">
            <?php echo esc_html__('View all', 'storeship'); ?>
        </a>
        <?php
    }
}


/**
 * Display or retrieve the HTML list of product categories.
 *
 * @since 2.1.0
 * @since 4.4.0 Introduced the `hide_title_if_empty` and `separator` arguments. The `current_category` argument was modified to
 *              optionally accept an array of values.
 * */
if (!function_exists('storeship_list_categories')):
    function storeship_list_categories($taxonomy_id = 0, $product_count = 'true', $onsale_product_count = 'true')
    {
        $categories_section_mode = storeship_get_option('select_top_categories_section_mode');
        $categories_hover_mode = storeship_get_option('select_top_categories_on_hover');
        $orderby = storeship_get_option('select_top_categories_orderby');
        $order = storeship_get_option('select_top_categories_order');
        $output = '';
        $show_product_class = '';

        $show_product = true;
        if ($categories_hover_mode == 'top-3-products') {
            $show_product_class = 'aft-mega-menu-list';
        }

        $section_class = 'aft-category-list-set';

        if ($categories_section_mode == 'selected-categories') {
            $selected_categories = storeship_get_product_categories_selected();
            if (isset($selected_categories)) {
                $product_categories = $selected_categories;
            } else {
                $product_categories = storeship_get_product_categories($taxonomy_id, $orderby, $order, 9, true, true);
            }
        } else {
            $product_categories = storeship_get_product_categories($taxonomy_id, $orderby, $order, 9, true, true);
        }


        if ($product_categories) {
            $output .= '<ul class="' . $section_class . '">';
            foreach ($product_categories as $cat) {

                $product_count_no = 0;
                if ($product_count == 'true') {
                    $product_count_no = storeship_product_count($cat->term_id);
                }

                $product_onsale_no = 0;
                if ($onsale_product_count == 'true') {
                    $product_onsale_no = storeship_onsale_product_count($cat->term_id);
                }


                $has_child = storeship_has_term_have_children($cat->term_id, 'product_cat');
                $has_child = ($has_child) ? 'has-child-categories aft-category-list' : 'aft-category-list';
                $output .= '<li class="' . $has_child . ' ' . $show_product_class . '">';
                $output .= '<a href="' . get_term_link($cat->slug, $cat->taxonomy) . '" title="' . sprintf(__("View all products in %s", 'storeship'), $cat->name) . '" ' . '>';

                if (absint($product_count_no) > 0) {
                    $output .= '<span class="product-count">' . $product_count_no . '</span>';
                }

                $output .= '<h4>' . $cat->name . ' </h4>';
                $output .= '<span class="category-badge-wrapper">';


                if (absint($product_onsale_no) > 0) {

                    $sale_flash_text = storeship_get_option('store_single_sale_text');
                    $output .= '<span class="product-onsale-count">';
                    $output .= $product_onsale_no;
                    $output .= ' ';
                    $output .= $sale_flash_text;
                    $output .= '</span>';

                }
                $output .= '</span>';

                $output .= '</a>';


                if ($categories_hover_mode == 'top-3-products') {
                    $mega_menu = storeship_product_mega_menu($cat->term_id);
                    $output .= $mega_menu;
                }


                $output .= '</li>';


            }


            $output .= '</ul>';
        }

        return $output;
    }
endif;



/**
 * Display or retrieve the HTML list of product categories.
 *
 * @since 2.1.0
 * @since 4.4.0 Introduced the `hide_title_if_empty` and `separator` arguments. The `current_category` argument was modified to
 *              optionally accept an array of values.
 * */
if (!function_exists('storeship_vertical_categories_section')):
    function storeship_vertical_categories_section($expanded = true)
    {
        if (!class_exists('WooCommerce')) {
            return;
        }

        $section_title = storeship_get_option('top_categories_section_title');
        $categories_section_mode = storeship_get_option('select_top_categories_section_mode');
        $categories_hover_mode = storeship_get_option('select_top_categories_on_hover');
        $categories_section_class = $categories_section_mode;
        if ($categories_section_mode == 'list-only' || $categories_section_mode == 'selected-categories') {
            $categories_section_class .= ' ' . $categories_hover_mode;
        }

        $product_count = storeship_get_option('show_top_categories_product_count');
        $onsale_product_count = storeship_get_option('show_top_categories_product_onsale_count');


        ?>
        <div class="aft-top-categories-vertical-lists toggle-categories">
            <button type="button" id="aft-top-categories-btn">
                <h3 class="af-top-cat-head">
                    <?php echo esc_html($section_title); ?>
                </h3>
            </button>
            <div class="category-dropdown catgory-list <?php echo esc_attr($categories_section_class); ?>">
                <?php echo storeship_get_vertical_list_categories($categories_section_mode, $product_count, $onsale_product_count); ?>
                <span class="aft-view-all-products">
                        <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" title="View all">
                            <i class="fa fa-th" aria-hidden="true"></i>
                            <?php esc_html_e('View all', 'storeship'); ?>
                        </a>
                    </span>
            </div>
        </div>
        <?php
    }
endif;

/**
 * Display or retrieve the HTML list of product categories.
 *
 * @since 2.1.0
 * @since 4.4.0 Introduced the `hide_title_if_empty` and `separator` arguments. The `current_category` argument was modified to
 *              optionally accept an array of values.
 * */
if (!function_exists('storeship_cat_and_search')):
    function storeship_cat_and_search($expanded = false)
    {
        if (!class_exists('WooCommerce')) {
            return;
        }
        $col_class_30 = 'col-4';
        $col_class_80 = 'col-75';

        ?>
        <div class="aft-cat-and-search-wrapper">
            <div class="<?php echo esc_attr($col_class_30); ?> float-l pad">
                <?php storeship_vertical_categories_section($expanded); ?>
            </div>
            <div class="<?php echo esc_attr($col_class_80); ?> float-l pad search-section">
                <div class="search">
                    <?php storeship_product_search_form(); ?>
                </div>

            </div>
        </div>
        <?php
    }
endif;

if (!function_exists('storeship_get_page_loop')):
    function storeship_get_page_loop($show_title = 'true', $button_text = '', $button_link = '#')
    {
        $storeship_img_url = storeship_get_featured_image(get_the_ID(), 'storeship-thumbnail');
        ?>

        <div class="item grid-item-single">
            <div class="item-grid-item-single-wrap">
                <div class="data-bg data-bg-hover data-bg-slide "
                     data-background="<?php echo esc_url($storeship_img_url); ?>">
                </div>
                <?php if ($button_link): ?>
                    <a href="<?php echo esc_url($button_link); ?>"></a>
                <?php endif; ?>

                <div class="content-caption-wrapper">
                    <?php if ($show_title == 'true'): ?>
                        <div class="content-caption-overlay-shine"><span></span></div>
                        <div class="content-caption-overlay"></div>
                    <?php endif; ?>

                    <div class="content-caption on-left">

                        <?php if ($show_title == 'true'): ?>
                            <div class="caption-heading">
                                <h5 class="cap-title">

                                    <?php echo esc_html(get_the_title(get_the_ID())); ?>
                                </h5>
                            </div>
                        <?php endif; ?>
                        <?php if ($button_link && $button_text): ?>
                            <div class="aft-btn-warpper btn-style1 btn-style2">
                                <?php echo esc_html($button_text); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($button_link): ?>
                        <a class="aft-slider-link"
                           href="<?php echo esc_url($button_link); ?>"><?php echo esc_html(get_the_title(get_the_ID())); ?></a>
                    <?php endif; ?>
                </div>
            </div>

        </div>

        <?php
    }
endif;


/**
 * Front page section additions.
 */


if (!function_exists('storeship_full_width_upper_footer_section')) :
    /**
     *
     * @param null
     * @return null
     *
     * @since Magazine 7 1.0.0
     *
     */
    function storeship_full_width_upper_footer_section()
    {


        $footer_latest_posts_scopes = storeship_get_option('footer_latest_posts_scopes');
        if ($footer_latest_posts_scopes == 'front-page') {
            if (is_front_page() || is_home()) {
                if (1 == storeship_get_option('frontpage_show_latest_posts')) {
                    storeship_get_block('store-latest-posts', 'section');
                }
            }
        } else {
            if (1 == storeship_get_option('frontpage_show_latest_posts')) {
                storeship_get_block('store-latest-posts', 'section');
            }
        }

    }
endif;
add_action('storeship_action_full_width_upper_footer_section', 'storeship_full_width_upper_footer_section');


