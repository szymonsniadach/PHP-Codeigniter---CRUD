<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session_model extends CI_Model {

	function unset_all_session() {
		
		$session_data = array(
			"login",
			"logged_in",
			"is_admin"
		);

		$this->session->unset_userdata($session_data); 

	}

}