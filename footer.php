<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FashionNews
 */

?>



<div class="row footer-widget-area bg-dark">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-4">
                <?php if(is_active_sidebar('footer-1')) : ?>
                <?php dynamic_sidebar('footer-1'); ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-4">
                <?php if(is_active_sidebar('footer-2')) : ?>
                <?php dynamic_sidebar('footer-2'); ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-4">
                <?php if(is_active_sidebar('footer-3')) : ?>
                <?php dynamic_sidebar('footer-3'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

</div><!-- #content -->

<footer id="colophon" class="site-footer container mt-3 mb-3 text-center">
    <div class="site-info">
        <p><?php echo get_theme_mod('footer', 'Proudly powered by WordPress'); ?></p>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
