<?php

// Estado Civil

class Model_DbTable_EstadoCivil extends Zend_Db_Table_Abstract
{
	protected $_name = 'estado_civil';
	
	/**
	 * 
	 * Lista todos os estados civis em ordem alfabética.
	 * 
	 * @return array
	 */
	public function listaEstadosCivis()
	{
		$select = $this->select()
					   ->from(array('ec' => 'estado_civil'))
					   ->order('ec.estado_civil_nome');
		return $this->fetchAll($select);
	}
}