<?php
namespace App\Controllers;

use Panzer\Controller,
	App\Plugins\Auth\Auth;

class Personal extends Controller
{
	private $auth;

	function __construct()
	{
		$this->auth = new Auth();

		$this->view->assign(['auth'=>$this->auth]);
	}

	public function index(int $user_id)
	{
		if (!$this->auth->isLogged())
			$this->response->redirect('login');

		if (!$this->model->isValidID($user_id))
			throw new \Exception("ID personal not exist", 404);

		$this->view->use('personal', $user_id);

		$this->view->assign(['identity'=>$this->model->getIdentity($user_id),
							 'interviews'=>$this->model->getInterviews($user_id),
							 'fia'=>$this->model->getFIA($user_id),
							 'ranks'=>$this->model->getRanks(),
							 'rank_tracking'=>$this->model->getRankTracking($user_id),
							 'formations'=>$this->model->getFormations($user_id),
							 'sanctions'=>$this->model->getSanctions($user_id)]);

		$this->view->render(false);

	}

	public function add(string $csrf_token)
	{
		if (!$this->auth->isLogged())
			$this->response->redirect('login');

		if (!$this->auth->CSRFCheck($csrf_token))
			throw new \Exception("Invalid token", 403);

		$this->response->redirect('personal-view', ['id'=>$this->model->add()]);

	}

	public function editIdentity()
	{
		if (!$this->auth->isLogged())
			$this->response->redirect('login');

		if (!isset($_POST['id']) ||
			!isset($_POST['status']) ||
			!isset($_POST['lastname']) ||
			!isset($_POST['firstname']) ||
			!isset($_POST['sex']) ||
			!isset($_POST['nationality']) ||
			!isset($_POST['birthday']) ||
			!isset($_POST['birthplace']) ||
			!isset($_POST['city']) ||
			!isset($_POST['phone']) ||
			!isset($_POST['user_id']) ||
			!isset($_POST['csrf_token']))
			throw new \Exception("Invalid data post", 400);

		if (!$this->auth->CSRFCheck($_POST['csrf_token']))
			throw new \Exception("Invalid token", 403);


		if (!$this->model->isValidID($_POST['id']))
			throw new \Exception("ID personal not exist", 404);


		$this->model->postIdentity($_POST);
		$this->response->setBodyRaw(true,'json')->send();
	}

	public function addRank()
	{
		if (!$this->auth->isLogged())
			$this->response->redirect('login');

		if (!isset($_POST['id']) ||
			!isset($_POST['rank_id']) ||
			!isset($_POST['user_id']) ||
			!isset($_POST['csrf_token']))
			throw new \Exception("Invalid data post", 400);

		if (!$this->auth->CSRFCheck($_POST['csrf_token']))
			throw new \Exception("Invalid token", 403);


		if (!$this->model->isValidID($_POST['id']))
			throw new \Exception("ID personal not exist", 404);


		$this->model->addRank($_POST);
		$this->response->setBodyRaw(true,'json')->send();
	}
}


