<?php
namespace App\Models;

use Panzer\Database;

class Category extends Database
{
	public function GetCategory($string)
	{
		return self::$db->query("SELECT c.id, c.name, c.title FROM ".self::Table('categories')." c
	 									INNER JOIN ".self::Table('posts')." p  ON c.id = p.id_category
	 									WHERE c.name = '$string' and p.published = 1")->fetch(\PDO::FETCH_ASSOC);
	}

	public function GetPosts($string)
	{
		return self::$db->query("SELECT p.id, p.url, p.path_main_picture picture,
										s.firstname author_firstname, s.lastname author_lastname,
										p.title, p.description, p.date_published FROM ".self::Table('posts')." p
										INNER JOIN ".self::Table('categories')." c ON p.id_category = c.id
										INNER JOIN ".self::Table('staffs')." s ON p.id_staff = s.id
										WHERE c.name = '$string' AND p.published = 1 ORDER by p.date_published DESC")->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function GetRandomPosts($int)
	{
		return self::$db->query("SELECT title, url FROM ".self::Table('posts')."
										WHERE published = 1 ORDER by RAND() LIMIT $int")->fetchAll(\PDO::FETCH_ASSOC);
	}
}
