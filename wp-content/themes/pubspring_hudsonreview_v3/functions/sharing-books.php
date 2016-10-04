<?php
function pubspring_book_sharing() { ?>
	<!-- AddThis Button BEGIN -->
	<script type="text/javascript">
		addthis.counter("#atcounter");
		var addthis_config =
		{
		   ui_508_compliant: true
		}
		var addthis_share = 
		{ 
		// ...
		    templates: {
		                   twitter: 'Check out {{title}} {{url}}',
		               }
		}
	</script>
	
	<div class="addthis_toolbox addthis_default_style addthis_32x32_style" addthis:url="<?php the_permalink(); ?>" addthis:title="<?php the_title(); ?>">
		<a class="addthis_button_preferred_1"></a>
		<a class="addthis_button_preferred_2"></a>
		<a class="addthis_button_preferred_4"></a>
		<a class="addthis_button_compact"></a>
		<a class="addthis_counter addthis_bubble_style"></a>
	</div>
	<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
	<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=sonnetmedia"></script>
	<!-- AddThis Button END -->
<?php 
}


