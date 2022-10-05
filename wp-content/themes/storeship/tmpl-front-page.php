<?php
/**
 * The template for displaying home page.
 * Template Name: Custom Front-page
 *
 * @package Storeship
 */


get_header();
?>
<?php $storeship_theme_path = get_template_directory_uri(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php storeship_get_block('frontpage', 'section'); ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
