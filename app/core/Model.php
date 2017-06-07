<?php

class Model
{
	protected $db;

	protected $tablename = '';

	protected $timestamp = false;

	public function __construct()
	{
		$this->db = Database::getInstance();
	}
}