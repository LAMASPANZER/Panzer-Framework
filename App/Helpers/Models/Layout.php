<?php
namespace App\Helpers\Models;

use Panzer\Database;

class Layout extends Database
{
 	public function getCategories()
 	{
 		return self::$db->query("SELECT c.name, c.title, c.path_picture, COUNT(p.id) AS total_posts FROM ".self::table('categories')." c
 										INNER JOIN ".self::table('posts')." p  ON c.id = p.id_category
 										WHERE p.published = 1 GROUP BY c.id ORDER by COUNT(p.url) DESC")->fetchAll(\PDO::FETCH_ASSOC);
	}
}
