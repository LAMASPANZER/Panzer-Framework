<?php
namespace App\Controllers;

use Panzer\Controller;
use App\Plugins\Auth\Auth;

class Dashboard extends Controller
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

			$this->view->Set('admin_dashboard');

			$this->view->Assign(['postspublished'=>$this->model->CountPostsPublished(),
						'authors'=>$this->model->CountAuthors(),
						'getlastpostspublished'=>$this->model->GetLastPostsPublished(),
						'getlastpostsnotfinished'=>$this->model->GetLastPostsNotFinished(),
						'getgastpostsedited'=>$this->model->GetLastPostsEdited()]);

			$this->view->Render(false);

		} else
			$this->Redirect('admin-staff-login');
	}
}


