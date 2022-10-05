<?php
if (!class_exists('Storeship_Author_Info')) :
    /**
     * Adds Storeship_Author_Info widget.
     */
    class Storeship_Author_Info extends AFthemes_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('storeship-author-info-title', 'storeship-author-info-subtitle', 'storeship-author-info-image', 'storeship-author-info-name', 'storeship-author-info-desc', 'storeship-author-info-phone', 'storeship-author-info-email');
            $this->url_fields = array('storeship-author-info-facebook', 'storeship-author-info-twitter', 'storeship-author-info-linkedin', 'storeship-author-info-instagram', 'storeship-author-info-vk', 'storeship-author-info-youtube');

            $widget_ops = array(
                'classname' => 'storeship_author_info_widget',
                'description' => __('Displays author info.', 'storeship'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('storeship_author_info', __('AFTS Author Info', 'storeship'), $widget_ops);
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args Widget arguments.
         * @param array $instance Saved values from database.
         */

        public function widget($args, $instance)
        {



            echo $args['before_widget'];
            $storeship_title = isset($instance['storeship-author-info-title']) ? ($instance['storeship-author-info-title']) : 'About Store';;
            $storeship_title = apply_filters('widget_title', $storeship_title, $instance, $this->id_base);
            $subtitle = isset($instance['storeship-author-info-subtitle']) ? ($instance['storeship-author-info-subtitle']) : '';
            $profile_image = isset($instance['storeship-author-info-image']) ? ($instance['storeship-author-info-image']) : '';
            
            if ($profile_image) {
                $image_attributes = wp_get_attachment_image_src($profile_image, 'thumbnail');
                $image_src = $image_attributes[0];
                $image_class = 'data-bg data-bg-hover';

            } else {
                $image_src = '';
                $image_class = 'no-bg';
            }

            $name = isset($instance['storeship-author-info-name']) ? ($instance['storeship-author-info-name']) : '';

            $desc = isset($instance['storeship-author-info-desc']) ? ($instance['storeship-author-info-desc']) : '';
            $facebook = isset($instance['storeship-author-info-facebook']) ? ($instance['storeship-author-info-facebook']) : '';
            $twitter = isset($instance['storeship-author-info-twitter']) ? ($instance['storeship-author-info-twitter']) : '';
            $linkedin = isset($instance['storeship-author-info-linkedin']) ? ($instance['storeship-author-info-linkedin']) : '';
            $youtube = isset($instance['storeship-author-info-youtube']) ? ($instance['storeship-author-info-youtube']) : '';
            $instagram = isset($instance['storeship-author-info-instagram']) ? ($instance['storeship-author-info-instagram']) : '';
            $vk = isset($instance['storeship-author-info-vk']) ? ($instance['storeship-author-info-vk']) : '';

            ?>
            <section class="products">
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
                    <div class="posts-author-wrapper">

                        <?php if (!empty($image_src)) : ?>
                            <figure class="em-author-img <?php echo esc_attr($image_class); ?>"
                                    data-background="<?php echo esc_url($image_src); ?>">

                            </figure>
                        <?php endif; ?>
                        <div class="em-author-details">
                            <?php if (!empty($name)) : ?>
                                <h4 class="em-author-display-name"><?php echo esc_html($name); ?></h4>
                            <?php endif; ?>
                            <?php if (!empty($phone)) : ?>
                                <a href="tel:<?php echo esc_attr($phone); ?>"
                                   class="em-author-display-phone"><?php echo esc_html($phone); ?></a>
                            <?php endif; ?>
                            <?php if (!empty($email)) : ?>
                                <a href="mailto:<?php echo esc_attr($email); ?>"
                                   class="em-author-display-email"><?php echo esc_html($email); ?></a>
                            <?php endif; ?>
                            <?php if (!empty($desc)) : ?>
                                <p class="em-author-display-name"><?php echo esc_html($desc); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($facebook) || !empty($twitter) || !empty($linkedin)) : ?>
                                <div class="social-navigation">
                                    <ul>
                                        <?php if (!empty($facebook)) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($facebook); ?>" target="_blank"></a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if (!empty($instagram)) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($instagram); ?>" target="_blank"></a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if (!empty($youtube)) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($youtube); ?>" target="_blank"></a>
                                            </li>
                                        <?php endif; ?>





                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php
            //print_pre($all_posts);
            // close the widget container
            echo $args['after_widget'];

            //$instance = parent::storeship_sanitize_data( $instance, $instance );


        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form($instance)
        {
            $this->form_instance = $instance;
            $categories = storeship_get_terms();
            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::storeship_generate_text_input('storeship-author-info-title', __('About Store', 'storeship'), __('Title', 'storeship'));

                echo parent::storeship_generate_image_upload('storeship-author-info-image', __('Profile image', 'storeship'), __('Profile image', 'storeship'));
                echo parent::storeship_generate_text_input('storeship-author-info-name', __('Name', 'storeship'), __('jhon Doe', 'storeship'));
                echo parent::storeship_generate_text_input('storeship-author-info-desc', __('Descriptions', 'storeship'), '');
                echo parent::storeship_generate_text_input('storeship-author-info-facebook', __('Facebook', 'storeship'), '');
                echo parent::storeship_generate_text_input('storeship-author-info-instagram', __('Instagram', 'storeship'), '');
                echo parent::storeship_generate_text_input('storeship-author-info-youtube', __('Youtube', 'storeship'), '');



            }
        }
    }
endif;