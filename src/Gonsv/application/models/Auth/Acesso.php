<?php

// Model Auth Acesso

class Model_Auth_Acesso extends Zend_Db_Table_Abstract
{
    protected $_name = 'conta';
    
    public static function login($login, $senha)
    {
        $dbAdapter   = Zend_Db_Table::getDefaultAdapter();
        $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
        $authAdapter->setTableName('conta')
                    ->setIdentityColumn('email')
                    ->setCredentialColumn('senha')
                    ->setCredentialTreatment('SHA1(?)');
	
        //Define os dados para processar o login
        $authAdapter->setIdentity($login)
                    ->setCredential($senha);
                
        //Faz inner join dos dados do perfil no SELECT do Auth_Adapter
        $authAdapter->getDbSelect()
                    ->joinInner(array('ct' => 'conta_tipo'),
                               'ct.conta_tipo_id = conta.tipo');
        
        //Efetua o login
        $auth = Zend_Auth::getInstance();
        $result = $auth->authenticate($authAdapter);
		
        //Verifica se o login foi efetuado com sucesso
        if ($result->isValid()) {
            //Armazena os dados do usuário em sessão, apenas desconsiderando a senha do usuário
            $info = $authAdapter->getResultRowObject(null, 'senha');
			
            $usuario = new Model_Auth_User();
            $usuario->setIdUser($info->conta_id);
            $usuario->setFullName($info->nome);
            $usuario->setUserName($info->email);
            $usuario->setRoleId($info->texto_identificacao);
            $usuario->setNickName($info->nome . ' (' . $info->email . ')');
			
            $storage = $auth->getStorage();
            $storage->write($usuario);
            return $usuario->getRoleId();
        }
        throw new Exception('Usuario e/ou senha inválido(s)');
    }
    
    public static function atualizaSessao()
    {
    	$_db = new Model_DbTable_Conta();
    	$_usuario = Zend_Auth::getInstance()->getIdentity();
    	
    	$result  = $_db->find($_usuario->getIdUser());
    	$info    = $result[0];
    	$_usuario->setFullName($info->nome);
    	$_usuario->setUserName($info->email);
        $_usuario->setNickName($info->nome . ' (' . $info->email . ')');
    }
}