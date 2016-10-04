<?php

if ( get_post_meta($post->ID, 'issue_for_sale', true) ) {


	echo '<h3>Purchase this issue:</h3>';


    $product_name = get_the_title($post->ID);
    $product_price = get_post_meta($post->ID, 'issue_price', true);
    
    echo $product_name;
    echo ':&nbsp;&nbsp;$'.$product_price;
  
  
    echo print_wp_cart_button_for_product($product_name, $product_price);
    
        echo print_wp_shopping_cart();
    }
else { echo "<p>This issue is not available.</p>";}



?>


