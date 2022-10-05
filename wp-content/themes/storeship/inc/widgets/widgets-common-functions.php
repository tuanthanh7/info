<?php

/**
 * Returns posts.
 *
 * @since Storeship 1.0.0
 */
if (!function_exists('storeship_get_posts')):
    function storeship_get_posts($number_of_posts, $category_id = '0', $post_type = 'post', $taxonomy = 'category')
    {
        if (is_front_page()) {
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        } else {
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        }
        $ins_args = array(
            'post_type' => $post_type,
            'posts_per_page' => absint($number_of_posts),
            'paged' => $paged,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC'
        );


        if (absint($category_id) > 0) {

            $ins_args['tax_query'] = array(
                array(
                    'taxonomy' => $taxonomy,
                    'field' => 'term_id',
                    'terms' => absint($category_id)
                )
            );
        }

        $all_posts = new WP_Query($ins_args);
        return $all_posts;
    }

endif;


/**
 * Returns all categories.
 *
 * @since Storeship 1.0.0
 */
if (!function_exists('storeship_get_terms')):
    function storeship_get_terms($taxonomy = 'category', $category_id = 0, $default = '')
    {
        $taxonomy = !empty($taxonomy) ? $taxonomy : 'category';

        if ($category_id > 0) {
            $term = get_term_by('id', absint($category_id), $taxonomy);
            if ($term)
                return esc_html($term->name);


        } else {
            $terms = get_terms(array(
                'taxonomy' => $taxonomy,
                'orderby' => 'name',
                'order' => 'ASC',
                'hide_empty' => true,
            ));


            if (isset($terms) && !empty($terms)) {
                foreach ($terms as $term) {
                    if ($default != 'first') {
                        $array['0'] = __('Select Category', 'storeship');
                    }
                    $array[$term->term_id] = esc_html($term->name);
                }

                return $array;
            }
        }
    }
endif;

/**
 * Returns all categories.
 *
 * @since Storeship 1.0.0
 */
if (!function_exists('storeship_get_terms_link')):
    function storeship_get_terms_link($category_id = 0)
    {

        if (absint($category_id) > 0) {
            return get_term_link(absint($category_id), 'category');
        } else {
            return get_post_type_archive_link('post');
        }
    }
endif;

/**
 * Returns word count of the sentences.
 *
 * @since Storeship 1.0.0
 */
if (!function_exists('storeship_get_excerpt')):
    function storeship_get_excerpt($length = 25, $storeship_content = null, $post_id = 1)
    {
        $length = absint($length);
        $source_content = preg_replace('`\[[^\]]*\]`', '', $storeship_content);
        $trimmed_content = wp_trim_words($source_content, $length, '...');
        return $trimmed_content;
    }
endif;


/**
 * Returns word count of the sentences.
 *
 * @since Storeship 1.0.0
 */
if (!function_exists('storeship_excerpt_ellisis')):
    function storeship_excerpt_ellisis($length = 25, $storeship_content = null, $post_id = 1)
    {
        if (!is_admin()) {
            global $post;
            if(isset($post)){
                $more = sprintf('<span class="read-more-faq"><a href="%1s">%2s</a></span>', get_permalink($post->ID), __("Read More", "storeship"));
                return $more;
            }

        }
    }
endif;
add_filter('excerpt_more', 'storeship_excerpt_ellisis');


/**
 * Returns no image url.
 *
 * @since Storeship 1.0.0
 */
if (!function_exists('storeship_no_image_url')):
    function storeship_no_image_url()
    {
        $storeship_img_url = get_template_directory_uri() . '/assets/images/no-image.png';
        return $storeship_img_url;
    }

endif;

/**
 * Returns no image url.
 *
 * @since Storeship 1.0.0
 */
if (!function_exists('storeship_post_format')):
    function storeship_post_format($post_id = 0)
    {
        $post_format = get_post_format($post_id);
        switch ($post_format) {
            case "image":
                echo "<div class='storeship-post-format'><i class='fa fa-camera'></i></div>";
                break;
            case "video":
                echo "<div class='storeship-post-format'><i class='fa fa-video-camera'></i></div>";

                break;
            case "gallery":
                echo "<div class='storeship-post-format'><i class='fa fa-camera'></i></div>";
                break;
            default:
                echo "";
        }


    }

endif;


