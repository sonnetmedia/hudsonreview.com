<style>
.attribution, attribution p{
			text-align:right;
}
</style>
<?php $quote_loop = new WP_Query(array( 'post_type' => 'sm_quotes', 'post_status' => 'publish', 'posts_per_page' => 1, 'orderby' => 'rand',)); 
		if ($quote_loop->have_posts()) :
		while($quote_loop->have_posts()) : $quote_loop->the_post();
?>
				<?php the_content(); ?>
				<span class="attribution">&mdash; <?php the_title(); ?></span>
				<?php endwhile; endif; wp_reset_postdata(); ?>
