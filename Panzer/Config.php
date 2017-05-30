<?php
namespace Panzer;

class Config
{
	private $config;

	public function __construct()
	{
		$this->config = json_decode(file_get_contents('../App/app.json'));
	}

	public function __get($obj)
	{
		if (isset($this->config->$obj))
			return $this->config->$obj;

		throw new \Error("The key '$obj' doesn't exist in app.json,", 500);
	}

	public function getRoutes()
	{
		# code...
	}

	public function debug()
	{
		if(!isset($this->config->debug)) return false;

		if ((in_array(('*'), $this->config->debug->ips_allowed)) or ($_SERVER['REMOTE_ADDR'] == '127.0.0.1'))
			return true;
		else
			return in_array($_SERVER['REMOTE_ADDR'], $this->config->debug->ips_allowed);

	}
}
