<?php
if(!class_exists('Storeship_Featured_Product_List')):
    
    
    class Storeship_Featured_Product_List extends AFthemes_Widget_Base{
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array(
                
                'storeship-store-section-title',
                'storeship-store-section-note',
                'storeship-store-section-product-category',

            );
        
            $widget_ops = array(
                'classname' => 'storeship_store_section_widget list-layout',
                'description' => __('Displays product list', 'storeship'),

            );
        
            parent::__construct('storeship_featured_product_list', __('AFTS Product List', 'storeship'), $widget_ops);
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
    
            $title = apply_filters('widget_title', $instance['storeship-store-section-title'], $instance, $this->id_base);
            $title_note = isset($instance['storeship-store-section-note'])?$instance['storeship-store-section-note']:'';
            $category1 = isset($instance['storeship-store-section-product-category'])?$instance['storeship-store-section-product-category']:'';
            $number =  6;

           
    
            echo $args['before_widget'];?>
           
            <section class="frontpage-content-section  list">
                <div class="container-wrapper">
                    <?php
                        storeship_frontpage_product_list_section($title, $title_note, $number, $category1);
                        ?>
                    
                </div>
            </section>
            
            <?php
            // close the widget container
            echo $args['after_widget'];
            
        }
    
        public function form($instance)
        {
            $this->form_instance = $instance;
    
            $categories = storeship_get_terms('product_cat');

            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::storeship_generate_text_input('storeship-store-section-title', 'Product List', 'Product List');
                echo parent::storeship_generate_text_input('storeship-store-section-note', 'Title Note', '');
                echo parent::storeship_generate_select_options('storeship-store-section-product-category', __('Product Categories', 'storeship'), $categories);
            }
        }
    }
    
    endif;