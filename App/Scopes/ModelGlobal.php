<?php
namespace App\Scopes;

use Panzer\Database;

final class ModelGlobal extends Database
{
	static public function _getInstance()
	{
		static $inst = null;
		if ($inst === null) {
			$inst = new self();
		}
		return $inst;
	}
}
