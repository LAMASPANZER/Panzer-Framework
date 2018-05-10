<?php
namespace App\Models;

use Panzer\Database;

class Home extends Database
{
	public function GetStaffs()
	{
		return self::$db->query("SELECT s.firstname, s.lastname, s.path_avatar, s.biography,
										COUNT(p.id) nbposts FROM ".self::Table('staffs')." s
										LEFT JOIN ".self::Table('posts')." p ON p.id_staff = s.id
										GROUP BY p.id_staff ORDER by s.id ASC ")->fetchAll(\PDO::FETCH_ASSOC);
	}

 	public function GetCategories()
 	{
 		return self::$db->query("SELECT c.name, c.title, c.path_picture, COUNT(p.id) AS total_posts FROM ".self::Table('categories')." c
 										INNER JOIN ".self::Table('posts')." p  ON c.id = p.id_category
 										WHERE p.published = 1 GROUP BY c.id ORDER by COUNT(p.url) DESC")->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function GetPosts()
	{
		return self::$db->query("SELECT c.title title_category, c.name name_category,
										p.path_main_picture picture, p.url, p.title, p.description, p.date_published,
										s.firstname author_firstname, s.lastname author_lastname FROM ".self::Table('posts')." p
										INNER JOIN ".self::Table('categories')." c ON p.id_category = c.id
										INNER JOIN ".self::Table('staffs')." s ON p.id_staff = s.id
										WHERE p.published = 1 ORDER by p.date_published DESC")->fetchAll(\PDO::FETCH_ASSOC);
	}
}
