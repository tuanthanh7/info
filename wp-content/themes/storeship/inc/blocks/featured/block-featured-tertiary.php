<?php
/**
 * Block Frontpage Section.
 *
 * @package Storeship
 */

$storeship_show_footer_brand = storeship_get_option('show_store_features_footer_brand_section');
$storeship_show_featured_footer_cta = storeship_get_option('show_store_features_footer_cta_section');

?>


<?php if( ($storeship_show_footer_brand ) || ($storeship_show_featured_footer_cta )): ?>

    <div class="frontpage-featured-footer-section-wrapper">

        <?php

        if ($storeship_show_footer_brand):

            ?>
            <section class="frontpage-content-section">
                <div class="container-wrapper">
                    <?php storeship_get_block('frontpage-brand', 'section'); ?>
                </div>
            </section>
        <?php

        endif;

        if ($storeship_show_featured_footer_cta):

            ?>
            <section class="frontpage-content-section counter-call-to-action">
                <?php storeship_get_block('frontpage-featured-cta', 'section'); ?>
            </section>
        <?php

        endif;

        ?>
    </div>
<?php endif;