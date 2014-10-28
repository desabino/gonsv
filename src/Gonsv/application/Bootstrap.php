<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{	
    /**
     * Firebug PHP
     * 
     * use exemple:
     * $logger = Zend_Registry::get('logger');
     * $logger->info($usuario);
     */
    protected function _initLogger()
    {
        $logger = new Zend_Log();

        if(APPLICATION_ENV != 'production'){
            $writer = new Zend_Log_Writer_Firebug();
            $logger->addWriter($writer);
        }
        Zend_Registry::set('logger', $logger);
        return $logger;
    }
    
    /**
     * Carrega configurações básicas do Site
     */
    protected function _initConfigFile()
    {
    	$file = APPLICATION_PATH . '/configs/application.ini';
    	$config = new Zend_Config_Ini($file, APPLICATION_ENV);
    	Zend_Registry::set('app', $config);
    }
    
    /**
     * Carrega configurações da ACL
     */
    protected function _initLoadAclIni()
    {
        $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/acl.ini');
        Zend_Registry::set('acl', $config);
    }
    
    /**
     * ACL
     */
    protected function _initAclControllerPlugin()
    {
        $this->bootstrap('frontcontroller');
        $this->bootstrap('loadAclIni');
	
        $front = Zend_Controller_Front::getInstance();
	
        $aclPlugin = new Util_Plugin_Auth(new Util_Acl_Setup());
	
        $front->registerPlugin($aclPlugin);
    }
	
    /**
     * Autoloader (Namespace)
     */
    protected function _initAutoload()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array(
            'basePath' => APPLICATION_PATH,
            'namespace' => ''
        ));
        return $autoloader;
    }
	
    /**
     * Routes
     */
    protected function _initRoutes()
    {
        // get router
        $front = Zend_Controller_Front::getInstance();
        $router = $front->getRouter();

        $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/routes.ini', 'production');
        $router->addConfig($config, 'routes');
    }
	
    /**
     * Navigation
     */
    /*
    protected function _initNavigationMenu()
    {	
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view   = $layout->getView();
		
        $pages     = new Zend_Config_Ini(APPLICATION_PATH . '/configs/navigation.ini', 'menu');
        $container = new Zend_Navigation($pages);
        $view->navigation($container);		
    }
    */
	
    /**
     * Layout (Doctype, etc.)
     */
    protected function _initPlaceholders()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        //$view->doctype('HTML5');
		
        $view->headTitle('GO Nsa Senhora das Vitórias')
             ->setSeparator(' :: ');
		
        // Definindo css default
        $view->css = array('/css/util/bootstrap.min.css',
        				   '/css/jquery/fancybox/fancybox.css',
                           '/css/util/font-gothic.css',
        				   '/css/site/styles.css'
        				  );
		
        // Definindo js default
        $view->js = array ('/js/jquery/jquery.js',
        				   '/js/util/bootstrap.min.js',
        				   '/js/jquery/fancybox/fancybox.js',        				   
        				   '/js/jquery/mask.min.js',
        				   '/js/jquery/livefilter.min.js',
        				   '/js/site/site.js'
        				  );
    }
    
    /**
     * Locale
     */
    protected function _initLocale()
    {
        $locale   = new Zend_Locale('pt_BR');		
        $registry = Zend_Registry::getInstance();
        $registry->set('Zend_Locale', $locale);
    }
    
    /**
     * Email Transport
     */
    /*
    protected function _initDefaultEmailTransport()
    {
        // sem dados de smtp
        //$mailTransport = new Zend_Mail_Transport_Sendmail('email address');
        //Zend_Mail::setDefaultTransport($mailTransport);
				
        $emailConfig = $this->getOption('email');
        $smtpAddress = $emailConfig['transportOptionSmtp']['host'];
        unset($emailConfig['transportOptionSmtp']['host']);
		
        $mailTransport = new Zend_Mail_Transport_Smtp($smtpAddress, $emailConfig['transportOptionSmtp']);
        Zend_Mail::setDefaultTransport($mailTransport);
    }
    */
}