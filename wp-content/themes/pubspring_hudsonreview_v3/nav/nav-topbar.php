<div class="visible-phone hide-on-tablets hide-on-desktops">
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner nav_default_color">
			<div class="container">
				<div class="row">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>

					<div class="nav-collapse">
					
					<?php 			    wp_nav_menu( array(
					'theme_location' => 'primary_navigation',
					'container' =>false,
					'menu_class' => 'nav nav-pills visible-phone nav_position',
					'echo' => true,
					'before' => '',
					'after' => '',
					'link_before' => '',
					'link_after' => '',
					'depth' => 0,
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					
					'walker' => new twitter_bootstrap_nav_walker())
					); ?>					
					<!--  widgets:area slug="header"  on phones we may pull in our twitter button-->
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
	</div>
</div>