<?php

class Mensajes_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }
   
   function inserta($datos = array()){
      
    
      $this->db->insert('mp', $datos);
      return $this->db->insert_id();
   }
   function actualiza($datos = array()) {
   	
        $this->db->where('id', $datos['id']);
        return $this->db->update('mp', $datos);
    }
    function update2($datos = array()){
   	
     	$sql = "UPDATE mp SET leido='1' WHERE (emisor= ? AND receptor=?) OR (emisor= ? AND receptor=?)"; 
		$query = $this->db->query($sql, array($datos['emisor'],$datos['receptor'],$datos['receptor'],$datos['emisor']));
   }
   function dame_mensaje_padre($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM mp WHERE padre= ?"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   
   function dame_mensaje_id($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM mp WHERE id= ?"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_mensajes_recibidos_usuario($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM mp WHERE receptor = ?"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_mensajes_noleidos($emisor = null,$receptor = null){
   		$ret = false;
     	$sql = "SELECT * FROM mp WHERE receptor = ? AND emisor = ? AND leido='0'"; 
		$query = $this->db->query($sql, array($receptor,$emisor));
		if ($query->num_rows() > 0){
		   $ret = true;
		}
		return $ret;
   }
   function dame_mensaje_emisor_receptor_groupby($id = null,$id2 = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM mp WHERE (emisor= ? && receptor = ?) || (receptor= ? && emisor =?) GROUP BY fecha ORDER BY fecha"; 
		$query = $this->db->query($sql, array($id,$id2,$id,$id2));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_mensaje_emisor_receptor_groupby_limit($id = null,$id2 = null,$la = null,$lb = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM mp WHERE (emisor= ? && receptor = ?) || (receptor= ? && emisor =?) GROUP BY fecha ORDER BY fecha LIMIT ?,?"; 
		$query = $this->db->query($sql, array($id,$id2,$id,$id2,$la,$lb));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   
   function dame_mensaje_emisor_receptor($id = null,$id2 = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM mp WHERE (emisor= ? && receptor = ?) || (receptor= ? && emisor =?) ORDER BY fecha"; 
		$query = $this->db->query($sql, array($id,$id2,$id,$id2));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_mensaje_emisor_receptor_limit($id = null,$id2 = null,$la = null,$lb = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM mp WHERE (emisor= ? && receptor = ?) || (receptor= ? && emisor =?) ORDER BY fecha LIMIT ?,?"; 
		$query = $this->db->query($sql, array($id,$id2,$id,$id2,$la,$lb));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_mensaje_emisor($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM mp WHERE emisor= ? GROUP BY receptor ORDER BY fecha"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_mensaje_receptor($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM mp WHERE receptor= ? GROUP BY emisor ORDER BY fecha"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
}

?>