<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH .'controllers/main_controller.php');

class Login extends Main_Controller {

	public function index()
	{
		$this -> default_vars(array('js/sb-admin-2.min.js'));
		$this->load->view('login');
	}
	
  }

