<?php
    if (!class_exists('Storeship_Social_Menu')) :
        /**
         * Adds Storeship_Social_Menu widget.
         */
        class Storeship_Social_Menu extends AFthemes_Widget_Base
        {
            /**
             * Sets up a new widget instance.
             *
             * @since 1.0.0
             */
            function __construct()
            {
                $this->text_fields = array(
                    'storeship-store-menu-title',
                );
                    
               
                
                $widget_ops = array(
                    'classname' => 'storeship_store_menu_widget',
                    'description' => __('Displays category details along with product from selected categories.', 'storeship'),
                    'customize_selective_refresh' => false,
                );
                
                parent::__construct('widget_store_menu', __('AFTS Social Menu', 'storeship'), $widget_ops);
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
                
                $instance = parent::storeship_sanitize_data($instance, $instance);
                
                
                /** This filter is documented in wp-includes/default-widgets.php */
                
                $storeship_title = apply_filters('widget_title', $instance['storeship-store-menu-title'], $instance, $this->id_base);
                $storeship_store_menu = isset($instance['storeship-store-menu-option']) ? $instance['storeship-store-menu-option'] : '';
               
                
                
                // open the widget container
                echo $args['before_widget'];
                ?>
    
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
                        <?php do_action('storeship_action_social_nav_menu');?>
                    </div>
                </div>
                </div>
                
              
              
              
                <?php
                
                // close the widget container
                echo $args['after_widget'];
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
    
                
    
                // Get menus
                $storeship_menus = storeship_get_all_menu( 'nav_menu'  );
                
                $menus = array();
                foreach ($storeship_menus as $sm){
                    $menus[$sm->term_id] =  $sm->name;
                }
                
                
                if (isset($menus) && !empty($menus)) {
                    // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                    echo parent::storeship_generate_text_input('storeship-store-menu-title', __('Title', 'storeship'), 'Social Menu');
                }
                
                //print_pre($terms);
                
                
            }
            
        }
    endif;