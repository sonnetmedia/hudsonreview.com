<aside class="sidebar" role="complementary">
<div class="sidebar-center">
<article id="%1$s" class="hidden-phone widget %2$s"><div class="sidebar-section">

<?php $args = array(
	'show_option_all'    => '',
	'orderby'            => 'name',
	'order'              => 'ASC',
	'style'              => 'list',
	'show_count'         => 0,
	'hide_empty'         => 1,
	'use_desc_for_title' => 1,
	'child_of'           => 0,
	'exclude'            => '1',
	'hierarchical'       => true,
	'title_li'           => __( '' ),
	'show_option_none'   => __('No categories'),
	'number'             => null,
	'echo'               => 1,
	'taxonomy'           => 'category',
	'walker'             => null
); ?>




<h3>Articles by</h3> 

<ul id="nav-tabs-sidebar" class="nav nav-tabs">
<li class="show_list_years active"><a href="#" onclick="return false;"> Issue/Year</a></li>  
<li class="show_list_categories"><a href="#" onclick="return false;"> Category</a></li>
<li class="show_list_authors"><a href="#" onclick="return false;"> Writer</a></li> 

</ul>


<ul class="nav list_years sidebar">
<?php  $issues_loop = new WP_Query(array( 'post_type' => 'sm_issues',	'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'date','order' => 'DESC',)); if ($issues_loop->have_posts()) : while($issues_loop->have_posts()) : $issues_loop->the_post();	 ?>

<li><a href="<?php the_permalink(); ?>" class="<?php  the_field('issue_season');    ?>"><?php the_title(); ?></a></li>
<?php endwhile;  endif;  ?>

</ul>




<ul class="nav list_categories sidebar" style="display: none;">
 <?php wp_list_categories( $args ); ?> 
</ul>

<div class="list_authors" style="display:none ;">
<br />
<input type="text" id="filter" class="show_filtered_results" autocomplete="off" size="40" placeholder="Filter by name" ><br />

<!--<ul class="nav sidebar search_list">-->
<?php //$authors_args = array(
//   'orderby'       => 'name', 
//   'order'         => 'ASC', 
//   'number'        => null,
//   'optioncount'   => 0, 
//   'exclude_admin' => 1, 
//   'show_fullname' => 1,
//   'hide_empty'    => 1,
  // ); ?> 
   
<?php //wp_list_authors( $authors_args ); ?>
<!--</ul>-->









<?php 
//pulls from the books post type for the books post type archive-books
	$author_list_args = array( 
	'post_type' => 'sm_authors', 
	'posts_per_page' => -1, 
	'orderby' => 'meta_value',
	'meta_key' => 'last_name',
	'order' => 'asc'

	 
	);
	
	$author_list = get_posts( $author_list_args );


    ?>

<ul class="nav sidebar search_list">

	<?php foreach( $author_list as $post ): setup_postdata($post); ?>  
	
<li>	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>  </li>
	
    <?php  endforeach;    ?>
</ul>    













</div>

</div></article>









<?php
	dynamic_sidebar('sidebar-center'); 
?>

<hr />
</div>
</aside><!-- /#sidebar -->
		
