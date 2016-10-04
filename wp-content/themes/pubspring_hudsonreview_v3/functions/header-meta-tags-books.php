<?php
function sm_book_og_meta_tags() { 
  if ( 'product' == get_post_type() ){ ?>
		<meta property="book:release_date" content="<?php the_time('Y-m-d') ?>">
		<meta property="book:isbn" content="<?php global $post; echo get_post_meta($post->ID, '_sku', true);    ?>">
	<?php
	} 
}
add_action('wp_head', 'sm_book_og_meta_tags');