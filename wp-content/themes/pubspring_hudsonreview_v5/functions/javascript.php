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
});
</script>
<?php 
}
add_action('wp_footer', 'wp_cycle_args');