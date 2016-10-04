<?php
//BOOTSTRAP MENU
if ( ! function_exists( 'bootstrap_setup' ) ):
	function bootstrap_setup() {
	 	get_template_part('/classes/walker', 'bootstrap'); 
	}
endif;
add_action( 'after_setup_theme', 'bootstrap_setup' );
//END BOOTSTRAP MENU