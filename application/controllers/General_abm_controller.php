
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH .'controllers/Main_controller.php');

class General_abm_controller extends Main_Controller {

	public function index()
	{
		
    if (!$this->session->userdata('username'))
	  {
		redirect('login');
	  }

    $this -> default_vars(array(base_url().'js/rubros.js',base_url().'js/general_abm.js'));
    $data = array('active_classes' => array('t_abm','l1_gral_bm'));
    $data['default_abm']='rubro';
    $data['rubro']=$this -> load -> view('rubro',$data,TRUE);
		$this->load->view('menu',$data);
		$this->load->view('general_abm');
    $this->load->view('footer');
    }
    


    public function crear_rubro()
  {    
    $this->form_validation->set_rules('descripcion', 'Descripción', 'required');
     
    
    if ($this->form_validation->run() == FALSE)      
      {  
        echo JSON_ENCODE(array( 'success' => FALSE,
                                'response' => $this -> serialize_form_error(
                                      array('descripcion'))));
        exit;
      } 
      else{
        $this->load->model('rubros_model');
        //genera variables por cada valor enviado por post
        extract($this -> input -> post(),EXTR_OVERWRITE);
        $res = $this->rubros_model->crear_rubro(compact('id','descripcion'));
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

  public function load_rubro(){
    $this->load->model('rubros_model');
    //genera variables por cada valor enviado por post
    extract($this -> input -> post(),EXTR_OVERWRITE);
    $res = $this->rubros_model->load_rubro(compact('st'));
    echo JSON_ENCODE($res);
    exit;
  }

  public function delete_rubro(){
    $this->load->model('rubros_model');
    //genera variables por cada valor enviado por post
    extract($this -> input -> post(),EXTR_OVERWRITE);
    $res = $this->rubros_model->delete_rubro($id);
    echo JSON_ENCODE($res);
    exit;
  }
	
  }

