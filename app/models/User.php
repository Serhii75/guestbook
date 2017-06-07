<?php

class User extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->timestatmp = true;
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

		if ( !setcookie("authHash", $authHash) ) {
			die('Coookie was not set');
		}

		return true;
	}

	public function register($data)
	{
		$data['username'] = clean($data['username']);
		$data['email'] = clean($data['email']);
		$data['password'] = clean($data['pswd']);
		$pswdConfirm = clean($data['pswd_confirm']);

		if ( $data['password'] != $pswdConfirm ) {
			$_SESSION['error'] = 'Неверное подтверждение пароля';
		}

		return $this->save($data);
	}

	protected function save($data, $id = null)
	{

	}

	public function getByName($username)
	{
		$username = $this->db->escape($username);
		$sql = "SELECT * FROM users WHERE username = '{$username}' LIMIT 1";
		$result = $this->db->query($sql);

		if ( isset($result[0]) ) {
			return $result[0];
		}
		return false;
	}
}