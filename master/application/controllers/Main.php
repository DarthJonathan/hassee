<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		if(isset($this->session->isLogged === True))
		{
			$this->template->load('default', 'dashboard', $data);
		}else
		{
			redirect('/main/login');
		}
	}

	public function login()
	{
		if(isset($this->session->isLogged === True))
		{
			redirect('/main');
		}else
		{
			$this->load->view('')
		}
	}
}
