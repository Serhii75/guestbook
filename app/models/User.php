<?php

class User
{
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

	public function getByName($username)
	{
		if ( $username == 'Serhii' ) {
			$user['id'] = 1;
			$user['name'] = 'Serhii';
			$user['password'] = md5('123');
			$user['role'] = 'admin';

			return $user;
		}
		return null;
	}
}