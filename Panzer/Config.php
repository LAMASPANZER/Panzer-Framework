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
		return $this->config->$obj;
	}

	public function debug()
	{
		if ((in_array(('*'), $this->config->dev->ips_allowed)) or ($_SERVER['REMOTE_ADDR'] == '127.0.0.1'))
			return true;
		else
			return in_array($_SERVER['REMOTE_ADDR'], $this->config->dev->ips_allowed);
	}
}
