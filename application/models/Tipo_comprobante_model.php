<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH .'models/Main_model.php');

class Tipo_comprobante_model extends Main_model{
public function __construct()
{
  parent::__construct();
}


function crear_tipo_comprobante($data){
    $id=(isset($data['id']) && $data['id']!='') ? $data['id']:0;
    $qry="REPLACE INTO tipo_comprobante VALUES( 
                {$id},
                '{$data['descripcion']}',                 
                0,                                
                sysdate(),
                0
                );";
              //var_dump($qry);exit;
    return $this -> query($qry,$this -> db,'simple',array('manage_exception'=>TRUE));
}

public function load_tipo_comprobante($filter_array = array()){
  $filter = '';
  $filter .= (isset($filter_array['st'])) ? " AND st={$filter_array['st']} ": ' ';
  $qry="SELECT * 
        FROM tipo_comprobante
        WHERE  1=1 {$filter}";
  return $this -> query($qry,$this -> db,'array',array('manage_exception'=>TRUE));
}

//baja logica
public function delete_tipo_comprobante($id){
  $qry="UPDATE tipo_comprobante
        set st=1
        WHERE id={$id}";
  return $this -> query($qry,$this -> db,'simple',array('manage_exception'=>TRUE));
}

public function obtener_tipo_comprobante($id){

$this->db->where('id', $id);
$q = $this->db->get('tipo_comprobante');
if ($q->num_rows() >0 ) return $q;//->result();
}




function eliminar_tipo_comprobante($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('tipo_comprobante');
	}



}


?>