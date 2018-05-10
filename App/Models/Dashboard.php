<?php
namespace App\Models;

use Panzer\Database;

class Dashboard extends Database
{
	public function CountPostsPublished()
	{
		return self::$db->query("SELECT COUNT(*) FROM ".self::Table('posts'))->fetchColumn();
	}

	public function CountAuthors()
	{
		return self::$db->query("SELECT COUNT(*) FROM ".self::Table('staffs'))->fetchColumn();
	}

	public function GetLastPostsPublished()
	{
		return self::$db->query("SELECT c.title title_category,
										p.id, p.url, p.title, p.finished, p.date_added,
										s.id author_id, s.firstname author_firstname, s.lastname author_lastname FROM ".self::Table('posts')." p
										INNER JOIN ".self::Table('categories')." c ON p.id_category = c.id
										INNER JOIN ".self::Table('staffs')." s ON p.id_staff = s.id WHERE p.published = 1 ORDER by p.date_added DESC LIMIT 10")->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function GetLastPostsNotFinished()
	{
		return self::$db->query("SELECT c.title title_category,
										p.id, p.url, p.title, p.published, p.date_added,
										s.id author_id, s.firstname author_firstname, s.lastname author_lastname FROM ".self::Table('posts')." p
										INNER JOIN ".self::Table('categories')." c ON p.id_category = c.id
										INNER JOIN ".self::Table('staffs')." s ON p.id_staff = s.id WHERE p.finished = 0 ORDER by p.date_added DESC")->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function GetLastPostsEdited()
	{
		return self::$db->query("SELECT c.title title_category,
										p.id, p.url, p.title, p.date_edited,
										s.id author_id, s.firstname author_firstname, s.lastname author_lastname FROM ".self::Table('posts')." p
										INNER JOIN ".self::Table('categories')." c ON p.id_category = c.id
										INNER JOIN ".self::Table('staffs')." s ON p.id_staff = s.id WHERE p.date_edited IS NOT NULL ORDER by p.date_edited DESC LIMIT 10")->fetchAll(\PDO::FETCH_ASSOC);
	}
}
