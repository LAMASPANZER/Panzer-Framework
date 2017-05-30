<?php
namespace Panzer;

class Dispatcher
{
	public function __construct() {
		$route = DI::get('router')->match();
		$className = '\App\Controllers\\'.ucfirst($route['target']);
		return call_user_func_array([new $className, $route['action']], $route['params']);
	}
}
