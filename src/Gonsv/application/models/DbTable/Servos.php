<?php

// Servos

class Model_DbTable_Servos extends Zend_Db_Table_Abstract
{
	protected $_name    = 'servos';
	protected $_primary = 'servo_id';
	
	/**
	 * 
	 * Lista todos os servos em ordem alfabética.
	 * 
	 * @return array
	 */
	public function listaServos()
	{
		// SELECT p.pessoa_id,
		//        p.nome,
		//        p.data_nasc,
		//        m.ministerio_nome,
		//        s.ativo AS 'servo_ativo',
		//        sm.ativo AS 'servo_ministerio_ativo'
		//   FROM sabino_dev_gonsv.servos AS s
		//  INNER JOIN sabino_dev_gonsv.pessoas AS p ON p.pessoa_id = s.pessoa_id
		//  INNER JOIN sabino_dev_gonsv.servo_ministerio AS sm ON sm.servo_id = s.servo_id
		//  INNER JOIN sabino_dev_gonsv.ministerios AS m ON m.ministerio_id = sm.ministerio_id;
		$select = $this->select()
                       ->setIntegrityCheck(false)
					   ->from(array('s' => 'servos'),
					          array('servo_id', 'servo_ativo' => 's.ativo'))
					   ->joinInner(array('p' => 'pessoas'),
                       	   'p.pessoa_id = s.pessoa_id',
					       array('p.pessoa_id', 'p.nome', 'p.data_nasc'))
					   ->joinInner(array('sm' => 'servo_ministerio'),
                       	   'sm.servo_id = s.servo_id',
					       array('servo_ministerio_ativo' => 'sm.ativo'))
					   ->joinInner(array('m' => 'ministerios'),
                       	   'm.ministerio_id = sm.ministerio_id',
					       array('m.ministerio_id', 'm.ministerio_nome'))
					   ->order('p.nome');
		return $this->fetchAll($select);
	}
}