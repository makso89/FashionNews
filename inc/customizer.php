<?php
/**
 * FashionNews Theme Customizer
 *
 * @package FashionNews
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function get_categories_select() {
  $teh_cats = get_categories();
  $results;
 
  $count = count($teh_cats);
  for ($i=0; $i < $count; $i++) {
    if (isset($teh_cats[$i]))
      $results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
    else
      $count++;
  }
  return $results;
}


function fashionnews_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'fashionnews_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'fashionnews_customize_partial_blogdescription',
		) );
	}

	//Get Home page categories section

	$wp_customize->add_section('categories', array(
       'title'    => __('Choose Showcase Category', 'fashionnews'),
       'priority' => 20,
	));

	//Showcase categories setting

	$wp_customize->add_setting('cat_1', array(
        'default'        => 'uncategorized',
        'capability'     => 'edit_theme_options',
        'sanitize_callback'  => 'esc_attr',
	));
	
	//Showcase categories control

	$wp_customize->add_control( 'cat_1', array(
	'settings' => 'cat_1',
	'description'  => sprintf(__('Choose categorie to show in Showcase area', 'fashionnews')),
    'label'   => 'Showcase',
    'section' => 'categories',
    'type'    => 'select',
    'choices' => get_categories_select()
     ));
	


	// Social icons

	$wp_customize->add_section('social', array(
		'title'        => __('Social icons', 'fashionnews'),
		'description'  => sprintf(__('Custom social media icons', 'fashionnews')), 
		'priority'     => 80,
	));
	
	//Facebook setting

	$wp_customize->add_setting('facebook_url', array(
		'default'      => esc_html('https://www.facebook.com', 'fashionnews'),
		'type'         => 'theme_mod',
        'sanitize_callback'  => 'esc_attr',
	));

	//Facebook control
	
	$wp_customize->add_control('facebook_url', array(
		'label'       =>__('Facebook Url', 'fashionnews'),
		'section'     => 'social', 
		'priority'    => 1,
	));

	//Instagram setting

	$wp_customize->add_setting('instagram_url', array(
		'default'      => esc_html('https://www.instagram.com', 'fashionnews'),
		'type'         => 'theme_mod',
        'sanitize_callback'  => 'esc_attr',
	));

	//Instagram control
	
	$wp_customize->add_control('instagram_url', array(
		'label'       =>__('Instagram Url', 'fashionnews'),
		'section'     => 'social', 
		'priority'    => 2,
	));

	//Twitter setting

	$wp_customize->add_setting('twitter_url', array(
		'default'      => esc_html('https://twitter.com', 'fashionnews'),
		'type'         => 'theme_mod',
        'sanitize_callback'  => 'esc_attr',
	));

	//Twitter control
	
	$wp_customize->add_control('twitter_url', array(
		'label'       =>__('Twitter Url', 'fashionnews'),
		'section'     => 'social', 
		'priority'    => 3,
	));

	//Pinterest setting

	$wp_customize->add_setting('pinterest_url', array(
		'default'      => esc_html('https://www.pinterest.com', 'fashionnews'),
		'type'         => 'theme_mod',
        'sanitize_callback'  => 'esc_attr',
	));

	//Pinterest control
	
	$wp_customize->add_control('pinterest_url', array(
		'label'       =>__('Pinterest Url', 'fashionnews'),
		'section'     => 'social', 
		'priority'    => 4,
	));
    
    
    
    //Footer credits
    
    $wp_customize->add_section('footer_credits', array(
       'title'    => __('Footer credits', 'fashionnews'),
       'priority' => 100,
	));
    
    //Footer credits settings
    
    $wp_customize->add_setting('footer', array(
        'default'        => esc_html('Proudly powered by WordPress', 'fashionnews'),
        'type'         => 'theme_mod',
        'sanitize_callback'  => 'esc_attr',
	));
    
    
    //Footer credits control
    
    $wp_customize->add_control('footer', array(
		'label'       =>__('Write your footer credits', 'fashionnews'),
		'section'     => 'footer_credits', 
	));
    
    //Sticky menu section
    
    $wp_customize->add_section('sticky_menu', array(
       'title'    => __('Sticky menu', 'fashionnews'),
       'priority' => 35,
	));
    
    //Sticky menu settings
    
    $wp_customize->add_setting('sticky', array(
        'default'        => '1',
        'sanitize_callback'  => 'esc_attr',
	));
    
    //Sticky menu control
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'sticky',
            array(
                'label'       =>__('Enable Sticky menu', 'fashionnews'),
		        'section'     => 'sticky_menu', 
                'settings'    => 'sticky',
                'type'        => 'checkbox',
                
            )
        )
	);
    
    //Animation section
    
    $wp_customize->add_section('aos_animation', array(
       'title'    => __('Animation', 'fashionnews'),
       'priority' => 48,
	));
    
    //Animate menu settings
    
    $wp_customize->add_setting('animate', array(
        'default'        => '1',
        'sanitize_callback'  => 'esc_attr',
	));
    
    //Animate menu control
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'animate',
            array(
                'label'       =>__('Enable animations', 'fashionnews'),
		        'section'     => 'aos_animation', 
                'settings'    => 'animate',
                'type'        => 'checkbox',
                
            )
        )
	);

}
add_action( 'customize_register', 'fashionnews_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function fashionnews_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function fashionnews_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fashionnews_customize_preview_js() {
	wp_enqueue_script( 'fashionnews-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'fashionnews_customize_preview_js' );


