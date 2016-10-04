<?php get_header(); ?>
<div class="container">
	<div class="row spaced">
		<div class="span8 pull-up-90">
		
		
		
			<?php /* Start loop */ ?>
			<?php while (have_posts()) : the_post(); ?>
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<div class="article_header_issue <?php  the_field('issue_season');echo '_bkgrnd'    ?>">
						<h1 class="page-title <?php  the_field('issue_season'); ?>">
							<?php printf(__('Volume '));  the_field('volume'); ?>, No. <?php the_field('issue_number');?> <?php the_title(); ?>
						</h1>
					</div>
					
					<div class="entry-content">
							<h1 class="entry-title"><?php the_field('issue_name'); ?></h1>						 
								
							<?php  // NOT USING - WAS PULLING TOC -> get_template_part('content-loops/related_articles');    ?>		
						
							<?php //Pull in the articles that are related to this issue
							if ( !empty( $post->post_content ) ) : ?>
								<?php  the_content()    ?>
							<?php else : ?>
								<?php  get_template_part('content-loops/issue-toc_main');    ?>
							<?php endif;
							//END this madness of pulling articles
							 ?>
					</div><!-- //END entry-content -->
						<footer>
							<p><?php the_tags(); ?></p>
						</footer>
				</article> 
			<?php endwhile; // End the loop ?>



<?php  get_template_part('/content-snippets/pagination-prev_next');    ?>
				
		</div><!-- //END span8 -->








		<div class="sidebar span4">
			<?php get_sidebar(); ?>
			
			
			<?php //Pull in the articles that are related to this issue, but only if we are pulling in issue CONTENT in the main section.
			if ( !empty( $post->post_content ) ) : ?>
				<?php  //the_content()    ?>
				<?php  get_template_part('content-loops/issue-toc_sidebar');    ?>
			<?php endif; ?>
		</div><!-- //END SIDEBAR -->

	</div><!--  /closing row from header  -->
</div><!--  /closing container from header  -->
<?php get_footer(); ?>

