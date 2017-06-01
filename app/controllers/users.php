<?php

class Users extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->usersModel = $this->model('User');
	}

	public function login()
	{
		if ( isset($_POST['username']) && isset($_POST['password']) ) {
			if ( $this->usersModel->authorize($_POST['username'], $_POST['password']) ) {
				redirect(baseUrl());
			}
		}

		$this->view('users/login', $this->data);
	}

	public function logout()
	{
		setcookie('authHash', $authHash, time() - 360);
		unset($_SESSION['user']);
		redirect(baseUrl());
	}

	public function edit($id = null)
	{
		echo $id;
	}
}