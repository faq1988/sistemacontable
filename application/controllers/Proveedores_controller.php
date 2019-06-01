
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH .'controllers/Main_controller.php');

class Proveedores_controller extends Main_Controller {

	public function index()
	{
		
    if (!$this->session->userdata('username'))
	  {
		redirect('login');
	  }

		$this -> default_vars(array(base_url().'js/proveedores.js'));
		$data = array('active_classes' => array('t_abm','l1_proveedores'));
		$this->load->view('menu',$data);
		$this->load->view('proveedores');
    $this->load->view('footer');
    }
    


    public function crear_proveedor()
  {    
    $this->form_validation->set_rules('razon_social', 'Razón social', 'required');
    $this->form_validation->set_rules('categoria_iva', 'Categoría de IVA', 'required');
    $this->form_validation->set_rules('tipo_documento', 'Tipo de documento', 'required');
    $this->form_validation->set_rules('cuit', 'Cuit / Cuil', 'required');
    $this->form_validation->set_rules('domicilio', 'Domicilio', 'required');
    $this->form_validation->set_rules('altura', 'Altura', 'required|numeric|greater_than[0]');
    $this->form_validation->set_rules('localidad', 'Localidad', 'required');
    $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
    $this->form_validation->set_rules('email', 'Correo electrónico', 'required|valid_email');
      
    
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
        $this->load->model('proveedores_model');
        //genera variables por cada valor enviado por post
        extract($this -> input -> post(),EXTR_OVERWRITE);
        $res = $this->proveedores_model->crear_proveedor(compact('id','razon_social','categoria_iva','tipo_documento','cuit','domicilio','altura','piso','departamento','localidad','telefono','email'));
        echo JSON_ENCODE($res);
        exit;
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

  public function load_proveedor(){
    $this->load->model('proveedores_model');
    //genera variables por cada valor enviado por post
    extract($this -> input -> post(),EXTR_OVERWRITE);
    $res = $this->proveedores_model->load_proveedor(compact('st'));
    echo JSON_ENCODE($res);
    exit;
  }

  public function delete_proveedor(){
    $this->load->model('proveedores_model');
    //genera variables por cada valor enviado por post
    extract($this -> input -> post(),EXTR_OVERWRITE);
    $res = $this->proveedores_model->delete_proveedor($id);
    echo JSON_ENCODE($res);
    exit;
  }
	
  }

