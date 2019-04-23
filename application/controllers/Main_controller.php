<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Controller extends CI_Controller {

	protected function default_vars($js_array=array(),$css_array=array()){
	  $js=array();
	  $css=array();
  
		  array_push($css,base_url().'css/bootstrap/dist/css/bootstrap.min.css');
			//array_push($css,base_url().'css/fontawesome-free/css/fontawesome.min.css');
			array_push($css,'https://use.fontawesome.com/releases/v5.8.1/css/all.css');
			
			
		  array_push($css,base_url().'css/Ionicons/css/ionicons.min.css');
		  array_push($css,base_url().'css/AdminLTE.min.css');
		  array_push($css,base_url().'css/skins/_all-skins.min.css');

		  array_push($js,base_url().'js/plugins/jquery.min.js');
		  array_push($js,base_url().'js/plugins/bootstrap.min.js');
		  array_push($js,base_url().'js/plugins/adminlte.min.js');
		  array_push($js,base_url().'js/plugins/jquery.slimscroll.min.js');
		  array_push($js,base_url().'js/plugins/fastclick.js');
		  array_push($js,base_url().'js/plugins/Tree.js');
			array_push($js,base_url().'js/menu.js');
			array_push($js,base_url().'js/utils.js');
  
		$js=array_merge($js,(is_array($js_array) && count($js_array)) ? $js_array: array( ));
		$css=array_merge($css,(is_array($css_array) && count($css_array)) ? $css_array: array( ));
		$data=array();
		$data["js_to_load"]=array_unique($js);
	  $data["css_to_load"]=array_unique($css);
	  if($this->load->view('init_view','',TRUE)!== '')
			$this -> load -> view('init_view',$data);
  
	  }
  }

