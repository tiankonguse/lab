// Common
//---------------------------------------------

$(window).load(function(){
	$(".start-overlay").stop(true).show();
	$(".loader-1, .loader-2").stop(true).delay(400).fadeOut(300);
	$(".start-overlay").stop(true).delay(500).fadeOut(500);
});

if (Modernizr.mq('screen and (min-width: 1000px)')) {
	Modernizr.load({
		test: Modernizr.touch,
		nope: ['js/desktop-animate.js']
	});
}