<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Database_model');
		$this->load->library('pagination');
		$this->load->helper('form');
	}

	public function index()
	{
		$config = array();
		$config['base_url'] = base_url()."articles/index";
		$config['total_rows'] = $this->Database_model->record_count("posts");
		$config['per_page'] = 3;
		$config['num_links'] = 3;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		// $data['results'] = $this->Posts_model->fetch_posts($config['per_page'], $page, "date", "ASC");
		$data['links'] = $this->pagination->create_links();


		//$data['results'] = $this->Database_model->get_last_entries('posts', 'date');

		$data['title'] = "Articles";
		$this->load->view('partials/header', $data);


		if (empty($_SESSION['sort'])) {
			$_SESSION['sort'] = "ASC";
		}

		if (!empty($_POST))
		{
			$select = $this->input->post('sort_post');

			switch ($select) {
				case 'latest':
					$_SESSION['sort'] = "DESC";
					$data['results'] = $this->Database_model->fetch_posts("posts", $config['per_page'], $page, "date", $_SESSION['sort']);
					
					// echo "<pre>";
					// var_dump($data['article']);
					// echo "</pre>";
					break;

				case 'oldest':
					$_SESSION['sort'] = "ASC";
					$data['results'] = $this->Database_model->fetch_posts("posts", $config['per_page'], $page, "date", $_SESSION['sort']);
					
					break;

				default:
					break;
			}
		}else{
			$data['results'] = $this->Database_model->fetch_posts("posts", $config['per_page'], $page, "date", $_SESSION['sort']);
		}

		

		$this->load->view('articles', $data);

		$this->load->view('partials/footer');
		
	}

	public function post($id) {

		$data['title'] = "Post:  ".$id;
		$this->load->view('partials/header', $data);

		$where = array('id' => $id);
		$data['article'] = $this->Database_model->get_single("posts", $where);


		$where2 = array('id_post' => $data['article']->id);
		$data['comment'] = $this->Database_model->get_where("comments", $where2);

		if (!empty($_POST)) {
			$id_post = $data['article']->id;
			$name = $this->input->post('name');
			$text = $this->input->post('comment');

			$where = array(
				'id_post' => $id_post,
				'name' => $name,
				'text' => $text
			);

			$this->Database_model->create("comments", $where);
			refresh();
		}

		$this->load->view("post", $data);

		$this->load->view('partials/footer');

	}

}