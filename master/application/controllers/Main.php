<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		if($this->session->isLogged == True)
		{
			$this->load->view('template/default.php', 'dashboard/home.php');
		}else
		{
			redirect('/main/login');
		}
	}

	public function login()
	{
		if($this->session->isLogged === True || !$_POST)
		{
			redirect('/main');
		}else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->load->model('login_model');
			if($passwordHashed = $this->login_model->checkUsername($username))
			{
				
			}


		}
	}

	public function logout ()
	{
		session_destroy();
		redirect('/main');
	}
}