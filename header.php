<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FashionNews
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="top-bar">
        <div class="container">
            <ul class="nav mr-auto">
                <?php if(get_theme_mod( 'facebook_url', 'https://www.facebook.com' ) != '') : ?>
                <li class="nav-item custom-social">
                    <a target="_blank" href="<?php echo get_theme_mod( 'facebook_url', 'https://www.facebook.com' ) ?>"><i class="fab fa-facebook-f"></i></a>
                </li>
                <?php endif; ?>
                <?php if(get_theme_mod( 'instagram_url', 'https://www.instagram.com' ) != '') : ?>
                <li class="nav-item custom-social">
                    <a target="_blank" href="<?php echo get_theme_mod( 'instagram_url', 'https://www.instagram.com' ) ?>"><i class="fab fa-instagram"></i></a>
                </li>
                <?php endif; ?>
                <?php if(get_theme_mod( 'twitter_url', 'https://twitter.com' ) != '') : ?>
                <li class="nav-item custom-social">
                    <a target="_blank" href="<?php echo get_theme_mod( 'twitter_url', 'https://twitter.com' ) ?>"><i class="fab fa-twitter"></i></a>
                </li>
                <?php endif; ?>
                <?php if(get_theme_mod( 'pinterest_url', 'https://www.pinterest.com' ) != '') : ?>
                <li class="nav-item custom-social">
                    <a target="_blank" href="<?php echo get_theme_mod( 'pinterest_url', 'https://www.pinterest.com' ) ?>"><i class="fab fa-pinterest"></i></a>
                </li>
                <?php endif; ?>
                <li class="nav-item custom-search-box ml-auto">
                    <form method="get" id="searchform" action="<?php echo esc_url( home_url() );  ?>">
                        <input class="search-bar" type="search" placeholder=" Search..." value="<?php the_search_query(); ?>" name="s" id="s">
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div id="page" class="site">
        <?php if (get_theme_mod('sticky', 1)) : ?>
        <header id="masthead" class="site-header container sticky-top">
            <?php else : ?>
            <header id="masthead" class="site-header container">
            <?php endif; ?>  
            <nav class="mt-3 mb-5 navbar custom-nav-bg navbar-expand-lg">
                <div class="site-branding nav-bar">
                    <?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
			else :
				?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
			endif;
			$fashionnews_description = get_bloginfo( 'description', 'display' );
			if ( $fashionnews_description || is_customize_preview() ) :
				?>
                    <p class="site-description"><?php echo $fashionnews_description; /* WPCS: xss ok. */ ?></p>
                    <?php endif; ?>
                </div><!-- .site-branding -->
                <button class="navbar-toggler navbar-light mb-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php 
		wp_nav_menu( array(
         'theme_location'  => 'primary',
         'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
         'container'       => 'div',
         'container_class' => 'collapse navbar-collapse',
         'container_id'    => 'navbarSupportedContent',
         'menu_class'      => 'navbar-nav mx-auto',
         'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
         'walker'          => new WP_Bootstrap_Navwalker(),
          ));
           ?>
            </nav>
        </header><!-- #masthead -->

        <div id="content" class="site-content">
            <div class="container">
                <hr class="mb-5">
            </div>
