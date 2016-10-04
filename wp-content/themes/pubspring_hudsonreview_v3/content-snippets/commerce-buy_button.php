<?php
if ( get_post_meta($post->ID, 'issue_for_sale', true) ) {
					echo '<article id="%1$s" class="hidden-phone widget %2$s"><h4>Purchase this issue:</h4>';
    $product_name = get_the_title($post->ID);
    $product_price = get_post_meta($post->ID, 'issue_price', true);
    echo print_wp_cart_button_for_product($product_name, $product_price);}
else { echo "<p>This issue is not available.</p>";}
?>
