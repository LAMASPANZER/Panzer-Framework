<?php
namespace App\Controllers;

use Panzer\Controller;
use App\Plugins\Auth\Auth;

class Exemple extends Controller
{
	private $auth;

	function __construct()
	{
		$this->auth = new Auth();

		$this->view->assign(['auth'=>$this->auth]);
	}

	public function index()
	{
		$this->view->use('exemple');
		$this->view->assign(['personals'=>$this->model->GetPersonals()]);

		$this->view->render(false);

	}
}


