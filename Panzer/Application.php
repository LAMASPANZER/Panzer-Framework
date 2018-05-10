<?php
namespace Panzer;

class Application
{
	static private $configs;
	static private $timestart;

	function __construct()
	{
		setlocale(LC_TIME, 'fr_FR.utf8','fra');
		date_default_timezone_set('Europe/Paris');
		set_error_handler('Panzer\Debug::errorHandler');
		set_exception_handler('Panzer\Debug::exceptionHandler');

		self::$timestart = microtime(true);
		self::$configs = $this->loadConfig();

		$router = new Router();
		$router->addRoutes(self::$configs->routes);

		return new Dispatcher($router);
	}

	private function loadConfig()
	{
		$configs = file_get_contents('../App/configs.json');
		return json_decode($configs);
	}

	static public function getConfigs($obj)
	{
		return self::$configs->$obj;
	}
	static public function getTimestart()
	{
		return (number_format(microtime(true)-self::$timestart, 4)).'s';
	}

}
