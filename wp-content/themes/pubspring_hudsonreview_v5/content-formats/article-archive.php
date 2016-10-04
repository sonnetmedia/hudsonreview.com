<?php  // If this formatting changes, also change /content-loops/archive-sm_works.php    ?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php  if ( ! is_singular( 'sm_issues' )  ) { ?>
		<span class="metadata">
			<?php $related_issue = get_field('related_issue'); 
				if ($related_issue) { ?> 
				<a href="<?php echo get_permalink($related_issue); ?>"><?php echo get_the_title($related_issue); ?></a>
			 <?php } ?>
		</span>
<?php  }    ?>
	<h2 class="title-archive"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php
		if( !empty( $post->post_content) ) {
			echo "<span class='label'>Full Text</span>";
			}
		?>			 
		<?php  
		$post_objects = get_field('related_author');
		
		if( $post_objects ): ?>
			<ul class="byline text-left">

				<?php  if (! is_category() ) { the_category(' '); } ?>				

				<?php  if ( ! is_singular( 'sm_authors' )  ) { ?>

				<li>by <?php get_template_part('content-snippets/related_author');  ?> </li>
				
							<?php 	}    ?> 
				
<!--				<li class="pull-right light">-->
				<?php //the_field('page_appeared_on');     ?>
	<!--			</li>-->
			</ul>
		<?php endif; ?>
<!--<div class="divider"></div>-->
</section>	
