<?php

function pubspring_setup() {

	// Set the $content_width for things such as video embeds.
	if ( ! isset( $content_width ) ) $content_width = 690; 
	
	// Add language supports. Please note that PubSpring Framework does not include language files.
	load_theme_textdomain('pubspring');
	
	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );
	
	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support( 'post-thumbnails', array( 'post', 'page', 'product' , 'sm_authors', 'sm_contributor', 'sm_works', 'sm_issues') );
	
	// Default Post Thumbnail dimensions (cropped)
	set_post_thumbnail_size( 150, 150, true ); 	
	
	// Additional image sizes
	add_image_size( 'category-thumb', 120, 9999 ); 	//120 pixels wide (and unlimited height)
	add_image_size( 'category-small', 220, 9999 ); 	//220 pixels wide (and unlimited height)	
	add_image_size( 'category-medium', 540, 9999 ); //540 pixels wide (and unlimited height)	
	add_image_size( 'category-large', 900, 9999 ); 	//900 pixels wide (and unlimited height)
	
	// Add post formarts supports. http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', array('video', 'status'));
	
	// Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
	add_theme_support('menus');
	
	register_nav_menus(array(
		'primary_navigation' => __('Primary Navigation', 'pubspring'),
		'mobile_navigation' => __('Mobile Navigation', 'pubspring'),
		'utility_navigation' => __('Utility Navigation', 'pubspring')
	));	
}
add_action('after_setup_theme', 'pubspring_setup');


//Sets width of media files
if ( ! isset( $content_width ) ) $content_width = 720;


// Add support for excerpt boxes on pages
function add_page_excerpt_support(){
   add_post_type_support( 'page', 'excerpt' );
}
 
add_action('admin_init', 'add_page_excerpt_support');