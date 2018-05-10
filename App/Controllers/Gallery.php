<?php
namespace App\Controllers;

use Panzer\Controller;

class Gallery extends Controller
{
	public function IndexAction()
	{
		$this->view->Set('gallery');
		if (!$this->view->IsCached()) {
			$this->LoadModel();
			$this->view->Assign(['pictures'=>$this->model->GetPictures()]);
		}
		$this->view->Render();
	}
}
