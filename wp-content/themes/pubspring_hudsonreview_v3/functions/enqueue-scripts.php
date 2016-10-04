<?php
function pubspring_enqueue_scripts() {

	wp_register_script('bootstrap-min', 
	get_template_directory_uri() . '/javascript/bootstrap.min.js', array('jquery'), '2.2.0.', true);
	wp_enqueue_script('bootstrap-min');

}     
add_action('wp_enqueue_scripts', 'pubspring_enqueue_scripts');