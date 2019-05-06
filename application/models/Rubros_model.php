<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH .'models/Main_model.php');

class Rubros_model extends Main_model{
public function __construct()
{
  parent::__construct();
}


function crear_rubro($data){
    $id=(isset($data['id']) && $data['id']!='') ? $data['id']:0;
    $qry="REPLACE INTO rubro VALUES( 
                {$id},
                '{$data['descripcion']}',                 
                0,                                
                sysdate(),
                0
                );";
              //var_dump($qry);exit;
    return $this -> query($qry,$this -> db,'simple',array('manage_exception'=>TRUE));
}

public function load_rubro($filter_array = array()){
  $filter = '';
  $filter .= (isset($filter_array['st'])) ? " AND st={$filter_array['st']} ": ' ';
  $qry="SELECT * 
        FROM rubro
        WHERE  1=1 {$filter}";
  return $this -> query($qry,$this -> db,'array',array('manage_exception'=>TRUE));
}

//baja logica
public function delete_rubro($id){
  $qry="UPDATE rubro
        set st=1
        WHERE id={$id}";
  return $this -> query($qry,$this -> db,'simple',array('manage_exception'=>TRUE));
}

public function obtener_rubro($id){

$this->db->where('id', $id);
$q = $this->db->get('rubro');
if ($q->num_rows() >0 ) return $q;//->result();
}




function eliminar_rubro($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('rubro');
	}



}


?>