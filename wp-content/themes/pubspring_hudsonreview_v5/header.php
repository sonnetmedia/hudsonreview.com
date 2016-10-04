<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

  <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
 	
		<!-- Mobile viewport optimized -->
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
 
 
 <meta name="google-site-verification" content="lWmkqv5reewo9M3pRpug7nYZp77g-4LaXbCNVG8XQ5w" />
	<!-- STYLESHEETS -->
<?php //filemtime adds the time update to the file - this will keep our stylesheet from not refreshing if we change it ?>	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="screen, projection" />
	
	
	
	<script>
	  document.createElement('header');
	  document.createElement('nav');
	  document.createElement('section');
	  document.createElement('article');
	  document.createElement('aside');
	  document.createElement('footer');
	</script>
	
<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>


<?php  //do_action( 'page_items', 'show_social_buttons', 10 );    ?>
<?php //do_action('pubspring_setup_page', 'visible-phone'); ?>
<div class="wrapper">	
		<?php get_template_part('/nav/nav', 'topbar'); ?>
		<?php get_template_part('/nav/nav', 'banner'); ?>

