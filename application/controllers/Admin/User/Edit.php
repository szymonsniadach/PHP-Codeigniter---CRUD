<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Database_model');
		$this->load->helper('form');
	}

	public function index($id)
	{

		if ((isset($_SESSION['logged_in'])) && (isset($_SESSION['is_admin']) == TRUE))
		{
			$where = array('id' => $id);
			$data['user'] = $this->Database_model->get_single('users', $where);

			if (!empty($_POST)) {

				if (empty($_POST['password'])) {
					$_POST['password'] = $data['user']->password;
				}

				$data = array(
					"email" => $this->input->post('email'),
					"password" => $this->input->post('password')
				);
				
				$this->Database_model->edit('users', $id, $data);
				redirect('admin/user/read');
			}

			$this->load->view('admin/user/edit', $data);
		}
		else
		{
			redirect("/");
		}
	}

}