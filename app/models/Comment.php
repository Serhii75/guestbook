<?php

class Comment extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'comments';
	}

	public function getAll()
	{
		$sql = "SELECT c.*, u.username as author, u.avatar, u.last_visit" 
				. " FROM " . $this->table . " c"
				. " JOIN users u"
				. " ON c.user_id = u.id"
				. " ORDER BY c.created_at DESC";
		return $this->db->query($sql);
	}

	public function add($data)
	{
		$data = cleanData($data);

		$data['published'] = 1;
		$now = date('Y-m-d H:i:s');
		$data['created_at'] = $now;
		$data['modified_at'] = $now;

		return $this->create($data);
	}
}