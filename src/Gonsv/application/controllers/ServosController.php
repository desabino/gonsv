<?php
// Servos Controller

class ServosController extends PrivatePageController
{
	public function init()
	{
        $this->view->pageheader = "Ministérios";
        $this->_db = new Model_DbTable_Servos();
	}
	
	/**
     * 
     * Página principal dos servos.
     */
    public function indexAction()
    {		
		try {
	    	$rs = $this->_db->listaServos();
	    	$this->view->servos = $rs;
		}
		catch (Exception $ex)
		{
			$type    = 'danger';
			$message = $ex->getMessage();
		}
		
		if(isset($type) && $type != ''){
			$alert = Util_Helper::Alert($type, $message);
			$this->view->alert = $alert;
		}
    }
}