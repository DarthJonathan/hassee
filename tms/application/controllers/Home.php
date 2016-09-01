<?php 

class Home extends CI_Controller{

	public function index(){

		if($this->session->userdata('isLogged') == FALSE){
			redirect('home/login');
		}

	}

	public function login(){

		

	}

}