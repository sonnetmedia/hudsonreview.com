<span style="text-align: right;">  <?php // TEST IF THERE'S A PAGE NUMBER FOR THE ARTICLE AND IF SO, SHOW IT ?>
	<?php $page_appeared_on = get_field('page_appeared_on', $item->ID);  
			if ($page_appeared_on) { echo 'p.' .$page_appeared_on; }?>
</span>
