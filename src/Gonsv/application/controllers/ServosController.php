<?php
// Servos Controller

class ServosController extends Zend_Controller_Action
{
	public function init()
	{
        $this->view->pageheader = "Servos";
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
	    	$servos = array();
	    	
	    	foreach ($rs as $key => $servo) {
	    		$ministerio = array();
	    		if(!array_key_exists($servo['servo_id'], $servos)) {
		    		$servos[$servo['servo_id']] = array(
		    			'pessoa_id'   => $servo['pessoa_id'],
		    			'nome'        => $servo['nome'],
		    			'data_nasc'   => $servo['data_nasc'],
		    			'servo_id'    => $servo['servo_id'],
		    			'servo_ativo' => $servo['servo_ativo'],
		    			'ministerios' => array()
		    		);
	    		}
	    		$ministerio = array(
	    			'ministerio_id'          => $servo['ministerio_id'],
	    			'ministerio_nome'        => $servo['ministerio_nome'],
	    			'servo_ministerio_ativo' => $servo['servo_ministerio_ativo']
	    		);
	    		$servos[$servo['servo_id']]['ministerios'][$servo['ministerio_id']] = $ministerio;
	    	}
	    	$this->view->servos = $servos;
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