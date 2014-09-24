<?php
// Ministérios Controller

class MinisteriosController extends Zend_Controller_Action
//class MinisteriosController extends PublicPageController
{
	public function init()
    {
        $this->view->pageheader = "Ministérios";
        $this->_db = new Model_DbTable_Ministerios();
        
        //$this->usuario = Zend_Auth::getInstance()->getIdentity();
    }
    
    /**
     * 
     * Página principal dos ministérios.
     */
    public function indexAction()
    {		
		$form = new Form_Ministerio();
		$this->view->form = $form;
		
		// Verificando a chamada post
		if($this->getRequest()->isPost()) {
			$data = $this->getRequest()->getPost();
			
			// Validando dados do form
			if($form->isValid($data)){
				try{
					unset($data['submit']);
					$ministerio = array(
						'ministerio_nome' => $data['f_ministerio_nome']
					);
					
					$ministerio_id = $this->_db->insert($ministerio);
					
					$form->reset();
					
					$type    = 'success';
					$message = '<p>Ministério incluído com sucesso.</p>';
				}
				catch(Exception $ex){
					$type    = 'danger';
					$message = $ex->getMessage();
				}
			}
			else{
				$formMsg = $form->getMessages();
				$message = '';
				foreach($formMsg as $fkey => $fmsgs) {
					foreach($fmsgs as $key => $msg) {
						$message .= '<p>' . $msg . '</p>';
					}
				}
				$type    = 'danger';
				$message = $message . '<p>Por favor, verifique os dados digitados.</p>';
			}
		}		
	    	
		try {
	    	$rs = $this->_db->listaMinisterios();
	    	$this->view->ministerios = $rs;
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
    
    /**
     * 
     * Remove um ministério caso não tenha servos vinculados
     */
    public function removeAction()
    {
    	$this->_helper->viewRenderer->setNoRender(true);
    	
    	$ministerio_id = $this->getParam('f_ministerio_id');
    	if(!empty($ministerio_id) && $ministerio_id != '') {
    		$ministerio = array(
    			'ministerio_id' => $ministerio_id
    		);
			$servos = $this->_db->servosMinisterio($ministerio_id);
			
			if(count($servos) <= 0){
				$this->_db->removeMinisterio($ministerio_id);
				$type = 'success';
				$message = '<p>Ministério excluído com sucesso.</p>';
			}
			else {
				$type = 'warning';
				$message = '<p>Não é possível remover um ministério com servos.<p>';
			}
    	}
    	else {
			$type = 'danger';
			$message = '<p>É necessário escolher um ministério para ser excluído.</p>';
    	}
    	$alert = Util_Helper::Alert($type, $message);
    	$this->view->alert = $alert;
    	
    	$this->_helper->redirector->gotoUrl('/ministerios');
    }
}