/* ----------------------------------

Name: custom.js

------------------------------------- */


/*====================================================


	Table of Contents
	
	
		01. Loading Screen

		02. Scroll to top

*/



jQuery(document).ready(function($) {
	"use strict";

/*======================

	01. Loading Screen

========================*/


	setTimeout(function(){
		$('body').addClass('loaded');
	}, 0);
	

/*======================

	02. Scroll to top

========================*/	
	
	
	$(window).scroll(function() {
		50 <= $(this).scrollTop() ? $("#return-to-top").fadeIn(200) : $("#return-to-top").fadeOut(200)
	}), $("#return-to-top").on("click", function() {
		$("body,html").animate({
			scrollTop: 0
		}, 500)
	});

	
});