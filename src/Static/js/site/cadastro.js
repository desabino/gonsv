/**
 * Controle e máscara do formulário de cadastro
 */

var Cadastro = 
{
	init: function()
	{
		this.masks();
	},
	
	masks: function()
	{
		$('.f-date').mask("00-00-0000", {maxlength: true});
		$('.f-numero').mask("0#", {maxlength: false});
		$('.f-uf').mask("SS", {maxlength: true});
		$('.f-cep').mask("00000-000", {maxlength: true});
		$('.f-phone').mask("(00) 0000-0000", {maxlength: true});
		$('.f-cellphone').mask("(00) 0000-00000", {maxlength: true});
	}
}

$(document).ready(function(){
	Cadastro.init();
});