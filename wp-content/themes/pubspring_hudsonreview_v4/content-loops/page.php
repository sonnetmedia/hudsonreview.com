<article>
		<?php get_template_part('/content-snippets/page_heading_title'); ?>			 
		<?php /* If there are no posts to display, such as an empty archive page */ ?>
		<?php if (!have_posts()) : ?>
			<div class="notice">
			<p class="bottom"><?php _e('Sorry, no results were found.', 'pubspring'); ?></p>
			</div>
			<?php get_search_form(); ?>	
		<?php endif; ?>

<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
<?php  the_content();    ?>

<?php endwhile; // End the loop ?>




<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ($wp_query->max_num_pages > 1) : ?>
<nav id="post-nav">
<div class="post-previous"><?php next_posts_link( __( '&larr; Older articles', 'pubspring' ) ); ?></div>
<div class="post-next"><?php previous_posts_link( __( 'Newer articles &rarr;', 'pubspring' ) ); ?></div>
</nav>
<?php endif; ?>
</article>
