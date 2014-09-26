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
	},
    
    filter: function()
    {
        var filter = $('.f-filter');
        $(filter).livefilter({
            selector: '.table tbody tr'
        });
    }
}

$(document).ready(function(){
	Site.init();
})