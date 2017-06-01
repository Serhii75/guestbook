<?php

class Controller
{
	protected $data = [];

	public function __construct()
	{
		
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
}