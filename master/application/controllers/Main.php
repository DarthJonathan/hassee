<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		if($this->session->isLogged == True)
		{
			$this->template->load('default', 'dashboard', $data);
		}else
		{
			$this->load->view('logins/login_admin.php');
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
				echo 'okay';
			}else
			{
				redirect('/main');
			}
		}
	}

	public function logout ()
	{
		session_destroy();
		redirect('/main');
	}
}