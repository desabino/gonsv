<?php

class Util_Helper extends Zend_Controller_Action_Helper_Abstract
{
	static public function BasePath($file, $force = false)
	{
		$static = Zend_Registry::get('app')->staticPath;
		if($static->enable or $force) {
			// Retirando a barra do final da URL.
			if(substr($static->folder, -1, 1) == '/') {
				$static->folder = substr($static->folder, 0, strlen($static->folder) - 1);
			}
			
			// Concatenando URL com o caminho para o arquivo.
			return $static->folder . $file;
		}
		
		return $file;
	}
	
	/**
	 * Criar uma mensagem de alerta e armazena no objeto FlashMessenger
	 * 
	 * @param string $type    => tipo de mensagem a ser exibida (primary/success/info/warning/danger)
	 * @param string $message => mensagem a ser exibida
	 */
	static public function Alert($type, $message)
	{
		$alert = array(
			'type'    => $type,
			'message' => $message
		);
		$alert = Util_Format_Array::toObject($alert);
		return $alert;
		//$this->_helper->FlashMessenger($alert);
	}
}