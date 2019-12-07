<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FashionNews
 */

get_header();
?>

<section class="container mb-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-lg-6 mb-3">
                    <div class="card">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top']); ?>
                        </a>
                        <div class="card-body">
                            <a href="<?php the_permalink(); ?>">
                                <h5><?php the_title(); ?></h5>
                            </a>
                            <p class="card-text"><?php my_excerpt(22); ?></p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <small class="text-muted"><?php the_category(' '); ?></small>
                            <small class="text-muted"><?php the_time('F jS, Y'); ?></small>
                        </div>
                    </div>
                </div>
                <?php endwhile; endif; ?>
            </div>
            <hr>
            <div class=" d-flex justify-content-between">
                <small class="pagination"><?php previous_posts_link( '&larr; Older posts' ); ?></small>
                <small class="pagination"><?php next_posts_link( 'Newer posts &rarr;' ); ?></small>
            </div>
        </div>
        <div class="col-lg-4">
            <?php get_sidebar(); ?>

        </div>
    </div>
</section>

<?php
get_footer();
