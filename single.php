<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package FashionNews
 */

get_header();
?>
<section class="container" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">
        <div class="col-md-8 pr-5">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="row mb-1 pl-3">
                <h2 class="single-post-title"><?php the_title(); ?></h2>
            </div>
            <div class="row d-flex pl-3 justify-content-between">
                <small class="text-muted">Category: <?php the_category(' '); ?></small>
                <h6 class="meta-data"><?php the_time('F jS, Y'); ?></h6>
            </div>
            <div class="row mt-4 pl-3 mb-4">
                <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
            </div>
            <div class="row pl-3 pr-3 main-post-content">
                <p><?php the_content(); ?></p>

                <?php wp_link_pages( array(
			    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fashionnews' ),
			    'after'  => '</div>',
		         )); ?>
                <div class="row mt-3 pl-3 mb-3">
                    <h6 class="meta-data">Author: <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author(); ?></a>
                    </h6>
                </div>
            </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            <div class="row p-3">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Similar posts</h2>
                    </div>
                </div>
                <div class="row">
                    <?php $related = get_posts(array( 
                               'category__in' => wp_get_post_categories( $post->ID ), 
                               'numberposts'  => 2, 
                               'post__not_in' => array( $post->ID ) 
						)); ?>

                    <?php

                        if( $related ) { 
                        foreach( $related as $post ) {
                         setup_postdata($post); ?>
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

                    <?php }
							
                         wp_reset_postdata();
						 } ?>
                </div>
            </div>
            <?php comments_template(); ?>
        </div>
        <div class="col-md-4">
            <?php get_sidebar(); ?>

        </div>
    </div>
</section>
<?php
get_footer();
