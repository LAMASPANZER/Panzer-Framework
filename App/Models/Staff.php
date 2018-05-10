<?php
namespace App\Models;

use Panzer\Database;

class Staff extends Database
{
	public function GetAuthor($int)
	{
		return self::$db->query("SELECT * FROM ".self::Table('staffs')." WHERE id = '$int'")->fetch(\PDO::FETCH_ASSOC);
	}

	public function GetPostsByAuthor($int)
	{
		return self::$db->query("SELECT c.title title_category,
										p.id id, p.id_category, p.url, p.title, p.finished, p.published, p.date_added FROM ".self::Table('posts')." p
										INNER JOIN ".self::Table('categories')." c ON p.id_category = c.id WHERE p.id_staff = '$int' ORDER by p.date_added DESC")->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function CountPostsPublishedByAuthor($int)
	{
		return self::$db->query("SELECT COUNT(*) FROM ".self::Table('posts')." WHERE id_staff = '$int' AND published = 1")->fetchColumn();
	}

	public function CountPostsNotFinishedByAuthor($int)
	{
		return self::$db->query("SELECT COUNT(*) FROM ".self::Table('posts')." WHERE id_staff = '$int' AND finished = 0")->fetchColumn();
	}
}
