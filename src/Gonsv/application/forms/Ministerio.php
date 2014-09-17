<?php
class Form_Ministerio extends Zend_Form
{
	public function init()
	{
		$this->setName('novo-ministerio');
		$this->setAction('/ministerios');
		$this->setMethod('post');
		$this->setAttrib('id', 'novo-ministerio');
		$this->setAttrib('role', 'form');
		
		$ministerio_id = new Zend_Form_Element_Text('f_ministerio_id');
		$ministerio_id->setRequired(false)
				        ->setValue('')
				        ->setLabel('Id do ministerio')
				        ->setAttrib('id', 'f-ministerio-id')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'Id do ministério');
		
		$ministerio_nome = new Zend_Form_Element_Text('f_ministerio_nome');
		$ministerio_nome->setRequired(true)
				        ->addErrorMessage('O Nome do ministério precisa ser informado.')
				        ->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('Nome do ministério')
				        ->setAttrib('id', 'f-ministerio-nome')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'Nome do ministério');
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Gravar')
		       ->setAttrib('class', 'btn btn-primary');
		       
		$this->addElements(
			array(
				$ministerio_id,
				$ministerio_nome,
				$submit
			)
		);
		
		$this->setElementDecorators(array(
			'ViewHelper'
		));
		
		$this->setDecorators(array());       
	}
}