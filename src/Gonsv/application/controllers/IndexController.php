<?php

// Index Controller
 
class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        //$this->_helper->redirector->gotoUrl('/dashboard');
    }
 
    public function indexAction()
    {
    	$this->_helper->_layout->setLayout('no-menu-layout');
		$this->view->css[] = '/css/site/no-menu.css';
    }
}