<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH .'controllers/Main_controller.php');

class Venta_controller extends Main_Controller {

	public function index()
	{
		if (!$this->session->userdata('username'))
	  {
		redirect('login');
	  }


		$this -> default_vars(array(base_url().'js/venta.js'));
		$data = array('active_classes' => array('t_compra_venta','l1_venta'));
		$this->load->view('menu',$data);
		$this->load->view('venta');
		$this->load->view('footer');
	}

	
  }

