<?php

class Zend_View_Helper_Filter extends Zend_View_Helper_Abstract
{
	public function filter()
	{
		$form = new Form_Filter();
		
		$helper = new Zend_View_Helper_Partial();
		$helper->setView(new Zend_View());
		
		return $helper->partial('helper/filter.phtml', 'default', array(
			'form' => $form
		));
	}
}