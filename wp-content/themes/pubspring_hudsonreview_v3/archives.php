<?php get_header(); ?>
<div class="span8 page_body page_shadow">
	<?php get_template_part('/content-snippets/page_nav'); ?>
	<?php get_template_part('content-loops/category'); ?>
</div>
<div class="hide-on-tablets">		
	<div class="span2">
		<?php get_sidebar(); ?>
	</div>
</div>
</div><!--  /closing row from header  -->
</div><!--  /closing container from header  -->
<?php get_footer(); ?>
