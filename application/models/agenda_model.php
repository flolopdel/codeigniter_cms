<?php

class Agenda_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }
   
   function inserta($datos = array()){
      
    
      $this->db->insert('agenda', $datos);
      return $this->db->insert_id();
   }
   function inserta_agendamasiva($datos = array()){
      
    
      $this->db->insert('agendamasiva', $datos);
      return $this->db->insert_id();
   }
   function dame_agendamasiva_idclase_fecha($year = null, $mon = null, $day = null, $id=null){
      
    
	   	$year  = ($mon < 9 && strlen($mon) == 1) ? "$year-0$mon" : "$year-$mon-$day";
	   	$lista_obj = array();
     	$sql = "SELECT * FROM agendamasiva WHERE fecha like ? AND idclase=?"; 
		$query = $this->db->query($sql, array($year,$id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function update($datos = array()){
   	
        $this->db->where('id', $datos['id']);
        return $this->db->update('agenda', $datos);
   }
   function dame_info_dia($year = null, $mon = null, $day = null, $id=null){
	   	$year  = ($mon < 9 && strlen($mon) == 1) ? "$year-0$mon" : "$year-$mon-$day";
	   	$lista_obj = array();
     	$sql = "SELECT * FROM agenda WHERE fecha like ? AND nino=?"; 
		$query = $this->db->query($sql, array($year,$id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_info_mes($year = null, $mon = null, $id = null){
	   	$year  = ($mon < 9 && strlen($mon) == 1) ? "$year-0$mon" : "%$year-$mon%";
	   	$lista_obj = array();
     	$sql = "SELECT * FROM agenda WHERE fecha like ? AND nino=? Group by fecha"; 
		$query = $this->db->query($sql, array($year,$id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_agenda_id($id){
   	$lista_obj = array();
     	$sql = "SELECT * FROM agenda WHERE id = ? "; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
}

?>