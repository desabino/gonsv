<?php
// Relatorios Controller

class RelatoriosController extends Zend_Controller_Action
{
	public function init()
	{
        $this->view->pageheader = "Relatórios";
        $this->_db = new Model_DbTable_Relatorios();
	}
	
	/**
     * 
     * Página principal dos relatorios.
     */
    public function indexAction()
    {
    	
    }
    
    /**
     * Relatório de integração
     * pessoas que possuem e-mail mas não estão integradas ao E-mail Marketing
     */
    public function integracaoAction()
    {
    	// JS
    	array_push($this->view->js, '/js/site/relatorios.js');
    	
    	$this->view->pagesubheader = "Integração de e-mail";
    	
    	$relatorio = $this->_db->Integracao();
    	$this->view->relatorio = $relatorio;
    }
    
    /**
     * 
     * Action de chamada ajax para gerar CSV de integração
     */
    public function integracaocsvAction()
    {
    	$this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
    	
        $name = 'newsletter';
        $data = $this->_db->Integracao();
        
        try {
    		$filepath = Util_Export_File::csv($name, $data);
    		$data = array(
    			'filepath' => $filepath
    		);
    		echo Zend_Json::encode($data);
    	}
    	catch (Exception $e) {
    		echo Zend_Json::encode($e->getMessage());
    	}    	
    }
}