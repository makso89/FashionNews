<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
                <?php endwhile; ?>
                
                <?php else : ?>
                <div>
                    <h4>Hmm, It looks like empty</h4>
                    <h4>Please, try another search term.</h4>
                
                </div>
                
                <?php endif; ?>
            </div>
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
