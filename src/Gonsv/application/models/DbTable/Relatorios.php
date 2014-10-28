<?php
/**
 * Relatórios
 */

class Model_DbTable_Relatorios extends Zend_Db_Table_Abstract
{
	protected $_name    = 'pessoas';
	
	public function Integracao($newsletter = 0)
	{
		$select = $this->select()
		               ->from(array('p' => 'pessoas'),
		                      array('pessoa_id', 'nome', 'email', 'newsletter'))
		               ->where('p.newsletter = ?', $newsletter)
					   ->orwhere('p.newsletter IS NULL')
		               ->where('p.email <> ?', '');
		               
		return $this->fetchAll($select);
	}
}