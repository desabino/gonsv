<?php

// Index Controller
 
class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        
    }
 
    public function indexAction()
    {
    	// CSS
		$this->view->headLink()->appendStylesheet('');    	
    }
}