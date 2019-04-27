<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Main_model extends CI_Model{
    protected $db;
    public function __construct()
    {
        $this->load->helper('main');
        parent::__construct();
        $this -> db = $this -> load -> database('default',true);
    }

    protected function query($query_str, $database, $type = "PDOStatement", $aditional = array()){
        $result = array("success" => TRUE, "msg" => "", "result" => TRUE);

        //Parametros adicionales
        $transactional     = defaultFor($aditional["transactional"], FALSE);
        $row_number        = defaultFor($aditional["row_number"], FALSE);
        $col_name          = defaultFor($aditional["col_name"], FALSE);
        $utf8        	   = defaultFor($aditional["utf8"], FALSE);
        $manage_exception  = defaultFor($aditional["manage_exception"], FALSE);
        $get_fields        = defaultFor($aditional["get_fields"], FALSE);
        $level             = defaultFor($aditional["isolation_level"], FALSE);
        if ( (! is_object($database)) || (get_class($database) !== "CI_DB_pdo_mysql_driver") ){
            if($manage_exception){
                return array("success" => FALSE, "msg" => "La referencia a la base de datos es incorrecta.");
            }else{
                echo "La referencia a la base de datos es incorrecta.";
                return FALSE;
            }
        }

        $execute = ($type == "simple") ? "simple_query" : "query";

        try{
            if($level){
                $dbtype = reset(explode(":", $database -> hostname));
                $database -> simple_query ( $this -> _qry_db_isolation_level($dbtype, $level) );
            }

            if($transactional)
                $database -> trans_start();

            if( is_array($query_str) ){
                $count = count($query_str);
                $ind = 1;
                foreach($query_str as $str){
                    if($ind != $count)
                        $database -> simple_query ($str);
                    else
                        $query = $database -> $execute ($str);
                    $ind++;
                }
            }else{
                $query = $database -> $execute ($query_str);
            }

            switch ($type) {
                case 'PDOStatement':
                case 'query'	  : $result["result"] = $query;
                            break;
                case 'none' 	  :
                case 'simple'	  : break;
                case 'array'	  : $result["result"] = $query -> result_array();
                            break;
                case 'row_array'  : if($row_number !== FALSE){
                                        $result["result"] = $query -> row_array($row_number);
                                    }else{
                                        $result["result"] = $query -> row_array();
                                    }
                            break;
                case 'bool'       :
                case 'boolean'    : $result["result"] = ( $query -> num_rows() > 0);
                            break;
                case 'object'	  : $result["result"] = $query -> result();
                            break;
                case 'row'		  : if($row_number !== FALSE){
                                        $result["result"] = $query -> row($row_number);
                                    }else{
                                        $result["result"] = $query -> row();
                                    }
                            break;
                case 'value'	  :
                                    if($query->num_rows > 0){
                                        if($row_number !== FALSE){
                                            $result["result"] = $query -> row_array($row_number);
                                        }else{
                                            $result["result"] = $query -> row_array();
                                        }

                                        if($col_name !== FALSE){
                                            if(key_exists($col_name, $result["result"])){
                                                $result["result"] = $result["result"][$col_name];
                                            }else{
                                                $result["success"] = FALSE;
                                                $result["msg"] = "Selección de campo invalido.";
                                            }
                                        }else{
                                            $result["result"] = reset($result["result"]);
                                        }
                                    }else{
                                        $result["result"] = NULL;
                                    }
                            break;
                default			  :	$result["result"] = $query;
                            break;
            }

            if ($get_fields) {
                $result["fields"] = $query -> field_data();
            }

            if($transactional)
                $database -> trans_complete();

        }catch(PDOException $e){
            if($database->_trans_depth>0){
                $database -> _trans_status = FALSE;
            }

            if($transactional){
                $database -> trans_complete();
            }

            $this -> logger -> e("DB_ERROR", "Code: " . $e -> getCode() . " - " . $e -> getMessage());
            $result["success"] = FALSE;
            $result["result"]  = NULL;
            if(ENVIRONMENT != 'production'){
                $result["msg"] = $e -> getMessage();
            } else {
                $result["msg"] = "Error en la Base de Datos.<br/>(Err. " . $e -> getCode() . " - " . date("Y-m-d H:i:s") . ")";
            }
            $result['error_code'] = $e -> getCode();

            if($manage_exception === -1){
                // Propaga el error a un nivel superior
                throw $e;
            }

        }

        if($utf8 && $result["success"] && !is_object($result["result"]) ){
            $result["result"] = array_to_utf8($result["result"]);
        }

        if($manage_exception === TRUE){
            return $result;
        }else{
            if($result["success"]){
                return $result["result"];
            }
            echo $result["msg"];
            return FALSE;
        }
    }

}