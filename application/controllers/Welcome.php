<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this -> default_vars();
		$this->load->view('fixed');
	}
	
	protected function default_vars($js_array=array(),$css_array=array()){
	  $js=array( );
	  $css=array( );
  
		  array_push($css,base_url().'css/bootstrap/dist/css/bootstrap.min.css');
		  array_push($css,base_url().'css/font-awesome/css/font-awesome.min.css');
		  array_push($css,base_url().'css/Ionicons/css/ionicons.min.css');
		  array_push($css,base_url().'css/AdminLTE.min.css');
		  array_push($css,base_url().'css/skins/_all-skins.min.css');

		  array_push($js,base_url().'js/jquery.min.js');
		  array_push($js,base_url().'js/bootstrap.min.js');
		  array_push($js,base_url().'js/plugins/adminlte.min.js');
		  array_push($js,base_url().'js/plugins/jquery.slimscroll.min.js');
		  array_push($js,base_url().'js/plugins/fastclick.js');
  
		  $data=array();
		  $data["js_to_load"]=array_unique($js);
	  $data["css_to_load"]=array_unique($css);
	  if($this->load->view('init_view','',TRUE)!== '')
		$this -> load -> view('init_view',$data);
  
	  }
  }

