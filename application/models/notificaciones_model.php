<?php

class Notificaciones_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }
   
   function inserta($datos = array()){
      
    
      $this->db->insert('notificaciones', $datos);
      return $this->db->insert_id();
   }
   function update($datos = array()){
   	
        $this->db->where('id', $datos['id']);
        return $this->db->update('notificaciones', $datos);
   }
   function update2($datos = array()){
   	
        $lista_obj = array();
     	$sql = "UPDATE notificaciones SET vista='0' WHERE destino_id= ? AND autor_id=? ORDER BY fecha desc"; 
		$query = $this->db->query($sql, array($datos['destino_id'],$datos['autor_id']));
   }
   function dame_notificaciones_iddestino($id = null){
   		$lista_obj = array();
     	$sql = "SELECT * FROM notificaciones WHERE destino_id= ? ORDER BY fecha desc"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_notificaciones_iddestino_notipo($id = null, $tipo = null){
   		$lista_obj = array();
     	$sql = "SELECT * FROM notificaciones WHERE destino_id= ? AND tipo != ? ORDER BY fecha desc"; 
		$query = $this->db->query($sql, array($id,$tipo));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_notificaciones_iddestino_tipo($id = null, $tipo = null){
   		$lista_obj = array();
     	$sql = "SELECT * FROM notificaciones WHERE destino_id= ? AND tipo = ? ORDER BY fecha desc"; 
		$query = $this->db->query($sql, array($id,$tipo));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_notificaciones_id($id = null){
   		$lista_obj = array();
     	$sql = "SELECT * FROM notificaciones WHERE id= ?"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function filas($noti) {
   		$i=0;
       foreach ($noti as $key => $value) {
           $i++;
       }
	   return $i;
    }
   function total_paginados($noti,$por_pagina,$segmento)  {
   	if(isset($segmento) && !empty($segmento)){
   		$i=$segmento;
   	}else{
   		$i=0;
   	}
   	foreach ($noti as $key => $value) {
   		if($key>$segmento){
		   if($i<$por_pagina + $segmento){
		   	$result[] = $value;
		   }
		   $i++;
   		}
	   }
	return $result;
            // $consulta = $this->db->get('notificaciones',$por_pagina,$segmento);
            // if($consulta->num_rows()>0)
            // {
                // foreach($consulta->result_array() as $fila)
        // {
            // $data[] = $fila;
        // }
                    // return $data;
            // }
    }
}

?>