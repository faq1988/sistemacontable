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
    $this->form_validation->set_rules('localidad', 'Localidad', 'required');
    $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
    $this->form_validation->set_rules('email', 'Correo electrónico', 'required');
      
    
    if ($this->form_validation->run() == FALSE)      
      {  
        echo JSON_ENCODE(array( 'success' => FALSE,
                                'response' => $this -> serialize_form_error(
                                      array('razon_social',
                                            'categoria_iva',
                                            'tipo_documento',
                                            'cuit',
                                            'domicilio',
                                            'altura',
                                            'localidad',
                                            'telefono',
                                            'email'))));
        exit;
      } 
      else{
        $this->load->model('clientes_model');
        //genera variables por cada valor enviado por post
        extract($this -> input -> post(),EXTR_OVERWRITE);
        $res = $this->clientes_model->crear_cliente(compact('razon_social','categoria_iva','tipo_documento','cuit','domicilio','altura','piso','departamento','localidad','telefono','email'));
        $res=TRUE;
        echo JSON_ENCODE(array( 'success' => FALSE,
                                'response' =>$res ));
      }

  }
  //asume form validation primero
  public function serialize_form_error($arr){
    $errors=array();
    foreach ($arr as $value) {
        $errors[$value]=form_error($value);
    }
    return $errors;
  }
	
  }

