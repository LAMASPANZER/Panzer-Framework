<?php
namespace App\Scopes;

class ViewDependency
{
	static public function _getInstance()
	{
		static $inst = null;
		if ($inst === null) {
			$inst = new self();
		}
		return $inst;
	}

	static public function HumanTiming($date, $ago=true)
	{
		$time = time() - strtotime($date);
		if ($time<2592000 && $ago) {
			$time = ($time<1)? 1 : $time;
			$tokens = [
			2592000 => 'mois',
			604800 => 'semaine',
			86400 => 'jour',
			3600 => 'heure',
			60 => 'minute',
			1 => 'seconde'
			];

			foreach ($tokens as $unit => $text) {
				if ($time < $unit) continue;
				$numberOfUnits = floor($time / $unit);
				return 'Il y a '.$numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
			}
		}
		else {
			return 'Le '.date("d/n/Y à H:i:s",strtotime($date));
		}
	}

	static public function BBCode($string)
	{
		$RegexBBCode = array(
				'/\[b\](.*?)\[\/b\]/s'				 	=> '<b>$1</b>',
				'/\[i\](.*?)\[\/i\]/s'				 	=> '<em>$1</em>',
				'/\[u\](.*?)\[\/u\]/s'				 	=> '<u>$1</u>',
				'/\[s\](.*?)\[\/s\]/s' 			 		=> '<s>$1</s>',
				'/\[code\](.*?)\[\/code\]/s' 			=> '<code>$1</code>',
				'/\[img\](.*?)\[\/img\]/s' 		 		=> '<img class="img-fluid img-thumbnail" src="$1" />',
				'/\[url=([^\]]*)\](.*?)\[\/url\]/s' 	=> '<a target="_blank" href="$1">$2</a>',
				'/\[color=([^\]]*)\](.*?)\[\/color\]/s' => '<span style="color: $1;">$2</span>',
				'/\[center\](.*?)\[\/center\]/s'		=> '<center>$1</center>',
				'/\[right\](.*?)\[\/right\]/s'		 	=> '<right>$1</right>');

		foreach ($RegexBBCode as $k => $v) {$string 	 = preg_replace($k,$v ,$string);}
		return nl2br($string);
	}
}
