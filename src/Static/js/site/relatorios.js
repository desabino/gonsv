var Relatorios = 
{
	init: function()
	{
		$('#btn-integracao').bind('click', function(){
			Relatorios.exportarCsv('/relatorios/integracaocsv');
		});
	},
	
	exportarCsv: function(path)
	{
		$.ajax({
			type: 'post',
			url : path,
			dataType: 'json',
			beforeSend: function() {
				
			},
			success: function(data) {
				console.log(data);
			}
		});
	}
}

$(document).ready(function(){
	Relatorios.init();
});