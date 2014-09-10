<?php

class Model_Auth_User implements Zend_Acl_Role_Interface
{
    private $_idUser;
    private $_userName;
    private $_roleId;
    private $_fullName;
    private $_nickName;
	
    /**
     * Id User (idusuario)
     */
    public function getIdUser()
    {
        return $this->_idUser;
    }
 
    public function setIdUser($idUser)
    {
        $this->_idUser = (string) $idUser;
    }
	
    /**
     * User Name (email)
     */
    public function getUserName()
    {
        return $this->_userName;
    }
 
    public function setUserName($userName)
    {
        $this->_userName = (string) $userName;
    }
	
    /**
     * Full Name (nome)
     */
    public function getFullName()
    {
        return $this->_fullName;
    }
 
    public function setFullName($fullName)
    {
        $this->_fullName = (string) $fullName;
    }
	
    /**
     * Role Id (perfil)
     */
    public function getRoleId()
    {
        return $this->_roleId;
    }
 
    public function setRoleId($roleId)
    {
        $this->_roleId = (string) $roleId;
    }
	
    /**
     * Nick Name (nome_tela)
     */
    public function getNickName()
    {
        return $this->_nickName;
    }
 
    public function setNickName($nickName)
    {
        $this->_nickName = (string) $nickName;
    }
}