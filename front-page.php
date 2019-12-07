<?php get_header();?>


<?php if(get_theme_mod('animate', 1)) : ?>
<section class="container" data-aos-once="true" data-aos="fade-right" data-aos-duration="800" data-aos-delay="300">
    <?php else : ?>
    <section class="container">
        <?php endif; ?>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                <?php
    $args = array(
    'category_name' => get_theme_mod('cat_1'),
    'posts_per_page' => 3,
    'orderby' => 'date',
);
           $the_query = new WP_Query($args);?>

                <?php $i = 1;?>
                <?php while ($the_query->have_posts()): $the_query->the_post();?>
                <div class="carousel-item <?php if ($i == 1) {
            echo 'active';
    }
    ?>">
                    <div class="row custom-card">
                        <div class="col-lg-8 custom-header-img text-center">
                            <a href="<?php the_permalink();?>">
                                <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-custom']);?>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="<?php the_permalink();?>">
                                <h2 class="mt-5 mb-5 text-center"><?php the_title();?></h2>
                            </a>
                            <p><?php my_excerpt(55);?> </p>
                        </div>
                    </div>
                </div>
                <?php $i++;?>
                <?php endwhile;?>
                <?php wp_reset_postdata();?>
            </div>
        </div>
    </section>

    <?php if (get_theme_mod('animate', 1)) : ?>
    <section class="recent-posts mt-5 container" data-aos-once="true" data-aos-duration="500" data-aos-delay="300" data-aos="fade-left">
        <?php else : ?>
        <section class="recent-posts mt-5 container">
            <?php endif; ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Recent posts</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="owl-carousel owl-theme col-md-12">
                    <?php
    $the_query = new WP_Query(array(
    'posts_per_page' => 6,
    'orderby' => 'date',
));
?>

                    <?php while ($the_query->have_posts()): $the_query->the_post();?>
                    <div class="card">
                        <a href="<?php the_permalink();?>">
                            <?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top']);?>
                            <div class="card-body">
                                <h5><?php the_title();?></h5>
                                <p class="card-text"><?php my_excerpt(22);?></p>
                            </div>
                        </a>
                        <div class="card-footer d-flex justify-content-between">
                            <small class="text-muted"><?php the_category(', ');?></small>
                            <small class="text-muted"><?php the_time('F jS, Y');?></small>
                        </div>
                    </div>
                    <?php endwhile;?>
                </div>
            </div>
        </section>

        <section class="post-section container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- row -->

                    <?php if(is_active_sidebar('frontpage-1')) : ?>
                    <?php dynamic_sidebar('frontpage-1'); ?>
                    <?php endif; ?>

                </div>
                <div class="col-lg-4 text-justify">
                    <?php if(is_active_sidebar('sidebar-1')) : ?>
                    <?php dynamic_sidebar('sidebar-1'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>



        <?php get_footer();?>
