<?php

class Guarderias_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }
   
   function inserta($datos = array()){
      
    
      $this->db->insert('guarderias', $datos);
      return $this->db->insert_id();
   }
   function inserta_relacion($datos = array()){
      
    
      $this->db->insert('rel_empresa_guarderia', $datos);
   }
   function dame_guarderia_id($id){
   		$lista_obj = array();
     	$sql = "SELECT * FROM guarderias WHERE id = ? "; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_guarderia_iddirector($id){
   		$lista_obj = array();
     	$sql = "SELECT * FROM guarderias WHERE director = ? "; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_guarderia_url($id){
   		$lista_obj = array();
     	$sql = "SELECT * FROM guarderias WHERE url = ? "; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_director_idguarderia($id){
   		$lista_obj = array();
     	$sql = "SELECT * FROM guarderias WHERE id = ? "; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_select_guarderia_idempresa($id){
   		$lista_obj = array();
     	$sql = "SELECT g.id, g.nombre FROM rel_empresa_guarderia r, guarderias g WHERE r.idguarderia=g.id AND r.idempresa = ? "; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_select_guarderia(){
   		$lista_obj = array();
     	$sql = "SELECT g.id, g.nombre FROM guarderias g"; 
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_select_guarderia_idgerente($id){
   		$lista_obj = array();
     	$sql = "SELECT g.id, g.nombre FROM guarderias g, rel_empresa_guarderia r, empresas e WHERE r.idempresa=e.id AND r.idguarderia=g.id AND e.gerente = ?"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_guarderia_tutor($id){
   		$lista_obj = array();
     	$sql = "SELECT g.id FROM guarderias g, rel_guarderia_tutor r WHERE r.idguarderia=g.id AND r.idtutor = ?"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function actualiza($datos = array()) {
   	
        $this->db->where('id', $datos['id']);
        return $this->db->update('guarderias', $datos);
    }
}

?>