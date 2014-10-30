<?php

class Clases_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }
   
   function inserta($datos = array()){
      
    
      $this->db->insert('clases', $datos);
      return $this->db->insert_id();
   }
   function actualiza($datos = array()) {
   	
        $this->db->where('id', $datos['id']);
        return $this->db->update('clases', $datos);
    }
   function dame_clase_hijo_familiar($id = null){
   	$lista_obj = array();
     	$sql = "SELECT *,n.nombre as nombrenino FROM ninos n,clases c, rel_familiar_nino r1, rel_clase_nino r2 WHERE n.id=r1.idnino AND c.id=r2.idclase AND r2.idnino=r1.idnino AND r1.idfamiliar= ?"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   
   function dame_busqueda($string,$guarderia = null){
   	$buscar = $this->db->escape_like_str($string);
   	$lista_obj = array();
		if(true){
     		$sql = "SELECT  c.nombre,c.id, c.descripcion
     				FROM 	clases c, rel_guarderia_clase rgc
		     		WHERE 	c.id = rgc.idclase
		     				AND c.nombre LIKE '%".$buscar."%'
		     				AND rgc.idguarderia = c.guarderia
		     				AND rgc.idguarderia = '".$guarderia."' 
		     				
		     		GROUP by c.id ORDER BY c.id";
		} 
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   
   function dame_clase_guarderia($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM clases WHERE guarderia= ? ORDER BY nombre"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_clases_guarderia_auto($id = null,$q = null){
   	$lista_obj = array();
     	$sql = "SELECT c.id, c.nombre FROM clases c WHERE c.guarderia= ? AND c.nombre LIKE ?"; 
		$query = $this->db->query($sql, array($id,$q,$q));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_clase_id($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM clases WHERE id= ?";
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function es_clase_libre($id = null){
   	$ret = true;
     	$sql = "SELECT * FROM clases u, rel_clase_tutor r WHERE u.id=r.idclase AND r.idclase= ?"; 
		$query = $this->db->query($sql, array($id));
		if ($query->num_rows() > 0){
		   $ret = false;
		}
		return $ret;
   }
   function  dame_numeroalumnos_idclase($id = null){
   		$lista_obj = array();
     	$sql = "SELECT count(*) as numero FROM clases u, rel_clase_nino r WHERE u.id=r.idclase AND r.idclase= ?"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function  dame_tutor_idclase($id = null){
   		$lista_obj = array();
     	$sql = "SELECT u.id,u.nombre,u.apellidos FROM usuarios u, rel_clase_tutor r WHERE u.id=r.idtutor AND r.idclase= ?"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_listaclase_idtutor($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM clases c, rel_clase_tutor r where r.idclase=c.id and r.idtutor='$id'";
     	$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
}

?>