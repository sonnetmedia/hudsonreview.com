<?php 
// TOC SECTIONS ARE ROWS IN THE REPEATER FIELD
$post_objects = get_field('toc_sections' );
if( $post_objects ): ?>
<?php foreach( $post_objects as $post_object): ?> 
		<?php echo '<h1 class="metadata-heading">' . $post_object['toc_section_name'] . '</h1>'; //DISPLAYING THE SECTION TITLE?>
				<?php if ($post_object['toc_section_name' ]): //TESTING FOR EACH SECTION TITLE
					foreach ($post_object['toc_section_articles' ] as $item ) : // IF THERE ARE ARTICLES IN THAT SECTION ?>
					<ul class="list-unstyled list-inline issue-list">	
						<li> 
							<?php  if( !empty( $item->post_content) ) {     ?>
							<a href="<?php echo get_permalink($item->ID); ?>">
								<?php echo $item->post_title; ?>
							</a>						
							<?php  } 
							else {
							 echo $item->post_title; 
							}     ?>
							<?php foreach(get_field('related_author' , $item->ID) as $post_author): 
								//$authorlist[] = // would like to add this back for a proper separator
								echo '&nbsp;&nbsp;<a class="strong" href="' . get_permalink($post_author->ID) . '">'. get_the_title($post_author->ID) . ' </a>&nbsp;&nbsp;</li>';  
									  endforeach;					
								  //echo implode(', ', $authorlist);
								   ?>
							<?php get_template_part('/content-snippets/issue-article_page_number');    ?>
							<?php //TEST TO SEE IF THERE'S CONTENT IN THE POST, AND IF SO, SHOW A BUTTON TO DESIGNATE THAT TO THE READER
								if( !empty( $item->post_content) ) { add_full_text_button_to_post(); } ?>
						</li>
					</ul>							
					<?php endforeach; endif; ?>
	<?php endforeach; else:   //if THE SECTIONS ARE NOT DEFINED, FALL BACK ON THE STANDARD TABLE OF CONTENTS
	 get_template_part('content-loops/issue-toc_fallback'); 
endif; //END IF NO POST_OBJECTS
?>
