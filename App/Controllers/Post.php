<?php
namespace App\Controllers;

use Panzer\Controller;
use App\Plugins\Parsedown\Bootstrap as Parsedown;
use App\Plugins\Auth\Auth;
use App\Plugins\GumpFactory;

class Post extends Controller
{
	protected function OnConstruct()
	{
		$this->LoadModel();
	}

	public function IndexAction($name)
	{
		if ($post = $this->model->IsPost($name)){
			$this->view->Set('post', $post['id']);
			if (!$this->view->IsCached()) {
				$post = $this->model->getPostByURL($name);
				$post['content'] = Parsedown::_getInstance()->text($post['content']);
				$this->view->Assign(['post'=>$post,
					      'randposts'=>$this->model->GetRandomPosts(6)]);
			}
			$this->view->Render();
		} else
			throw new \Exception("Post '$name' not found", 404);
	}

	public function NewAction()
	{
	}

	public function AdminIndexAction($id)
	{
		$auth = new Auth();
		if ($auth->IsLogged()) {
			$this->view->Assign(['auth'=>$auth]);

			if ($post = $this->model->AdminGetPost($id)) {
				if ($auth->IsSuperAdmin() || !$auth->IsRestricted() && $auth->IsOwner($post['author_id'])) {

					$this->view->Set('admin_post_edit');

					$this->view->Assign(['post'=>$post,
						      'categories'=>$this->model->GetCategories()]);

					$this->view->Render(false);

				} else
					throw new \Exception("User restricted", 401);

			} else
				throw new \Exception("Post '$name' not found", 404);

		} else
			$this->Redirect('admin-staff-login');
	}

	public function EditAction($id)
	{
		$auth = new Auth();
		if ($auth->IsLogged()) {
			$this->view->Assign(['auth'=>$auth]);

			if ($post = $this->model->AdminEditPost($id)) {
				if ($auth->IsSuperAdmin() || !$auth->IsRestricted() && $auth->IsOwner($post['author_id'])) {



					$gump = GumpFactory::getInstance();

					$_POST = $gump->sanitize($_POST); // You don't have to sanitize, but it's safest to do so.

					$gump->validation_rules(array(
						'username'    => 'required|alpha_numeric|max_len,100|min_len,6',
						'password'    => 'required|max_len,100|min_len,6',
						'email'       => 'required|valid_email',
						'gender'      => 'required|exact_len,1|contains,m f',
						'credit_card' => 'required|valid_cc'
					));

					$gump->filter_rules(array(
						'username' => 'trim|sanitize_string',
						'password' => 'trim',
						'email'    => 'trim|sanitize_email',
						'gender'   => 'trim',
						'bio'	   => 'noise_words'
					));

					$validated_data = $gump->run($_POST);

					if($validated_data === false) {
						print_r($_POST);
						echo $gump->get_readable_errors(true);
					} else {
						print_r($_POST);
						//Core::Redirect('admin-posts-view');
					}



				} else
					$this->view->RenderError(403);

			} else
				$this->view->RenderError(404);

		} else
			Core::Redirect('admin-staff-login');

	}


	public function Delete($id)
	{
	}
}

