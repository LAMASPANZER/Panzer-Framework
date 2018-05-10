<?php
namespace App\Controllers;

use Panzer\Controller;

class Category extends Controller
{
	public function IndexAction($name, $page=1)
	{
		$this->LoadModel();
		if ($category = $this->model->GetCategory($name)) {
			$this->view->Set('category', $category['id']);
			if (!$this->view->IsCached()) {
				$posts = $this->model->GetPosts($category['name']);
				$category['total_posts'] = count($posts);
				$this->view->Assign(['category'=>$category,
							'posts'=>$posts,
							'randposts'=>$this->model->GetRandomPosts(rand(5,7))]);
			}
			$this->view->Render();
		} else
			$this->view->RenderError(404);
	}
}
