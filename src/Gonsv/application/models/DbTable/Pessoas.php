<?php

// Produto

class Model_DbTable_Pessoas extends Zend_Db_Table_Abstract
{
	protected $_name = 'pessoas';
	
	public function listaPessoas()
	{
		$select = $this->select()
					   ->from(array('p' => 'pessoas'))
					   ->order('p.nome');
		return $this->fetchAll($select);
	}
}