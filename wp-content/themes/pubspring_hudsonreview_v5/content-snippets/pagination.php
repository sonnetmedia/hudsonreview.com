<hr />
<div class="row">
<div class="col-md-12">
<div class="pagination">
<?php
global $query;

$big = 999999999; // need an unlikely integer

echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '/page/%#%',
	'add_fragment' => '#content/',
	'type' => 'list',
	'prev_next' => 'true',
	'prev_text' => 'previous',
	'next_text' => 'next',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $query->max_num_pages
) );
?></div>
</div>
</div>