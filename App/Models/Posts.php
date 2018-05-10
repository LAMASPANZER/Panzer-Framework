<?php
namespace App\Models;

use Panzer\Database;

class Posts extends Database
{
	public function GetPosts()
	{
		return self::$db->query("SELECT c.title title_category,
										p.id id, p.id_category, p.url, p.title, p.finished, p.published, p.date_added,
										s.id author_id, s.path_avatar author_avatar, s.firstname author_firstname, s.lastname author_lastname FROM ".self::Table('posts')." p
										INNER JOIN ".self::Table('categories')." c ON p.id_category = c.id
										INNER JOIN ".self::Table('staffs')." s ON p.id_staff = s.id ORDER by p.date_added DESC")->fetchAll(\PDO::FETCH_ASSOC);
	}
}
