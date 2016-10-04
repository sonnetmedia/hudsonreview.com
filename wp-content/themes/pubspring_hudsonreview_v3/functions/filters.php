<?php 		
//THE FOLLOWING MANIPULATES THE QUERY SO WE CAN USE FUTURE POSTS (PUB DATE FOR BOOKS)
// SHOWS FUTURE POSTS ON ARCHIVE PAGES
//SEEING IF WE DO THIS WITH QUERY POSTS - 
//add_action( 'pre_get_posts', 'show_upcoming_books' );
//function show_upcoming_books( $query ) { if ( ! is_admin() ) { $query->query_vars['post_status'] = array( 'publish', 'future'  ); return; } }
// SHOWS FUTURE POSTS ON SINGLE PAGES
function show_future_posts($posts)
{
   global $wp_query, $wpdb;
   if(is_single() && $wp_query->post_count == 0)
   {
      $posts = $wpdb->get_results($wp_query->request);
   }
   return $posts;
}
add_filter('the_posts', 'show_future_posts');




function SearchFilter($query) {
  if ($query->is_search) {
    // Insert the specific post type you want to search
    $query->set('post_type', array( 'product', 'sm_authors', 'post', 'tribe_events'));
    $query->set('post_status', array('publish','future'));	
    	
//    $query->set( 'orderby', 'post_type' );
  }
  return $query;
}
// This filter will jump into the loop and arrange our results before they're returned
add_filter('pre_get_posts','SearchFilter');