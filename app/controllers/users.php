<?php

class Users extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->userModel = $this->model('User');
	}

	public function login()
	{
		if ( isset($_POST['username']) && isset($_POST['password']) ) {
			if ( $this->userModel->authorize($_POST['username'], $_POST['password']) ) {
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
		if ( isset($_POST) && !empty($_POST) ) {
			$id = $this->userModel->register($_POST); 
			if ( $id ) {
				$_SESSION['message'] = 'Вы успешно зарегистрировались! Можете войти в систему, используя свой логин и пароль.';
				redirect(baseUrl().'/users/login');
			}
		}

		$this->view('users/register', $this->data);	
	}

	public function profile($id = null)
	{
		$id = (int)$id;
		$id || $this->show404();

		if ( isset($_POST) && !empty($_POST) ) {
			if ( $this->userModel->edit($_POST, $id) ) {
				$_SESSION['message'] = 'Сохранения изменены.';
			}
		}

		$this->data['user'] = $this->userModel->read($id);
		$_SESSION['user'] = $this->data['user'];

		$roleModel = $this->model('Role');
		$this->data['roles'] = $roleModel->read();		
		
		$this->view('users/profile', $this->data);		
	}

	public function upload()
	{
		if ( isset($_FILES['avatar']['name']) ) {
			$data = [];
			$data['filename'] = $_FILES['avatar']['name'];

			//header('Content-Type: text/json');
			echo json_encode($data);
			exit;
		}
	}
}
