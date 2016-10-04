<?php
/*
 * functions.php
 * 
 */

require_once('functions/admin-columns.php');
require_once('functions/admin-mods.php');
//require_once('functions/bootstrap-setup.php');
require_once('functions/typekit.php'); //TypeKit ID set on PubSpring settings page
require_once('functions/javascript.php'); //TypeKit ID set on PubSpring settings page
//THEME
require_once('functions/pubspring-setup.php');
require_once('functions/theme-styles.php');
require_once('functions/pubspring-settings.php');
require_once('functions/hooks.php');
require_once('functions/filters.php');

require_once('functions/header-functions.php');
require_once('functions/pubspring-page-open.php');
require_once('functions/enqueue-scripts.php');
require_once('functions/widget-areas.php');


//////////////////////////////////////////////////////////////////////////////
//SHARING
require_once('functions/sharing-posts.php');
require_once('functions/sharing-books.php');
require_once('functions/social-follow-buttons.php'); 

//META SEO
require_once('functions/seo-meta-tags.php');
require_once('functions/header-meta-tags-books.php');

//IMAGES
require_once('functions/cleaner-caption.php');
require_once('functions/image-tags.php');
require_once('functions/image-unautop.php');
require_once('functions/image-captions.php');

//Books
require_once('functions/isbn13-to-isbn10.php');
require_once('functions/widget-books.php');

//Move this?
require_once('functions/get-related-author-and-books.php');

//require_once('classes/walker-bootstrap.php');
//require_once('functions/design-mods.php');





function unhook_pubspring_setup_page() {
//remove_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 1);
//remove_action('pubspring_setup_page', 'pubspring_page_open_banner', 10);
//Add back navbar, but with no arguments - this would be better as a variable, so change soon
//add_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 0);
//remove_action ('pubspring_book_sharing' ,'ps_addthis', 10);
//remove_action('pubspring_setup_page', 'pubspring_page_open_banner', 9);
//remove_action('pubspring_setup_page', 'pubspring_page_open_navbar', 3, 1);gljg
 }
add_action('init','unhook_pubspring_setup_page');



function add_full_text_button_to_post() {
echo '<span class="inline label label-important metadata small" style="font-size:9px;font-weight:300;color:white;">Full Text</span>';
}


// CREATE SHORTCODE
function add_full_text_button() {
return '<span class="inline label label-important metadata small" style="font-size:9px;font-weight:300;color:white;">Full Text</span>';
}


function register_shortcodes(){
   add_shortcode('fulltext', 'add_full_text_button');
}

add_action( 'init', 'register_shortcodes');




// add shortcode button to WYSIWYG editor

 add_action('init', 'add_button');
 
 function add_button() {
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )
   {
     add_filter('mce_external_plugins', 'add_plugin');
     add_filter('mce_buttons', 'register_button');
   }
}


function register_button($buttons) {
   array_push($buttons, "fulltext");
   return $buttons;
}

function add_plugin($plugin_array) {
  $plugin_array['fulltext'] = get_bloginfo('template_url').'/functions/customcodes.js';
   return $plugin_array;
}







/////////////// ADDS HEADING ABOVE CONTENT BOX IN ADMIN EDIT SCREEN
add_action( 'edit_form_after_title', 'myprefix_edit_form_after_title' );
function myprefix_edit_form_after_title() {
 if ( 'sm_issues' == get_post_type() ) {
    echo '<h1>Introduction</h1>';    
    }
}




function inline_style_gravity_form() { ?>

<style>
.gform_wrapper ul.gfield_checkbox li, .gform_wrapper ul.gfield_radio li {
	padding: 4px; !important
}
</style>
<?php }
add_action('wp_footer', 'inline_style_gravity_form');




// hook the translation filters to change admin menu
add_filter(  'gettext',  'change_post_to_article'  );
add_filter(  'ngettext',  'change_post_to_article'  );

function change_post_to_article( $translated ) {
     $translated = str_ireplace(  'Posts',  'Articles',  $translated );  // ireplace is PHP5 only
//     $translated = str_ireplace(  'Post',  'Article',  $translated ); 
	$translated = str_ireplace(  'January',  'Winter',  $translated ); 
	$translated = str_ireplace(  'April',  'Spring',  $translated ); 
	$translated = str_ireplace(  'July',  'Summer',  $translated ); 
	$translated = str_ireplace(  'October',  'Autumn',  $translated ); 
     return $translated;
}




