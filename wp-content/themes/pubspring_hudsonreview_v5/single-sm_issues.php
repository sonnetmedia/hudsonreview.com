<?php get_header(); ?>
<div class="container">
	<div class="row spaced">
		<div class="col-md-8 pull-up-90">
			<?php /* Start loop */ ?>
			<?php while (have_posts()) : the_post(); ?>
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<div class="article_header_issue <?php  the_field('issue_season');echo '_bkgrnd'    ?>">
						<h1 class="page-title <?php  the_field('issue_season'); ?>">
			<?php the_title(); ?> <small>(<?php printf(__('Volume '));  the_field('volume'); ?>, No. <?php the_field('issue_number');?>)</small> 
						</h1>
					</div>					
					<div class="entry-content">
							<h1 class="entry-title"><?php the_field('issue_name'); ?></h1>						 
								<?php  the_content()    ?>
								<hr />
								<?php  get_template_part('content-loops/issue-toc');    ?>
					</div><!-- //END entry-content -->
						<footer>
							<p><?php the_tags(); ?></p>
						</footer>
				</article> 
			<?php endwhile; // End the loop ?>
		</div>
		<div class="col-md-4">
		<?php  //get_template_part('/content-snippets/related_article');    ?>
			<?php //pubspring_entry_meta(); ?>
			<?php get_sidebar(); ?>
		</div>
	</div><!--  /closing row  -->
</div><!--  /closing container  -->
<?php get_footer(); ?>


