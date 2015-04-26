// Bootstrap specific functions and styling

jQuery(document).ready(function() {

	/* ==============================================
	 Older browser support - Add support for html5 stuff - Form elements Placeholder Attributes
	 =============================================== */
	if (!Modernizr.input.placeholder) {
		jQuery("input[type='text'], input[type='text'], textarea").each(function() {
			if (jQuery(this).val() == "" && jQuery(this).attr("placeholder") != "") {
				jQuery(this).val(jQuery(this).attr("placeholder"));
				jQuery(this).focus(function() {
					if (jQuery(this).val() == jQuery(this).attr("placeholder"))
						jQuery(this).val("");
				});
				jQuery(this).blur(function() {
					if (jQuery(this).val() == "")
						jQuery(this).val(jQuery(this).attr("placeholder"));
				});
			}
		});
	}

	/* ==============================================
	 Older browser support - Removes Modernd CSS3 Styling - SVG, CSS Animation, CSS Transform
	 =============================================== */
	
	if (!Modernizr.svg) {
		jQuery('img[src*="svg"]').attr('src', function() {
			return jQuery(this).attr('src').replace('.svg', '.png');
		});
	}
	
	if (!Modernizr.cssanimations) {
        jQuery('#myCarousel').removeClass('fade');
    }

	if (!Modernizr.csstransforms) {
        jQuery('#myCarousel .carousel-inner').removeClass('csstransforms').addClass('no-csstransforms');
    }
    
	/* ==============================================
	 SBGI News Spotlight Alert - Home page hero area
	 =============================================== */

	jQuery('.sbgi-spotlight .badge ').height(jQuery('.list-content').height());

	jQuery(window).resize(function() {
		jQuery('.sbgi-spotlight .badge ').height(jQuery('.list-content').height());
	});

	/* ==============================================
	WP Theme Stuff
	=============================================== */

	// here for each comment reply link of WordPress
	jQuery('.comment-reply-link').addClass('btn btn-sm btn-default');

	// here for the submit button of the comment reply form
	jQuery('#submit, button[type=submit], button, html input[type=button], input[type=reset], input[type=submit]').addClass('btn btn-default');

	// Now we'll add some classes for the WordPress default widgets - let's go
	jQuery('.widget_rss ul').addClass('media-list');

	// Add Bootstrap style for drop-downs
	jQuery('.postform').addClass('form-control');

	// Add Bootstrap form style classes for Fast Secure Contact Form plugin
	jQuery('.fscf-div-field input[type=text]').addClass('form-control input-lg');
	jQuery('.fscf-div-field select').addClass('form-control input-lg');
	jQuery('.fscf-div-field').addClass('form-group form-group-lg');

	// Hide form label Select Contact label for Fast Secure Contact Form plugingit status
	jQuery('#fscf_div_field_contact1 .fscf-div-label').hide();

	// Add Bootstrap styling for tables
	jQuery('table#wp-calendar').addClass('table table-striped');

	jQuery('#submit, .tagcloud, button[type=submit], .comment-reply-link, .widget_rss ul, .postform, table#wp-calendar').show("fast");

	/* ==============================================
	 News Carousel Widget - SBGI homepage
	 =============================================== */

	jQuery('#carousel-news').carousel({
		interval : false
	});

	// jQuery('#carousel-news .item').each(function() {
	// 	var next = jQuery(this).next();
	// 	if (!next.length) {
	// 		next = jQuery(this).siblings(':first');
	// 	}
	// 	next.children(':first-child').clone().appendTo(jQuery(this));

	// 	for (var i = 0; i < 2; i++) {
	// 		next = next.next();
	// 		if (!next.length) {
	// 			next = jQuery(this).siblings(':first');
	// 		}

	// 		next.children(':first-child').clone().appendTo(jQuery(this));
	// 	}
	// });
	jQuery('#carousel-news .item').each(function(){
	  var next = jQuery(this).next();
	  if (!next.length) {
	    next = jQuery(this).siblings(':first');
	  }
	  next.children(':first-child').clone().appendTo(jQuery(this));

	  if (next.next().length>0) {
	    next.next().children(':first-child').clone().appendTo(jQuery(this));
	  }
	  else {
	    jQuery(this).siblings(':first').children(':first-child').clone().appendTo(jQuery(this));
	  }
	});

	/* ==============================================
	 Annual Reports Carousel CALLING
	 =============================================== */

	jQuery('#AnRepCarousel').carousel();

	/* ==============================================
	SOFT SCROLL EFFECT FOR NAVIGATION LINKS
	=============================================== */

	//jQuery('a[href*=#]:not([href=#])').click(function() {
	jQuery("li a[href*='#']").click(function() {

		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
			var target = jQuery(this.hash);
			var headerH = jQuery('.navbar, .navbar-fixed-top').outerHeight();
			target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				jQuery('html,body').stop().animate({
					scrollTop : target.offset().top - headerH + "px"
				}, 1000, 'easeInOutExpo');
				return false;
			}

		}
	});

	//Check to see if the window is top if not then display button
	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > 100) {
			jQuery('.scroll-to-top').fadeIn();
		} else {
			jQuery('.scroll-to-top').fadeOut();
		}
	});

	//Click event to scroll to top
	jQuery('.scroll-to-top').click(function() {
		jQuery('html, body').animate({
			scrollTop : 0
		}, 800);
		return false;
	});

	//Check to see if the window is top if not then display button
	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > 100) {
			jQuery('.scroll-to-top').fadeIn();
		} else {
			jQuery('.scroll-to-top').fadeOut();
		}
	});

	//Click event to scroll to top
	jQuery('.scroll-to-top').click(function() {
		jQuery('html, body').animate({
			scrollTop : 0
		}, 800);
		return false;
	});

});

/* ==============================================
 Mobile Touch Calling
 =============================================== */

jQuery(document).ready(function() {
	if (jQuery("#carousel-news").length > 0) {
		jQuery("#carousel-news").swiperight(function() {
			jQuery("#carousel-news").carousel('prev');
		});
		jQuery("#carousel-news").swipeleft(function() {
			jQuery("#carousel-news").carousel('next');
		});

	}

});

/* ==============================================
 PARALLAX CALLING
 =============================================== */

( function(jQuery) {
		'use strict';
		jQuery(document).ready(function() {
			jQuery(window).bind('load', function() {
				parallaxInit();
			});
			function parallaxInit() {
				testMobile = isMobile.any();
				if (testMobile == null) {
					//Parallax Classes
					jQuery('body.parallax .parallax1').parallax("50%", 0.1);
					jQuery('body.parallax .parallax3').parallax("100%", 0.5);
					jQuery('body.parallax .parallax6').parallax("50%", 0.5);
				}
			}

			parallaxInit();
		});
		//Mobile Detect
		var testMobile;
		var isMobile = {
			Android : function() {
				return navigator.userAgent.match(/Android/i);
			},
			BlackBerry : function() {
				return navigator.userAgent.match(/BlackBerry/i);
			},
			iOS : function() {
				return navigator.userAgent.match(/iPhone|iPad|iPod/i);
			},
			Opera : function() {
				return navigator.userAgent.match(/Opera Mini/i);
			},
			Windows : function() {
				return navigator.userAgent.match(/IEMobile/i);
			},
			any : function() {
				return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
			}
		};
	}(jQuery));
