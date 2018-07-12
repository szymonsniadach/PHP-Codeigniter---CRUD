<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Session_model');
	}

	public function index()
	{
		$this->Session_model->unset_all_session();
		redirect('login');
	}

}