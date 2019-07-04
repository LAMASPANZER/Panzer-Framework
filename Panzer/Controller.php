<?php
namespace Panzer;

abstract class Controller
{
	final public function __get($name)
	{
		if (!DI::has($name)) {

			if ($name == 'model') {
				$className = 'App\\Models\\'.ucfirst(substr(strrchr(get_called_class(), "\\"), 1));
				return DI::register($name, new $className);
			}

			if ($name == 'helper') {
				$className = 'App\\Helpers\\'.ucfirst($name);
				return DI::register($name, new $className);
			}

			if ($name == 'view') {
				return DI::register($name, new View);
			}

			if ($name == 'response') {
				return DI::register($name, new Response);
			}

			throw new \Exception("Properties '$name' not found in DI");
		}

		return DI::get($name);
	}

	final public function __call($name, $arguments)
	{
		throw new \Exception("Method '$name' not found in controller");
	}
}
