<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH .'models/Main_model.php');

class Usuario_model extends Main_model{

public function __construct()
{
	parent::__construct();
}


public function login($username, $password){
	$qry=" SELECT 1 FROM usuario WHERE username='{$username}' AND password='{$password}';";
	return $this -> query($qry,$this -> db,'bool');
	
}



function crear_usuario($data){
		
		$this->db->insert('usuario', array('username'=>$data['nombre_usuario'], 'password'=>md5($data['contraseña']), 'email'=>$data['email'], 'rol'=>$data['rol']
			, 'id_establecimiento'=>$data['id_establecimiento'], 'id_persona'=>$data['id_persona']));
	}



public function obtener_usuario($username){

$this->db->where('username', $username);
$q = $this->db->get('usuario');
if ($q->num_rows() >0 ) return $q;//->result();
}


/*
public function obtener_perfil($username)
{		
		$this->db->from('usuario u');
		$this->db->join('persona p', 'u.tipo_doc = p.tipo_doc and u.doc = p.doc', 'left');
		//$this->db->join('persona p', 'u.doc = p.doc', 'left');		
		$this->db->where('u.username =', $username);		
		$query = $this->db->get();
  		if ($query->num_rows() >0 ) return $query;//->result();
}
*/


function eliminar_usuario($id)
	{
		$this->db->where('id =', $id);
		$this->db->delete('usuario');
	}


function cambiar_password($username, $password)
{
	$this->db->set('password', $password);    
    $this->db->where('username', $username);
    $this->db->update('usuario');
}

}


?>