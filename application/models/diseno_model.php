<?php

class Diseno_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }
   
   function inserta($datos = array()){
      
    
      $this->db->insert('diseno', $datos);
      return $this->db->insert_id();
   }
   function update($datos = array()){
   	
        $this->db->where('idgurderia', $datos['id']);
        return $this->db->update('diseno', $datos);
   }
   function dame_diseno_idguarderia($id = null){
   		$lista_obj = array();
     	$sql = "SELECT * FROM diseno WHERE idguarderia= ?"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
}

?>