<?php
/**
 * Pessoas (Participantes)
 */

class Model_DbTable_Pessoas extends Zend_Db_Table_Abstract
{
	protected $_name    = 'pessoas';
	protected $_primary = 'pessoa_id';
	
	/**
	 * Lista todas as pessoas cadastradas
	 * 
	 * @return array
	 */
	public function listaPessoas()
	{
		$select = $this->select()
                       ->setIntegrityCheck(false)
					   ->from(array('p' => 'pessoas'))
		               ->joinLeft(array('s' => 'servos'),
                       	   'p.pessoa_id = s.pessoa_id',
		                   'ativo')
					   ->order('p.nome');
		return $this->fetchAll($select);
	}
	
	/**
	 * Consulta uma pessoa em específico por id
	 * 
	 * @param int $pessoa_id
	 * 
	 * @return array
	 */
	public function consultaPessoaPorId($pessoa_id)
	{
		$select = $this->select()
		               ->from(array('p' => 'pessoas'))
		               ->where('p.pessoa_id = ?', $pessoa_id);
		return $this->fetchAll($select);
	}
	
	/**
	 * Atualiza uma pessoa em específico
	 * 
	 * @param array $pessoa
	 * 
	 * @return int $pessoa_id
	 */
	public function atualizaPessoa($pessoa)
	{
		$where = $this->getAdapter()->quoteInto('pessoa_id = ?', $pessoa['pessoa_id']);
		return $this->update($pessoa, $where);
	}
}