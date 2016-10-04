<?php
		$related_books = get_posts(	array( 
		'post_type' => 'post',	
//		'post_status' => array( 'publish', 'future'  ) 
		'posts_per_page' => -1, 
		'orderby' => 'date',
		'meta_query' => array(
				array(
					'key' => 'related__works_reviews',
					'value' => '"' . get_the_ID() . '"',
					'compare' => 'LIKE'
				)
			)
		  )); ?>
		
		
								
								
		<?php if( $related_books ): ?>
	<ul class="byline"><li>Discussed in</li><br />
			<?php foreach( $related_books as $related_book ): ?>
					
					<li>
					<a href="<?php echo get_permalink( $related_book->ID ); ?>">
						<?php echo get_the_title( $related_book->ID ); ?>
					</a>
					</li><br />

			<?php endforeach; ?>
			</ul>
		<?php endif; ?>
