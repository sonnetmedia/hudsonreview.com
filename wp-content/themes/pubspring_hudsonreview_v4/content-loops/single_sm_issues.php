<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>

<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
	<div class="article_header">
		<h2 class="page-title">
<?php the_title(); ?><small>(<?php echo 'Volume: '; the_field('volume'); ?>, No. <?php the_field('issue_number'); ?>)</small>

		 </h2>
	</div>
	
	<div class="entry-content">
	
	
	
		<div class="article_headerTK">							 
			<h1 class="entry-title"><?php the_field('issue_name'); ?></h1>						 
		</div>
		
		
<?php //Pull in the articles that are related to this issue
if ( !empty( $post->post_content ) ) : ?>
	<?php  the_content()    ?>
<?php else : ?>
	<?php  get_template_part('content-loops/related_articles');    ?>
<?php endif; ?>
		
	
	
	</div>
		<footer>
			<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'pubspring'), 'after' => '</p></nav>' )); ?>
			<p><?php the_tags(); ?></p>
		</footer>
	</article>

<?php endwhile; // End the loop ?>