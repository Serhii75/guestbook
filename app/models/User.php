<?php

class User extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'users';
	}

	public function authorize($username, $password)
	{
		$username = clean($username);
		$password = clean($password);

		$user = $this->getByName($username);
		unset($_SESSION['error']);

		if ( empty($user) ) {
			$_SESSION['error'] = 'Пользователь не найден';
			return false;
		}

		if ( $user['password'] !== md5($password) ) {
			$_SESSION['error'] = 'Введён неверный пароль';
			return false;
		}

		$authHash = md5(mt_rand());

		$_SESSION['user'] = $user;
		$_SESSION['user']['authHash'] = $authHash;

		$remember = isset($_POST['remember']) ?: false;
		if ( $remember ) {
			setcookie("authHash", $authHash, time()+3600*24*7, '/');	
		}

		return true;
	}

	public function register($data = [])
	{
		$data = cleanData($data);
		
		if ( !$this->checkUniqueFieldValue('username', $data['username']) ) {
			$_SESSION['error'] = 'Пользователь с таким именем уже существует';
			return false;
		}

		if ( !$this->checkUniqueFieldValue('email', $data['email']) ) {
			$_SESSION['error'] = 'Пользователь с таким e-mail уже существует';
			return false;
		}

		if ( $data['password'] != $data['pswd_confirm'] ) {
			$_SESSION['error'] = 'Неверное подтверждение пароля';
			return false;
		}

		unset($data['pswd_confirm']);
		$data['password'] = md5($data['password']);
		$data['role_id'] = 2;
		$data['avatar'] = 'avatar.png';
		$data['published'] = 1;
		$now = date('Y-m-d H:i:s');
		$data['created_at'] = $now;
		$data['modified_at'] = $now;
		$data['last_visit'] = $now;

		return $this->create($data);
	}

	public function edit($data, $id)
	{
		if ( empty($data['username']) ) {
			$_SESSION['error'] = 'Заполните поле \'Имя пользователя\'';
			return false;
		}
		
		if ( !$this->checkUniqueFieldValue('username', $data['username'], $id) ) {
			$_SESSION['error'] = 'Пользователь с таким именем уже существует';
			return false;
		}

		if ( !$this->checkUniqueFieldValue('email', $data['email'], $id) ) {
			$_SESSION['error'] = 'Пользователь с таким e-mail уже существует';
			return false;
		}

		if ( empty($data['email']) ) {
			$_SESSION['error'] = 'Заполните поле \'Email\'';
			return false;
		}

		if ( !empty($data['new_pswd']) ) {
			if ( $data['new_pswd'] == $data['pswd_confirm'] ) {
				$data['password'] = md5($data['new_pswd']);
			} else {
				$_SESSION['error'] = 'Неверное подтверждение пароля';
				return false;
			}
		}
		unset($data['new_pswd']);
		unset($data['pswd_confirm']);

		$data['modified_at'] = date('Y-m-d H:i:s');
		
		$current = $_SESSION['user'];
		foreach ($data as $key => $value) {
			if ( $current[$key] == $value ) {
				unset($data[$key]);
			}
		}

		return $this->update($data, $id);
	}

	public function getByName($username)
	{
		$username = $this->db->escape($username);
		$sql = "SELECT * FROM " . $this->table . " WHERE username = '{$username}' LIMIT 1";
		$result = $this->db->query($sql);

		if ( isset($result[0]) ) {
			return $result[0];
		}
		return false;
	}

	public function getById($id)
	{
		$sql = "SELECT * FROM users WHERE id = '{$id}'";
		$result = $this->db->query($sql);

		if ( isset($result[0]) ) {
			return $result[0];
		}
		return false;
	}
}
