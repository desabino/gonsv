<?php

abstract class PublicPageController extends Zend_Controller_Action
{
	/**
	 * Variável padrão de mensagem
	 * @var array
	 * 
	 * show    => necessidade de exibição da mensagem (true/false).
	 * type    => tipo de mensagem a ser exibida (primary/success/info/warning/danger).
	 * message => texto da mensagem.
	 */
	protected $alert = array(
		'show'    => false,
		'type'    => null,
		'message' => null
	);
	
	/**
	 * URL completa que está sendo usada no momento.
	 * 
	 * @var string
	 */
	protected $url = null;
	
	/**
	 * Configurações primárias
	 * Executado após init
	 */
	public function preDispatch()
	{
		// Iniciando URL
		$this->url = sprintf(
			'%s://%s%s',
			$this->_request->getScheme(),
			$this->_request->getHttpHost(),
			$this->_request->getRequestUri()
		);
	}
	
	/**
	 * Redireciona para uma página específica
	 * 
	 * @param string $url
	 */
	public function redirect($url)
	{
		$to = sprintf(
			'%s:://%s%s',
			$this->_request->getScheme(),
			$this->_request->getHttpHost(),
			$url
		);
		parent::redirect($to);
	}	
	
	/**
	 * Altera o layout da página
	 * 
	 * @param  string $layout => nome do layout
	 * @return PublicPageController
	 */
	protected function setLayout($layout)
	{
		$this->_helper->layout->setLayout((string)$layout);
		return $this;
	}
	
	/**
	 * Desabilita o layout para a página
	 * 
	 * @return PublicPageController
	 */
	protected function setNoLayout()
	{
		$this->_helper->layout->disableLayout();
		return $this;
	}
	
	/**
	 * Altera a view da página
	 * 
	 * @param  string $view => nome da view
	 * @return PublicPageController
	 */
	protected function setView($view)
	{
		$this->_helper->viewRenderer->setScriptAction((string)$view);
		return $this;
	}
	
	/**
	 * Desabilita a view para a página
	 * 
	 * @return PublicPageController
	 */
	protected function setNoView()
	{
		$this->_helper->viewRenderer->setNoRender(true);
		return $this;
	}
}