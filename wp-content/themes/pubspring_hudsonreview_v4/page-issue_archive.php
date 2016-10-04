<?php 
//Template Name: Issue Archive
get_header(); ?>

<style>
		article{
			margin-bottom: 3em;
		}
		.issue_cover{
					width: 20%;
					margin-right: 18px;
					margin-bottom: 18px;
//					border-left: 1px solid #eee;
					float: left;
					height: 150px;
					overflow: hidden;
					color: #FFF;
					
		}
		
		 a:hover .issue_cover{
			background-color: #EEE;
		}
		
		.issue_cover_top div{
			//background-image: url(http://thehudsonreview.r-epublish.com/wp-content/themes/pubspring_child_v1/images/hudson_review-tiny-banner-119x24.png);
			background-position: center center;
			background-repeat: no-repeat;
			height: 54px;
			width: 10%;
			padding: 0;
			line-height: 90%;
								font-size: 130%;
		}
		
		.issue_cover_top div .review{
			margin-left: 1em;
			line-height: 130%;
		}
		
		a .issue_cover_top div {
			color: #efefef;
		}
		
		.issue_cover div{
			padding: .125em .35em .35em .35em;
		}
		
		.issue_cover_lower{
							width: 20%;
							margin-right: 18px;
							margin-bottom: 18px;
		//					border-left: 1px solid #eee;
							float: left;
							height: 70px;
							overflow: hidden;
		background-color: #FFF;
							
		
			font-family: arial;
			font-size: 80%;
			line-height: 140%;
		}
		
		
		.cover_image_shadow {
		  -webkit-box-shadow: 2px 1px 3px rgba(0, 0, 0, 0.9);
		  -moz-box-shadow: 2px 1px 3px rgba(0, 0, 0, 0.9);
		  box-shadow: 2px 1px 3px rgba(0, 0, 0, 0.9);
		}
		
		hr.clear_white{
			border-color: #f8f8f8;
			background-color: #f8f8f8;
			color: #f8f8f8;
		}
		
		</style>



<div class="container page_body">

	

	<div class="row">
		
		
		
<div class="col-span-8 pull-up-70">

<article>
<div class="article_header">
	<h2 class="page-title"><?php the_title(); ?></h2>
</div>



<?php 
						get_template_part( 'content-loops/archive_taxonomy' );

?>



</article>












		
</div>		
		
		
		
		<div class="col-span-4">
		
		
		
		
		
		<?php  get_template_part('sidebar','center');    ?>
		
		
		<?php //get_sidebar(); ?>
		</div>


	</div><!-- /row -->
	

</div> <!-- /container -->


		
<?php get_footer(); ?>
