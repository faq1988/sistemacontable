<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH .'controllers/Main_controller.php');

class Compra_controller extends Main_Controller {

	public function index()
	{
		$this -> default_vars(array('js/compra.js'));
		$this->load->view('menu');
		$this->load->view('compra');
		$this->load->view('footer');
	}

	
  }

