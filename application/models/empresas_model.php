<?php

class Empresas_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }
   
   function inserta($datos = array()){
      
    
      $this->db->insert('empresas', $datos);
      return $this->db->insert_id();
   }
   function dame_empresa_id($id){
   		$lista_obj = array();
     	$sql = "SELECT * FROM empresas WHERE id = ? "; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_select_empresa(){
   		$lista_obj = array();
     	$sql = "SELECT g.id, g.nombre FROM empresas g"; 
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_empresa_idgerente($id){
   		$lista_obj = array();
     	$sql = "SELECT * FROM empresas WHERE gerente = ? "; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_todo(){
   		$lista_obj = array();
     	$sql = "SELECT * FROM empresas"; 
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_select_empresa_idguarderia($id){
   		$lista_obj = array();
     	$sql = "SELECT e.id, e.nombre FROM rel_empresas_guarderia r, empresa e WHERE r.idempresa=e.id r.idguarderia = ? "; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function actualiza($datos = array()) {
   	
        $this->db->where('id', $datos['id']);
        return $this->db->update('empresas', $datos);
    }
}

?>