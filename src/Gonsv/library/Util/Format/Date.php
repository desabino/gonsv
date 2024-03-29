<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 nowrap: */
/**
 * @category Library
 * @package Util
 * @subpackage Format
 * @author Leonardo C. Thibes <leonardothibes@yahoo.com.br>
 * @copyright Copyright (c) Os Autores
 * @version $Id: Date.php 20/10/2010 16:19:16 leonardo $
 */

/**
 * @see Util_Format_Abstract
 */
require_once 'Util/Format/Abstract.php';

/**
 * Util Format Date.
 *
 * @category Library
 * @package Util
 * @subpackage Format
 * @author Leonardo C. Thibes <leonardothibes@yahoo.com.br>
 * @copyright Copyright (c) Os Autores
 */
class Util_Format_Date extends Util_Format_Abstract
{
	/**
	 * Expressão regular para teste de data.
	 * @var string
	 */
	const Regex = '/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/';
	
	/**
	 * Testa se é uma data válido.
	 *
	 * @param mixed $data Data a ser verificada.
	 * @return bool
	 */
	static public function isValid($data = null)
	{
		if(!preg_match(self::Regex, $data)) {
			return false;
		}
		
		list($dia, $mes, $ano) = explode('/', $data);
		return checkdate((int)$mes, (int)$dia, (int)$ano);
	}
	
	/**
	 * Gera uma lista retoativa de anos a partir
	 * do ano atual ou um especificado.
	 *
	 * @param int $qtd Quantidade de anos desejados na lista.
	 * @param int $fim Ano base para a contagem retroativa(opcional).
	 *
	 * @return array
	 */
	static public function YearList($qtd = 10, $fim = null)
	{
		$fim  = strlen($fim) ? (int)$fim : date("Y");
    	$ini  = $fim - $qtd;
    	$year = array();
    	
    	for($i = $fim; $i >= $ini; $i--) {
    		$year[$i] = $i;
    	}
    	
    	return $year;
	}
	
	/**
	 * Gera uma lista retroativa de anos a partir de um range.
	 *
	 * @param int $ini Ano de início do range.
	 * @param int $fim Ano de fim do range(se não informar usa o atual).
	 *
	 * @return array
	 */
	static public function YearRange($ini, $fim = null)
	{
		$ini   = (int)$ini;
		$fim   = (int)(strlen($fim) ? $fim : date("Y"));
		$range = array();
		
		for($i = $fim; $i >= $ini; $i--) {
			$range[$i] = $i;
		}
		
		return $range;
	}
	
	/**
	 * Calcula o último dia do mês especificado.
	 *
	 * @param int $mes Mês a ser calculado.
	 * @param int $ano Ano a ser calculado.
	 *
	 * @return string Último dia do mês.
	 */
	static public function LastDay($mes = null, $ano = null)
	{
		$mes  = strlen($mes) ? (int)$mes : date("m");
		$ano  = strlen($ano) ? (int)$ano : date("Y");
		$data = mktime(0, 0, 0, $mes + 1, 1, $ano);
		return (int)date("d", $data - 1);
	}
	
	/**
	 * Retorna o nome do mês por extenso ou abreviado de acordo com o número do mês solicitado
	 *
	 * @param int  $mes Mês solicitado para troca.
	 * @param bool $abr Se ativado então abrevia o nome do mês.
	 *
	 * @return String
	 */
	static public function MonthName($mes, $abr = false)
	{
		$textomes = false;
		switch($mes) {
			case 1:
				$textomes = 'Janeiro';
			break;
			case 2:
				$textomes = 'Fevereiro';
			break;
			case 3:
				$textomes = 'Março';
			break;
			case 4:
				$textomes = 'Abril';
			break;
			case 5:
				$textomes = 'Maio';
			break;
			case 6:
				$textomes = 'Junho';
			break;
			case 7:
				$textomes = 'Julho';
			break;
			case 8:
				$textomes = 'Agosto';
			break;
			case 9:
				$textomes = 'Setembro';
			break;
			case 10:
				$textomes = 'Outubro';
			break;
			case 11:
				$textomes = 'Novembro';
			break;
			case 12:
				$textomes = 'Dezembro';
			break;
		}
		
		return $abr ? substr($textomes,0,3) : $textomes;
	}
	
	/**
	 * Função que retorna uma data vinda do banco para a tela
	 * 
	 * @param date $date
	 * @param string $type (datetime/date/time)
	 * 
	 * @return date
	 */
	static public function DbToScreen($date, $type = 'datetime')
	{
		try{
			$registry = Zend_Registry::getInstance();
			$locale = $registry->get('Zend_Locale');
			$date = Zend_Locale_Format::getDate($date, array('date_format' => 'yyyy-MM-dd HH:mm:ss', 'locale' => $locale));
			
			switch($type){
				case 'datetime':
					$date =  $date['day'] . '-' . $date['month'] . '-' . $date['year'] . ' ' . $date['hour'] . ':' . $date['minute'] . ':' . $date['second'];
					break;
				case 'date':
					$date =  $date['day'] . '-' . $date['month'] . '-' . $date['year'];
					break;
				case 'time':
					$date =  $date['hour'] . ':' . $date['minute'] . ':' . $date['second'];
					break;
				case 'birthday':
					$date = $date['day'] . ' de ' . Util_Format_Date::MonthName($date['month']);
			}
			
			return $date;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
	
	/**
	 * Função que retorna uma data vinda da tela para o banco
	 * 
	 * @param date $date
	 * @param string $type (datetime/date/time)
	 * 
	 * @return date
	 */
	static public function ScreenToDb($date, $type = 'datetime')
	{
		try {
			$registry = Zend_Registry::getInstance();
			$locale = $registry->get('Zend_Locale');
			$date = Zend_Locale_Format::getDate($date, array('date_format' => 'dd-MM-yyyy HH:mm:ss', 'locale' => $locale));
			
			switch ($type) {
				case 'datetime':
					$date =  $date['year'] . '-' . $date['month'] . '-' . $date['day'] . ' ' . $date['hour'] . ':' . $date['minute'] . ':' . $date['second'];
					break;
				case 'date':
					$date =  $date['year'] . '-' . $date['month'] . '-' . $date['day'];
					break;
				case 'time':
					$date =  $date['hour'] . ':' . $date['minute'] . ':' . $date['second'];
					break;
			}
			
			return $date;
		}
		catch(Exceptin $e)
		{
			return false;
		}
	}
}
