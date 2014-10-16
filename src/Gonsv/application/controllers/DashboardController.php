<?php

// Dashboard Controller
 
class DashboardController extends Zend_Controller_Action
{

    public function init()
    {
        $this->view->pageheader = "Dashboard";
    }
 
    public function indexAction()
    {
    	
    }
}