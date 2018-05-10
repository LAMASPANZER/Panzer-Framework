<?php
namespace App\Models;

use Panzer\Database;

class Gallery extends Database
{
	public function GetPictures()
	{
		return self::$db->query("SELECT * FROM ".self::Table('pictures')." ORDER BY date_published DESC")->fetchAll(\PDO::FETCH_ASSOC);
	}
}
