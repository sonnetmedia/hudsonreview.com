<?php  // DEPRECATE    ?>
<h2>Table of Contents</h2>
<div class="row">
<div class="col-md-3">

<?php

//THIS loop pulls all the articles that have a relationship to the issue that the parent loop is pulling
	$child_id = get_the_ID(); 
	$articles_loop = new WP_Query(array( 
	'post_type' => 'post',	
	'post_status' => 'publish', 
	'posts_per_page' => -1, 
	'orderby' => 'meta_value',
	'meta_key' => 'page_appeared_on',
	'order' => 'ASC',
	'meta_key'        => 'related_issue',
	'meta_value'      => $child_id,
			  )
			);
			
			if ($articles_loop->have_posts()) :
				while($articles_loop->have_posts()) : 

				$articles_loop->the_post();
			 ?>



<h4 class="title-list"> 
	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
</h4>
<div class="excerpt">

<?php if ( ! has_excerpt() ) {
      echo '';
} else { 
      the_excerpt();
}?>
</div>
<?php //This bad boy lets us know if there is text in the article by putting a badge next to it.
if( !empty( $post->post_content) ) {
   echo " <span class='inline label label-important metadata small' style='margin:0;font-size:55%;font-weight:400;color:white;'>Full Text</span>";
   }
 ?>


<ul class="byline">
<li><?php  $category = get_the_category(); echo $category[0]->cat_name; ?> by&nbsp;<?php get_template_part('content-snippets/related_author'); //the_author_posts_link(); ?></li>
<li style="text-align: right;">p. <?php the_field('page_appeared_on');     ?></li>
</ul>






			<?php //END the articles loop
				endwhile; 
				

				endif; //THEN reset the loop so it can go back to what it was doing.
					 wp_reset_postdata();
				echo '</div>	';
			?>
	</div>