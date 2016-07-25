<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('isLogged') == True)
		{
			redirect('main/dashboard');
		}else
		{
			$this->load->view('logins/login_admin.php');
		}
	}

	public function dashboard(){

		$data['clients'] = $this->admin_model->get_all('master_clients');

		$this->template->load('default', 'dashboard/home', $data);

	}

	public function login()
	{
		
		if($this->input->post('submit'))
		{
			$username = $this->input->post('username');
			$password = hash_password($this->input->post('password'));

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
				$this->session->set_flashdata('failed', 'Username or password error');
				redirect('/main');
			}
		}
		else{
			redirect('main');
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
		$email = $this->input->post('email');

		if($user = $this->login_model->checkUser($email))
		{
			$this->login_model->resetPass($email);
			$this->session->set_flashdata("status", "Success Reseting Your Password, Please Check Your Email");
			redirect('/main');
		}else
		{
			$this->session->set_flashdata("status", "No User Registed With That Email");
			redirect('/main/forget');
		}


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