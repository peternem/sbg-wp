/* ==============================================
COUNT FACTORS
=============================================== */	
jQuery(function() {
	jQuery(".fact").appear(function(){
		jQuery('.fact').each(function(){
	       	dataperc = jQuery(this).data('perc'),
			jQuery(this).find('.factor').countTo({
		        from: 0,
		        to: dataperc,
		        speed: 3000,
		        refreshInterval: 50,
    		}); 
		});
	});
});