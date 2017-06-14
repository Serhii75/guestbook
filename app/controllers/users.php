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
		setcookie('authHash', '', time() - 360);
		unset($_SESSION['user']);
		redirect(baseUrl());
	}

	public function register()
	{
		/*if ( isset($_POST) ) {
			$id = $this->usersModel->register($_POST); 
			if ( $id ) {
				redirect(baseUrl().'/users/profile/'.$id);
			}
		}*/

		$this->view('users/register', $this->data);	
	}

	public function profile($id = null)
	{

		
		$this->view('users/profile', $this->data);		
	}

	public function edit($id = null)
	{
		echo $id;
	}
}