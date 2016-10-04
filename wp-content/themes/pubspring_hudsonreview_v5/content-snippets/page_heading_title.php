<div class="article_header">
<?php  if (is_archive())   { ?>




<h2 class="page-title">
		
<!--Keyword:-->
		
		<?php wp_title("",true); ?></h2>

<?php  }    ?>







<?php  if (is_page())   { ?>

		<h2 class="page-title">
		<?php wp_title("",true); ?></h2>

<?php  }    ?>



<?php  if (is_single())   { ?>
	
		<h2 class="page-title"><?php wp_title("",true); ?></h2>
		
<?php  }    ?>








<?php  if (is_search()) {    ?>

		<h2 class="page-title">
					<?php printf( __( 'Search results: %s', 'test' ), '<span>' . get_search_query() . '</span>' ); ?>
		
		
		
		</h2>

<?php  }    ?>

</div>
