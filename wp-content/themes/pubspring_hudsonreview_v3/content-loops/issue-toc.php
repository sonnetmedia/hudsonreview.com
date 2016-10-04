<?php 
// TOC SECTIONS ARE ROWS IN THE REPEATER FIELD
$post_objects = get_field('toc_sections' );
if( $post_objects ): ?>
<?php foreach( $post_objects as $post_object): ?> 
	<div class="row-fluid">
		<?php echo '<h2>' . $post_object['toc_section_name'] . '</h2>'; //DISPLAYING THE SECTION TITLE?>
			<ul class="article-listing">
				<?php if ($post_object['toc_section_name' ]): //TESTING FOR EACH SECTION TITLE
					foreach ($post_object['toc_section_articles' ] as $item ) : // IF THERE ARE ARTICLES IN THAT SECTION ?>
						<li>
							<a href="<?php echo get_permalink($item->ID); ?>" class="article-list-title"><?php echo $item->post_title; //DISPLAY THE ARTICLE TITLE?></a>
						<br /><?php //SHOW THE AUTHOR OF EACH ARTICLE IN A LIST ?>
								<?php //get_template_part('content-snippets/related_author'); //the_author_posts_link(); ?>





							<?php foreach(get_field('related_author' , $item->ID) as $post_author): 
							
						//$authorlist[] = // would like to add this back for a proper separator
						echo '<span class="author-list"> 
											<a href="' . get_permalink($post_author->ID) . '">'   . 
												get_the_title($post_author->ID) . ' </a>
												&nbsp;&nbsp;</span>';  

								  endforeach;
		
						  //echo implode(', ', $authorlist);
						  
						   ?>





							<span style="text-align: right;">  <?php // TEST IF THERE'S A PAGE NUMBER FOR THE ARTICLE AND IF SO, SHOW IT ?>
								<?php $page_appeared_on = get_field('page_appeared_on', $item->ID);  
										if ($page_appeared_on) { echo 'p.' .$page_appeared_on; }?>
							</span>
							<?php //TEST TO SEE IF THERE'S CONTENT IN THE POST, AND IF SO, SHOW A BUTTON TO DESIGNATE THAT TO THE READER
							if( !empty( $item->post_content) ) { add_full_text_button_to_post(); } ?>
							</li>
					<?php endforeach; 
						endif; ?>
				</ul>
		</div>		   
	<?php endforeach; 
	
else:   //if THE SECTIONS ARE NOT DEFINED, FALL BACK ON THE STANDARD TABLE OF CONTENTS
	 get_template_part('content-loops/issue-toc_fallback'); 
endif; //END IF NO POST_OBJECTS
?>
