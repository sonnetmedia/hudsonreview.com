<?php get_header(); ?>
<div class="container page_body">
	<div class="row">
		<div class="col col-md-7 pull-up-70">
			<?php get_template_part('/content-loops/latest_issue'); ?>		
		</div>
		<div class="col col-md-2" style="margin-top:30px;">
			<?php
				$works_query = new WP_Query(array( 
					'post_type' => 'sm_works',	
					'post_status' => 'publish', 
					'posts_per_page' => 2, 
					'orderby' => 'date',
					'order' => 'desc',
			  	)
				);			
			?>
			<?php if ( $works_query->have_posts() ) : 
				echo "<h2 class='home_page_heading'>Reviewed</h2>";
					while ( $works_query->have_posts() ) : $works_query->the_post(); 
						$image = get_the_post_thumbnail($id, 'category-thumb', array('class' => 'shadow')); 
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.    
							$related_reviews = get_post_meta(get_the_ID(),'related_review_essay', true);
				?>
			<div class="border_bottom">    
    		<a class="center" href="<?php if($related_reviews) {echo '/?p='.$related_reviews;}else {the_permalink();} ?>">
				<?php echo $image; ?>
    		</a>
			</div>
    <?php }?>
    <?php 
				endwhile; 
				endif; 
				wp_reset_postdata(); 
		?>
			<p class="metadata">
				<a href="/works-reviewed/">
					More Works Reviewed
				</a>
			</p>
		</div>
		<div class="col col-md-3 small_text" style="border-left:1px solid #dadada;margin-top:30px;">
			<?php
				$news_loop = new WP_Query(array( 
					'post_type' => 'sm_news',	
					'post_status' => 'publish', 
					'posts_per_page' => 5, 
		//			'orderby' => 'rand',
		// 'meta_key'        => 'related_book',
		// 'meta_value'      => $child_id,
			  ));			
					if ($news_loop->have_posts()) :
						echo __("<h2 class='home_page_heading'>News</h2>");
						while($news_loop->have_posts()) : $news_loop->the_post();
			 ?>
		<div style="margin-bottom:20px;border-bottom:1px solid #dadada;padding-bottom:10px;">
			<h3>
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h3>
			<?php 	echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('%s', 'pubspring'), get_the_time('l, F jS, Y'), get_the_time()) .'</time>';
			?>
			<?php the_excerpt(); ?>
		</div>
			<?php 
				endwhile;
				endif;
				wp_reset_postdata(); 
			?>
			<hr />
	</div>
	</div>
</div>
<?php get_footer(); ?>
