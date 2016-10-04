<?php 
function pubspring_page_open_navbar( $visibility ) { ?>
	<!-- Navbar
	   ================================================== -->
	<div class="navbar navbar-static-top">	
		<?php get_template_part('/nav/nav', 'topbar'); ?>
	
	 </div>
	
<?php  }

add_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 1);




function pubspring_page_open() { ?>

	<div class="wrapper bp2" style="clear:both;">	

<?php }
add_action('pubspring_setup_page', 'pubspring_page_open', 5);






function pubspring_page_open_banner() { ?>

	<?php get_template_part('/nav/nav', 'banner'); ?>

<?php }
add_action('pubspring_setup_page', 'pubspring_page_open_banner', 10);
