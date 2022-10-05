<?php
$storeship_section_title = storeship_get_option('section_brand_title');
?>
<div class="section-head">
    <?php if (!empty($storeship_section_title)): ?>
        <h4 class="section-title aft-center-align">
            <?php storeship_widget_title_section($storeship_section_title); ?>
        </h4>
    <?php endif; ?>
</div>
    <?php
        $storeship_custom_data = array();
        for ($storeship_i = 0; $storeship_i <= 10; $storeship_i++) {
            $storeship_slider_custom_image = storeship_get_option('brand_image_' . $storeship_i);
        if (!empty($storeship_slider_custom_image)) {
            $storeship_custom_data['data_' . $storeship_i][] = $storeship_slider_custom_image;

            }
        }
       if ($storeship_custom_data) {?>
            <div class="brand-carousel slick-wrapper">
                <?php foreach ($storeship_custom_data as $storeship_c_data) {
                    $storeship_img_url = wp_get_attachment_url($storeship_c_data[0]);
                    
                    ?>
                    <div class="item">
                        <span class="aft-brand-item-img-wrap">

                            <img src="<?php echo esc_url($storeship_img_url);?>" alt="<?php echo esc_attr(storeship_get_img_alt($storeship_c_data[0])); ?>">

                            </span>
                    </div>
                <?php }?>
            </div>
        
        <?php }
    ?>


