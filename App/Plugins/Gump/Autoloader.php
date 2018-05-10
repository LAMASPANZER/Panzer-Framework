<?php
namespace Panzer\Bundles;

class GumpFactory
{
	static public function GetInstance()
	{
		require "Gump.php";
		return new Gump\Gump();
	}
}
