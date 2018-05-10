<?php
namespace App\Plugins\Parsedown;

class Bootstrap
{
	static public function _getInstance()
	{
		$parserdown = new ParsedownExtraPlugin();
		$parserdown->code_class = 'lang-%s';

		$parserdown->setBreaksEnabled(true);
		$parserdown->setMarkupEscaped(true);

		$parserdown->table_class = 'table table-bordered';
		$parserdown->abbreviations = array(
			'JS' => 'JavaScript'
		);

		$parserdown->images_attr = array(
		    'data-lightbox' => ""
		);
		return $parserdown;
	}
}
