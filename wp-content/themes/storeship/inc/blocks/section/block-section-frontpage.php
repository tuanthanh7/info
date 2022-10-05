<?php
storeship_get_block('primary', 'featured');
storeship_get_block('secondary', 'featured');
 if (is_front_page()):
         if (is_active_sidebar('frontpage-content-widgets')): ?>
            <section id="frontpage-content-widgets-wrapper" class="frontpage-content-widgets section">

                    <?php   dynamic_sidebar('frontpage-content-widgets');  ?>

            </section>
         <?php  endif;
    endif;

storeship_get_block('tertiary', 'featured');