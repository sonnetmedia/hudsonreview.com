<?php 
//Template Name: Issue Archive
get_header(); ?>



<div class="container page_body">

	

	<div class="row">
		
		
		
<div class="span8 pull-up-70">

<article>
<div class="article_header">
	<h2 class="page-title">Archives</h2>
</div>



<?php 
						get_template_part( 'content-loops/archive_taxonomy' );

?>



</article>












		
</div>		
		
		
		
		<div class="span4">
		
		
		
		
		
		<?php  get_template_part('sidebar','center');    ?>
		
		
		<?php //get_sidebar(); ?>
		</div>


	</div><!-- /row -->
	

</div> <!-- /container -->


		
<?php get_footer(); ?>
