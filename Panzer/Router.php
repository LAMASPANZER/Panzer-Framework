<?php
namespace Panzer;

class Router
{
	private $route = null;
	private $routes = array();
	private $namedRoutes = array();
	private $basePath = '';
	private $matchTypes = array(
		'i'  => '[0-9]++',
		'a'  => '[0-9A-Za-z]++',
		't'  => '[0-9A-Za-z\-]++',
		'h'  => '[0-9A-Fa-f]++',
		'*'  => '.+?',
		'**' => '.++',
		''   => '[^/\.]++'
	);

	public function setBasePath($basePath) {
		$this->basePath = $basePath;
	}

	public function addRoutes($routes){
		if(!is_array($routes) && !$routes instanceof Traversable) {
			throw new \Exception('Routes should be an array or an instance of Traversable');
		}
		foreach($routes as $route) {
			call_user_func_array(array($this, 'map'), $route);
		}
	}

	private function map($method, $route, $target, $action, $name) {
		$this->routes[] = array($method, $route, $target, $action, $name);

		if(isset($this->namedRoutes[$name])) {
			throw new \Exception("Can not redeclare route '{$name}', line: $e->getLine()");
		} else {
			$this->namedRoutes[$name] = $route;
		}
		return;
	}

	public function match($requestUrl = null, $requestMethod = null) {

		$params = array();
		$match = false;

		if($requestUrl === null) {
			$requestUrl = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
		}

		$requestUrl = substr($requestUrl, strlen($this->basePath));

		if (($strpos = strpos($requestUrl, '?')) !== false) {
			$requestUrl = substr($requestUrl, 0, $strpos);
		}

		if($requestMethod === null) {
			$requestMethod = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';
		}

		$_REQUEST = array_merge($_GET, $_POST);

		foreach($this->routes as $handler) {
			list($method, $_route, $target, $action, $name) = $handler;

			$methods = explode('|', $method);
			$method_match = false;

			foreach($methods as $method) {
				if (strcasecmp($requestMethod, $method) === 0) {
					$method_match = true;
					break;
				}
			}

			if(!$method_match) continue;

			if ($_route === '*') {
				$match = true;
			} elseif (isset($_route[0]) && $_route[0] === '@') {
				$match = preg_match('`' . substr($_route, 1) . '`u', $requestUrl, $params);
			} else {
				$route = null;
				$regex = false;
				$j = 0;
				$n = isset($_route[0]) ? $_route[0] : null;
				$i = 0;

				while (true) {
					if (!isset($_route[$i])) {
						break;
					} elseif (false === $regex) {
						$c = $n;
						$regex = $c === '[' || $c === '(' || $c === '.';
						if (false === $regex && false !== isset($_route[$i+1])) {
							$n = $_route[$i + 1];
							$regex = $n === '?' || $n === '+' || $n === '*' || $n === '{';
						}
						if (false === $regex && $c !== '/' && (!isset($requestUrl[$j]) || $c !== $requestUrl[$j])) {
							continue 2;
						}
						$j++;
					}
					$route .= $_route[$i++];
				}

				$regex = $this->compileRoute($route);
				$match = preg_match($regex, $requestUrl, $params);
			}

			if(($match == true || $match > 0)) {

				if($params) {
					foreach($params as $key => $value) {
						if(is_numeric($key)) unset($params[$key]);
					}
				}

				return $this->route = array(
							'target' => $target,
							'action' => $action,
							'params' => $params,
							'name' => $name
				);
			}
		}
		throw new \Exception("No route found", 404);

	}

	public function properties() {
		return ['basePath'=>$this->basePath, 'route'=>$this->route, 'routes'=>$this->routes, 'namedRoutes'=>$this->namedRoutes];
	}

	public function getRoute() {
		return $this->route;
	}

	private function compileRoute($route) {
		if (preg_match_all('`(/|\.|)\[([^:\]]*+)(?::([^:\]]*+))?\](\?|)`', $route, $matches, PREG_SET_ORDER)) {

			$matchTypes = $this->matchTypes;
			foreach($matches as $match) {
				list($block, $pre, $type, $param, $optional) = $match;

				if (isset($matchTypes[$type])) {
					$type = $matchTypes[$type];
				}
				if ($pre === '.') {
					$pre = '\.';
				}

				$pattern = '(?:'
						. ($pre !== '' ? $pre : null)
						. '('
						. ($param !== '' ? "?P<$param>" : null)
						. $type
						. '))'
						. ($optional !== '' ? '?' : null);

				$route = str_replace($block, $pattern, $route);
			}

		}
		return "`^$route$`u";
	}
}
