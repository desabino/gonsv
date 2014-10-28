<?php 

class Model_DbTable_Conta extends Zend_Db_Table_Abstract
{
    protected $_name = 'conta';
    
    public function saldoAtual($conta_id)
    {
        $select = $this->select()
                       ->setIntegrityCheck(false)
                       ->from(array('c' => 'conta'),
                              array('saldo' => 'ROUND(SUM(l.total),2)'))
                       ->joinLeft(array('l' => 'lancamento'),
                                   'l.id_conta = c.id_conta', array())
                       ->where('l.id_conta = ?', $conta_id)
                       ->group('c.nome');
        return $this->fetchAll($select);
    }
	
	public function comparaSenha($conta_id, $senha_atual)
	{
		$select = $this->select()
		               ->from(array('c' => 'conta'))
					   ->where('c.conta_id = ?', $conta_id)
					   ->where('c.senha = ?', $senha_atual);
		return $this->fetchAll($select);
	}
}