<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH .'models/Main_model.php');

class Provincias_model extends Main_model{
public function __construct()
{
  parent::__construct();
}


public function load_provincias(){
  $filter = '';
  //$filter .= (isset($filter_array['st'])) ? " AND st={$filter_array['st']} ": ' ';
  $qry="SELECT * 
        FROM provincias
        WHERE  1=1 {$filter}";
  return $this -> query($qry,$this -> db,'array',array('manage_exception'=>TRUE));
}



}


?>