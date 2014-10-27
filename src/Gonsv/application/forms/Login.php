<?php
class Form_Login extends Zend_Form
{
    public function init()
    {
        $this->setName('login');
        $this->setAction('/acesso');
        $this->setMethod('post');
        $this->setAttrib('id', 'login');
        $this->setAttrib('role', 'form');
       
        $email = new Zend_Form_Element_Text('f_email');
        $email->setRequired(true)
              ->addErrorMessage('Digite o seu e-mail')
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->setValue('')
              ->setLabel('Digite seu e-mail')
              ->setAttrib('id', 'f-email')
              ->setAttrib('class', 'form-control')
              ->setAttrib('placeholder', 'Digite seu e-mail');
              
        $senha = new Zend_Form_Element_Password('f_senha');
        $senha->setRequired(true)
              ->addErrorMessage('Digite sua senha')
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->setValue('')
              ->setLabel('Digite sua senha')
              ->setAttrib('id', 'f-senha')
              ->setAttrib('class', 'form-control')
              ->setAttrib('placeholder', 'Digite sua senha');
       
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Acessar')
               ->setAttrib('class', 'btn btn-primary')
               ->setAttrib('id', 'btn-acesssar');
		       
        $this->addElements(array(
            $email,
            $senha,
            $submit
        ));
		
        $this->setElementDecorators(array(
            'ViewHelper'
        ));
		
        $this->setDecorators(array());
    }
}