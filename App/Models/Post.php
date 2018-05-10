<?php
namespace App\Models;

use Panzer\Database;

class Post extends Database
{
	public function GetCategories()
	{
		return self::$db->query("SELECT id, name, title FROM ".self::Table('categories')." ORDER by title ASC")->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function IsPost($string)
	{
		return self::$db->query("SELECT id, url FROM ".self::Table('posts')." WHERE url = '$string'")->fetch(\PDO::FETCH_ASSOC);
	}

	public function getPostByURL($string)
	{
		return self::$db->query("SELECT c.title title_category, c.name name_category,
								 		p.id id_post, p.id_category, p.path_main_picture, p.path_banner_picture, p.url, p.title, p.keywords, p.description, p.content, p.finished, p.published, p.date_added, p.date_published, p.date_edited,
								 		s.path_avatar author_avatar, s.firstname author_firstname, s.lastname author_lastname FROM ".self::Table('posts')." p
										INNER JOIN ".self::Table('categories')." c ON p.id_category = c.id
										INNER JOIN ".self::Table('staffs')." s ON p.id_staff = s.id
										WHERE url = '$string'")->fetch(\PDO::FETCH_ASSOC);
	}

	public function AdminGetPost($int)
	{
		return self::$db->query("SELECT c.id id_category, c.title title_category, c.name name_category,
										p.id id, p.id_category, p.path_main_picture picture, p.path_banner_picture, p.url, p.title, p.keywords, p.description, p.content, p.finished, p.published, p.date_added, p.date_published, p.date_edited,
										s.id author_id, s.path_avatar author_avatar, s.firstname author_firstname, s.lastname author_lastname FROM ".self::Table('posts')." p
										INNER JOIN ".self::Table('categories')." c ON p.id_category = c.id
										INNER JOIN ".self::Table('staffs')." s ON p.id_staff = s.id
										WHERE p.id = '$int'")->fetch(\PDO::FETCH_ASSOC);
	}

	public function AdminEditPost($int)
	{
		return self::$db->query("UPDATE ".self::Table('posts')." SET `finished` = '1' WHERE id = '$int'")->fetch(\PDO::FETCH_ASSOC);
	}

	public function GetRandomPosts($int)
	{
		return self::$db->query("SELECT title, url FROM ".self::Table('posts')."
										WHERE published = 1 ORDER by RAND() LIMIT $int")->fetchAll(\PDO::FETCH_ASSOC);
	}
}
