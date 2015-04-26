function initIsotope() {
    // filter items on button click
    var $container = jQuery('.isotope').isotope({
        itemSelector : '.item',
        layoutMode : 'fitRows'
    });
    
    // bind filter button click
    jQuery('#filters, #drop-afil-filter, #drop-dma-filter').on('click', 'a', function() {
        var filterValue = jQuery(this).attr('data-filter');
        $container.isotope({
            filter : filterValue
        });
    });
    
    // change is-checked class on buttons
    jQuery('.option-set').each(function(i, buttonGroup) {
        var $buttonGroup = jQuery(buttonGroup);
        
        $buttonGroup.on('click', 'a', function() {
            $buttonGroup.find('.selected').removeClass('selected');
            jQuery(this).addClass('selected');
        });
    });
    
    // Network Affiliation Filter function
    jQuery('#drop-afil-filter').each(function(i, buttonGroup) {
        var $buttonGroup = jQuery(buttonGroup);
        
        $buttonGroup.on('click', 'a', function() {
            $buttonGroup.find('.selected').removeClass('selected');
            jQuery(this).addClass('selected');
            
            var strAffil=jQuery(this).text();
            
            jQuery('#btn-afil-filter').text(strAffil).append('    <span class="caret"></span>');
        });
    });
    
    // DMA Filter function
    jQuery('#drop-dma-filter').each(function(i, buttonGroup) {
        var $buttonGroup = jQuery(buttonGroup);
        
        $buttonGroup.on('click', 'a', function() {
            $buttonGroup.find('.selected').removeClass('selected');
            jQuery(this).addClass('selected');
            
            var strDma=jQuery(this).text();
            
            jQuery('#btn-dma-filter').text(strDma).append('    <span class="caret"></span>');
        });
    });
}


jQuery(window).on('load', function() {
    initIsotope();
}); 