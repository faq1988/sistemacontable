<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH .'controllers/main_controller.php');

class Welcome extends Main_Controller {

	public function index()
	{
		$this -> default_vars();
		$this->load->view('menu');
		$this->load->view('portal');
		$this->load->view('footer');
	}

	
  }

