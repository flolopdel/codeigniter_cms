<?php

class Ninos_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }
   
   function inserta_nino($datos = array()){
      
    
      $this->db->insert('ninos', $datos);
      return $this->db->insert_id();
   }
   function actualizar_nino($datos = array()) {
        $this->db->where('id', $datos['id']);
        return $this->db->update('ninos', $datos);
    }
   
    function dame_busqueda($string,$guarderia = null){
   	$buscar = $this->db->escape_like_str($string);
   	$lista_obj = array();
		if(true){
     		$sql = "SELECT  n.nombre,n.sexo, n.id, n.apellidos, n.imagen, c.nombre as nombreclase
     				FROM 	ninos n, clases c,rel_guarderia_clase rgc, rel_guarderia_nino rgn, rel_clase_nino rcn
		     		WHERE 	rgn.idnino = n.id
		     				AND rcn.idnino = n.id
		     				AND (n.nombre LIKE '%".$buscar."%' or n.apellidos LIKE '%".$buscar."%')
		     				AND rgc.idguarderia = rgn.idguarderia
		     				AND c.id = rcn.idclase
		     				AND c.id = rgc.idclase
		     				AND rgc.idclase = rcn.idclase
		     				AND rgn.idguarderia = '".$guarderia."' 
		     				
		     		GROUP by n.id ORDER BY c.id";
		} 
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   
   function dame_nino_guarderia($id = null,$q = null){
   	$lista_obj = array();
     	$sql = "SELECT u.id, u.nombre, u.apellidos FROM ninos u, rel_guarderia_nino r WHERE u.id=r.idnino AND r.idguarderia= ? AND( u.nombre LIKE ? OR u.apellidos LIKE ?)"; 
		$query = $this->db->query($sql, array($id,$q,$q));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_nino_guarderia2($id = null){
   	$lista_obj = array();
     	$sql = "SELECT u.id, u.nombre, u.apellidos FROM ninos u, rel_guarderia_nino r WHERE u.id=r.idnino AND r.idguarderia= ? ORDER BY nombre,apellidos"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function es_nino_libre($id = null){
   		$ret = true;
     	$sql = "SELECT * FROM ninos u, rel_clase_nino r WHERE u.id=r.idnino AND r.idnino= ?"; 
		$query = $this->db->query($sql, array($id));
		if ($query->num_rows() > 0){
		   $ret = false;
		}
		return $ret;
   }
   function dame_tiponino(){
     	$sql = "SELECT * FROM tiponino"; 
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   
   function dame_ninos_idclase($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM ninos u, rel_clase_nino r WHERE u.id=r.idnino AND r.idclase= ?"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_nino_id($id){
   	$lista_obj = array();
     	$sql = "SELECT * FROM ninos WHERE id = ? "; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
}

?>