var Relatorios = 
{
	init: function()
	{
		$('#btn-integracao').bind('click', function(){
			Relatorios.exportarCsv('/relatorios/integracaocsv', $(this));
		});
	},
	
	exportarCsv: function(path, btn)
	{
		$.ajax({
			type: 'post',
			url : path,
			dataType: 'json',
			beforeSend: function() {
				
			},
			success: function(data) {
				$(btn).after('<a href="' + data.filepath + '" class="btn btn-info btn-block">baixar lista</a>');
			}
		});
	}
}

$(document).ready(function(){
	Relatorios.init();
});