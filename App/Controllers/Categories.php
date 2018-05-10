<?php
namespace App\Controller;

use Panzer\Controller;
use Panzer\Bundles\Auth;

class Categories extends Controller
{
	public function IndexAction()
	{
		$auth = Auth::getInstance();
		if ($auth->IsLogged()) {
			$this->view->Assign(['auth'=>$auth]);
			if ($auth->IsSuperAdmin()) {
				$this->LoadModel();
				$this->view->Set('admin_categories');
				if (isset($_POST['title']) && isset($_POST['name']) && (isset($_POST['csrf'])) && $auth->CSRF_Check($_POST['csrf'])) {
					if (!empty($_POST['title']) && preg_match('/^[a-z0-9][a-z0-9-]*[a-z0-9]$/', $_POST['name'])) {
						$this->$model->AddCategory(['title'=>ucfirst(addslashes($_POST['title'])), 'name'=>addslashes($_POST['name'])]);
						$this->view->Assign(['error'=>false]);
					} else
						$this->view->Assign(['error'=>true]);
				}
				$this->view->Assign(['categories'=>$this->model->GetCategories()]);
				$this->view->Render(false);
			} else
				$this->view->RenderError(403);
		} else
			$this->Redirect('admin-staff-login');
	}
}
