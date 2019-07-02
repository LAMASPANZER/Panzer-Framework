<?php
namespace App\Models;

use Panzer\Database;

class Exemple extends Database
{
	public function getPersonals()
	{
		return self::$db->query("SELECT id, lastname, firstname FROM ".self::Table('personals'))->fetchAll(\PDO::FETCH_ASSOC);
	}
}
