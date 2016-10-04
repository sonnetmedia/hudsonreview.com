<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
	<div class="article_header">
		<h2 class="page-title">
			
<?php echo get_the_term_list( $post->ID, 'author_category', '', ', ', '' ); ?>		
		 </h2>
	</div>
	
	<div class="entry-content">
			<h1 class="entry-title"><?php the_title(); ?></h1>

		<?php 
		
		//display the image if there is one.
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				?>
				<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('full', array('class' => ', flow-left image-shadow'));  ?> 
				</a>
				<br />
		<?php  	}	?>
		
			<?php 
			//show the content 
			the_content(); ?>

					
			<h5 style="margin-bottom: 2em;"><?php _e('Articles by ', 'pubspring'); the_title(); ?></h5>		
					
	<?php
		//ISSUES
		
 $child_id = get_the_ID(); 
			$query = new WP_Query(array( 
//			'post_type' => 'post',	
			'post_status' => 'publish', 
			'posts_per_page' => -1, 
			'orderby' => 'date',
			'order' => 'desc',
//			'meta_key'        => 'related_author',
//			'meta_value'      => $child_id,


'meta_query' => array(
	array(
		'key' => 'related_author',
		'value' => '"' . get_the_ID() . '"',
		'compare' => 'LIKE'
			)
		)

			
			)
			);			
			
			if ($query->have_posts()) :
	
	//			$child_id = get_the_ID('$query->the_post()');
					while($query->have_posts()) : $query->the_post();
	?>
	
	
	<?php  get_template_part('/content-formats/article-archive');    ?>	
	
	
	<?php  endwhile; endif; wp_reset_postdata(); ?>
	
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
						
		</div>
		<footer>
			<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'pubspring'), 'after' => '</p></nav>' )); ?>
			<p><?php the_tags(); ?></p>
		</footer>
		<?php comments_template(); ?>
	</article>
<?php endwhile; // End the loop ?>