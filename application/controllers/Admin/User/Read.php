<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Read extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Database_model');
	}

	public function index()
	{

		$data['title'] = "Users list";

		if ((isset($_SESSION['logged_in'])) && (isset($_SESSION['is_admin']) == TRUE))
		{
			$this->load->view('partials/header', $data);

			$data['user'] = $this->Database_model->get('users');
			$this->load->view('admin/user/read', $data);

			$this->load->view('partials/footer');
		}
		else
		{
			redirect("/");
		}
	}

}