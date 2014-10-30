<?php

class Provincias_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }
   
   function inserta($datos = array()){
      
    
      $this->db->insert('provincia', $datos);
      return $this->db->insert_id();
   }
   function dame_todo(){
   		$lista_obj = array();
     	$sql = "SELECT * FROM provincias ORDER BY provincia "; 
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
}

?>