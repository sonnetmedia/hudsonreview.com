<?php 
/*
Template Name: Works Reviewed
*/
get_header(); ?>
<div class="container page_body">
	<div class="row">
		<div class="col-span-8 pull-up-70">
			<article>
				<div class="article_header">
					<h2 class="page-title">Works Reviewed</h2>
				</div>
					<?php get_template_part( 'content-loops/archive-sm_works' ); ?>
			</article>
		</div>		
		<div class="col-span-4">
			<?php  get_template_part('sidebar','center');    ?>
			<?php //get_sidebar(); ?>
		</div>
	</div><!-- /row -->
</div> <!-- /container -->
<?php get_footer(); ?>
