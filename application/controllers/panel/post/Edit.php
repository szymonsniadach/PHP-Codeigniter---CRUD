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

			$data['title'] = "Edit post";
			$this->load->view('partials/header', $data);

			$where = array('id' => $id);
			$data['article'] = $this->Database_model->get_single('posts', $where);

			if (!empty($_POST)) {
				$data = array(
					"title" => $this->input->post('title'),
					"description" => $this->input->post('description')
				);
				$this->Database_model->edit('posts', $id, $data);
				redirect('panel/post/read');
			}

			$this->load->view('panel/post/edit', $data);

			$this->load->view('partials/footer');

		}
		else
		{
			redirect("/");
		}
	}

}