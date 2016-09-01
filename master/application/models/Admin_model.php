<?php

class Admin_model extends CI_Model{

	public function get_all($table){

		return $this->db->get($table)->result();

	}

	public function insert_data($table,$data){
		$this->db->insert($table,$data);
	}

}	