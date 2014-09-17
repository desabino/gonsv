<?php

// Ministérios Controller
 
class MinisteriosController extends Zend_Controller_Action
{
	public function init()
    {
        $this->view->pageheader = "Ministérios";
        $this->_db = new Model_DbTable_Ministerios();
        
        //$this->usuario = Zend_Auth::getInstance()->getIdentity();
    }
    
    public function indexAction()
    {
    	$msg = '';
		
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
				}
				catch(Exception $ex){
					echo 'exception: ' . $ex;
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
				$alert = array(
					'type'    => 'danger',
					'message' => $message . '<p>Por favor, verifique os dados digitados.</p>'
				);
				$this->view->alert = $alert;
			}
		}
	    	
		try {
	    	$rs = $this->_db->listaMinisterios();
	    	$this->view->ministerios = $rs;
		}
		catch (Exception $ex)
		{
			echo "exception";
		}
    }
}