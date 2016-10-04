<aside class="sidebar" role="complementary">

<?php if ( get_post_meta($post->ID, 'jstor_identifier', true) ) : ?>
	<article>
		<div class="sidebar-section">
		
		
		<?php 
		
		//display the image if there is one.
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				?>

				<?php the_post_thumbnail('full', array('class' => 'image-shadow')); 
				
				
				?> 
				
				<br /><br />
		<?php  	
				} 
				?>
				
				
				
							
				
				
			<?php  $jstor = get_field('jstor_identifier');?>
			<a target="_blank" href="http://www.jstor.org/stable/i<?php echo $jstor; ?>"><?php _e('JSTOR LINK');  ?></a>
		</div>
	</article>
<?php endif; ?>

	
<?php

 if (is_page( ))   { 

					get_template_part('sidebar', 'center');   
			//dynamic_sidebar('sidebar-archives'); 

	
	}



		elseif (is_single()) {
		
		//echo 'single';

				if (is_singular( 'sm_issues' ) )   { 


					echo '<article id="%1$s" class="hidden-phone widget %2$s">';
					get_template_part('/content-snippets/commerce-buy_button');   
					dynamic_sidebar('sidebar-issue'); 
					echo '</article>';
	
}
	
	
	
	
	
	}


elseif (is_archive(  ) )   { 
					get_template_part('sidebar', 'center');   
			//echo 'archive';
//			dynamic_sidebar('sidebar-archives'); 
			//	 get_archives( 'monthly' , , 'html', , ,  ); 
	
	
	}
	
else {
		echo '';
	}
?>

</aside><!-- /#sidebar -->
		






