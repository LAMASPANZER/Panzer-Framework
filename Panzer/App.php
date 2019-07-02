<?php
namespace Panzer;

class App
{
	private $executiontime;

	function __construct()
	{

		$this->executiontime = microtime(true);

		DI::register('kernel', $this);

		$config = DI::register('config', new Config);

		setlocale(LC_TIME, 'fr_FR.utf8','fra');
		date_default_timezone_set($config->date_default_timezone_set);
		ini_set('default_charset', $config->default_charset);

		DI::register('handler', new Handler);

		$router = DI::register('router', new Router($config->routes));

		return new Dispatcher();
	}

	public function getExecutionTime()
	{
		return (number_format(microtime(true)-$this->executiontime, 4)).'s';
	}

}
