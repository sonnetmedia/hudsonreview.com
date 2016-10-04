<?php $authors_args = array(
   'orderby'       => 'name', 
   'order'         => 'ASC', 
   'number'        => null,
   'optioncount'   => 0, 
   'exclude_admin' => 1, 
   'show_fullname' => 1,
   'style'         => none,
   'hide_empty'    => 1,
   ); ?> 
   
<?php wp_list_authors( $authors_args ); ?>
