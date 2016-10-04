<?php /* Start loop */ ?>

<?php
$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
?>

<article>

	<div class="article_header">
		<h1 class="page-title">
<?php echo $curauth->display_name; ?>

		 </h1>
	</div><!-- //END HEADER -->


<!--//bio stuff here -->

<?php
$authorID = $curauth->ID;
the_author_meta( description, $authorID);
	?>




	<h5 style="margin-bottom: 2em;"><?php _e('Articles by ', 'pubspring'); echo $curauth->display_name; ?></h5>	


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="entry-content">

		


	
	<section id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 2em;">
	<?php the_category(' '); ?>
	
	<h2 class="title-list"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="excerpt">
	
	<?php if ( ! has_excerpt() ) {
	      echo '';
	} else { 
	      the_excerpt();
	}?>
	</div>
	
	<?php 	echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Published %s', 'pubspring'), __(get_the_time('F, Y')), get_the_time()) .'</time>';
	?>
	
	
	
	<?php
	if( !empty( $post->post_content) ) {
	echo "<span class='label label-important metadata' style='font-size:60%;paddin-top:.0125em;font-weight:400;color:white;'>Full Text</span>";
	}
	?>			 
	
	
	<div class="divider"></div>
	</section>	
	
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
						
		</div>

<?php endwhile;endif; // End the loop ?>
<footer>
	<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'pubspring'), 'after' => '</p></nav>' )); ?>
	<p><?php the_tags(); ?></p>
</footer>

	</article>