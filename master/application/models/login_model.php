<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function checkUsername ($username)
	{
		$query = $this->db->query("SELECT * FROM `master_users` WHERE `username` = '$username'");

		if($query->num_rows() > 0)
		{
			foreach ($query->result as $row)
			{
				return $row->password;
			}
		}else
		{
			return false;
		}
	}

	
}