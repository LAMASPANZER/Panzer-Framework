<?php
namespace Panzer;

abstract class Controller
{
	private $route;
	protected $model;
	protected $view;

	final function __construct(Router $router)
	{
		$this->route = $router->getRoute();
		$this->view = new View($router);

		if (method_exists($this, 'onConstruct'))
			$this->OnConstruct();
	}

	final function __call($name, $arguments)
	{
		throw new \Exception("Method \"$name\" not found on controller \"".$this->route['target']."\"");
	}

	final protected function loadModel()
	{

		$className = 'App\\Models\\'.ucfirst($this->route['target']);
		if (!class_exists($className)) {
			throw new \Exception("Model \"$className\" not found");
		}
		return $this->model = new $className;
	}

	final protected function Redirect($route, array $params = array())
	{
		header('Location: '.View::Path($route, $params));
	}
}
