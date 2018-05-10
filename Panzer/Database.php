<?php
namespace Panzer;

abstract class Database
{
	static private $config;
	static protected $db;

	public function __construct()
	{
		if (!is_callable(self::$db)) {
			self::$config = Application::getConfigs('database');
			self::$db = new \PDO('mysql:host='.self::$config->host.';dbname='.self::$config->name, self::$config->user, self::$config->password);
			self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			self::$db->exec("SET sql_mode = ''");
			self::$db->exec("SET NAMES utf8");
		}
		return self::$db;
	}

	static public function table($name)
	{
		return self::$config->prefix.'_'.$name;
	}

	final function __call($name, $arguments)
	{
		throw new \Exception("Method \"$name\" doesn't exist");
	}

	public function __destruct()
	{
		self::$config = null;
		self::$db = null;
	}
}
