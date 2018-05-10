<?php
namespace App\Models;

use Panzer\Database;

class Categories extends Database
{
	public function IsCategory($string)
	{
		return self::$db->query("SELECT id FROM ".self::Table('categories')." WHERE name = '$string'")->fetch(\PDO::FETCH_ASSOC);
	}

	public function AddCategory($array){
		return self::$db->prepare("INSERT INTO ".self::Table('categories')."(title, name)
        VALUES(?,?)")->execute([$array['title'], $array['name']]);
	}

	public function GetCategories()
	{
		return self::$db->query("SELECT id, name, title FROM ".self::Table('categories')." ORDER by title ASC")->fetchAll(\PDO::FETCH_ASSOC);
	}
}
