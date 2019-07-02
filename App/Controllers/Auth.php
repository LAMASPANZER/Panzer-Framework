<?php
namespace App\Controllers;

class Auth extends \Panzer\Controller
{
	private $auth;

	function __construct()
	{
		$this->auth = new \App\Plugins\Auth\Auth();
		$this->view->assign(['auth'=>$this->auth]);
	}

	public function login()
	{

		if ($this->auth->isLogged())
			$this->response->redirect('dashboard');

			$this->view->use('login');

			$errors = false;
			if (isset($_POST['username']) && isset($_POST['password'])) {
				if ($_POST['username'] != '' && $_POST['password'] != '') {

					if ($this->auth->login(addslashes($_POST['username']),$_POST['password']))
						$this->response->redirect('dashboard');
					else
						$errors= "Identifiants incorrect !";

				} else
					$errors= "Tout les champs sont requis !";
			}

			$this->view->assign(['errors'=>$errors]);
			$this->view->render(false);
	}

	public function logout(string $csrf_token)
	{
		if (!$this->auth->isLogged())
			throw new \Exception("Already disconnected", 403);

		if (!$this->auth->CSRFCheck($csrf_token))
			throw new \Exception("Invalid token", 400);

		$this->auth->logout();

		$this->response->redirect('login');
	}
}
