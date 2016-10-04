<?php /* Start loop */ ?>
<?php while (have_posts()) : 
	$child_id = get_the_ID(); 
the_post(); ?>


<?php $line_height = get_field('line_height');?>
	
	<?php if ( $line_height ) {
		echo '<style>article.category-poetry, article.category-poetry p { line-height:' .$line_height.'px }</style>';
		}
	?>

	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<div class="article_header">
			<h2 class="page-title">
			
					<?php  if ( 'sm_works' == get_post_type() ) {
					echo( 'Works Reviewed');

					 }    ?>

<?php  if ( 'sm_recordings' == get_post_type() ) {
echo( 'Recordings');
 }    ?>


			
					<?php  if ( 'sm_news' == get_post_type() ) {
					echo( 'News');
					 }    ?>
					
			
		
			 </h2>
		</div>
		<div class="entry-content">

<?php 
if( get_field('omit_title') )
{

}

else { ?>


			<h1 class="entry-title"><?php the_title(); ?></h1>

		
				<?php  if ( 'sm_works' == get_post_type() ) { ?>
					<ul class="byline"><!--<li>by</li>-->
					<li>
				<?php  the_field('reviewed_author');    ?>
				</li>
				<ul><br />
				
				<?php  } echo '<hr />'; } //first bracket closes if get_post_type, second closes omit_title  ?>
				
		
		<?php  if ( 'post' == get_post_type() ) 
		{
		    ?>
		
		


	<ul class="byline"><li>by</li>
<?php //the_author_posts_link(); ?>
	
	<?php foreach(get_field('related_author') as $post_object) { $authorlist[] = '<li><a href="' . get_permalink($post_object->ID) . '">'   . get_the_title($post_object->ID) . ' </a></li>';    } echo implode(', ', $authorlist); ?>
	</ul>
	
	<?php  }    ?>
			
		
		
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
		
		
		
		
		
		
		
		<?php 
		
		//display the image if there is one.
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				?>
				<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('full', array('class' => 'image-shadow')); 
				
				
				?> 
				</a>
				
				<br /><br />
		<?php  	
				} 
				?>
		
		
		
				
		
			<?php 
			//show the content 
			the_content(); ?>
			
			
			<?php if ( 
			empty( $post->post_content) ) {
				$related_issue = get_field('related_issue'); 
			?>
		<p class="strong"><?php //the_category(' '); 
				if ($related_issue) {?> 
					To read this article, purchase the  <a href="<?php echo get_permalink($related_issue); ?>"><?php echo get_the_title($related_issue); ?></a> issue.<?php } ?></p>
			 
			 <?php } ?>
			
			
	
	
	
<?php endwhile; // End the loop ?>


	









		
			<?php 
				if( !empty( $post->post_content) ) {
					//show the footer with date, etc - THIS IS BEING USED FOR OTHER META DATA IF WE DECIDE TO HAVE SHARING ETC
					//pubspring_entry_meta();
					
					}
				?>			
			
				
			
			
			<hr />
			
		</div>
		<footer>
			<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'pubspring'), 'after' => '</p></nav>' )); ?>
			<p><?php the_tags(); ?></p>
		</footer>
		<?php comments_template(); ?>
		
	</article>

