<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_model extends CI_Model{



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