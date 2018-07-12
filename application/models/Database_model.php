<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function create($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function get($table)
	{
		$query = $this->db->get($table);
		return $query->result();
	}

	public function get_single($table, $where)
	{
		// $query = $this->db->get_where($table, array('id' => $id));
		$this->db->where($where);
		$query = $this->db->get($table);
		return $query->row();
	}

	public function get_where($table, $where)
	{
		$this->db->where($where);
		$query = $this->db->get($table);
		return $query->result();
	}

	public function get_last_entries($table, $what) {
		$this->db->order_by($what, 'DESC');
		$query = $this->db->get($table);

		return $query->result();
	}

	public function delete($table, $id)
	{
		$this->db->delete($table, array('id' => $id));
	}

	public function edit($table, $id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($table, $data);
	}

	public function record_count($table)
	{
		return $this->db->count_all($table);
	}

	public function fetch_posts($table, $limit, $start, $what, $sort)
	{
		$this->db->limit($limit, $start);
		$this->db->order_by($what, $sort);
		$query = $this->db->get($table);

		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

}