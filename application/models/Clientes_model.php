<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH .'models/Main_model.php');

class Clientes_model extends Main_model{
public function __construct()
{
  parent::__construct();
}


function crear_cliente($data){
    $id=(isset($data['id'])) ? $data['id']:0;
    $qry="REPLACE INTO cliente VALUES( 
                {$id},
                '{$data['razon_social']}', 
                '{$data['categoria_iva']}', 
                '{$data['tipo_documento']}', 
                {$data['cuit']}, 
                '{$data['domicilio']}',                 
                '{$data['altura']}', 
                {$data['piso']}, 
                '{$data['departamento']}', 
                '{$data['localidad']}',                 
                '{$data['telefono']}', 
                '{$data['email']}',
                0,
                0,
                sysdate()
                );";
              var_dump($qry);exit;
    return $this -> query($qry,$this -> db,'simple',array('manage_exception'=>TRUE));
}

public function load_cliente($filter_array = array()){
  $filter = '';
  $filter .= (isset($filter_array['st'])) ? " AND st={$filter_array['st']} ": ' ';
  $qry="SELECT * 
        FROM cliente
        WHERE  1=1 {$filter}";
  return $this -> query($qry,$this -> db,'array',array('manage_exception'=>TRUE));
}

//baja logica
public function delete_cliente($id){
  $qry="UPDATE cliente
        set st=1
        WHERE id={$id}";
  return $this -> query($qry,$this -> db,'simple',array('manage_exception'=>TRUE));
}

public function obtener_cliente($id){

$this->db->where('id', $id);
$q = $this->db->get('cliente');
if ($q->num_rows() >0 ) return $q;//->result();
}




function eliminar_cliente($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('cliente');
	}



}


?>