<?php

class Comments extends Controller
{
	public function index($name = '')
	{

		
		$this->view('comments/index', $this->data);
	}

	public function test()
	{
		echo 'comments/test';
	}
}