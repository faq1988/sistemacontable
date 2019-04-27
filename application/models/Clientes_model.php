<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH .'models/Main_model.php');

class Clientes_model extends Main_model{
public function __construct()
{
  parent::__construct();
}


function crear_cliente($data){
    $qry="INSERT INTO cliente VALUES( 
                {$data['razon_social']}, 
                '{$data['categoria_iva']}', 
                '{$data['tipo_documento']}', 
                {$data['cuit']}, 
                '{$data['domicilio']}',                 
                '{$data['altura']}', 
                {$data['piso']}, 
                '{$data['departamento']}', 
                '{$data['localidad']}',                 
                '{$data['telefono']}', 
                '{$data['email']}'
                );";
    return $this -> query($qry,$this -> db,'simple',array('manage_exception'=>TRUE));
}

public function load_cliente($filter_array = array()){
  $filter = '';//definir utilizandoel arreglo de filtros a posterior
  $qry="SELECT * 
        FROM cliente
        WHERE  1=1 {$filter}";
  return $this -> query($qry,$this -> db,'array',array('manage_exception'=>TRUE));
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