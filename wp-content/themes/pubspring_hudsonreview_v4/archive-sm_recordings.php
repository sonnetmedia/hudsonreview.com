<?php get_header(); ?>
<div class="container">
	<div class="row spaced">
		<div class="col-span-8 pull-up-90">
				<?php get_template_part('content-loops/recordings'); ?>
		</div>
		<div class="col-span-4">
			<?php get_sidebar(); ?>
		</div>
	</div><!--  /closing row from header  -->
</div><!--  /closing container from header  -->
<?php get_footer(); ?>

