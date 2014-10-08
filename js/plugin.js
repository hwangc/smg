(function($){
	/****************************************
	 * google style appear
	 ****************************************/
	$(document.body).on('appear', '.card', function() {
		// add class called “appeared” for each appeared element
		$(this).addClass("appeared");
	});

	$('.card').appear({force_process: true});
	
	/****************************************
	 * fluid
	 ****************************************/
	$('.single .entry-content a').fluidbox();
	/****************************************
	 * mmenu
	 ****************************************/
	$(document).ready(function() {
		$("#site-navigation").mmenu({
			"classes": "mm-light mm-zoom-panels",
			"counters": true,
			 "footer": {
                  "add": true,
                  "title": "SMG"
               },
               "header": {
                  "title": "Menu",
                  "add": true,
                  "update": true
               }
		});
		$(".mm-close-menu").click(function() {
        	$("#site-navigation").trigger("close.mm");
      	});
	});
	/****************************************
	 * flowtype
	 ****************************************/
	$('body').flowtype({
		minimum   : 300,
		maximum   : 1200,
		minFont   : 20,
		maxFont   : 24,
		fontRatio : 30
	});
	/****************************************
	 * wp admin bar height
	 ****************************************/
	 $(document).ready(function($){                                                             
	 	var $wpAdminBar = $('#wpadminbar');
	 	if ($wpAdminBar.length) {
	 		$("div#page").css('margin-top','32px');
	 	}    
	 }); 
	/****************************************
	 * dropdown
	 ****************************************/
	$( '.gfield_select' ).dropdown();
	/****************************************
	 * 
	 ****************************************/
	
})(jQuery);

/****************************************
 * 
 ****************************************/

/****************************************
 * 
 ****************************************/