<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model{



public function __construct()
{
  parent::__construct();
}


function crear_cliente($data){
		
    $this->db->insert('cliente', 
        array(	'razon_social'=>$data['razon_social'], 
                'categoria_iva'=>$data['categoria_iva'], 
                'tipo_documento'=>$data['tipo_documento'], 
                'cuit'=>$data['cuit'], 
                'domicilio'=>$data['domicilio'],                 
                'altura'=>$data['altura'], 
                'piso'=>$data['piso'], 
                'depto'=>$data['departamento'], 
                'localidad'=>$data['localidad'],                 
                'telefono'=>$data['telefono'], 
                'email'=>$data['email']
                ));
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