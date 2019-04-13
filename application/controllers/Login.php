<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH .'controllers/Main_controller.php');

class Login extends Main_Controller {

	public function index()
	{
		
		//$this->load->view('login');

		if ($this->session->userdata('username'))
		{
		  redirect('welcome');
		}

		log_message('error',"entra a login");
		//log_message('error',md5($_POST['password']));
		
		if (isset($_POST['password'])){
			
			$this->load->model('usuario_model');
			if ($this->usuario_model->login($_POST['username'], md5($_POST['password'])))
			  {
				$usuario= $this->usuario_model->obtener_usuario($_POST['username'])->row();                       
				$this->session->set_userdata('username', $_POST['username']);		
			
				redirect('welcome/login');
			  }
			  else
			  {
				$this->session->set_flashdata('error', 'Usuario o contraseña incorrectos');
				
				redirect('login'); 
			  }       
	
		}
		$this -> default_vars(array('js/sb-admin-2.min.js'));
		$this->load->view('login');  
		
	}




	
	public function logout()
	{
	  $this->session->sess_destroy();
	  redirect('login');
	}
  
	
  }








