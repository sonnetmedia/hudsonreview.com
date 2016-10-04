<?php

///--------PUBSPRING VANITY--------///

function custom_login_logo() {
  echo '<style type="text/css">
    h1 a { background-image:url(http://pubspring.us/static/ps_logo_308x64.png) !important; }
    </style>';
}
add_action('login_head', 'custom_login_logo');

///--------USABILITY ENHANCEMENTS--------///

//hide admin bar - let's let this be on a user setting basis, so those who want it can have it
add_filter( 'show_admin_bar', '__return_false' );

// tell the TinyMCE editor to use editor-style.css
// if you have issues with getting the editor to show your changes then
// use this instead: add_editor_style('editor-style.css?' . time());
add_editor_style('/stylesheets/editor.css');

///--- we often have to make clients admins - this hides some unnecessary items from them.
// remove the links menu item
add_action( 'admin_menu', 'my_admin_menu' );

function wp_admin_bar_new_item() {
global $wp_admin_bar;
$wp_admin_bar->add_menu(array(
'id' => 'wp-admin-bar-sonnet-support',
'title' => __('Sonnet Media Support'),
'href' => 'http://sonnetmedia.net/support/'
));
}
add_action('wp_before_admin_bar_render', 'wp_admin_bar_new_item');


//footer credits change from WP to SM
add_filter( 'admin_footer_text', 'my_admin_footer_text' );
function my_admin_footer_text( $default_text ) {
     return '<span id="footer-thankyou"><img style="vertical-align:middle;padding-right:10px" src="http://pubspring.us/static/icon-adminpage32.png"> Website managed by <a href="http://sonnetmedia.net">sonnet media</a> and the <a href="http://pubspring.us">PubSpring Network</a><span>';
}

//Removes WP version number from the header
remove_action('wp_head', 'wp_generator');

//removes outdated contact methods and adds new ones
function new_contactmethods( $contactmethods ) {
  unset($contactmethods['yim']); // Remove Yahoo IM
  unset($contactmethods['aim']); // Remove AIM
  unset($contactmethods['jabber']); // Remove Jabber

return $contactmethods;
}

add_filter('user_contactmethods','new_contactmethods',10,1);
//end update contact methods

//CREATE A DASHBOARD WIDGET TO SHOW SM FEEDS

// Hook into wp_dashboard_setup and add our widget
add_action('wp_dashboard_setup', 'sm_rss_widget');

// Create the function that adds the widget
function sm_rss_widget(){
function sm_rss_output(){
    echo '<div class="rss-widget">';
     
       wp_widget_rss_output(array(
            'url' => 'http://www.facebook.com/feeds/page.php?id=179811658728444&format=rss20',  //put your feed URL here
            'title' => 'Latest News from Sonnet Media and the PubSpring Network', // Your feed title
            'items' => 2, //how many posts to show
            'show_summary' => 1, // 0 = false and 1 = true 
            'show_author' => 0,
            'show_date' => 1
       ));
       
       echo "</div>";
}

  wp_add_dashboard_widget( 'shaken-rss', 'PubSpring/Sonnet Media Updates', 'sm_rss_output');
}

//REMOVE DEFAULT DASHBOARD WIDGETS
function remove_dashboard_widgets(){
  global$wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); //wp blog feed
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['pb_backupbuddy_stats']);
  
  unset($wp_meta_boxes['dashboard']['side']['core']['']);  
  
  

// Then we make a backup of your widget
$my_widget = $wp_meta_boxes['dashboard']['normal']['core']['shaken-rss'];

// We then unset that part of the array
unset($wp_meta_boxes['dashboard']['normal']['core']['shaken-rss']);

// Now we just add your widget back in
$wp_meta_boxes['dashboard']['side']['core']['shaken-rss'] = $my_widget;





}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');



///

function remove_woocommerce_dashboard_widgets() {
remove_meta_box( 'woocommerce_dashboard_recent_reviews', 'dashboard', 'normal' );
remove_meta_box( 'woocommerce_dashboard_sales', 'dashboard', 'normal' );
remove_meta_box( 'woocommerce_dashboard_right_now', 'dashboard', 'normal' );
remove_meta_box( 'woocommerce_dashboard_recent_orders', 'dashboard', 'normal' );
} 

// Hoook into the 'wp_dashboard_setup' action to register our function

add_action('wp_dashboard_setup', 'remove_woocommerce_dashboard_widgets' );











if (is_admin()) :
function my_remove_meta_boxes() {
 if(!current_user_can('administrator')) {
	remove_meta_box('commentsdiv', 'page', 'normal');
	remove_meta_box('commentstatusdiv', 'page', 'normal');
	remove_meta_box('authordiv', 'page', 'normal');
	remove_meta_box('authordiv', 'post', 'normal');
	remove_meta_box('slugdiv', 'page', 'normal');
		remove_meta_box('slugdiv', 'post', 'normal');
	remove_meta_box('postcustom', 'page', 'normal');
	remove_meta_box('postcustom', 'post', 'normal');    
    remove_meta_box('trackbacksdiv', 'post', 'normal');
 }
}
add_action( 'admin_menu', 'my_remove_meta_boxes' );
endif;



//admin bar mods
function wps_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('comments');    
    $wp_admin_bar->remove_menu('wp-seo-menu');        
    $wp_admin_bar->remove_menu('tribe-events');            
//    $wp_admin_bar->remove_menu('view-site');
}
add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );

