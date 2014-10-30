<?php

class Rel_familiar_nino_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }
   
   function inserta($datos = array()){
      
    
      $this->db->insert('rel_familiar_nino', $datos);
      return $this->db->insert_id();
   }
   function actualiza($datos = array()) {
   	
        $this->db->where('id', $datos['id']);
        return $this->db->update('rel_familiar_nino', $datos);
    }
    
    function dame_nino_idfamiliar($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM ninos n, rel_familiar_nino r where r.idnino=n.id and r.idfamiliar='$id'";
     	$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
}

?>