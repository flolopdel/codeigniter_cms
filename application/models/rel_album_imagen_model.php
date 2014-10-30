<?php

class Rel_album_imagen_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }
   
   function inserta($datos = array()){
      
    
      $this->db->insert('rel_album_imagen', $datos);
      return $this->db->insert_id();
   }
   function actualiza($datos = array()) {
   	
        $this->db->where('id', $datos['id']);
        return $this->db->update('rel_album_imagen', $datos);
    }
    
    function dame_album_idimagen($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM rel_album_imagen where idimagen='$id'";
     	$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
	function dame_idimagen_album($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM rel_album_imagen where idalbum='$id'";
     	$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
}

?>