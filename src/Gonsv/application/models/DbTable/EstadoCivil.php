<?php

// Ministérios

class Model_DbTable_Ministerios extends Zend_Db_Table_Abstract
{
	protected $_name = 'ministerios';
	
	/**
	 * 
	 * Lista todos os ministérios em ordem alfabética.
	 * 
	 * @return array
	 */
	public function listaMinisterios()
	{
		$select = $this->select()
					   ->from(array('m' => 'ministerios'))
					   ->order('m.ministerio_nome');
		return $this->fetchAll($select);
	}
}