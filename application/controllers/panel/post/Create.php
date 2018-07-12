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

			$data['title'] = "Create article";
			$this->load->view('partials/header', $data);

			if ($this->form_validation->run('create_article') == FALSE)
			{
				$this->load->view('panel/post/create');
			}
			else
			{
				if (!empty($_POST)) {

					$data = array(
						"title" => str_replace(" ", "_", $this->input->post('title')),
						"description" => $this->input->post('description'),
						"date" => date("Y.m.d")
					);

					$this->Database_model->create('posts', $data);
				}

				$this->session->set_flashdata('alert', 'Successfully add post! :)');
				redirect("panel/post/read"); 
			}
			$this->load->view('partials/footer');
		}
		else
		{
			redirect("/");
		}
	}

}