<?php
//WOOCOMMERCE OVERRIDES
define('WOOCOMMERCE_USE_CSS', false);




//ARCHIVE REMOVES SIDEBAR ADDS TAGS - HOPEFULLY ON ARCHIVE PAGES ONLY
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_action('woocommerce_sidebar', 'pubspring_get_sidebar', 10); 
	function pubspring_get_sidebar() {
		echo '<div class="col-md-3">';
		  if (is_archive())   { 
				 get_template_part('/content/sidebar','book_tags'); 
	  }    
echo '	</div>'; //END span3
echo '</div></div> <!-- pubspring_get_sidebar -->';
}



/// SINGLE PRODUCT PAGE

//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
// MOVES PRODUCT DATA TABS TO CENTER OF PAGE
//add_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 10);









//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

// REMOVES BUTTONS AND PRICE FROM UPSELLS
//remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
//remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

// REMOVES BREADCRUMBS
//remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );


//remove_filter('woocommerce_default_catalog_orderby');


/**
 * Tab Title filters do not work with WooCommerce 1.6.5.1 or lower
 * Please download this zip file http://cl.ly/2Y3S3D3M3C23 , extract the 3 files and copy them to :
 * wp-content/themes/YOUR_THEME/woocommerce/single-product/tabs/
 **/


add_filter ( 'woocommerce_product_description_tab_title', 'custom_product_description_tab_title' ) ;
function custom_product_description_tab_title() {
	return 'About the book'; // Change Me!
}

add_filter ( 'woocommerce_product_description_heading', 'custom_product_description_heading' ) ; //REMOVE THIS INSTEAD OF CHANGE
function custom_product_description_heading() {
	return 'Synopsis'; // Change Me!
}

add_filter ( 'woocommerce_product_additional_information_tab_title', 'custom_product_additional_information_tab_title' ) ;
function custom_product_additional_information_tab_title() {
	return 'Additional Information'; // Change Me!
}

add_filter ( 'woocommerce_product_additional_information_heading', 'custom_product_additional_information_heading' ) ;
function custom_product_additional_information_heading() {
	return 'Additional Information'; // Change Me!
}

add_filter ( 'woocommerce_reviews_tab_title', 'custom_product_reviews_tab_title' ) ;
function custom_product_reviews_tab_title() {
	return 'Reader Reviews'; // Change Me!
}

// Display 50 products per page
add_filter('loop_shop_per_page', create_function('$cols', 'return 50;'));

function pubspring_edit_form_after_title() {
	if ( 'product' == get_post_type() ) {    
  	echo '<h2>Synopsis</h2>';
  } 
}
add_action( 'edit_form_after_title', 'pubspring_edit_form_after_title' );