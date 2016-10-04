<?php
//Add support for captioned images
function featured_image_with_caption_small() {
	echo '<div class="featured-image flow_left category-small">';
	the_post_thumbnail('category-small', array('class' => 'shadow'));
	echo '<span class="caption">' . get_post( get_post_thumbnail_id() )->post_excerpt . '</span>';
	echo '</div>';
}
function featured_image_with_caption_medium() {
	echo '<div class="featured-image flow_left category-medium">';
	the_post_thumbnail('category-medium', array('class' => 'shadow'));
	echo '<span class="caption">' . get_post( get_post_thumbnail_id() )->post_excerpt . '</span>';
	echo '</div>';
}
function featured_image_with_caption_large() {
	echo '<div class="featured-image flow_left category-large">';
	the_post_thumbnail('category-large', array('class' => 'image-shadow'));
	echo '<br /><span class="caption">' . get_post( get_post_thumbnail_id() )->post_excerpt . '</span>';
	echo '</div>';
}