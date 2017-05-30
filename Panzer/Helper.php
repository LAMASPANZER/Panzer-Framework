<?php
namespace Panzer;

abstract class Helper
{
	private $model;

	final public function __get($name)
	{
		if ($name == 'model') {

			if (!is_object($this->model)){

				$className = 'App\\Helpers\\Models\\'.ucfirst(substr(strrchr(get_called_class(), "\\"), 1));
				$this->model =  new $className;
			}

			return $this->model;
		}

		if (!DI::has($name)) {

			if ($name == 'view') {
				return DI::register($name, new View);
			}

			if ($name == 'response') {
				return DI::register($name, new Response);
			}
			throw new \Exception("'$name' not found in DI");

		}
		return DI::get($name);
	}
}
