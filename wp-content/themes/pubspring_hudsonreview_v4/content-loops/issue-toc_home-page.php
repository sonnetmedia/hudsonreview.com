<?php  // DEPRECATE    ?>
<?php	$post_objects = get_field('toc_sections' );
	if( $post_objects ): ?>
         <div class="row">
	 <?php foreach( $post_objects as $post_object): ?> 
		   <div class="col-span-4 home_link_list">	 
	 
	 <?php  echo  '<h2>' . $post_object['toc_section_name'] . '</h2>' ;     ?>
	 

            <ul>
	  <?php if ($post_object['toc_section_name' ]): 
	  		foreach ($post_object['toc_section_articles' ] as $item ) :?>
	  		


	  		
	  		
	 <li><a href="<?php echo get_permalink($item->ID); ?>"><?php echo $item->post_title; ?></a>
              
              <br />
<?php foreach(get_field('related_author' , $item->ID) as $post_author) { $authorlist[] = '<span class="author-list"> <a href="' . get_permalink($post_author->ID) . '">'   . get_the_title($post_author->ID) . ' </a></span>';    } echo implode(', ', $authorlist); ?>

              <span style="text-align: right;"> <?php $page_appeared_on = get_field('page_appeared_on', $item->ID);  
              
              if ($page_appeared_on) { echo 'p.' .$page_appeared_on; }
                 ?></span>
              <?php if( !empty( $item->post_content) ) { add_full_text_button_to_post(); } ?>
              </li>
              
              
              

              
              
              
	  <?php endforeach; 
		  	endif; ?>
            </ul>
		   </div>
		   
		   
		   
		   
		   
	  <?php endforeach; ?>
        </div>
	<?php endif; ?>








