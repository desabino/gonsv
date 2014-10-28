<?php
class Form_AlterarSenha extends Zend_Form
{
    public function init()
    {
        $this->setName('alterar-senha');
        $this->setAction('/conta/alterar-senha');
        $this->setMethod('post');
        $this->setAttrib('id', 'alterar-senha');
        $this->setAttrib('role', 'form');
              
        $senha = new Zend_Form_Element_Password('f_senha');
        $senha->setRequired(true)
              ->addErrorMessage('Digite sua senha atual')
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->setValue('')
              ->setLabel('Digite sua senha atual')
              ->setAttrib('id', 'f-senha')
              ->setAttrib('class', 'form-control')
              ->setAttrib('placeholder', 'Digite sua senha atual');
              
        $novasenha = new Zend_Form_Element_Password('f_novasenha');
        $novasenha->setRequired(true)
              ->addErrorMessage('Digite a nova senha')
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->setValue('')
              ->setLabel('Digite a nova senha')
              ->setAttrib('id', 'f-novasenha')
              ->setAttrib('class', 'form-control')
              ->setAttrib('placeholder', 'Digite a nova senha');
              
        $cnovasenha = new Zend_Form_Element_Password('f_cnovasenha');
        $cnovasenha->setRequired(true)
              ->addErrorMessage('Confirme a nova senha')
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->setValue('')
              ->setLabel('Confirme a nova senha')
              ->setAttrib('id', 'f-cnovasenha')
              ->setAttrib('class', 'form-control')
              ->setAttrib('placeholder', 'Confirme a nova senha');
       
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Gravar')
               ->setAttrib('class', 'btn btn-primary')
               ->setAttrib('id', 'btn-gravar');
		       
        $this->addElements(array(
            $senha,
            $novasenha,
            $cnovasenha,
            $submit
        ));
		
        $this->setElementDecorators(array(
            'ViewHelper'
        ));
		
        $this->setDecorators(array());
    }
}