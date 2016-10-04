<?php /* If there are no posts to display, such as an empty archive page */ ?>
<article class="hentry box"	id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 4em;">
	<div class="article_header">
		<h2 class="page-title">
			<?php  if ( 'post' != get_post_type() ) {
					 post_type_archive_title(); 
					 }    ?>
			<?php  $category = get_the_category(); echo $category[0]->cat_name; ?>
			 </h2>
		</div>

	<?php  $post_permalink = get_permalink(); 
			$args = array( 
			'post_type' => 'sm_news', 
			'posts_per_page' => -1, 
			'orderby' => 'date' ,
	'cat' => '-12', 
			'order' => 'desc',
			
			'tax_query'	=> array(
			        array(
			            'taxonomy'  => 'sm_media',
			            'field'     => 'slug',
			            'terms'     => 'recordings', // exclude media posts in the news-cat custom taxonomy
			            'operator'  => 'NOT IN')
			            ),
			//	'post_status' => array( 'publish', 'future'  ) 
				);
				
				$query = new WP_Query( $args );
			    ?>

			<?php if (!have_posts()) : ?>
				<div class="notice">
					<p class="bottom"><?php _e('Sorry, no results were found.', 'pubspring'); ?></p>
				</div>
				<?php get_search_form(); ?>	
			<?php endif; ?>

<?php /* Start loop */ ?>
<?php while ( $query->have_posts()) : $query->the_post(); ?>
		<header>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?></a></h1>
			<p class="byline">by <?php  the_author();    ?> &#124; 
			<?php 	echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('%s', 'pubspring'), get_the_time('l, F jS, Y'), get_the_time()) .'</time>';
			 ?></p><br />
		</header>
		<div class="entry-content">
		<?php 
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			the_post_thumbnail('full', array('class' => 'featured-image image-shadow')); 
			echo '<hr class="space" />';
			} //close if has_post_thumnail ?>

		<?php if ( !empty( $post->post_excerpt ) ) : ?>
				<?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>">Continue reading...</a>
			<?php else : ?>
				<?php the_content('Continue reading...'); ?>
			<?php endif; ?>
		</div>
		
		<footer>
		<?php if ( comments_open() ) : ?>
				<!-- <div class="comments">
				<a href="<?php the_permalink(); ?>" class="">
				<?php comments_number( 'Click Here to Leave a Comment', 'one comment', '% comments' ); ?>
				</a>
				</div> -->
			<?php  endif;    ?>		
<!--			<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>-->
		</footer>
		<div class="divider"><hr /></div>
<?php endwhile; // End the loop ?>
	</article>	
<?php /* Display navigation to next/previous pages when applicable */ ?>

				<?php  get_template_part( '/content-snippets/pagination' );    ?>

<?php if ($query->max_num_pages > 1) : ?>
	<nav id="post-nav">
		<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'pubspring' ) ); ?></div>
		<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'pubspring' ) ); ?></div>
	</nav>
<?php endif; ?>