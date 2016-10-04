<?php get_header(); ?>
<div class="container page_body">
	<div class="row spaced">
		
		<div class="span7 pull-up-90">

				<?php get_template_part('/content-loops/latest_issue'); ?>		
</div>



<style>
.w50{
	width: 98%;		
}
</style>


<div class="span2">

	<?php
			$works_query = new WP_Query(array( 
			'post_type' => 'sm_works',	
			'post_status' => 'publish', 
			'posts_per_page' => 4, 
			'orderby' => 'date',
			'order' => 'desc',

			  )
			);			
			 ?>
<?php if ( $works_query->have_posts() ) : 
		echo "<h2 style='margin-bottom:.25em;'>Reviewed</h2>";
		while ( $works_query->have_posts() ) : $works_query->the_post(); 

	$image = get_the_post_thumbnail($id, 'category-thumb', array('class' => 'w50 shadow')); 

				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.    
?>



    
    <a href="<?php the_permalink(); ?>">




    <?php echo $image; ?><hr />
    </a>

    <?php 
    

     }    ?>
    

<?php 

    //the_title(); echo '<br /><br /><br />';
endwhile; endif; 			wp_reset_postdata(); ?>
	
	
	
</div>



<div class="span3 small_text">

		
		<?php
			$news_loop = new WP_Query(array( 
			'post_type' => 'sm_news',	
			'post_status' => 'publish', 
			'posts_per_page' => 5, 
//			'orderby' => 'rand',
// 'meta_key'        => 'related_book',
// 'meta_value'      => $child_id,
			  )
			);			
			if ($news_loop->have_posts()) :
			
			echo __("<h2>News</h2>");
				while($news_loop->have_posts()) : $news_loop->the_post();
			 ?>
						<?php  	//$child_id = get_the_ID();     ?>


		<div style="margin-bottom:20px;">
					<h3 style="margin: 0;">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
