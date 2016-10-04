<article>
	<div class="article_header">
<h2 class="page-title">Authors</h2>			 
	</div>
		<?php /* If there are no posts to display, such as an empty archive page */ ?>
		<?php if (!have_posts()) : ?>
			<div class="notice">
			<p class="bottom"><?php _e('Sorry, no results were found.', 'pubspring'); ?></p>
			</div>
			<?php get_search_form(); ?>	
		<?php endif; ?>

<?php /* Start loop */ 




    $args=array(
		'posts_per_page' => -1,
		'orderby' => 'meta_value',
		'meta_key'=>'last_name',
		'order' => 'ASC',
		'post_type' => 'sm_authors',	
		'ignore_sticky_posts'=>1
    );

    $query = new WP_Query($args);
    
      while ($query->have_posts()) : $query->the_post(); ?>
      









		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php the_category(' '); ?>
		
		<h2 class="title-archive"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		


</div>	

<?php endwhile; // End the loop ?>



</article>
