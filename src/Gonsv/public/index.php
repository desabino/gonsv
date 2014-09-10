<?php
// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));
	
// Define application is maintenance
defined('MAINTENANCE')
    || define('MAINTENANCE', (getenv('MAINTENANCE') ? getenv('MAINTENANCE') : 'false'));
	
if(MAINTENANCE == 'true') {
	header('Location: /maintenance.html');
}

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
	realpath(APPLICATION_PATH . '/../../../../library'),
    get_include_path()
)));

/**
 * @see Zend_Application
 */
require_once 'Zend/Application.php';

try {
	$application = new Zend_Application(
		APPLICATION_ENV,
		APPLICATION_PATH . '/configs/application.ini'
	);
	$application->bootstrap()->run();
}
catch(Exception $e) {
	//Tratando erros.
	echo '<!DOCTYPE html">
			<html lang="pt-br">
				<head>
					<meta charset="utf-8" />
					<title>Message: ' . $e->getMessage() . '</title>
				</head>
			<body>
				<h1>An error occurred</h1>
				<h3>Exception information:</h3>
				<p>
					<b>Message:</b> <pre>' . $e->getMessage() . '</pre><br />
					<b>Exception:</b> ' . get_class($e) . '<br />
				</p>
				<h3>Stack trace:</h3>
				<pre>' . $e->getTraceAsString() . '</pre>
			</body>
			</html>';
}