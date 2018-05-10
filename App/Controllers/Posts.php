<?php
namespace App\Controllers;

use Panzer\Controller;
use App\Plugins\Auth\Auth;

class Posts extends Controller
{
	private $auth;

	protected function OnConstruct()
	{
		$this->auth = new Auth();

		$this->view->Assign(['auth'=>$this->auth]);
	}

	public function IndexAction()
	{
		if ($this->auth->IsLogged()) {

			$this->LoadModel();

			$this->view->Set('admin_posts');

			$this->view->Assign(['posts'=>$this->model->GetPosts()]);

			$this->view->Render(false);

		} else
			$this->view->RenderError(403);
	}
}





