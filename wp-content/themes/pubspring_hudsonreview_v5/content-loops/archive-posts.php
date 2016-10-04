	<?php while (have_posts()) : the_post(); ?>

	<?php  get_template_part('/content-formats/article-archive');    ?>	






<?php endwhile; // End the loop ?>




<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ($wp_query->max_num_pages > 1) : ?>
<nav id="post-nav">
<div class="post-previous"><?php next_posts_link( __( '&larr; Older articles', 'pubspring' ) ); ?></div>
<div class="post-next"><?php previous_posts_link( __( 'Newer articles &rarr;', 'pubspring' ) ); ?></div>
</nav>
<?php endif; ?>
