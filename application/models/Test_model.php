<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH .'models/Main_model.php');

class Test_model extends Main_model{

public function __construct()
{
  parent::__construct();
}



public function obtener_tabla(){
$q = $this->db->get('prueba');
if ($q->num_rows() >0 ) return $q;//->result();
}

}


?>