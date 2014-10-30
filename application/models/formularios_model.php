<?php

class Formularios_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }
   
   function inserta($datos = array()){
      
    
      $this->db->insert('formularios', $datos);
      return $this->db->insert_id();
   }
   function update($datos = array()){
   	
        $this->db->where('idclase', $datos['idclase']);
        return $this->db->update('formularios', $datos);
   }
   function dame_form_clase($id=null){
	   	$lista_obj = array();
     	$sql = "SELECT * FROM formularios WHERE idclase=?"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
}

?>