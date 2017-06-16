<?php

class Role extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'roles';
	}
}