if(!function_exists('storeship_get_all_menu')){
    function storeship_get_all_menu($type){
        return get_terms( $type, array( 'hide_empty' => false ) );
    }
}


/**
 * Outputs the tab posts
 *
 * @param array $args Post Arguments.
 * @since 1.0.0
 *
 */
if (!function_exists('storeship_render_posts')):
    function storeship_render_posts($type, $show_excerpt, $excerpt_length, $number_of_posts, $category = '0')
    {

        $args = array();

        switch ($type) {
            case 'popular':
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => absint($number_of_posts),
                    'orderby' => 'comment_count',
                    'ignore_sticky_posts' => true
                );
                break;

            case 'recent':
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => absint($number_of_posts),
                    'orderby' => 'date',
                    'ignore_sticky_posts' => true
                );
                break;

            case 'categorised':
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => absint($number_of_posts),
                    'ignore_sticky_posts' => true
                );
                $category = isset($category) ? $category : '0';
                if (absint($category) > 0) {
                    $args['cat'] = absint($category);
                }
                break;


            default:
                break;
        }

        if (!empty($args) && is_array($args)) {
            $all_posts = new WP_Query($args);
            if ($all_posts->have_posts()):
                echo '<ul class="article-item article-list-item article-tabbed-list article-item-left">';
                while ($all_posts->have_posts()): $all_posts->the_post();

                    ?>
                    <li class="full-item clearfix">
                        <div class="base-border">
                            <div class="af-container-row align-items-center">
                                <?php
                                if (has_post_thumbnail()) {
                                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));
                                    $storeship_img_url = $thumb['0'];
                                    //$col_class = 'col-xs-8 col-sm-8';
                                } else {
                                    $storeship_img_url = '';
                                    //$col_class = 'col-sm-12';
                                }
                                $storeship_post_id = get_the_ID();

                                $storeship_img_thumb_id = get_post_thumbnail_id($storeship_post_id);
                                ?>
                                <?php if (!empty($storeship_img_url)): ?>
                                    <div class="af-tabbed-post-col-image pad float-l">

                                        <div class="tab-article-image">
                                            <a href="<?php the_permalink(); ?>" class="post-thumb">
                                                <img src="<?php echo esc_url($storeship_img_url); ?>"
                                                     alt="<?php echo esc_attr(storeship_get_img_alt($storeship_img_thumb_id)); ?>"/>
                                            </a>
                                            <?php echo storeship_post_format($storeship_post_id); ?>
                                        </div>


                                    </div>
                                <?php endif; ?>
                                <div class="full-item-details af-tabbed-post-col-details  pad float-l">
                                    <div class="full-item-metadata primary-font">
                                        <div class="figure-categories figure-categories-bg">

                                            <?php storeship_post_categories('/'); ?>
                                        </div>
                                    </div>
                                    <div class="full-item-content">
                                        <h3 class="article-title article-title-1">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                        <div class="grid-item-metadata">
                                            <?php echo ''; ?>
                                            <?php storeship_post_item_meta(); ?>

                                        </div>
                                        <?php if ($show_excerpt != 'false'): ?>
                                            <div class="full-item-discription">
                                                <div class="post-description">
                                                    <?php if (absint($excerpt_length) > 0) : ?>
                                                        <?php
                                                        $excerpt = storeship_get_excerpt($excerpt_length, get_the_content());
                                                        echo wp_kses_post(wpautop($excerpt));
                                                        ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php
                endwhile;
                wp_reset_postdata();
                echo '</ul>';
            endif;
        }
    }
endif;

/**
 * Returns no image url.
 *
 * @since Storeship 1.0.0
 */
if (!function_exists('storeship_widget_title_section')):
    function storeship_widget_title_section($title = '', $title_note = '', $inside_img = false)
    { ?>

        <?php if($inside_img == false): ?>
        <span class="header-after">
            <?php echo esc_html($title); ?>
        </span>
    <?php endif; ?>
        <?php if (!empty($title_note)): ?>
        <span class="title-note">
                <span>
                    <?php echo esc_html($title_note); ?>
                </span>
            </span>
    <?php endif; ?>
        <?php if($inside_img): ?>
        <span class="header-after">
            <?php echo esc_html($title); ?>
        </span>
    <?php endif; ?>
        <?php

    }

endif;
