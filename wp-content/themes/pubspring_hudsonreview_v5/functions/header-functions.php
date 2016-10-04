<?php
//Hides iOS chrome on mobile safari for a more app-like experience on iPhones.
function add_header_functions() { ?>

<script>if(navigator.userAgent.indexOf('iPhone') != -1){addEventListener('load',function(){setTimeout(hideURLbar, 0);}, false);}function hideURLbar(){window.scrollTo(0, 1);}</script>
<script>
  document.createElement('header');
  document.createElement('nav');
  document.createElement('section');
  document.createElement('article');
  document.createElement('aside');
  document.createElement('footer');
</script>

<style type="text/css">


figure.aligncenter {
text-align: center;
margin: auto;

}
</style>



<?php }
add_action('wp_head', 'add_header_functions');


function add_conditional_body_style() { ?>

<?php if ( is_user_logged_in() ) { ?>


<style>
body {
background-image: url(/wp-content/themes/pubspring_hudsonreview_v4/images/absurdidad.png);
background-position: top left;
background-repeat: repeat;

}


</style>

<?php }

}