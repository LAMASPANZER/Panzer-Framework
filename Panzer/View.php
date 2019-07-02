<?php
namespace Panzer;

use Smarty;

class View
{
	static private $properties;

	private $engine;
	private $view;

	function __construct()
	{
		self::$properties = DI::get('router')->properties();

		$this->engine = DI::register('smarty', new Smarty);

		$this->engine->debugging = (DI::get('config')->debug()==2)?1:0;
		$this->engine->caching = (DI::get('config')->debug())?0:2;

		//	$this->engine->force_compile = 1;


		$this->engine->cache_lifetime = 86400;
		//$this->engine->left_delimiter = '{%';
		//$this->engine->right_delimiter = '%}';

		$this->engine
		->setConfigDir(realpath(__DIR__).'/../App/Views')
		->setCacheDir(realpath(__DIR__).'/../App/Views/_cache')
		->setTemplateDir(realpath(__DIR__).'/../App/Views')
		->setCompileDir(realpath(__DIR__).'/../App/Views/_compiled')
		->addPluginsDir(realpath(__DIR__).'/../App/Views/_plugins')
		->registerClass('View',__NAMESPACE__ .'\View')
		//->register_object('View',$this,array('path'))
		->configLoad('vars.conf');
	}

	/**
	 * @return Forward on class engine if no method in $this
	 */
	public function __call($method, $params)
	{
		return call_user_func_array([$this->engine, $method], $params);
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

	/**
	 *
	 * @param type|null $view
	 * @param type|null $index
	 * @return type
	 */
	public function use($view=null, $index=null)
	{
		$this->view = [$view, $index];
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

		self::$properties = DI::get('router')->properties();

		if(!isset(self::$properties['namedRoutes'][$routeName]))
			throw new \Exception("Route '{$routeName}' does not exist.");

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

		if (!DI::get('config')->debug() && $trimed)
			$this->engine->loadFilter('output', 'trimwhitespace');

		$this->engine->display('pages/'.$this->view[0].'.tpl', $this->view[1]);
	}

	public function renderError($code)
	{
		//if (!DI::get('config')->debug())
		//	$this->engine->loadFilter('output', 'trimwhitespace');
		$this->engine->display(realpath(__DIR__).'/../App/Views/_http_responses/'.$code.'.tpl','http_reponse_code_'.$code);
	}
}
