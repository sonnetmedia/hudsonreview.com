<?php 
function add_left_column() { ?>
<div id="pageslide">

</div>
<style>
.container .page_body {
			margin-left: 200px;
}
</style>

<div class="super-special-aside visible-desktop visible-tablet" style="width: 200px;">
	<div class="nav-side-inner">
<!-- <a href="#modal" class="second"><i class="icon-list">menu</i></a> -->
<br />
							<h1>
				<img src="/wp-content/themes/pubspring_child_otherpress/images/op_logo_type_full.svg" alt="" 
				/>
				<a class="brand hidden" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
			</h1>  	

				<div class="site-menu">
					<?php 
					    wp_nav_menu( array(
					'theme_location' => 'primary_navigation',
					'container' =>false,
					'menu_class' => 'nav',
					'echo' => true,
					'before' => '',
					'after' => '',
					'link_before' => '',
					'link_after' => '',
					'depth' => 0,
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					
					'walker' => new twitter_bootstrap_nav_walker()
					)
					); ?>
			</div>

</div>
</div>



<?php }
add_action('pubspring_setup_page', 'add_left_column', 1);