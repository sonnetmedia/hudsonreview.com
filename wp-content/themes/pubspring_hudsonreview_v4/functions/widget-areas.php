<?php
if ( function_exists('register_sidebar') ){
//MENUS
// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'sidebar-global',
		'before_widget' => '<article id="%1$s" class="widget %2$s"><div class="sidebar-section">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6>',
		'after_title' => '</h6>'
	));
}
// create widget areas: sidebar, footer
$sidebars = array('Article Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'sidebar-article',
		'before_widget' => '<article id="%1$s" class="widget %2$s"><div class="sidebar-section">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6>',
		'after_title' => '</h6>'
	));
}


$sidebars = array('Archives Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'sidebar-archives',
		'before_widget' => '<article id="%1$s" class="hidden-phone widget %2$s"><div class="sidebar-section">',
		'after_widget' => '</div></article>',
		'before_title' => '',
		'after_title' => ''
	));
}

$sidebars = array('Issue Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	  'id' => 'sidebar-issue',
		'before_widget' => '<div class="sidebar-section">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => ''
	));
}


}





