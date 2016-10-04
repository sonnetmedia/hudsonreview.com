<?php 
function wp_cycle_args() { ?>

<script type="text/javascript">
jQuery(document).ready(function($){



$('li.show_list_categories').click(function(){
		$(".list_categories").show(100);
		$(this).addClass('active');
		$("li.show_list_authors, li.show_list_years").removeClass('active');
		$(".list_authors, .list_years").hide(100);	
	});


$('li.show_list_authors').click(function(){
		$(".list_authors").show(100);
		$(this).addClass('active');
		$("li.show_list_categories, li.show_list_years").removeClass('active');
		$(".list_categories, .list_years").hide(100);
	});


$('li.show_list_years').click(function(){
		$(".list_years").show(100);
		$(this).addClass('active');
		$("li.show_list_categories, li.show_list_authors").removeClass('active');
		$(".list_categories, .list_authors").hide(100);
	});



	
$('a.show_menu').click(function(){
	$("#banner_extended, .navbanner .container").slideDown(600);
	$(".menu_button").hide(100);	
	
	});	
	
	
	
	
	//show the search results as soon as the user starts to type
	$('.show_filtered_results').keyup(function(){$(".search_list").slideDown(600);});
	
	
	    $("#filter").keypress(function(){
	    
	    
	        // Retrieve the input field text and reset the count to zero
	        var filter = $(this).val(), count = 0;
	 
	        // Loop through the content list
	        $(".search_list li").each(function(){
	 
	            // If the list item does not contain the text phrase fade it out
	            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
	                $(this).fadeOut();
	 
	            // Show the list item if the phrase matches and increase the count by 1
	            } else {
	                $(this).show();
	                count++;
	            }
	        });
	 
	        // Update the count
	        var numberItems = count;
	        $("#filter-count").text("Do any of these help? = "+count);
	    
	        
	    });
	    
	       
		
	
	
	
 // jQuery SmoothScroll | Version 09-11-02
    $('a[href*=#]').not('a[href=#tag_search_tool]')
                   .not('a[href=#chapter_search_tool]')
                   .click(function() {

        // duration in ms
        var duration = 1200;

        // easing values: swing | linear
        var easing = 'swing';

        // get / set parameters
        var newHash = this.hash;
        var target = $(this.hash).offset().top;
        var oldLocation = window.location.href.replace(window.location.hash, '');
        var newLocation = this;

        // make sure it's the same location
        if (oldLocation + newHash == newLocation)
        {
            // animate to target and set the hash to the window.location after the animation
            $('html:not(:animated),body:not(:animated)').animate({
                scrollTop: target
            },
            duration, easing,
            function() {

                // add new hash to the browser location
                window.location.href = newLocation;
            });

            // cancel default click action
            return false;
        }

    });	
});
</script>
<?php 
}
add_action('wp_footer', 'wp_cycle_args');