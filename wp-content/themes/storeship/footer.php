<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Storeship
 */

?>


</div>

<?php
// get current page we are on. If not set we can assume we are on page 1.
$storeship_lite_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
// are we on page one?
if (1 == $storeship_lite_paged):
    if (class_exists('WooCommerce')):
        if ((is_front_page()) && is_shop()): ?>
            <?php storeship_get_block('tertiary', 'featured'); ?>
        <?php
        endif;
    endif;
endif;
?>


<?php do_action('storeship_action_full_width_upper_footer_section'); ?>

<footer class="site-footer">
    <?php if (is_active_sidebar('footer-first-widgets-section') || is_active_sidebar('footer-second-widgets-section') || is_active_sidebar('footer-third-widgets-section') || is_active_sidebar('footer-fourth-widgets-section')) : ?>
        <div class="primary-footer">
            <div class="container-wrapper">
                <div class="af-container-row footer-row">
                    <?php if (is_active_sidebar('footer-first-widgets-section')) : ?>
                        <div class="primary-footer-area footer-first-widgets-section  col-3 float-l pad">
                            <section class="widget-area">
                                <?php dynamic_sidebar('footer-first-widgets-section'); ?>
                            </section>
                        </div>
                    <?php endif; ?>

                    <?php if (is_active_sidebar('footer-second-widgets-section')) : ?>
                        <div class="primary-footer-area footer-second-widgets-section   col-3 float-l pad">
                            <section class="widget-area">
                                <?php dynamic_sidebar('footer-second-widgets-section'); ?>
                            </section>
                        </div>
                    <?php endif; ?>

                    <?php if (is_active_sidebar('footer-third-widgets-section')) : ?>
                        <div class="primary-footer-area footer-third-widgets-section   col-3 float-l pad">
                            <section class="widget-area">
                                <?php dynamic_sidebar('footer-third-widgets-section'); ?>
                            </section>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (1 != storeship_get_option('hide_footer_menu_section')): ?>
        <?php
        if (has_nav_menu('aft-footer-nav') || has_nav_menu('aft-social-nav')):
            $class = 'single-align-c';
            if ((has_nav_menu('aft-footer-nav') && has_nav_menu('aft-social-nav'))) {
                $class = 'col-2 float-l';
            }

            ?>
            <div class="secondary-footer">
                <div class="container-wrapper">
                    <?php if (has_nav_menu('aft-footer-nav')): ?>
                        <div class="<?php echo esc_attr($class); ?>">
                            <div class="footer-nav-wrapper">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'aft-footer-nav',
                                    'menu_id' => 'footer-menu',
                                    'depth' => 1,
                                    'container' => 'div',
                                    'container_class' => 'footer-navigation'
                                )); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (has_nav_menu('aft-social-nav')): ?>
                        <div class="<?php echo esc_attr($class); ?>">
                            <div class="footer-social-wrapper">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'aft-social-nav',
                                    'link_before' => '<span class="screen-reader-text">',
                                    'link_after' => '</span>',
                                    'menu_id' => 'social-menu',
                                    'container' => 'div',
                                    'container_class' => 'social-navigation'
                                ));
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="site-info">
        <div class="container-wrapper">
            <div class="site-info-wrap">
                <?php
                $storeship_secure_payment_badge = storeship_get_option('secure_payment_badge');
                $storeship_copy_right = storeship_get_option('footer_copyright_text');

                $class = 'single-align-c';
                if (!empty($storeship_secure_payment_badge) && !empty($storeship_copy_right)) {
                    $class = 'col-2 float-l';
                } ?>

                <div class="<?php echo esc_attr($class); ?>">
                    <?php if (!empty($storeship_copy_right)): ?>
                        <?php echo esc_html($storeship_copy_right); ?>
                    <?php endif; ?>
                    <?php $storeship_theme_credits = storeship_get_option('hide_footer_copyright_credits'); ?>
                    <?php if ($storeship_theme_credits != 1): ?>
                        <span class="sep"> | </span>
                        <?php
                        /* translators: 1: Theme name, 2: Theme author. */
                        printf(esc_html__('%1$s by %2$s.', 'storeship'), '<a href="https://afthemes.com/products/storeship">Storeship</a>', 'AF themes');
                        ?>
                    <?php endif; ?>
                </div>

                <?php
                if (!empty($storeship_secure_payment_badge)):
                    $storeship_secure_payment_badge = absint($storeship_secure_payment_badge);
                    $storeship_secure_payment_badge = wp_get_attachment_image($storeship_secure_payment_badge, 'full');

                    $storeship_secure_payment_badge_url = storeship_get_option('secure_payment_badge_url');
                    $storeship_secure_payment_badge_url = isset($storeship_secure_payment_badge_url) ? esc_url($storeship_secure_payment_badge_url) : '#';
                    $storeship_open_on_new_tab = storeship_get_option('secure_payment_badge_open_in_new_tab');
                    $storeship_open_on_new_tab = ('' != $storeship_open_on_new_tab) ? '_blank' : '';

                    ?>
                    <div class="<?php echo esc_attr($class); ?>">
                        <a href="<?php echo esc_url($storeship_secure_payment_badge_url); ?>"
                           target="<?php echo esc_attr($storeship_open_on_new_tab); ?>">
                            <?php
                            $allowed_html = storeship_allowed_html();
                            echo wp_kses($storeship_secure_payment_badge, $allowed_html); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
</div>

<?php
$scroll_to_top_position = storeship_get_option('footer_scroll_to_top_position');
$scroll_to_top_icon = storeship_get_option('footer_scroll_to_top_icon');
?>
<a id="scroll-up" class="secondary-color <?php echo esc_attr($scroll_to_top_position); ?>">
    <i class="<?php echo esc_attr($scroll_to_top_icon); ?>"></i>
</a>
<?php wp_footer(); ?>

</body>
</html>
