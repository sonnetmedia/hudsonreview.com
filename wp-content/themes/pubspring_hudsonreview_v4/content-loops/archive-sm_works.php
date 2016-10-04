<?php while (have_posts()) : the_post(); ?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php  // see content-formats/article-archive.php for formatting reference    ?>
	<span class="metadata">
		<?php $related_issue = get_field('issue_link'); 
			if ($related_issue) { ?> 
				<a href="<?php echo get_permalink($related_issue); ?>"><?php echo get_the_title($related_issue); ?></a>
		<?php } ?>
		
		<?php if( !empty( $post->post_content) ) {echo "<span class='label'>Full Text</span>";} ?>			 
	</span>

	<h2 class="title-archive"><em><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></em>
	<small>by <?php the_field('reviewed_author'); ?></small></h2>

		<?php 	//echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Published %s', 'pubspring'), __(get_the_time('F, Y')), get_the_time()) .'</time>';
		?>
		

<ul class="byline text-left">				
	<li>Reviewed 
		<?php $related_article = get_field('related_review_essay'); 
			if ( $related_article ): ?> 
				in <a href="<?php echo get_permalink($related_article); ?>">"<?php echo get_the_title($related_article); ?>"</a><br />
			<?php endif; ?>

		<?php $reviewer = get_field('reviewed_by_link');
			if( $reviewer ): ?>
				by <a href="<?php echo get_permalink($reviewer); ?>"><?php echo get_the_title($reviewer); ?></a>
			<?php endif; ?>
	</li>
</ul>
		
<!--<div class="divider"></div>-->
</section>	






<?php endwhile; // End the loop ?>




<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ($wp_query->max_num_pages > 1) : ?>
<nav id="post-nav">
<div class="post-previous"><?php next_posts_link( __( '&larr; Older articles', 'pubspring' ) ); ?></div>
<div class="post-next"><?php previous_posts_link( __( 'Newer articles &rarr;', 'pubspring' ) ); ?></div>
</nav>
<?php endif; ?>
