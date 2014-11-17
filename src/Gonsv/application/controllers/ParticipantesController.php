<?php

// Participantes Controller
 
class ParticipantesController extends Zend_Controller_Action
{
	public function init()
    {
        $this->view->pageheader = "Participantes";
        $this->_db   = new Model_DbTable_Pessoas();
        $this->_dbes = new Model_DbTable_EstadoCivil();
        $this->_dbm  = new Model_DbTable_Ministerios();
        
        //$this->usuario = Zend_Auth::getInstance()->getIdentity();
    }
    
    public function indexAction()
    {
    	$rs = $this->_db->listaPessoas();
    	$this->view->pessoas = $rs;
    }
    
    public function cadastroAction()
    {
    	// subheader
    	$this->view->pagesubheader = "Cadastrar participante";
    	
    	// JS
    	array_push($this->view->js, '/js/site/cadastro.js');
    	
    	$form = new Form_Pessoa();
		$this->view->form = $form;		
		
		// Verificando a chamada post
        if($this->getRequest()->isPost()){
            $data = $this->getRequest()->getPost();
            
            // Validando dados do formulário
            if($form->isValid($data)){
                try{
                    unset($data['submit']);
                    
                    $data['f_cep'] = ($data['f_cep'] != '') ? Util_Format_String::ClearMaskChars($data['f_cep']) : $data['f_cep'] ;
                    $data['f_telefone'] = ($data['f_telefone'] != '') ? Util_Format_String::ClearMaskChars($data['f_telefone']) : $data['f_telefone'] ;
                    $data['f_telefone2'] = ($data['f_telefone2'] != '') ? Util_Format_String::ClearMaskChars($data['f_telefone2']) : $data['f_telefone2'] ;
                    $data['f_celular'] = ($data['f_celular'] != '') ? Util_Format_String::ClearMaskChars($data['f_celular']) : $data['f_celular'] ;
                    $data['f_celular2'] = ($data['f_celular2'] != '') ? Util_Format_String::ClearMaskChars($data['f_celular2']) : $data['f_celular2'] ;
                    
                    $data['f_data_nasc'] = ($data['f_data_nasc'] != '') ? Util_Format_Date::ScreenToDb($data['f_data_nasc'], 'date') : $data['f_data_nasc'] ;
                    $data['f_data_cadastro'] = ($data['f_data_cadastro'] != '') ? Util_Format_Date::ScreenToDb($data['f_data_cadastro'], 'date') : $data['f_data_cadastro'] ;
                    
                    $pessoa = array();
                    foreach ($data as $key => $value) {
                    	$pessoa[substr($key, 2)] = $value;
                    }
                    
                    if($data['f_pessoa_id'] == '') {
                    	$data['f_pessoa_id'] = $this->_db->insert($pessoa);
                    	$message = $message . '<p>Pessoa cadastrada com sucesso.</p>';
                    }
                    else {
                    	$this->_db->atualizaPessoa($pessoa);
                    	$message = $message . '<p>Dados atualizados com sucesso.</p>';
                    }
                    
                    $type    = 'success';
                    
                    // Populando dados
                    $data['f_data_nasc'] = ($data['f_data_nasc'] != '') ? Util_Format_Date::DbToScreen($data['f_data_nasc'], 'date') : $data['f_data_nasc'] ;
                    $data['f_data_cadastro'] = ($data['f_data_cadastro'] != '') ? Util_Format_Date::DbToScreen($data['f_data_cadastro'], 'date') : $data['f_data_cadastro'] ;
                    $form->populate($data);     
                }
                catch(Exception $ex){                    
	                $type    = 'warning';
	                $message = $message . '<p>' . $ex . '.</p>';
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
            
            $alert = Util_Helper::Alert($type, $message);
            $this->view->alert = $alert;
        }
        else if ($this->getParam('f_pessoa_id') != '') {
        	$pessoa = $this->_db->consultaPessoaPorId($this->getParam('f_pessoa_id'));
        	
        	
            $data = array();
            foreach ($pessoa[0] as $key => $value) {
            	$data['f_' . $key] = $value;
            }
        	
            // Populando dados
            $data['f_data_nasc'] = ($data['f_data_nasc'] != '') ? Util_Format_Date::DbToScreen($data['f_data_nasc'], 'date') : $data['f_data_nasc'] ;
            $data['f_data_cadastro'] = ($data['f_data_cadastro'] != '') ? Util_Format_Date::DbToScreen($data['f_data_cadastro'], 'date') : $data['f_data_cadastro'];
            $form->populate($data);
			echo '<pre>';
			print_r($form);
			exit;
			$form->f_batizado->setValue($data['f_batizado']);
        }
		
		$estados_civis = $this->_dbes->listaEstadosCivis();
		
    	//montando dados para o campo estado_civil
        $estadoCivilField   = array();
        $estadoCivilField[] = '';
        foreach($estados_civis as $key => $value){
            $estadoCivilField[$value['estado_civil_id']] = $value['estado_civil_nome'];
        }
		
		$form->f_estado_civil->setMultiOptions($estadoCivilField);
    }
    
    public function detalhesAction()
    {    	
    	// CSS
    	array_push($this->view->css, '/css/site/participante-detalhe.css');
    	
    	$ministerios = $this->_dbm->listaMinisterios();
    	$pessoa = $this->_db->consultaPessoaPorId($this->getParam('f_pessoa_id'));
    	
    	$this->view->ministerios = $ministerios;
    	$this->view->pessoa = $pessoa[0];
    }
}