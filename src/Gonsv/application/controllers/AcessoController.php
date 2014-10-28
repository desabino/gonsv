<?php

// Acesso Controller
 
class AcessoController extends Zend_Controller_Action
{

    public function init()
    {
        $this->view->pageheader = "Acesso";
        //$this->_db = new Model_DbTable_Acesso();
    }
 
    public function indexAction()
    {
        // Change the main layout renderer
        $this->_helper->_layout->setLayout('no-menu-layout');
		$this->view->css[] = '/css/site/no-menu.css';
        
        // Verificando se existem erros/mensagens
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');

        if(is_array($this->_flashMessenger->getMessages()) && count($this->_flashMessenger->getMessages()) > 0){
            $alert = array(
                'type'    => 'warning',
                'message' => ''
            );
            $messages = '';
            foreach($this->_flashMessenger->getMessages() as $key => $message){
                $messages .= '<p>' . $message . '</p>';
            }
            $alert['message'] = $messages;
            $this->view->alert = $alert;
        }
        
        // Chamando formulário
        $form = new Form_Login();
        $this->view->form = $form;
        
        // Verificando a chamada post
        if($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            
            // Validando dados do form
            if($form->isValid($data)){
                try{
                    unset($data['submit']);
                    $credenciais = array(
                        'email' => $data['f_email'],
                        'senha' => $data['f_senha']
                    );
                   
                    $currentRole = Model_Auth_Acesso::login($credenciais['email'], $credenciais['senha']);
                    
                    //$action = ($currentRole == admin)?'admin':'';
					$action = 'index';
                    
                    //Redireciona para o Controller protegido
                    return $this->_helper->redirector->goToRoute(array('controller' => 'dashboard', 'action' => $action), null, true);
                }
                catch(Exception $ex){
                    //Dados inválidos
                    $this->_helper->FlashMessenger($ex->getMessage());
                    $this->_redirect('/acesso');
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
	        	$loginForm->populate($data);
            }
        }
    }
    
    public function sairAction() 
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);
        
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();
        
        return $this->_helper->redirector->goToRoute(array('controller' => 'acesso'), null, true);
    }
}