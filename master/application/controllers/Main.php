<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('isLogged') == True)
		{
			$this->template->load('default', 'dashboard/home');
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
			$password = hash_password($this->input->post('password'));

			$this->load->model('login_model');
			$user = $this->login_model->checkUsername($username, $password);
			if($user)
			{
				$session_data = array (
					'username' => $usernamne,
					'id' => $user->id,
					'isLogged' => TRUE
					);
				$this->session->set_userdata($session_data);

				redirect('/main');
			}else
			{
				redirect('/main');
			}
		}
	}

	public function forget ()
	{
		if($this->session->userdata('isLogged') == True)
		{
			$this->template->load('default', 'dashboard/home');
		}else
		{
			$this->load->view('logins/forget_password.php');
		}
	}

	public function reset ()
	{
		
	}

	public function logout ()
	{
		$this->session->sess_destroy();
		redirect('/main');
	}

	/* Development Only */
	public function new_user ()
	{
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = hash_password($this->input->post('password'));


		$this->db->query("INSERT INTO `master_users` SET `username` = '$username', `password` = '$password', `email` = '$email'");

		redirect ('/main');
	}

	public function new_user_form ()
	{
		$this->load->view('logins/new_form.php');
	}

}