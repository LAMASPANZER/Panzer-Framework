<?php
namespace App\Models;

use Panzer\Database;

class Personal extends Database
{
	public function add()
	{
    	self::$db->exec("INSERT INTO `".self::table('personals')."` (`id`, `status`, `avatar_path`, `firstname`, `lastname`, `sex`, `nationality`, `birthday`, `birthplace`, `city`, `phone`) VALUES (NULL, '1', NULL, '', '', NULL, '', NULL, '', '', '')");
    	return self::$db->lastInsertId();
	}

	public function getIdentity(int $id)
	{
		return self::$db->query("SELECT p.*, r.id rank_id, r.name rank_name FROM ".self::table('personals')." p
										LEFT JOIN ".self::table('rank_tracking')." rt ON p.id = rt.user_id
										LEFT JOIN ".self::table('ranks')." r ON rt.rank_id = r.id WHERE p.id = $id ORDER by rt.id DESC")->fetch(\PDO::FETCH_ASSOC);
	}

	public function getInterviews(int $id)
	{
		return self::$db->query("SELECT * FROM ".self::table('interviews')." WHERE user_id = $id ORDER by id DESC")->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function getFIA(int $id)
	{
		return self::$db->query("SELECT * FROM ".self::table('fia')." WHERE user_id = $id ORDER by id DESC")->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function getRanks()
	{
		return self::$db->query("SELECT * FROM ".self::table('ranks')." ORDER by id ASC")->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function getRankTracking(int $id)
	{
		return self::$db->query("SELECT rt.id, rt.date, rank_id, name FROM ".self::table('rank_tracking')." rt
			LEFT JOIN ".self::table('ranks')." r ON rt.rank_id = r.id WHERE rt.user_id = $id	ORDER by rt.date ASC")->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function getFormations(int $id)
	{
		return self::$db->query("SELECT * FROM ".self::table('formations')." WHERE user_id = $id ORDER by id DESC")->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function getSanctions(int $id)
	{
		return self::$db->query("SELECT * FROM ".self::table('sanctions')." WHERE user_id = $id ORDER by id DESC")->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function isValidID(int $id)
	{
		return self::$db->query("SELECT id FROM ".self::table('personals')." WHERE id = $id")->fetchColumn();
	}

	public function postIdentity(array $data)
	{
		$query = self::$db->prepare("UPDATE ".self::table('personals')." SET
			status = :a,
			lastname = :b,
			firstname = :c,
			sex = :d,
			nationality = :e,
			birthday = :f,
			birthplace = :g,
			city = :h,
			phone = :i
			WHERE id = :id");
		$query->bindParam(':a', $data['status'], \PDO::PARAM_STR);
		$query->bindParam(':b', $data['lastname'], \PDO::PARAM_STR);
		$query->bindParam(':c', $data['firstname'], \PDO::PARAM_INT);
		$query->bindParam(':d', $data['sex'], \PDO::PARAM_STR);
		$query->bindParam(':e', $data['nationality'], \PDO::PARAM_STR);
		$query->bindParam(':f', $data['birthday'], \PDO::PARAM_STR);
		$query->bindParam(':g', $data['birthplace'], \PDO::PARAM_STR);
		$query->bindParam(':h', $data['city'], \PDO::PARAM_STR);
		$query->bindParam(':i', $data['phone'], \PDO::PARAM_STR);
		$query->bindParam(':id', $data['id'], \PDO::PARAM_INT);
		return $query->execute();
	}

	public function addRank(array $data)
	{


		$query = self::$db->prepare("INSERT INTO ".self::table('rank_tracking')." (user_id, rank_id) VALUES (:user_id, :rank_id)");
    	return $query->execute(array(
            "user_id" => $_POST['id'],
            "rank_id" => $_POST['rank_id']
            ));
	}
}
