<?php
namespace Panzer;

abstract class Database
{
	static private $config;
	static protected $db;

	public function __construct()
	{
		if (!DI::has('database')) {

			self::$config = DI::get('config')->database;
			$driver = self::$config->driver;

			call_user_func('\\'.__NAMESPACE__."\\Database::$driver");

			return self::$db = DI::register('database', self::$db);
		}

		return self::$db = DI::get('database');
	}

	static private function mysql()
	{
		self::$db = new \PDO('mysql:host='.self::$config->host.';dbname='.self::$config->dbname, self::$config->user, self::$config->password);
		self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		self::$db->exec("SET sql_mode = ''");
		self::$db->exec("SET NAMES utf8");
		return self::$db;
	}

	static public function addPrefix($name_table)
	{
		return self::$config->prefix_table.'_'.$name_table;
	}

	public function __call($name, $arguments)
	{
		throw new \Exception("Method \"$name\" doesn't exist");
	}

	public function __destruct()
	{
		self::$db = null;
	}
}
