<!-- Static navbar -->
  <div class="container">
    <button type="button" class="btn navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    
<a class="navbar-brand visible-phone" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
    <div class="nav-collapse collapse">
    
		    <?php 			    wp_nav_menu( array(
		    'theme_location' => 'primary_navigation',
		    'container' =>false,
		    'menu_class' => 'nav hidden-phone',
		    'echo' => true,
		    'before' => '',
		    'after' => '',
		    'link_before' => '',
		    'link_after' => '',
		    'depth' => 0,
		    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		    
		    'walker' => new twitter_bootstrap_nav_walker())
		    ); ?>	
    
    
    
    <?php 			    wp_nav_menu( array(
    'theme_location' => 'mobile_navigation',
    'container' =>false,
    'menu_class' => 'nav visible-phone',
    'echo' => true,
    'before' => '',
    'after' => '',
    'link_before' => '',
    'link_after' => '',
    'depth' => 0,
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    
    'walker' => new twitter_bootstrap_nav_walker())
    ); ?>	
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        
    <form role="search" method="get" id="searchform" class="form-search navbar-search pull-right" action="<?php echo home_url('/'); ?>">
    	<label class="hide" for="s"><?php _e('Search for:', 'pubspring'); ?></label>	
    		  <input type="text" name="s" id="s" class="input-medium search-query" placeholder="<?php _e('Search', 'pubspring'); ?>">
    </form>
    
    </div><!--/.nav-collapse -->
    
    
  </div>