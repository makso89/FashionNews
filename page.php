<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FashionNews
 */

get_header();
?>

<section class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 mr-3 ml-3">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="row mb-2">
                <h2 class="single-post-title"><?php the_title(); ?></h2>
            </div>
            <div class="row main-post-content">
                <p><?php the_content(); ?></p>
            </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
            <p>It looks like it is empty.</p>
            <?php endif; ?>
        </div>
        <div class="col-lg-2"></div>
    </div>
</section>

<?php
get_footer();
