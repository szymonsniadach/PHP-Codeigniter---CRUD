<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Read extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Database_model');
		$this->load->helper('form');
	}

	public function index()
	{

		if ((isset($_SESSION['logged_in'])) && (isset($_SESSION['is_admin']) == TRUE))
		{
			$data['title'] = "Articles";
			$this->load->view('partials/header', $data);

			$data['article'] = $this->Database_model->get('posts');
			$this->load->view('panel/post/read', $data);

			//$this->if_post();

			$this->load->view('partials/footer');
		}
		else
		{
			redirect("/");
		}
	}


	public function if_post() {
	
		if (!empty($_POST)) {
			$date_start = $this->input->post('date_start');
			$date_end = $this->input->post('date_end');

			$where = array(
				"DATE_FORMAT(date, '%Y-%m-%d') >= '$date_start'",
				"DATE_FORMAT(date, '%Y-%m-%d') <  '$date_end' + INTERVAL 1 DAY"
			);

			$data['article'] = $this->Database_model->get_where('posts', $where);
		}

	}

}