<?php

class Rel_guarderia_familiar_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }
   
   function inserta($datos = array()){
      
    
      $this->db->insert('rel_guarderia_familiar', $datos);
      return $this->db->insert_id();
   }
   function actualiza($datos = array()) {
   	
        $this->db->where('id', $datos['id']);
        return $this->db->update('rel_guarderia_familiar', $datos);
    }
   
   function dame_guarderia_idfamiliar($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM rel_guarderia_familiar where idfamiliar='$id'";
     	$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
}

?>