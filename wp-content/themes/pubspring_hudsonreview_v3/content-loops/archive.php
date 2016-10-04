<article>
	<div class="article_header">
		<?php get_template_part('inc/page_nav_article'); ?>			 
	</div>
		<?php /* If there are no posts to display, such as an empty archive page */ ?>
		<?php if (!have_posts()) : ?>
			<div class="notice">
			<p class="bottom"><?php _e('Sorry, no results were found.', 'pubspring'); ?></p>
			</div>
			<?php get_search_form(); ?>	
		<?php endif; ?>

<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>

		<section id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 4em;">
		<?php the_category(' '); ?>
		
		<h1 class="entry-titleX"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		
		<?php 	echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Published %s', 'pubspring'), __(get_the_time('F, Y')), get_the_time()) .'</time>';
		?>

	<?php
		if( !empty( $post->post_content) ) {
			echo "<span class='label label-important metadata' style='font-weight:400;color:white;'>Full Text</span>";
		}
	?>			 

		<?php  
		$post_objects = get_field('related_author');
		
		if( $post_objects ): ?>
		<ul class="byline tex-left"><li>by</li>
			<?php  get_template_part('content-snippets/related_author');     ?>
		</ul>
		<?php endif;
		
		
		?>

	<footer>		
	<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
	</footer>

<div class="divider"></div>
</section>	

<?php endwhile; // End the loop ?>




<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ($wp_query->max_num_pages > 1) : ?>
<nav id="post-nav">
<div class="post-previous"><?php next_posts_link( __( '&larr; Older articles', 'pubspring' ) ); ?></div>
<div class="post-next"><?php previous_posts_link( __( 'Newer articles &rarr;', 'pubspring' ) ); ?></div>
</nav>
<?php endif; ?>
</article>
