<?php
    /**
     * Block Contact Section.
     *
     * @package Storeship
     */
    /**
     * Block Contact.
     *
     * @package Storeship
     */
    
    $storeship_title = storeship_get_option('frontpage_latest_posts_section_title');
    $storeship_number_of_items = storeship_get_option('number_of_frontpage_latest_posts');
    $storeship_category = storeship_get_option('frontpage_latest_posts_category');


?>
<section class="blog">
    <div class="container-wrapper">
        <?php if (!empty($storeship_title)): ?>
            <div class="section-head">
                <?php if (!empty($storeship_title)): ?>
                    <h4 class="widget-title section-title">
                        <span class="header-after">
                            <?php echo esc_html($storeship_title); ?>
                        </span>
                    </h4>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="section-body ">
            <div class="blog-wrapper af-container-row clearfix">
                <?php
                    $storeship_all_posts = storeship_get_posts($storeship_number_of_items, $storeship_category);
                    if ($storeship_all_posts->have_posts()) :
                        while ($storeship_all_posts->have_posts()) : $storeship_all_posts->the_post();
                            if (has_post_thumbnail()) {
                                $storeship_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'storeship-thumbnail');
                                $storeship_img_url = $storeship_thumb['0'];
                            } else {
                                $storeship_img_url = '';
                            }

                            
                            ?>
                            <div class="col-4 float-l pad half-post-wid">
                                <div class="blog-single">
                                    <div class="blog-img">
                                        <div class="blog-img-bg"><a href="<?php the_permalink(); ?>"> </a>
                                        <span class="data-bg data-bg-hover post-image"
                                              data-background="<?php echo esc_url($storeship_img_url); ?>">
                                        </span>
                                        </div>
                                        <?php echo esc_html(storeship_post_format(get_the_ID())); ?>
                                        <div class="blog-details-inner">
                                            <div class="blog-categories">
                                                <?php storeship_post_categories('&nbsp', 'category'); ?>
                                            </div>
                                            <div class="blog-title">
                                                <h4>
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h4>
                                            </div>
                                            <div class="entry-meta">

                                                <span class="item-metadata posts-date">
                                        <?php the_time(get_option('date_format')); ?>
                                     </span>

                                                <?php
                                                storeship_posted_by();
                                                ?>
                                            </div><!-- .entry-meta -->
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php endwhile;
                    endif; ?>
            </div>
        </div>
    </div>
</section>

