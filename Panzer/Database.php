<?php
namespace Panzer;

abstract class Database
{
	static protected $db;

	public function __construct()
	{

		if (!DI::has('database')) {

			$config = DI::get('config')->mysql;

			self::$db = new \PDO('mysql:host='.$config->host.';dbname='.$config->dbname, $config->user, $config->password);
			self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			self::$db->exec("SET sql_mode = ''");
			self::$db->exec("SET NAMES utf8");

			return self::$db = DI::register('database', self::$db);
		}

		return self::$db = DI::get('database');
	}

	static public function table($name)
	{
		return DI::get('config')->mysql->prefix.$name;
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
