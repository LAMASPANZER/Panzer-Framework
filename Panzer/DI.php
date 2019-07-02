<?php
namespace Panzer;

/**
 * Injection of dependency
 */
abstract class DI
{
	/**
	 * @var Container
	 */
	static private  $c = array();

	/**
	 * Description
	 * @param Name of object
	 * @return object
	 */
	static public function get(String $name)
	{
		return self::$c[$name];
	}

	/**
	 * Check if $name exist
	 * @param Name of object
	 * @return bool
	 */
	static public function has(String $name)
	{
		return isset(self::$c[$name]);
	}

	/**
	 * Description
	 * @param Name of object
	 * @param Instance of object
	 * @return object
	 */
	static public function register(String $name, $instance)
	{
		return self::$c[$name] = $instance;
	}
}
