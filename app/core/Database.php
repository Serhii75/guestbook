<?php

class Database
{
	private $connection;

	private static $instance;

	private function __construct()
	{
		$this->connection = new mysqli('localhost', 'root', 
					'', 'guestbook');

		if ( mysqli_connect_error() ) {
			throw new Exception('Could not connect to DB. Error: ' . mysqli_connect_error());
		}
	}

	public static function getInstance()
	{
		if ( empty(self::$instance) ) {
			self::$instance = new Database();
		}
		return self::$instance;
	}

	public function query($sql)
	{
		if ( !$this->connection ) {
			return false;
		}

		$result = $this->connection->query($sql);

		if ( mysqli_error($this->connection) ) {
			throw new Exception(mysqli_error($this->connection));
		}

		if ( is_bool($result) ) {
			return $result;
		}

		$data = array();
		while ( $row = mysqli_fetch_assoc($result) ) {
			$data[] = $row;
		}

		return $data;
	}

	public function escape($str)
	{
		return mysqli_escape_string($this->connection, $str);
	}
}