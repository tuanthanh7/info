<?php
    /**
     * Block Header Logo.
     *
     * @package Storeship
     */
?>

<div class="logo-brand">
    <div class="site-branding">
        <?php
        the_custom_logo();
        if (is_front_page() || is_home()) :
            ?>
            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                      rel="home"><?php bloginfo('name'); ?></a></h1>
        <?php
        else :
            ?>
            <h3 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                      rel="home"><?php bloginfo('name'); ?></a></h3>
        <?php
        endif;
        $storeship_storeship_description = get_bloginfo('description', 'display');
        if ($storeship_storeship_description || is_customize_preview()) :
            ?>
            <p class="site-description"><?php echo esc_html($storeship_storeship_description); ?></p>
        <?php endif; ?>
    </div><!-- .site-branding -->
</div>