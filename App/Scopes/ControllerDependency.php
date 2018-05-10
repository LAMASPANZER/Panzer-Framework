<?php
namespace App\Scopes;

final class ControllerDependency
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
