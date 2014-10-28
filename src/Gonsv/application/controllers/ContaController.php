<?php

// Conta Controller
 
class ContaController extends Zend_Controller_Action
{

    public function init()
    {
        $this->view->pageheader = "Contas";
        $this->_db = new Model_DbTable_Conta();
        
        $this->usuario = Zend_Auth::getInstance()->getIdentity();
    }
 
    public function indexAction()
    {
        $msg = '';
        
        // Chamando formulário
        $form = new Form_Conta();
        $this->view->form = $form;
        
        // Verificando a chamada post
        if($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            
            // Validando dados do form
            if($form->isValid($data)){
                try{
                    unset($data['submit']);
                    $conta = array('nome'  => $data['f_nome_cliente'],
                                   'email' => $data['f_email_cliente'],
                                   'tipo'  => 2
                                  );
                                  
                    // Gravando nova conta
                    $id_conta = $this->_db->insert($conta);
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
                $form->getElement('f_nome_cliente')->addError('isto é um erro teste');
                $this->view->alert = $alert;
            }
        }        
        
        // Listando contas
        try{
            $rs = $this->_db->listaContas();
    	    $this->view->contas = $rs;
    	}
    	catch(Exception $e){
            $alert = array(
                'type'    => 'warning',
                'message' => $message . '<p>Nenhuma conta encontrada.</p>'
            );
            $this->view->alert = $alert;
    	}
    }
    
    public function minhacontaAction()
    {
        $this->view->pageheader = "Minha Conta";
        
        $msg = '';
        
        // Chamando formulário
        $form = new Form_Minhaconta();
        
        // Verificando a chamada post
        if($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            
            // Validando dados do form
            if($form->isValid($data)){
                try{
                    unset($data['submit']);
                    $where = $this->_db->getAdapter()->quoteInto('id_conta = ?', $this->usuario->getIdUser());
                    
                    // Alterando a senha
                    $alert = $this->alteraSenha($data, $where);
                    
                    // Alterando dados gerais
                    if($alert['type'] != 'warning' && $alert['type'] != 'danger')
                    {
    	                $conta = array('nome' => $data['f_nome']);
                        $id_conta = $this->_db->update($conta, $where);
                        $alert['message'] = '<p>Dados alterados com sucesso.</p>' . $alert['message'];
                        
                        Model_Auth_Acesso::atualizaSessao();
                    }
                    else {
                        $alert['message'] = '<p>Dados não foram alterados.</p>' . $alert['message'];
                    }
                    $form->populate($data);
                }
                catch(Exception $ex){                	
                    $alert = array(
                        'type'    => 'danger',
                        'message' => $ex
                    );
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
            }
            $this->view->alert = $alert;
        }
        else {
            $form->f_id_conta->setValue($this->usuario->getIdUser());
            $form->f_nome->setValue($this->usuario->getFullName());
        }
                
        $this->view->pagesubheader = $this->usuario->getNickName();
        $this->view->form = $form;
        $this->view->usuario = $this->usuario;
                
    }
    
    public function alterarSenhaAction()
    {
        $this->view->pageheader = "Alterar Senha";
    	
        $message = '';
		$type    = '';
        
        // Chamando formulário
        $form = new Form_AlterarSenha();
    	
		// Verificando a chamada post
        if($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            
            // Validando dados do form
            if($form->isValid($data)){
                try{
					if(count($this->_db->comparaSenha($this->usuario->getIdUser(), sha1($data['f_senha']))) > 0) {
						if($data['f_novasenha'] != '' && $data['f_cnovasenha'] != '' && $data['f_novasenha'] == $data['f_cnovasenha']){
							$conta = array(
								'senha' => sha1($data['f_novasenha'])
							);
							$where = $this->_db->getAdapter()->quoteInto('conta_id = ?', $this->usuario->getIdUser());
							$this->_db->update($conta, $where);
							$type     = 'success';
							$message .= '<p>Senha alterada com sucesso.</p>';
						}
						else if(($data['f_novasenha'] != '' || $data['f_cnovasenha'] != '') && $data['f_novasenha'] != $data['f_cnovasenha']){
							$type     = 'warning';
							$message .= '<p>A senha não foi alterada. A confirmação da senha não corresponde a senha informada.</p>';
						}
						else if ($data['f_novasenha'] == '' && $data['f_cnovasenha'] == ''){
							$type     = 'info';
							$message .= '<p>A senha não foi alterada.</p>';
						}
					}
					else {
						$type     = 'warning';
						$message .= '<p>A senha não foi alterada. Senha atual incorreta.</p>';
					}
                }
                catch(Exception $ex){                	
                    $type     = 'danger';
					$message .= $ex;
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
                $type     = 'danger';
				$message .= '<p>Por favor, verifique os dados digitados.</p>';
            }
            $this->view->alert = Util_Helper::Alert($type, $message);
        }        
		$this->view->form = $form;
    }
    
    private function alteraDados()
    {
    	return $message;
    }
}