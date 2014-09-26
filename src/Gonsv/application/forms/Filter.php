<?php
class Form_Filter extends Zend_Form
{
	public function init()
	{
		$this->setName('form-filter');
		$this->setAction('');
		$this->setMethod('post');
		$this->setAttrib('id', 'form-filter');
		$this->setAttrib('role', 'form');
		
		$filter = new Zend_Form_Element_Text('f_filter');
		$filter->addFilter('StripTags')
		      ->addfilter('StringTrim')
		      ->setValue('')
		      ->setLabel('Digite sua pesquisa')
		      ->setAttrib('id', 'f-filter')
		      ->setAttrib('class', 'form-control f-filter')
		      ->setAttrib('placeholder', 'Digite sua pesquisa');
		       
		$this->addElements(
			array(
				$filter
			)
		);
		
		$this->setElementDecorators(array(
			'ViewHelper'
		));
		
		$this->setDecorators(array());       
	}
}