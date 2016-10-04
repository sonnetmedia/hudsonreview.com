<div class="navbar navbar-static-top hidden-phone" style="display: ;">
	<div class="navbar-inner" >	
		<div class="container">
			<div class="row">

			<div class="hidden-tablet" style="margin-left: 30px;">
			<?php 
			    wp_nav_menu( array(
			'theme_location' => 'primary_navigation',
			'container' =>false,
			'menu_class' => 'nav nav-tabs',
			'echo' => true,
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'depth' => 0,
			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			
			'walker' => new twitter_bootstrap_nav_walker())
			); ?>
			</div>

			<div class="visible-tablet hide-on-desktops">
			<?php 
			    wp_nav_menu( array(
			'theme_location' => 'tablet_navigation',
			'container' =>false,
			'menu_class' => 'nav',
			'echo' => true,
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'depth' => 0,
			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			
			'walker' => new twitter_bootstrap_nav_walker())
			); ?>
			</div>
			
<form role="search" method="get" id="searchform" class="navbar-search pull-right" action="<?php echo home_url('/'); ?>">
	<label class="hide" for="s"><?php _e('Search for:', 'pubspring'); ?></label>	
		  <input type="text" name="s" id="s" class="search-query" placeholder="<?php _e('Search', 'pubspring'); ?>" style="padding-bottom: 0;">
</form>

			
			
			</div>
		</div>
	</div>
</div>







	<header class="page_header hidden-phone">
	
	
	
	
		<div class="container"><!--  /ends  below-->
		
			<div class="row"><!--  /ends below -->

				<div class="span3">		
					<h1 class="animated fadein_short" style="margin-top:0;before:0;">
						<a class="brand" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">									
							<span class="the">The</span><br />
							<span class="title_word hudson">Hudson</span><br />
							<span class="title_word review">Review</span>
						</a>
					</h1>
				</div>	
				
				<div class="span8 offset-by-one">
					<h2 class="metadata pull-right"><?php bloginfo('description'); ?></h2>
					<div class="animated fadein fadein_long" style="clear: both;"><?php get_template_part('/content-snippets/quotes'); ?></div>
				</div>

			</div><!-- 	/row  -->									
		</div><!--  /container -->
	</header>







		
		
		