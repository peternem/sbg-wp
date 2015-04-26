// Bootstrap specific functions and styling
	
jQuery(document).ready(function(){
	// here for each comment reply link of WordPress
	jQuery( '.comment-reply-link' ).addClass( 'btn btn-sm btn-default' );

	// here for the submit button of the comment reply form
	jQuery( '#submit, button[type=submit], button, html input[type=button], input[type=reset], input[type=submit]' ).addClass( 'btn btn-default' );

	// Now we'll add some classes for the WordPress default widgets - let's go
	jQuery( '.widget_rss ul' ).addClass( 'media-list' );

	// Add Bootstrap style for drop-downs
	jQuery( '.postform' ).addClass( 'form-control' );

	// Add Bootstrap styling for tables
	jQuery( 'table#wp-calendar' ).addClass( 'table table-striped');

	jQuery( '#submit, .tagcloud, button[type=submit], .comment-reply-link, .widget_rss ul, .postform, table#wp-calendar' ).show( "fast" );

});

// jQuery powered scroll to top

jQuery(document).ready(function(){

/* ==============================================
SOFT SCROLL EFFECT FOR NAVIGATION LINKS
=============================================== */		
	jQuery('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname) {
	
	        var target = jQuery(this.hash);
	        var headerH = jQuery('.navbar, .navbar-fixed-top').outerHeight() + 100;
	        target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
	           if (target.length) {
	             //jQuery('html,body').animate({scrollTop: target.offset().top}, 1000);
	            jQuery('html,body').stop().animate({scrollTop: target.offset().top - headerH + "px"}, 1000, 'easeInOutExpo');
	            return false;
	        }
	    }
	});

	//Check to see if the window is top if not then display button
	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 100) {
			jQuery('.scroll-to-top').fadeIn();
		} else {
			jQuery('.scroll-to-top').fadeOut();
		}
	});

	//Click event to scroll to top
	jQuery('.scroll-to-top').click(function(){
		jQuery('html, body').animate({scrollTop : 0},800);
		return false;
	});

});

