<?php

// Index Controller
 
class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $this->view->pageheader = "Home";
        $this->_helper->redirector->gotoUrl('/acesso');
    }
 
    public function indexAction()
    {
        // Change the main layout renderer
    	$this->_helper->_layout->setLayout('no-menu-layout');
		$this->view->css[] = '/css/site/no-menu.css';
    }
}