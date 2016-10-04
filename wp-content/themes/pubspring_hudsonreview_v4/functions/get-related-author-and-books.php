<?php
function get_related_author_and_books() {
		 $posts = get_field('related_author_or_book');
			if( $posts ):  $related_entries = array();   
	?>on
				<?php foreach( $posts as $post_object): ?>
						<?php $related_entries [] = '<li class="proper-noun"><a href="' . get_permalink($post_object->ID) . '">' . get_the_title($post_object->ID) . '</a></li>'; ?>
				<?php endforeach; ?>
				<?php  echo implode(', ', $related_entries); ?>
		<?php endif; ?>
<?php } 
add_action('pubspring_post_related', 'get_related_author_and_books', 10);