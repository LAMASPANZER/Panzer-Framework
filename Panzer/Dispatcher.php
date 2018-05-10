<?php
namespace Panzer;

class Dispatcher
{
	function __construct(Router $router) {
		$route = $router->match();
			$className = '\App\Controllers\\'.ucfirst($route['target']);
			return call_user_func_array([new $className($router), $route['action'].'Action'], $route['params']);
	}
}
