<?php

class Comments extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->commentModel = $this->model('Comment');
	}

	public function index($name = '')
	{
		$this->data['comments'] = $this->commentModel->getAll();
		
		$this->view('comments/index', $this->data);
	}

	public function add()
	{
		if ( isset($_POST)  && !empty($_POST) ) {
			$id = $this->commentModel->add($_POST);
			if ( $id ) {
				$_SESSION['message'] = 'Ваш комментарий добавлен!';
				redirect('/');
			}
		}
	}

	public function edit($id = null)
	{
		$id = (int)$id;
		$id || redirect(baseUrl());

		if ( isset($_POST) && !empty($_POST) ) {
			if ( $this->commentModel->update($_POST, $id) ) {
				$_SESSION['message'] = 'Сохранения изменены.';
				redirect('/');
			}			
		}

		$this->data['comment'] = $this->commentModel->read($id);

		$this->view('comments/edit', $this->data);	
	}

	public function remove($id = null)
	{
		$id = (int)$id;
		$id || redirect(baseUrl());

		if ( $this->commentModel->delete($id) ) {
			$_SESSION['message'] = "Комментарий успешно удалён";
		}
		redirect('/');
	}
}