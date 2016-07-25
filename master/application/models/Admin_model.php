<?php

class Admin_model extends CI_Model{

	public function get_all($table){

		return $this->db->get($table)->result();

	}

}	