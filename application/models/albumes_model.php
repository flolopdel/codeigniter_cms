<?php

class Albumes_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }
   
   function inserta($datos = array()){
      
    
      $this->db->insert('albumes', $datos);
      return $this->db->insert_id();
   }
   function actualiza($datos = array()) {
   	
        $this->db->where('id', $datos['id']);
        return $this->db->update('albumes', $datos);
    }  
   
   function dame_album_etiqueta($etiqueta = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM albumes WHERE etiquetas LIKE '%" . $buscar . "%' ORDER BY nombre"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_album_id($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM albumes WHERE id= ?";
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   
   function  dame_numeroimagenes_idalbum($id = null){
   		$lista_obj = array();
     	$sql = "SELECT count(*) as numero FROM albumes a, rel_album_imagen r WHERE a.id=r.idalbum AND r.idalbum= ?"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   
   function dame_imagenes_idalbum($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM albumes a, rel_album_imagen r,imagen i 
     			WHERE 	r.idalbum=a.id 
     					AND a.id='$id'
     					AND r.idimagen=i.id
     			Group by i.id ORDER BY i.id"
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