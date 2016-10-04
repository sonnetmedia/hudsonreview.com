<article class="hidden-phone widget">

<?php
echo 	$child_id = get_the_ID(); ;
//THIS loop pulls all the articles that have a relationship to the issue that the parent loop is pulling
	$child_id = get_the_ID(); 
	$article_review = new WP_Query(array( 
	'post_type' => 'post',	
	'post_status' => 'publish', 
	'posts_per_page' => -1, 
	'meta_key'        => 'related__works_reviews',
	'meta_value'      => $child_id
			  )
			);
			
			if ($article_review->have_posts()) :
				while($article_review->have_posts()) : 
				$article_review->the_post();
			 ?>



<h4 class="title-list"> 
	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
</h4>
<?php //This bad boy lets us know if there is text in the article by putting a badge next to it.

echo 	$child_id = get_the_ID(); ;

if( !empty( $post->post_content) ) {
   echo " <span class='inline label label-important metadata small' style='margin:0;font-size:55%;font-weight:400;color:white;'>Full Text</span>";
   }
 ?>


<ul class="byline">
<li><?php  $category = get_the_category(); echo $category[0]->cat_name; ?> by <?php the_author_posts_link(); ?></li>
</ul>


			<?php //END the articles loop
				endwhile; endif; //THEN reset the loop so it can go back to what it was doing.
					 wp_reset_postdata();
			?>

</article>
