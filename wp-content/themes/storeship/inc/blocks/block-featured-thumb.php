<?php
/**
 * Block Page Carousel Vertical.
 *
 * @package Storeship
 */
?>
<?php
$storeship_featured_custom = array();


for ($storeship_i = 0; $storeship_i <= 2; $storeship_i++) {
    $storeship_thumb_image = storeship_get_option('store_offers_' . $storeship_i);
    if (!empty($storeship_thumb_image)) {
        $storeship_featured_custom['thumb_' . $storeship_i][] = $storeship_thumb_image;
        $storeship_featured_custom['thumb_' . $storeship_i][] = storeship_get_option('store_offers_link_' . $storeship_i);
        $storeship_featured_custom['thumb_' . $storeship_i][] = storeship_get_option('store_offers_title_' . $storeship_i);
        $storeship_featured_custom['thumb_' . $storeship_i][] = storeship_get_option('store_offers_subtitle_' . $storeship_i);
        $storeship_featured_custom['thumb_' . $storeship_i][] = storeship_get_option('store_offers_button_' . $storeship_i);

    }
}
$thumb_count = 1;
if ($storeship_featured_custom) {

    foreach ($storeship_featured_custom as $storeship_fc) {
        $storeship_img_url = wp_get_attachment_url($storeship_fc[0], 'storeship-thumbnail');

        ?>
        <div class="featured-category-item pad float-l">
            <div class="pos-rel feature-category-item-single">
                <div class="feat-back">
                    <div class="feat-offers-img data-bg"
                         data-background="<?php echo esc_url($storeship_img_url); ?>"></div>
                    <div class="feat-offers-wrapper">

                        <span>
                       <h3 class="feat-text-title"><?php echo wp_kses_post($storeship_fc[2]); ?></h3>
                         <p class="feat-text-subtitle"><?php echo wp_kses_post($storeship_fc[3]); ?></p>
                    </span>
                        <a href="<?php echo esc_url($storeship_fc[1]); ?>">
                            <?php echo esc_html($storeship_fc[4]); ?>
                        </a>
                    </div>
                </div><!-- read-img read-img read-bg-img data-bg-->
            </div><!-- feature-category-item-single-->
        </div><!--featured-category-item-->
    <?php }
} ?>

