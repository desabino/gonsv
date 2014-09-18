<?php

// Index Controller
 
class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        
    }
 
    public function indexAction()
    {
    	$this->_helper->_layout->setLayout('no-menu-layout');
		$this->view->headLink()->appendStylesheet($this->view->baseUrl('/css/site/no-menu.css'));
        // $this->view->headScript()->appendFile('/js/site/acesso.js');
    }
}