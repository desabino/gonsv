<?php

class Util_Helper_BasePath extends Zend_Controller_Action_Helper_Abstract
{
	public function BasePath($file, $force = false)
	{
		return Util_Helper::BasePath($file, $force);
	}
}