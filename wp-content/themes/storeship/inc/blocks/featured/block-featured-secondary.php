<?php
/**
 * Block Frontpage Section.
 *
 * @package Storeship
 */

$storeship_show_section_1 = storeship_get_option('show_content_section_1');
$storeship_show_section_2 = storeship_get_option('show_content_section_2');
$storeship_show_section_3 = storeship_get_option('show_content_section_3');

$storeship_section_1_type = storeship_get_option('content_section_1_type');
$storeship_section_2_type = storeship_get_option('content_section_2_type');
$storeship_section_3_type = storeship_get_option('content_section_3_type');

$storeship_section_1_layout = storeship_get_option('content_section_1_layout');
$storeship_section_2_layout = storeship_get_option('content_section_2_layout');
$storeship_section_3_layout = storeship_get_option('content_section_3_layout');

if($storeship_show_section_1 || $storeship_show_section_2 || $storeship_show_section_3 || $storeship_show_section_4 || $storeship_show_section_5): ?>
    <div class="frontpage-content-section-wrapper">
        <?php
        if (class_exists('WooCommerce')):
            if ($storeship_show_section_1):
                ?>
                <section class="frontpage-content-section  <?php echo esc_attr($storeship_section_1_type); ?>">
                    <div class="container-wrapper <?php echo esc_attr($storeship_section_1_layout); ?>">
                        <?php
                        do_action('storeship_render_frontend_section', '1', $storeship_section_1_type);
                        ?>
                    </div>
                </section>
            <?php
            endif;


            if ($storeship_show_section_2):
                ?>
                <section class="frontpage-content-section  <?php echo esc_attr($storeship_section_2_type); ?>">
                    <div class="container-wrapper <?php echo esc_attr($storeship_section_2_layout); ?>">
                        <?php
                        do_action('storeship_render_frontend_section', '2', $storeship_section_2_type);
                        ?>
                    </div>
                </section>
            <?php
            endif;


            if ($storeship_show_section_3):
                ?>
                <section class="frontpage-content-section  <?php echo esc_attr($storeship_section_3_type); ?>">
                    <div class="container-wrapper <?php echo esc_attr($storeship_section_3_layout); ?>">
                        <?php
                        do_action('storeship_render_frontend_section', '3', $storeship_section_3_type);
                        ?>
                    </div>
                </section>
            <?php
            endif;

        endif;
        ?>


    </div>
<?php endif;