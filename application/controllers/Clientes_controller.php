<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH .'controllers/Main_controller.php');

class Clientes_controller extends Main_Controller {

	public function index()
	{
		
        if (!$this->session->userdata('username'))
	  {
		redirect('login');
	  }

		$this -> default_vars(array('js/clientes.js'));
		$data = array('active_classes' => array('t_abm','l1_clientes'));
		$this->load->view('menu',$data);
		$this->load->view('clientes');
		$this->load->view('footer');
    }
    


    public function crear_cliente()
  {    
      $this->form_validation->set_rules('razon_social', 'Razón social', 'required');
      $this->form_validation->set_rules('categoria_iva', 'Categoría de IVA', 'required');
      $this->form_validation->set_rules('tipo_documento', 'Tipo de documento', 'required');
      $this->form_validation->set_rules('cuit', 'Cuit / Cuil', 'required');
      $this->form_validation->set_rules('domicilio', 'Domicilio', 'required');
      $this->form_validation->set_rules('altura', 'Altura', 'required|numeric|greater_than[0]');
      //$this->form_validation->set_rules('piso', 'Piso', 'required');
      //$this->form_validation->set_rules('departamento', 'Departamento', 'required');
      $this->form_validation->set_rules('localidad', 'Localidad', 'required');
      $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
      $this->form_validation->set_rules('email', 'Correo electrónico', 'required');
      
      
      
      if ($this->form_validation->run() == FALSE)      
      {              
        $this -> default_vars(array('js/clientes.js'));
		$data = array('active_classes' => array('t_abm','l1_clientes'));
		$this->load->view('menu',$data);
		$this->load->view('clientes');
		$this->load->view('footer');
      } 
      else
      {
        $data = array(
      'razon_social' => $this->input->post('razon_social'),
      'categoria_iva' => $this->input->post('categoria_iva'),
      'tipo_documento' => $this->input->post('tipo_documento'),
      'cuit' => $this->input->post('cuit'),
      'domicilio' => $this->input->post('domicilio'),      
      'altura' => $this->input->post('altura'),
      'piso' => $this->input->post('piso'),
      'departamento' => $this->input->post('departamento'),
      'localidad' => $this->input->post('localidad'),
      'telefono' => $this->input->post('telefono'),
      'email' => $this->input->post('email'),      
      );

        $this->load->model('clientes_model');
        $this->clientes_model->crear_cliente($data);
        redirect("Clientes_controller");
      }

  }

	
  }

