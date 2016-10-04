<?php get_header(); ?>
<div class="container">
	<div class="row spaced">
		<div class="col-span-8 pull-up-90">
			<?php get_template_part('content-loops/single_sm_authors'); ?>
		</div>
		<div class="col-span-4">
		<?php  //get_template_part('/content-snippets/related_article');    ?>
			<?php pubspring_entry_meta(); ?>
			<?php get_sidebar(); ?>
		</div>
	</div><!--  /closing row  -->
</div><!--  /closing container  -->
<?php get_footer(); ?>

