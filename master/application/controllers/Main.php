<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		if($this->session->isLogged == True)
		{
			$this->load->view('template/default.php', 'dashboard.php');
		}else
		{
			redirect('/main/login');
		}
	}

	public function login()
	{
		if($this->session->isLogged === True)
		{
			redirect('/main');
		}else
		{
			$this->load->view('login_admin.php');
		}
	}

	public function logout ()
	{
		session_destroy();
		redirect('/main');
	}
}