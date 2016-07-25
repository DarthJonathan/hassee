<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function checkUsername ($username, $password)
	{
		return $this->db->query("SELECT * FROM `master_users` WHERE `username` = '$username' AND `password` = '$password'")->row();
	}

	public function resetPass ()
	{
		
	}
}