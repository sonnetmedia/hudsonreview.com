<!--<h2>Table of Contents</h2>-->
<?php
//THIS loop pulls all the articles that have a relationship to the issue that the parent loop is pulling
	$child_id = get_the_ID(); 
	$articles_loop = new WP_Query(array( 
	'post_type' => 'post',	
	'post_status' => 'publish', 
	'posts_per_page' => -1, 
	'orderby' => 'meta_value',
	'meta_key' => 'page_appeared_on',
	'order' => 'ASC',
	'meta_key'        => 'related_issue',
	'meta_value'      => $child_id,
			  )
			);
			
if ($articles_loop->have_posts()) : ?>

	<div class="row">
		<?php while($articles_loop->have_posts()) : 
					$articles_loop->the_post();
			 ?>
				<?php  get_template_part('/content-formats/article-archive');    ?>	

			<?php //END the articles loop
				endwhile; 
				endif; //THEN reset the loop so it can go back to what it was doing.
					 wp_reset_postdata();
			?>
	