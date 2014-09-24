<?php

// Participantes Controller
 
class ParticipantesController extends Zend_Controller_Action
{
	public function init()
    {
        $this->view->pageheader = "Participantes";
        $this->_db = new Model_DbTable_Pessoas();
        
        //$this->usuario = Zend_Auth::getInstance()->getIdentity();
    }
    
    public function indexAction()
    {
    	$rs = $this->_db->listaPessoas();
    	$this->view->pessoas = $rs;
    }
    
    public function cadastroAction()
    {
    	$form = new Form_Pessoa();
		$this->view->form = $form;
    }
}