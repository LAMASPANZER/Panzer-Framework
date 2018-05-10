<?php
namespace Panzer;

use Smarty;

class View
{
	static private $properties;

	private $engine;
	private $view;

	function __construct(Router $router=null)
	{
		if ($router)
			self::$properties = $router->properties();

		$this->engine = new Smarty();

		$this->engine->debugging = (Application::getConfigs('debug')==2)?1:0;
		$this->engine->caching = 2;

		if (Application::getConfigs('debug'))
			$this->engine->force_compile = 1;

		$this->engine->cache_lifetime = 86400;
		//$this->engine->left_delimiter = '{%';
		//$this->engine->right_delimiter = '%}';

		$this->engine->setConfigDir(realpath(__DIR__).'/../App/Views')
		->setCacheDir(realpath(__DIR__).'/../App/Views/_cache')
		->setTemplateDir(realpath(__DIR__).'/../App/Views')
		->setCompileDir(realpath(__DIR__).'/../App/Views/_compiled')
		->registerClass('View',__NAMESPACE__ .'\View')
		->registerClass('ViewDependency','\App\Scopes\ViewDependency')
		->registerClass('ModelGlobal','\App\Scopes\ModelGlobal')
		->configLoad('www.conf');
	}

	/**
	 * Register a class for use in the templates
	 * @param string class_name
	 * @param string class_impl
	 * @return void
	 */
	public function registerClass($class, $namespace)
	{
		$this->engine->registerClass($class,__NAMESPACE__ .'\\'.$namespace);
	}


	public function set($view=null, $index=null)
	{
		$this->view = [(!$view)?self::$properties['route']['target']:$view, $index];
	}

	/**
	 * Returns true if there is a valid cache for this template
	 * @return bool
	 */
	public function isCached()
	{
		return ($this->engine->isCached('page.'.$this->view[0].'.tpl', $this->view[1]))? true : false;
	}

	/**
	 * Assign variables/objects to the templates
	 * @param array ex: ['foo', $bar]
	 * @return void
	 */
	public function assign($array)
	{
		$this->engine->assign($array);
	}

	/**
	 * Clears the entire template cache / Clears the compiled version of the specified template
	 * @return void
	 */
	public function clearAll()
	{
		$this->engine->clearCompiledTemplate();
		$this->engine->clearAllCache();
	}

	static public function asset($path, $forcehttps=false)
	{
		return (!$forcehttps) ? null: 'http:' . "//$_SERVER[HTTP_HOST]/".$path;
	}

	static public function path($routeName, array $params = array(), $fqdn=false) {

		if(!isset(self::$properties['namedRoutes'][$routeName])) {
			throw new \Exception("Route '{$routeName}' does not exist.");
		}

		$route = self::$properties['namedRoutes'][$routeName];

		$url = self::$properties['basePath'] . $route;

		if (preg_match_all('`(/|\.|)\[([^:\]]*+)(?::([^:\]]*+))?\](\?|)`', $route, $matches, PREG_SET_ORDER)) {

			foreach($matches as $match) {
				list($block, $pre, $type, $param, $optional) = $match;

				if ($pre) {
					$block = substr($block, 1);
				}

				if(isset($params[$param])) {
					$url = str_replace($block, $params[$param], $url);
				} elseif ($optional) {
					$url = str_replace($pre . $block, '', $url);
				}
			}

		}

		return (!$fqdn)?$url:((isset($_SERVER['HTTPS']))?'https':$_SERVER['REQUEST_SCHEME']).'://'.$_SERVER['HTTP_HOST'].$url;
	}

	/**
	 * Displays the template
	 * @param bool cached
	 * @param int cache_lifetime
	 * @param bool trimwhitespace
	 * @return void
	 */
	public function render($cached=true, $lifetime=null, $trimed=true)
	{
		header('content-type: text/html; charset=utf-8');
		if ($lifetime)
			$this->engine->cache_lifetime = $lifetime;

		if (!$cached)
			$this->engine->caching = 0;

		if (!Application::getConfigs('debug') && $trimed)
			$this->engine->loadFilter('output', 'trimwhitespace');

		$this->engine->display('page.'.$this->view[0].'.tpl', $this->view[1]);
	}

	public function renderError($status, $render=true)
	{
		switch ($status) {
			case 400: 	 header('HTTP/1.1 400 Bad Request');	break;
			case 401: 	 header('HTTP/1.1 401 Auth Required');	break;
			case 403: 	 header('HTTP/1.1 403 Forbidden');		break;
			case 404: 	 header('HTTP/1.1 404 Not Found'); 		break;
			case 409: 	 header('HTTP/1.1 409 Conflict');		break;
			case 500: 	 header('HTTP/1.1 500 Internal Server Error');	break;
		}

		if (!Application::getConfigs('debug'))
			$this->engine->loadFilter('output', 'trimwhitespace');

		if ($render)
			$this->engine->display('error.'.$status.'.tpl');
	}
}
