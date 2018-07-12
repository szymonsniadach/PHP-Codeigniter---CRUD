<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Database_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index()
	{

		if ((isset($_SESSION['logged_in'])) && (isset($_SESSION['is_admin']) == TRUE))
		{

			if ($this->form_validation->run('signup') == FALSE)
			{
				$this->load->view('admin/user/create');
			}
			else
			{
				if (!empty($_POST)) {

					$data = array(
						"login" => $this->input->post('login'),
						"email" => $this->input->post('email'),
						"password" => $this->input->post('password')
					);

					$this->Database_model->create('users', $data);
				}

				$this->session->set_flashdata('alert', 'Successfully create user! :)');
				redirect("admin/user/read");
			}
		}
		else
		{
			redirect("/");
		}
	}

	function login_exist()
	{
		$login = $this->input->post('login');
		$where = array('login' => $login);
		$data['user'] = $this->Database_model->get_single('users', $where);

		// echo "<pre>";
		// var_dump($data['user']->login);
		// echo "</pre>";

		if(!empty($data['user']->login)) {
			$this->form_validation->set_message('login_exist', 'The {field} is already exist! :(');
			return false;
		}else{
			return true;
		}
	}

}