///

// ARTICLE META
function pubspring_entry_meta() {?>
<div class="sidebar-section">
<aside class="sidebar" role="complementary">






<?php  if ( 'post' == get_post_type() ) { ?>
	 
<article class="hidden-phone widget">

<?php $related_issue = get_field('related_issue'); ?>
  
<h3><?php the_category(' '); 
if ($related_issue) {?> 
	from the <a href="<?php echo get_permalink($related_issue); ?>"><?php echo get_the_title($related_issue); ?></a> issue.<?php } ?></h3>
  
   


	 <?php $post_objects = get_field('related__works_reviews');
	 if( $post_objects ): ?>
	 <p class="quote">Reviewed in this article:</p>
	     <?php foreach( $post_objects as $post_object): ?>
	    <?php 	$image = get_the_post_thumbnail($post_object->ID, 'category-thumb', array('class' => 'w50 shadow')); 
	    		if ( has_post_thumbnail($post_object->ID) ) { // check if the post has a Post Thumbnail assigned to it.    
	    ?>
			<a href="<?php the_permalink(); ?>">
	    	     <?php echo $image; ?>
	        </a>
	        <?php       }    ?>
		<p class="small" style="margin-top: .25em;width: 100%;"><small><a href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_title($post_object->ID); ?></a></small></p>
	     <?php endforeach; 
	     wp_reset_postdata();
	     ?>
	     </ul>
	 <?php endif; ?>			
	 			
	 
	 
		<div class="categories">
			<p class="quote"><?php the_tags(); ?></p>
		</div>
			 
</article>
<?php  }    ?>					




										
<article class="hidden-phone widget">


<h3>Save or Share</h3>
<div class="rdbWrapper" data-show-read="0" data-show-send-to-kindle="1" data-show-print="1" data-show-email="1" data-orientation="0" data-version="1"></div><script type="text/javascript">(function() {var s = document.getElementsByTagName("script")[0],rdb = document.createElement("script"); rdb.type = "text/javascript"; rdb.async = true; rdb.src = document.location.protocol + "//www.readability.com/embed.js"; s.parentNode.insertBefore(rdb, s); })();</script>
<br />

<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style" addthis:url="<?php the_permalink(); ?>" addthis:title="<?php the_title(); ?>">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<!--<a class="addthis_button_preferred_3"></a>-->
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=sonnetmedia"></script>
<!-- AddThis Button END -->


<?php  if ( 'sm_works' == get_post_type() ) { ?>
<br />
<!--<article class="hidden-phone widget"></article>-->
<?php  get_template_part('/content-snippets/button-buy_retailers')    ?>



<?php  }    ?>



			</article>
	</aside></div>		
			
			<?php  } 
			
			//Button Shortcode
			 function button_shortcode( $atts, $content = null ){
			 extract( shortcode_atts( array(
			 'color' => 'default',
			 'url' => '',
			 'target' => 'blank',
			 'rel' => 'nofollow',
			 ), $atts ) );
			 if($url) {
			 return '<a href="' . $url . '" rel="'. $rel .'" target="_'.$target .'"  class="button ' . $color . '">' . $content . '</a>';
			 } else {
			 return '<div>' . $content . '</div>';
			 }
			 }
			 add_shortcode('mybutton', 'button_shortcode');
			 
			 
			 
// update the '51' to the ID of your form
add_filter('gform_pre_render_3', 'populate_posts');
function populate_posts($form){
    
    foreach($form['fields'] as &$field){
        
        if($field['type'] != 'product' || strpos($field['cssClass'], 'populate-posts') === false)
            continue;
        
        // you can add additional parameters here to alter the posts that are retreieved
        // more info: http://codex.wordpress.org/Template_Tags/get_posts
        $posts = get_posts('post_type=sm_issues&numberposts=12&post_status=publish');
       
        // update 'Select a Post' to whatever you'd like the instructive option to be
//        $choices = array(array('text' => 'Select an Issue(s)', 'value' => ' '));
//         $issue_price = the_field('issue_price'); 
                
        foreach($posts as $post) : setup_postdata($post);

            $choices[] = array('text' =>  $post->post_title, 'price' => $post->issue_price );

        endforeach;
        
        $field['choices'] = $choices;
        
    }
    
    return $form;
}

