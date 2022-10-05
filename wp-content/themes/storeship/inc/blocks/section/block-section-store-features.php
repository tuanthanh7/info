<?php
/**
 * Block Section Latest Product.
 *
 * @package Storeship
 */
?>

<?php

$storeship_features = array();

for ($storeship_i = 0; $storeship_i <= 3; $storeship_i++) {

    $storeship_title = storeship_get_option('store_features_title_' . $storeship_i);

    if (!empty($storeship_title)) {
        $storeship_features['features_' . $storeship_i][] = $storeship_title;
        $storeship_features['features_' . $storeship_i][] = storeship_get_option('store_features_icon_' . $storeship_i);
        $storeship_features['features_' . $storeship_i][] = storeship_get_option('store_features_desc_' . $storeship_i);


    }
}


?>

<div class="customer-support-wrapper">
    <div class="customer-support">
        <div class="container-wrapper">
            <div class="support-wrap section-body clearfix">
                <?php if (isset($storeship_features)):
                    $storeship_col = count($storeship_features);
                    $storeship_col_class = 'col-' . $storeship_col;
                    $storeship_count = 1;
                    foreach ($storeship_features as $storeship_feature):

                        if (!empty($storeship_feature[3])) {
                            $feature_link = $storeship_feature[3];
                        }else{
                            $feature_link = '#';
                        }
                        ?>
                        <div class="<?php echo esc_attr($storeship_col_class); ?> float-l singlewrap pad-15">
                            <div class="suport-single">

                                    <?php if (!empty($storeship_feature[1])): ?>
                                        <div class="icon-box">
                                       <span class="icon-box-circle icon-box-circle-color-<?php echo esc_attr($storeship_count); ?>">
                                           <i class="<?php echo esc_attr($storeship_feature[1]); ?>"></i>
                                       </span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="support-content pad">
                                        <h5><?php echo esc_html($storeship_feature[0]); ?></h5>
                                        <p><?php echo esc_html($storeship_feature[2]); ?></p>
                                    </div>
                            </div>
                        </div>
                        <?php
                        $storeship_count++;
                    endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>


