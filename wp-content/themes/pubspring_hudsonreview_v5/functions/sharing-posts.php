<?php 
// return entry meta information for posts, used by multiple loops.
function pubspring_status_sharing() { ?>
	<!-- AddThis Button BEGIN -->
	<div class="addthis_toolbox addthis_default_style addthis_32x32_style" addthis:url="<?php the_permalink(); ?>" addthis:title="<?php the_title(); ?>">
		<a class="addthis_button_preferred_1"></a>
		<a class="addthis_button_preferred_2"></a>
		<a class="addthis_button_preferred_4"></a>
		<a class="addthis_button_compact"></a>
		<a class="addthis_counter addthis_bubble_style"></a>
	</div>
	<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=sonnetmedia"></script>
	<!-- AddThis Button END -->
<?php 
}

function readability() {
	 ?>
	 
<div class="rdbWrapper" style="overflow:hidden;" data-show-read="0" data-show-send-to-kindle="1" data-show-print="1" data-show-email="1" data-orientation="1" data-version="1" data-bg-color="#fcfcfc"></div><script type="text/javascript">(function() {var s = document.getElementsByTagName("script")[0],rdb = document.createElement("script"); rdb.type = "text/javascript"; rdb.async = true; rdb.src = document.location.protocol + "//www.readability.com/embed.js"; s.parentNode.insertBefore(rdb, s); })();</script>
	 
	 <?php }//END readability 