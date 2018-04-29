<?php

class Controller
{
	protected $data = [];

	public function __construct()
	{
		if ( isset($_SESSION['user']) ) {
			$this->data['user'] = $_SESSION['user'];
		}
	}

	public function model($model)
	{
		require_once '../app/models/' . $model . '.php';
		return new $model();
	}

	public function view($subview, $data = [])
	{
		$data['subview'] = '../app/views/' . $subview . '.php';
		extract($data);
		require_once TEMPLATE_PATH . 'layout.php';
	}

	public function show404()
	{
		$this->view('errors/404');
		exit();
	}

	/*public function checkUser()
	{
		if ( isset($_SESSION['user']['authHash']) && isset($_COOKIE['authHash']) ) {
			if ( $_SESSION['user']['authHash'] == $_COOKIE['authHash'] ) {
				$this->data['user'] = $_SESSION['user'];
			}
		} 
	}*/
}