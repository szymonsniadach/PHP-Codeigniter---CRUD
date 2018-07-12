<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Database_model');
	}

	public function index($id)
	{
		if ((isset($_SESSION['logged_in'])) && (isset($_SESSION['is_admin']) == TRUE)) {
			$this->Database_model->delete('posts', $id);
			redirect("panel/post/read");
		}else{
			redirect('/');
		}
	}

}