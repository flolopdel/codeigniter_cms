<?php

class Rel_imagen_usuario_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }
   
   function inserta($datos = array()){
      
    
      $this->db->insert('rel_imagen_usuario', $datos);
      return $this->db->insert_id();
   }
   function actualiza($datos = array()) {
   	
        $this->db->where('id', $datos['id']);
        return $this->db->update('rel_imagen_usuario', $datos);
    }
    
    function dame_imagen_idusuario($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM rel_imagen_usuario where idusuario='$id'";
     	$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
	function dame_idusuario_imagen($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM rel_imagen_usuario where idimagen='$id'";
     	$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
}

?>