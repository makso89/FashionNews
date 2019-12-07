<?php
/**
 * FashionNews functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FashionNews
 */

if ( ! function_exists( 'fashionnews_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fashionnews_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on FashionNews, use a find and replace
		 * to change 'fashionnews' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fashionnews', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'fashionnews' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'fashionnews_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'fashionnews_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fashionnews_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'fashionnews_content_width', 640 );
}
add_action( 'after_setup_theme', 'fashionnews_content_width', 0 );

/**
 * Custom excerpts.
 */

 class Excerpt {

  // Default length (by WordPress)
  public static $length = 55;

  // So you can call: my_excerpt('short');
  public static $types = array(
      'short' => 25,
      'regular' => 35,
      'long' => 70
    );

  /**
   * Sets the length for the excerpt,
   * then it adds the WP filter
   * And automatically calls the_excerpt();
   *
   * @param string $new_length 
   * @return void
   * @author Baylor Rae'
   */
  public static function length($new_length = 55) {
    Excerpt::$length = $new_length;

    add_filter('excerpt_length', 'Excerpt::new_length');

    Excerpt::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(Excerpt::$types[Excerpt::$length]) )
      return Excerpt::$types[Excerpt::$length];
    else
      return Excerpt::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_excerpt();
  }

}

// An alias to the class
function my_excerpt($length = 55) {
  Excerpt::length($length);
}


/**
 * Add class to content images.
 */

function add_responsive_class($content){

        $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
        $document = new DOMDocument();
        libxml_use_internal_errors(true);
       
        if ($content) {
             $document->loadHTML(utf8_decode($content));
        }
       
        $imgs = $document->getElementsByTagName('img');
        foreach ($imgs as $img) {
           $img->setAttribute('class','img-fluid');
        }

        $html = $document->saveHTML();
        return $html;
}

add_filter('the_content', 'add_responsive_class');




/**
 * Enqueue scripts and styles.
 */
function fashionnews_scripts() {

    
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/layouts/bootstrap.min.css', array(), '', 'all' );

	wp_enqueue_style('icons', '//use.fontawesome.com/releases/v5.7.2/css/all.css');

	wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600i,700&display=swap');
    
    wp_enqueue_style( 'aos', get_template_directory_uri() . '/layouts/aos.css', array(), '', 'all' );
        
	wp_enqueue_style( 'owl-css', get_template_directory_uri() . '/layouts/owl.carousel.css', array(), '', 'all' );
	
	wp_enqueue_style( 'fashionnews-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery-slim', get_template_directory_uri() . '/js/jquery-3.3.1.slim.min.js', array( 'jquery' ),'',true );
	
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js', array( 'jquery' ),'',true );
	
	wp_enqueue_script( 'boot-js',get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ),'',true );

	wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '', true );
    
    wp_enqueue_script( 'aos-js',get_template_directory_uri() . '/js/aos.js', array( 'jquery' ),'',true );

	wp_enqueue_script( 'app-js', get_template_directory_uri() . '/js/app.js', array('jquery'), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fashionnews_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom widgets files.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Bootrstrap navwalker file.
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
