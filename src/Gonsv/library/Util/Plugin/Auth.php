<?php

// Util Plugin Auth

class Util_Plugin_Auth extends Zend_Controller_Plugin_Abstract
{

    /**
     *
     * @var Zend_Auth
     */
    protected $_auth;

    protected $_acl;
    protected $_action;
    protected $_controller;
    protected $_currentRole;

    /**
     * Construtor do plugin Auth
     */
    public function __construct(Zend_Acl $acl, array $options = array()) {
        $this->_auth = Zend_Auth::getInstance();
        $this->_acl  = $acl;
    }
    
    /**
     *  Execução antes da inicialização
     */
    public function preDispatch(Zend_Controller_Request_Abstract $request) {

        $this->_init($request);        

        // if the current user role is not allowed to do something
        if (!$this->_acl->isAllowed($this->_currentRole, $this->_controller, $this->_action)) {
            if ('guest' == $this->_currentRole) {
                $request->setControllerName('acesso');
                $request->setActionName('index');
            }
            else {
                $request->setControllerName('error');
                $request->setActionName('noauth');
            }
        }
    }
    
    /**
     * Inicializa a verificação
     */
    protected function _init($request) {
        $this->_action      = $request->getActionName();
        $this->_controller  = $request->getControllerName();
        $this->_currentRole = $this->_getCurrentUserRole();
    }
    
    /**
     * Recupera o perfil do usuário logado
     */
    protected function _getCurrentUserRole()
    {
        if ($this->_auth->hasIdentity()) {
            $authData = $this->_auth->getIdentity();
            if($authData->getRoleId()){
                $role = strtolower($authData->getRoleId());
            }
            else {
                $role = 'guest';
            }
        }
        else {
            $role = 'guest';
        }
        return $role;
    }

    /**
     * Recupera a acl atual
     */
    public function _getAcl()
    {
        return $this->_acl;
    }
}