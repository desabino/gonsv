<?php
/**
 * @category Library
 * @package Util
 * @subpackage Format
 * @author Leonardo C. Thibes <leonardothibes@yahoo.com.br>
 * @copyright Copyright (c) Os Autores
 * @version $Id: Number.php 23/11/2010 15:52:24 leonardo $
 */

/**
 * @see Util_Format_Abstract
 */
require_once 'Util/Format/Abstract.php';

/**
 * Util Format Number.
 *
 * @category Library
 * @package Util
 * @subpackage Format
 * @author Leonardo C. Thibes <leonardothibes@yahoo.com.br>
 * @copyright Copyright (c) Os Autores
 */
class Util_Format_Number extends Util_Format_Abstract
{
	/**
	 * Formatos de moeda possíveis.
	 */
	const DOLAR = 'U$';
	const EURO  = '€$';
	const REAL  = 'R$';
	
	/**
	 * Testa se é um número válido.
	 *
	 * @param mixed $data Número a ser verificado.
	 * @return bool
	 */
	static public function isValid($data = null)
	{
		return is_numeric($data);
	}
	
	/**
	 * Inclui um separador em um número grande para ficar melhor visível.
	 *
	 * IMPORTANTE: O retorno deste método é apenas ilustativo e NÃO
	 *             DEVE ser usado para cálculos.
	 *
	 * @param int $data Número a ser formatado.
	 * @return string
	 */
	static public function toScreen($data)
	{
		return (string)number_format((int)$data, 0, '.', '.');
	}
	
	/**
     * Adiciona zeros a esquerda de um número.
     *
     * IMPORTANTE: O retorno deste método é apenas ilustativo e NÃO
	 *             DEVE ser usado para cálculos
     *
     * @param int $data Número a ser formatado.
     * @param int $size Tamanho final da string.
     *
     * @return array
     */
	static public function LeftZero($number, $size = 7)
	{
		$len  = (int)strlen($number);
		$size = (int)$size;
		
		if($len >= $size) {
			return self::toScreen($number);
		}
		
		$diff   = (int)$size - (int)$len;
		$number = self::toScreen($number);
		return (string)str_repeat('0', $diff) . '.' . $number;
	}
	
	/**
	 * Formata um número como valor monetário para aparecer na tela.
	 *
	 * IMPORTANTE: O retorno deste método é apenas ilustativo e não
	 *             deve ser usado para cálculos.
	 *
	 * @param float|int $data   Número a ser formatado.
	 * @param string    $format Formato("br" ou "us");
	 *
	 * @return false|string
	 */
	static public function toMoney($data, $format = self::REAL)
	{
		if(!is_numeric($data)) {
			return false;
		}
		
		switch($format) {
			case self::REAL:
			case self::EURO:
				return (string)number_format($data, 2, ',', '.');
			break;
			case self::DOLAR:
				return (string)number_format($data, 2, '.', ',');
			break;
			default:
				return false;
			break;
		}
	}
	
	/**
	 * Formata o número para exibição na tela ou prepara para banco de dados
	 * @param unknown_type $data
	 */
	static public function moneyDb($data)
	{
		if($data == '') {
			return false;
		}
		else{
			// Retirando pontuações
			$arrData = explode('.', $data);
			$data    = implode('', $arrData);
			
			// Alterando vírgula por ponto
			$arrData = explode(',', $data);
			$data    = implode('.', $arrData);
			
			return $data;
		}
	}
	
	/**
	 * Formata um número de registro (como um id) para exibição na tela
	 * como número de documento "0000000" (sete dígitos)
	 * @param string $number
	 */
	static public function toDocto($number)
	{
		if(is_numeric($number)){
		    $newnumber = str_pad($number, 7, '0', STR_PAD_LEFT);
		}
		else {
			$newnumber = $number;
		}
		
		return $newnumber;
	}
	
	/**
	 * Formata um telefone somente número com máscara (xx) x-xxxx-xxxx
	 * 
	 * @param  string $number
	 * @return string $newn
	 */
	static public function toPhone($number)
	{
		$type = null;
		$newn = '';
		if(strlen($number) == 11) {
			$type = 'cell';
		}
		else if(strlen($number) == 10) {
			$type = 'phone';
		}
		
		switch ($type){
			case 'cell':
				$ddd   = substr($number, 0, 2);
				$ncell = substr($number, 2, 1);
				$pre   = substr($number, 3, 4);
				$pos   = substr($number, 7, 4);
				$newn  = '(' . $ddd . ') ' . $ncell . '-' . $pre . '-' . $pos;
				break;
			case 'phone':
				$ddd   = substr($number, 0, 2);
				$pre   = substr($number, 2, 4);
				$pos   = substr($number, 6, 4);
				$newn  = '(' . $ddd . ') ' . $pre . '-' . $pos;
				break;
			default:
				$newn  = $number;
		}
		return $newn;
	}
	
	/**
	 * Formata um telefone somente número com máscara xx.xxxxxxxxx
	 * 
	 * @param  string $number
	 * @return string $new_number
	 */
	static public function toSimplePhone($number)
	{
		$size = strlen($number);
		if($size >= 10) {
			$ddd        = substr($number, 0, 2);
			$number     = substr($number, 2);
			$new_number = $ddd . '.' . $number;
		}
		else {
			$new_number = $number;
		}
		
		return $new_number;
	}
}
