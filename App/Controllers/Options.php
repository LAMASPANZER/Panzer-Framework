<?php
namespace App\Controllers;

use Panzer\Controller;
use Panzer\Bundles\Auth;

class Options extends Controller
{
	public function ClearallAction()
	{
		$auth = Auth::getInstance();
		if ($auth->IsLogged()) {
			if (!$auth->IsRestricted()) {
				$this->view->ClearAll();
				$this->Redirect('admin-dashboard');
			} else
				$this->view->RenderError(403);
		} else
				$this->view->RenderError(401);
	}
}
