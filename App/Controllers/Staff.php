<?php
namespace App\Controllers;

use Panzer\Controller;
use App\Plugins\Auth\Auth;

class Staff extends Controller
{
	private $auth;

	protected function OnConstruct()
	{
		$this->auth = new Auth();

		$this->view->Assign(['auth'=>$this->auth]);
	}

	public function IndexAction($id)
	{
		if ($this->auth->IsLogged()) {

			$this->LoadModel();

			if ($author = $this->model->GetAuthor($id)) {

				$this->view->Set('admin_profil', $id);

				$this->view->Assign(['author'=>$author,
					      'countpostspublishedbyauthor'=>$this->model->CountPostsPublishedByAuthor($author['id']),
					      'countpostsnotfinishedbyauthor'=>$this->model->CountPostsNotFinishedByAuthor($author['id']),
					      'posts'=>$this->model->GetPostsByAuthor($author['id'])]);

				$this->view->Render(false);

			} else
				throw new \Exception("Invalid id", 404);

		} else
			throw new \Exception("Auth required", 403);
	}

	public function LoginAction()
	{
		if (!$this->auth->IsLogged()) {

			$this->view->Set('admin_login');

			$errors = false;
			if (isset($_POST['username']) && isset($_POST['password'])) {
				if ($_POST['username'] != '' && $_POST['password'] != '') {

					if ($this->auth->Login(addslashes($_POST['username']),$this->auth->CryptPassword($_POST['password'])))
						$this->Redirect('admin-dashboard');
					else
						$errors= "Identifiants incorrect !";

				} else
					$errors= "Tout les champs sont requis !";
			}

			$this->view->Assign(['errors'=>$errors]);
			$this->view->Render();

		} else
			$this->Redirect('admin-dashboard');
	}

	public function LogoutAction()
	{
		if ($this->auth->IsLogged()) {
			$this->auth->Logout();
			$this->Redirect('home');
		} else
			$this->Redirect('admin-staff-login');
	}
}
