//<![CDATA[
		jQuery(window).load(function() { // makes sure the whole site is loaded
			jQuery("#status").fadeOut(); // will first fade out the loading animation
			jQuery("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.
		})
	//]]>