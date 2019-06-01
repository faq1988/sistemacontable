<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH .'models/Main_model.php');

class Proveedores_model extends Main_model{
public function __construct()
{
  parent::__construct();
}


function crear_proveedor($data){
    $id=(isset($data['id']) && $data['id']!='') ? $data['id']:0;
    $qry="REPLACE INTO proveedor VALUES( 
                {$id},
                '{$data['razon_social']}', 
                '{$data['categoria_iva']}', 
                '{$data['tipo_documento']}', 
                {$data['cuit']}, 
                '{$data['domicilio']}',                 
                '{$data['altura']}', 
                {$this -> db -> escape($data['piso'])}, 
                '{$data['departamento']}', 
                '{$data['localidad']}',                 
                '{$data['telefono']}', 
                '{$data['email']}',
                0,
                0,
                sysdate()                
                );";
    $res= $this -> query($qry,$this -> db,'simple',array('manage_exception'=>TRUE));
    return $res;
}

public function load_proveedor($filter_array = array()){
  $filter = '';
  $filter .= (isset($filter_array['st'])) ? " AND st={$filter_array['st']} ": ' ';
  $qry="SELECT * 
        FROM proveedor
        WHERE  1=1 {$filter}";
  return $this -> query($qry,$this -> db,'array',array('manage_exception'=>TRUE));
}

//baja logica
public function delete_proveedor($id){
  $qry="UPDATE proveedor
        set st=1
        WHERE id={$id}";
  return $this -> query($qry,$this -> db,'simple',array('manage_exception'=>TRUE));
}

public function obtener_proveedor($id){

$this->db->where('id', $id);
$q = $this->db->get('proveedor');
if ($q->num_rows() >0 ) return $q;//->result();
}




function eliminar_proveedor($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('proveedor');
	}



}


?>