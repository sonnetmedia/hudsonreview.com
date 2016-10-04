<nav class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    


  <?php                 wp_nav_menu( array(
            'theme_location' => 'primary_navigation',
            'container' =>false,
            'menu_class' => 'nav navbar-nav hidden-xs',
            'echo' => true,
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'depth' => 0,
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            
            'walker' => new twitter_bootstrap_nav_walker())
            ); ?>   
    
    
    
    <?php               wp_nav_menu( array(
    'theme_location' => 'mobile_navigation',
    'container' =>false,
    'menu_class' => 'nav navbar-nav visible-xs',
    'echo' => true,
    'before' => '',
    'after' => '',
    'link_before' => '',
    'link_after' => '',
    'depth' => 0,
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    
    'walker' => new twitter_bootstrap_nav_walker())
    ); ?>   
    

<form role="search" method="get" id="searchform" class="form-search navbar-search navbar-form navbar-right pull-right" action="<?php echo home_url('/'); ?>">
      <div class="form-groupf">
        <input type="text" name="s" id="s" class="form-controlf input-medium search-query" placeholder="<?php _e('Search', 'pubspring'); ?>">
      </div>
      <!-- <button type="submit" class="btn btn-default">Submit</button> -->
    </form>






  </div><!-- /.navbar-collapse -->
</div><!--  /.container  -->
</nav>














