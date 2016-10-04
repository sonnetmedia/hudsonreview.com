<?php
// EMAIL ENCODE SHORTCODE
function email_encode_function( $atts, $content ){
	return '<a href="'.antispambot("mailto:".$content).'">'.antispambot($content).'</a>';
}
add_shortcode( 'email', 'email_encode_function' );

