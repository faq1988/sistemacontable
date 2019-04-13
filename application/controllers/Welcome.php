<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH .'controllers/Main_controller.php');

class Welcome extends Main_Controller {

	public function index()
	{
		//$this -> default_vars();
		//$this->load->view('menu');
		//$this->load->view('portal');
		//$this->load->view('footer');
		redirect('Login');
	}




	public function login()
	{
	  if (!$this->session->userdata('username'))
	  {
		redirect('login');
	  }
  
	  $this->load->model('usuario_model');
	  $usuario= $this->usuario_model->obtener_usuario($this->session->userdata('username')) ->result();
		
	  $this -> default_vars();
	  $this->load->view('menu');
	  $this->load->view('portal');
	  $this->load->view('footer');
	}



	
  }

