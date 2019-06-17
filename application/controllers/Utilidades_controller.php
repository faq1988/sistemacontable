
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH .'controllers/Main_controller.php');

class Utilidades_controller extends Main_Controller {

	public function index()
	{
		
    if (!$this->session->userdata('username'))
	  {
		redirect('login');
	  }

		$this -> default_vars(array(base_url().'js/clientes.js'));
		$data = array('active_classes' => array('t_abm','l1_clientes'));
		$this->load->view('menu',$data);
		$this->load->view('clientes');
    $this->load->view('footer');
    }
    


  //asume form validation primero
  public function serialize_form_error($arr){
    $errors=array();
    foreach ($arr as $value) {
        $errors[$value]=form_error($value);
    }
    return $errors;
  }

  public function load_provincias(){
    $this->load->model('provincias_model');
    //genera variables por cada valor enviado por post
    extract($this -> input -> post(),EXTR_OVERWRITE);
    $res = $this->provincias_model->load_provincias();
    echo JSON_ENCODE($res);
    exit;
  }


  public function load_tipo_comprobante(){
    $this->load->model('tipo_comprobante_model');
    //genera variables por cada valor enviado por post
    extract($this -> input -> post(),EXTR_OVERWRITE);
    $res = $this->tipo_comprobante_model->load_tipo_comprobante(compact('st'));
    echo JSON_ENCODE($res);
    exit;
  }

	
  }

