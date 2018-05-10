<?php
namespace App\Controllers;

use Panzer\Controller;

class Home extends Controller
{
	public function IndexAction()
	{
		$this->view->set('home');
		if (!$this->view->isCached()) {
			$this->loadModel();
			$this->view->Assign(['categories'=>$this->model->GetCategories(),
						'posts'=>$this->model->GetPosts(),
						'staffs'=>$this->model->GetStaffs()]);
		}
		$this->view->render();
	}
}
