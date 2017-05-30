<?php
namespace App\Controllers;

use Panzer\Controller;

class Exemple extends Controller
{
	public function index()
	{
		$this->view->render('exemple');
	}
}


