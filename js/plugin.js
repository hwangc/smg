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

	$('.single .entry-content a').each(function(){
		if($(this).parents('.tiled-gallery').length == 0) {
			$(this).fluidbox();
		} 
	});
	/****************************************
	 * mmenu
	 ****************************************/
	$(document).ready(function() {
		$("#site-navigation").mmenu({
			"classes": "mm-light mm-zoom-panels",
			"counters": true,
			"offCanvas": {
				"position": "right"
			},
			"footer": {
				"add": true,
				"title": "JWWM"
			},
			"header": {
				"title": "Menu",
				"add": true,
				"update": true
			}
		})
		.on('opening.mm',function () {
			$('.userpro-tip').tipsy('hide');
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
	 	if ($wpAdminBar.length && $(window).width()>782) {
	 		$("div#page, div#container").css('padding-top','32px');
	 	}else if ($wpAdminBar.length && $(window).width()<=782) {
	 		$("div#page, div#container").css('padding-top','46px');
	 	}
	 }); 
	/****************************************
	 * dropdown
	 ****************************************/
	// $( '.gfield_select' ).dropdown();
	/****************************************
	 * 
	 ****************************************/


})(jQuery);

/****************************************
 * 
 ****************************************/