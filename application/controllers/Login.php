<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Database_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index()
	{
		
		if ($this->form_validation->run('signin') == FALSE)
		{
			if (isset($_SESSION['logged_in'])) {
				redirect('/');
				return false;
			}
			$this->load->view('login');
		}
		else
		{
			if (empty($_POST)) {
				echo "Fail on login :(";
				$this->load->view('login');
				return false;
			}

			$newdata = array(
		        'login'  => $this->input->post('login'),
		        'logged_in' => TRUE
			);

			$this->session->set_userdata($newdata);
			redirect('/');
		}

	}

	function login_check()
	{

		$login = $this->input->post('login');
		$password = $this->input->post('password');
		$where = array(
			'login' => $login,
			'password' => $password
		);
		$data['user'] = $this->Database_model->get_single('users', $where);

		// echo "<pre>";
		// var_dump($data['user']->login);
		// echo "</pre>";

		if(empty($data['user']->login) && empty($data['user']->password)) {
			$this->form_validation->set_message('login_check', 'You have entered incorrect data or account is not exist :(');
			return false;
		}else{
			if ($data['user']->login == "admin") {
				$this->session->set_userdata('is_admin', TRUE);
			}
			return true;
		}

	}

}