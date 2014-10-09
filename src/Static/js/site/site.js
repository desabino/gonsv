/**
 * Funções utilitárias do site
 */

var Site = 
{
	init: function()
	{
		if($('.f-filter').length > 0){
		    this.filter();
		}
		Site.fancybox();
	},
    
    filter: function()
    {
        var filter = $('.f-filter');
        $(filter).livefilter({
            selector: '.table tbody tr'
        });
    },
    
    fancybox: function()
    {
    	$('.fancybox').fancybox({
        	openEffect	: 'elastic',
        	closeEffect	: 'elastic',
    		scrolling   : 'auto'
    	});
    }
}

$(document).ready(function(){
	Site.init();
})