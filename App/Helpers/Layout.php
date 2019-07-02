<?php
namespace App\Helpers;

use Panzer\Helper;

class Layout extends Helper
{
	public function __construct()
	{
		$this->view->assign(['test_categories'=>$this->model->getCategories()]);
		//echo $this->kernel->getTimestart();
	}
}
