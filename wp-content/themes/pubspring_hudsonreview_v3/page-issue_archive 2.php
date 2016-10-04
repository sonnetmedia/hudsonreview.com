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
		
		
		
<div class="span8 pull-up-70">

<article>
<div class="article_header">
	<h2 class="page-title"><?php the_title(); ?></h2>
</div>


<div class="issue_cover cover_image_shadowt thumbnail">
	<div class="issue_cover_top Winter_bkgrnd">
		<div>
			<span class="the">The</span><br />
			<span class="title_word hudson cover">Hudson</span><br />
			<span class="title_word review cover">Review</span>
								
		</div>	
	</div>
	
	<h3 class="centered"><em>Winter</em></h3>
</div>

<div class="issue_cover cover_image_shadowt thumbnail">
	<div class="issue_cover_top Spring_bkgrnd">
		<div>
			<span class="the">The</span><br />
			<span class="title_word hudson cover">Hudson</span><br />
			<span class="title_word review cover">Review</span>
								
		</div>	
	</div>
		<h3 class="centered"><em>Spring</em></h3>
</div>

<div class="issue_cover cover_image_shadowt thumbnail">
	<div class="issue_cover_top Summer_bkgrnd">
		<div>
			<span class="the">The</span><br />
			<span class="title_word hudson cover">Hudson</span><br />
			<span class="title_word review cover">Review</span>
								
		</div>	
	</div>
		<h3 class="centered"><em>Summer</em></h3>
</div>

<div class="issue_cover cover_image_shadowt thumbnail">
	<div class="issue_cover_top Autumn_bkgrnd">
		<div>
			<span class="the">The</span><br />
			<span class="title_word hudson cover">Hudson</span><br />
			<span class="title_word review cover">Review</span>
								
		</div>	
	</div>
		<h3 class="centered"><em>Autumn</em></h3>
</div>



<?php
$args=array(
	'post_type' => 'sm_issues',	
    'orderby' => 'date',
    'order' => 'ASC',
    'posts_per_page' => 1,
    'ignore_sticky_posts'=>1
);
$oldestpost =  get_posts($args);

$args=array(
	'post_type' => 'sm_issues',	
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 1,
    'ignore_sticky_posts'=>1
);
$newestpost =  get_posts($args);

if ( !empty($oldestpost) && !empty($newestpost) ) {

  $oldest = mysql2date("Y", $oldestpost[0]->post_date);
  $newest = mysql2date("Y", $newestpost[0]->post_date);

//  for ( $counter = intval($oldest); $counter <= intval($newest); $counter += 1)  //OLDEST FIRST
  for ( $counter = intval($newest); $counter >= intval($oldest); $counter = $counter - 1) //OLDEST LAST
  {

    $args=array(
      'year'     => $counter,
      'posts_per_page' => -1,
      'orderby' => 'meta_value',
		'meta_key'=>'issue_identifier',
      'order' => 'ASC',
      			'post_type' => 'sm_issues',	
      'ignore_sticky_posts'=>1
    );

    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) {
      echo '<hr class="clear_white" style="width:100%;margin:0;" />';    
//      echo '<hr class="clear_white" style="width:100%;" /><h2  id="'. $counter .'">' . $counter . '</h2>';
      while ($my_query->have_posts()) : $my_query->the_post(); ?>
      
      
      
      
<a href="<?php  the_permalink(); ?>">			
		<div class="issue_cover_lower thumbnail">				
<div>
			<?php the_title(); ?><br />		 
			<?php echo 'Volume: '; the_field('volume'); ?><!--,--> <br /><!--No.--> <?php //the_field('issue_number'); ?> <br />
			<?php //the_field('issue_identifier'); ?>

			<em style="color: #777;"><?php the_field('issue_name'); ?></em>

		</div>
	</div>
</a>

      




       <?php
        //the_content('Read the rest of this entry &raquo;');
      endwhile;
    } //if ($my_query)

  wp_reset_query();  // Restore global post data stomped by the_post().
  }
}
?>
    <hr />
</article>












		
</div>		
		
		
		
		<div class="span4">
		
		
		
		
		
		<?php  get_template_part('sidebar','center');    ?>
		
		
		<?php //get_sidebar(); ?>
		</div>


	</div><!-- /row -->
	

</div> <!-- /container -->


		
<?php get_footer(); ?>
