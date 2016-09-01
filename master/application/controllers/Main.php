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
		$data['title'] = 'Home';
		

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

	public function add_client(){
		$data['title'] = 'Add Client';
		$this->template->load('default', 'dashboard/add_client',$data);
	}

	public function register_client(){
		$this->form_validation->set_rules('company_email', 'Email', 'required|valid_email|is_unique[master_clients.email]');
		$this->form_validation->set_rules('company_password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[company_password]');

		if($this->form_validation->run() == FALSE){

			redirect('main/add_client');

		}else{

			if($this->input->post('submit')){
				//configuration
				$config['upload_path']	 = './assets';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']    	 = '2000';
				$config['max_width'] 	= '2000';
				$config['max_height'] 	= '1500';

				//initialization
				$this->upload->initialize($config);

				//upload
				
				if($this->upload->do_upload('company_logo')){

					$logo = $this->upload->data();

				}

				if($this->upload->do_upload('company_background')){

					$background = $this->upload->data();

				}

				$data_client = array(
						'name' => $this->input->post('company_name'),
						'person_in_charge' => $this->input->post('company_pic'),
						'phone' => $this->input->post('company_phone'),
						'company_admin' => $this->input->post('company_admin'),
						'password' => hash_password($this->input->post('company_password')),
						'url' => $this->input->post('company_url').'gethassee.com',
						'email' => $this->input->post('company_email'),
						'website' => $this->input->post('company_website'),
						'color_1' => $this->input->post('company_color1'),
						'color_2' => $this->input->post('company_color2'),
						'registration_date' => date('Y-m-d'),
						'background' => $background['file_name'],
						'logo' => $logo['file_name'],
						'plan_id' => $this->input->post('company_plan_id'),
						'status' => 1

					);

				$this->admin_model->insert_data('master_clients',$data_client);

				$this->session->set_flashdata('success', 'Client successfully added');

				redirect('main/dashboard');
			}
		}
	}

	public function calc_total(){

		$total = $this->input->post('subtotal');


		echo $total;
		
	}




}