<?php
namespace App\Models;

use Panzer\Database;

class Exemple extends Database
{
	public function getTable()
	{
		return self::$db->query("SELECT * FROM ".self::addPrefix('table'))->fetchAll(\PDO::FETCH_ASSOC);
	}
}
