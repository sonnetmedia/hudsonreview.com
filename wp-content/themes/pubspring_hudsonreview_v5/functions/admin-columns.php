<?php
//--- ADMIN COLUMNS ----
// ADD NEW COLUMN  
add_filter( 'manage_edit-post_columns', 'sm_posts_columns' ) ;

function sm_posts_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Title' ),
		'article_author' => __( 'Author' ),		
		'date' => __( 'Date' ),		
				'date' => __( 'Full ' ),		
		'related_issue' => __( 'Issue' ),		
		'categories' => __( 'Article Type' )	

	);

	return $columns;
}

// ADD NEW COLUMN  
add_filter( 'manage_edit-sm_authors_columns', 'sm_author_columns' ) ;

function sm_author_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Author Name' ),
		'last_name' => __( 'Last Name' ),
	);

	return $columns;
}





// ADD NEW COLUMN  
add_filter( 'manage_edit-sm_issues_columns', 'sm_issue_columns' ) ;

function sm_issue_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Issue' ),
		'volume' => __( 'Volume' ),		
		'issue_number' => __( 'Issue Number' ),		
		'issue_name' => __( 'Issue Name' ),		
		'date' => __( 'Date' )
	);

	return $columns;
}






function custom_columns( $column, $post_id ) {
  switch ( $column ) {
    case "volume":
      $volume = get_post_meta( $post_id, 'volume', true);
      echo $volume;
      break;
      
    case "issue_number":
      $issue_number = get_post_meta( $post_id, 'issue_number', true);
      echo $issue_number;
      break;

    case "issue_name":
      echo get_post_meta( $post_id, 'issue_name', true);
      break;


	case "related_issue":
	$related_issue = get_field('related_issue'); 
	echo '<a href="/wp-admin/post.php?post=' . get_post_meta( $post_id,'related_issue', true)  . '&action=edit">' . get_the_title($related_issue->ID) . ' </a>';
	  break;
	  
	      case "last_name":
      echo get_post_meta( $post_id, 'last_name', true);
      break;



	case "article_author":    
  	foreach(get_field('related_author') as $article_author) {
  	//get_post_meta returns post id for all posts, so if there are more than one author, the link will go only to the first in the list
     $authorlist[] = '<a href="/wp-admin/post.php?post=' . get_post_meta( $post_id,'related_author', true) . '&action=edit">' . get_the_title($article_author->ID) . '</a>';
       }
  
  	echo implode(', ', $authorlist); 
  
  break;

  }
}

add_action( "manage_posts_custom_column", "custom_columns", 10, 2 );





// Make these columns sortable
function sortable_columns() {
  return array(
    'volume'      => 'volume',
    'issue_number' => 'issue_number',
    'issue_name'     => 'issue_name',
        'last_name'     => 'last_name'
  );
}

add_filter( "manage_edit-sm_issues_sortable_columns", "sortable_columns" );


// Register the column as sortable
function author_column_register_sortable( $columns ) {
	$columns['last_name'] = 'last_name';
	return $columns;
}
add_filter( 'manage_edit-sm_authors_sortable_columns', 'author_column_register_sortable' );