<?php

class Imagenes_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }
   
   function inserta($datos = array()){
      
    
      $this->db->insert('imagenes', $datos);
      return $this->db->insert_id();
   }
   function actualiza($datos = array()) {
   	
        $this->db->where('id', $datos['id']);
        return $this->db->update('imagenes', $datos);
    }
   
   
   function dame_imagen_etiqueta($etiqueta = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM imagenes WHERE etiquetas LIKE '%" . $buscar . "%' ORDER BY nombre"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_imagen_id($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM imagenes WHERE id= ?";
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   
   function  dame_numeroninos_idimagen($id = null){
   		$lista_obj = array();
     	$sql = "SELECT count(*) as numero FROM imagenes i, rel_imagen_nino r WHERE i.id=r.idimagen AND r.idimagen= ?"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   
   function dame_ninos_idimagen($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM imagenes i, rel_imagen_nino r,ninos n 
     			WHERE 	r.idimagen=i.id 
     					AND i.id='$id'
     					AND r.idnino=n.id
     			ORDER BY n.id"
				;
     	$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function  dame_numerousuarios_idimagen($id = null){
   		$lista_obj = array();
     	$sql = "SELECT count(*) as numero FROM imagenes i, rel_imagen_usuario r WHERE i.id=r.idimagen AND r.idimagen= ?"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   
   function dame_usuarios_idimagen($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM imagenes i, rel_imagen_usuario r,usuarios u
     			WHERE 	r.idimagen=i.id 
     					AND i.id='$id'
     					AND r.idusuario=u.id
     			ORDER BY i.id"
				;
     	$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   
   function dame_imagen_idusuario($id = null){
   	$lista_obj = array();
     	$sql = "SELECT i.* FROM imagenes i, rel_imagen_usuario r,usuarios u
     			WHERE 	r.idimagen=i.id 
     					AND u.id=?
     					AND r.idusuario=u.id
     			ORDER BY i.id desc"
				;
     	$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
	}
   function dame_imagen_subidas_idusuario($id = null){
   	$lista_obj = array();
     	$sql = "SELECT i.* FROM imagenes i
     			WHERE 	i.subidapor=?
     			ORDER BY i.id desc"
				;
     	$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
	}
   
}   

?>