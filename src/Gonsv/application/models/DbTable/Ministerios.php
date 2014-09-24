<?php

// Ministérios

class Model_DbTable_Ministerios extends Zend_Db_Table_Abstract
{
	protected $_name    = 'ministerios';
	protected $_primary = 'ministerio_id';
	
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
	
	/**
	 * 
	 * Pesquisa servos em um ministério específico
	 * @param int $ministerio_id
	 * @return array
	 */
	public function servosMinisterio($ministerio_id)
	{
		$select = $this->select()
                       ->setIntegrityCheck(false)
		               ->from(array('sm' => 'servo_ministerio'))
		               ->joinInner(array('m' => 'ministerios'),
                       	   'm.ministerio_id = sm.ministerio_id')
		               ->where('sm.ministerio_id = ?', $ministerio_id);
		return $this->fetchAll($select);
	}
	
	/**
	 * 
	 * Remove um ministério específico
	 * @param int $ministerio_id
	 */
	public function removeMinisterio($ministerio_id)
	{
		$where = $this->getAdapter()->quoteInto('ministerio_id = ?', $ministerio_id);
		$this->delete($where);
	}
}