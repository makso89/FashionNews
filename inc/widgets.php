<?php 
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fashionnews_widgets_init() {
    if(get_theme_mod('animate', 1)) {
        register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fashionnews' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'fashionnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s" data-aos-once="true" data-aos-duration="600" data-aos-delay="500" data-aos="fade-left" data-aos-offset="400">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
        
    } else {
        register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fashionnews' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'fashionnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
        
    }
    
    if(get_theme_mod('animate', 1)) {
        register_sidebar( array(
		'name'          => esc_html__( 'Frontpage', 'fashionnews' ),
		'id'            => 'frontpage-1',
		'description'   => esc_html__( 'Frontpage widget area is design for Fashionnews Frontpage Widget, and will not work correctly with other widgets. ', 'fashionnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s" data-aos-once="true" data-aos-duration="700" data-aos-delay="600" data-aos="fade-right" data-aos-offset="500">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="row"><div class="col-md-12"><div class="section-title"><h2 class="title">',
		'after_title'   => '</h2></div></div></div><div class="row">',
	));
        
    } else {
        register_sidebar( array(
		'name'          => esc_html__( 'Frontpage', 'fashionnews' ),
		'id'            => 'frontpage-1',
		'description'   => esc_html__( 'Frontpage widget area is design for Fashionnews Frontpage Widget, and will not work correctly with other widgets. ', 'fashionnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="row"><div class="col-md-12"><div class="section-title"><h2 class="title">',
		'after_title'   => '</h2></div></div></div><div class="row">',
	));
        
    }
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'fashionnews' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'fashionnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s p-3">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title mb-3 mt-3 text-center">',
		'after_title'   => '</h3>',
	));
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'fashionnews' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'fashionnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s p-3">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title mb-3 mt-3 text-center">',
		'after_title'   => '</h3>',
	));
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'fashionnews' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'fashionnews' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s p-3">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title mb-3 mt-3 text-center">',
		'after_title'   => '</h3>',
	));
}
add_action( 'widgets_init', 'fashionnews_widgets_init' );


/*Custom widget for Frontpage area*/

class Fashionnews_Frontpage_Widget extends WP_Widget {
    
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'fashionnews-frontpage-widget',
            'description' =>  'Fashionnews widget for frontpage',      
        );
        
        parent::__construct('frontpage_widget', 'Fashionnews Frontpage Widget', $widget_ops);
    }
    
    // Creating widget front-end
    
    public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
 
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) ) {
       echo $args['before_title'] . $title . $args['after_title']; 
    }
    
   // This is where you run the code and display the output
   ?>

<?php if($title=='') : ?>
<div>
    <h5>You must put the correct name of the category that you want to display on Frontpage.</h5>
</div>

<?php else : ?>

<?php $the_query = new WP_Query(array(
      'category_name' => $title,
      'posts_per_page' => 4,
      'orderby' => 'date',
)); ?>

<?php if ($the_query ->have_posts() ) : ?>
<?php while ($the_query->have_posts()) : $the_query->the_post();?>

<div class="col-lg-6 mb-3">
    <div class="card">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top']);?>
        </a>
        <div class="card-body">
            <a href="<?php the_permalink(); ?>">
                <h5><?php the_title(); ?></h5>
            </a>
            <p class="card-text"><?php my_excerpt(22); ?></p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <small class="text-muted"><?php the_category(', ');?></small>
            <small class="text-muted"><?php the_time('F jS, Y');?></small>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php else : ?>
<div>
    <h3>That category doesn't exist.</h3>
</div>
<?php endif; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php
   echo $args['after_widget'];
    }
    
    // Widget Backend 
     public function form( $instance ) {
     if ( isset( $instance[ 'title' ] ) ) {
     $title = $instance[ 'title' ];
     }
         else {
             $title = __( 'Name of the category', 'fashionnews' );
}
         // Widget admin form
    
?>
<p> <small>Write the correct category name that you want to display!</small><br><br>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html( 'Category name:' ); ?></label><br><br>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" required/><br><br>
</p>
<?php 
     }
    
    /*Widget update*/
    
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
    }
}

add_action('widgets_init', function(){
    register_widget('Fashionnews_Frontpage_Widget');
});



/*Custom widget for footer and sidebar area*/

class Fashionnews_Footer_Widget extends WP_Widget {
    
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'fashionnews-footer-widget',
            'description' =>  'Fashionnews widget for footer and sidebar',      
        );
        
        parent::__construct('footer_widget', 'Fashionnews footer and sidebar', $widget_ops);
    }
    
    // Creating widget front-end
    
    public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
 
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];
 
   // This is where you run the code and display the output
   ?>
<?php if($title =='') : ?>
<div>
    <h3>That category doesn't exist.</h3>
</div>
<?php else : ?>

<?php $the_query = new WP_Query(array(
      'category_name' => $title,
      'posts_per_page' => 3,
      'orderby' => 'date',
)); ?>

<?php if ($the_query ->have_posts() ) : ?>
<?php while ($the_query->have_posts()) : $the_query->the_post();?>


<div class="card bg-dark mb-3">
    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top']);?>
    </a>
    <a href="<?php the_permalink(); ?>">
        <h5 class="text-light mt-3 text-center"><?php the_title(); ?></h5>
    </a>
</div>

<?php endwhile; ?>
<?php else : ?>
<div>
    <h3>That category doesn't exist.</h3>
</div>
<?php endif; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php
   echo $args['after_widget'];
    }
    
    // Widget Backend 
     public function form( $instance ) {
     if ( isset( $instance[ 'title' ] ) ) {
     $title = $instance[ 'title' ];
     }
         else {
             $title = __( 'Name of the category', 'fashionnews' );
}
         // Widget admin form  
?>
<p> <small>Write the correct category name that you want to display!</small><br><br>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html( 'Category name:' ); ?></label><br><br>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /><br><br>
</p>
<?php 
     }
    
    /*Widget update*/
    
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
    }
}

add_action('widgets_init', function(){
    register_widget('Fashionnews_Footer_Widget');
});
