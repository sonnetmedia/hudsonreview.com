<?php
/////////////////////////SEO META TAGS/////////////////////////////
function yoast_change_opengraph_type( $type ) {
  if ( 'product' == get_post_type() ) {
    return 'book';
    }
    if ( is_front_page() ){
      return 'website';
    }    
}
add_filter( 'wpseo_opengraph_type', 'yoast_change_opengraph_type', 10, 1 );

function sm_custom_titles($title) {
	if(tribe_is_event() && !tribe_is_day() && !is_single()) {
		$title = 'Upcoming Events ';
		
	}
	return $title;
}
add_filter('wpseo_title','sm_custom_titles');