<?php

class Usuarios_model extends CI_Model {

   function __construct(){
      parent::__construct();
   }
   function dame_ultimos_usuarios(){
      $ssql = "select * from usuarios order by id desc limit 5";
      return mysql_query($ssql);
   }
   function dame_todo(){
   	$lista_obj = array();
     	$sql = "SELECT * FROM usuarios order by nombre,apellidos "; 
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
  function dame_busqueda($string,$guarderia = null){
   	$buscar = $this->db->escape_like_str($string);
   	$lista_obj = array();
		if(false){
     		$sql = "SELECT u.sexo, u.nombre, u.id, u.apellidos,u.rol,u.imagen, r.rol as nombrerol FROM usuarios u,rol r WHERE rel.idfamiliar=u.id AND r.id = u.rol AND u.nombre LIKE '%" . $buscar . "%' or u.apellidos LIKE '%" . $buscar . "%' ORDER BY u.rol";
		}else{
     		$sql = "SELECT u.sexo, u.nombre, u.id, u.apellidos,u.rol,u.imagen, r.rol as nombrerol FROM usuarios u,rol r, rel_guarderia_tutor r2, rel_guarderia_familiar r3 
     		WHERE r.id = u.rol AND (r.id ='2' OR r.id ='3') AND (u.nombre LIKE '%" . $buscar . "%' or u.apellidos LIKE '%" . $buscar . "%')
     		AND (r2.idtutor = u.id OR r3.idfamiliar = u.id) AND r2.idguarderia = r3.idguarderia AND r3.idguarderia = '".$guarderia."' Group by u.id ORDER BY u.rol";
		} 
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_familiares_guarderia($id = null,$q = null){
   	$lista_obj = array();
     	$sql = "SELECT u.id, u.nombre, u.apellidos FROM usuarios u, rel_guarderia_familiar r WHERE u.id=r.idfamiliar AND r.idguarderia= ? AND( u.nombre LIKE ? OR u.apellidos LIKE ?)"; 
		$query = $this->db->query($sql, array($id,$q,$q));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_tutores_guarderia($id = null,$q = null){
   	$lista_obj = array();
     	$sql = "SELECT u.id, u.nombre, u.apellidos FROM usuarios u, rel_guarderia_tutor r WHERE u.id=r.idtutor AND r.idguarderia= ? AND( u.nombre LIKE ? OR u.apellidos LIKE ?)"; 
		$query = $this->db->query($sql, array($id,$q,$q));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_director_guarderia($id = null,$q = null){
   	$lista_obj = array();
     	$sql = "SELECT u.id, u.nombre, u.apellidos FROM usuarios u, guarderias g WHERE u.rol = 4 AND u.id=g.director AND g.id= ? AND( u.nombre LIKE ? OR u.apellidos LIKE ?)"; 
		$query = $this->db->query($sql, array($id,$q,$q));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_usuario_id($id){
   	$lista_obj = array();
     	$sql = "SELECT u.*,r.id as rolid,r.rol as rolnombre FROM usuarios u, rol r WHERE r.id=u.rol AND u.id = ? "; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_usuario_token($token){
   	$lista_obj = array();
     	$sql = "SELECT u.*
     			FROM usuarios u
     			WHERE u.token= ? "; 
		$query = $this->db->query($sql, array($token));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_usuario_id2($id){
   	$lista_obj = array();
     	$sql = "SELECT * FROM usuarios WHERE id = ? "; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_usuario_email_pass($email,$pass){
   	$lista_obj = array();
     	$sql = "SELECT * FROM usuarios WHERE email = ? AND pass = ? "; 
		$query = $this->db->query($sql, array($email,md5($pass)));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_usuario_email($email){
   	$lista_obj = array();
     	$sql = "SELECT * FROM usuarios WHERE email = ?"; 
		$query = $this->db->query($sql, array($email));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_usuario_rol($rol = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM usuarios WHERE rol = ?"; 
		$query = $this->db->query($sql, array($rol));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_tutor_guarderia($id = null){
   	$lista_obj = array();
     	$sql = "SELECT * FROM usuarios u, rel_guarderia_tutor r WHERE u.id=r.idtutor AND r.idguarderia= ? ORDER BY nombre,apellidos"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function es_tutor_libre($id = null){
   	$ret = true;
     	$sql = "SELECT * FROM usuarios u, rel_clase_tutor r WHERE u.id=r.idtutor AND r.idtutor= ?"; 
		$query = $this->db->query($sql, array($id));
		if ($query->num_rows() > 0){
		   $ret = false;
		}
		return $ret;
   }
   function existe_email($email){
     	$ret = false;
     	$sql = "SELECT * FROM usuarios WHERE email = ?"; 
		$query = $this->db->query($sql, array($email));
		if ($query->num_rows() > 0){
		   $ret = true;
		}
		return $ret;
   }
   function existe_pass($pass){
		$pass2 = md5($pass);
     	$ret = false;
     	$sql = "SELECT * FROM usuarios WHERE pass = ?"; 
		$query = $this->db->query($sql, array($pass2));
		if ($query->num_rows() > 0){
		   $ret = true;
		}
		return $ret;
   }
   function existe_token($token){
     	$sql = "SELECT * FROM usuarios WHERE token = ?"; 
		$query = $this->db->query($sql, array($token));
		if ($query->num_rows() > 0){
		   $ret = true;
		}
		return $ret;
   }
   function existe_id($id){
     	$sql = "SELECT * FROM usuarios WHERE id = ?"; 
		$query = $this->db->query($sql, array($id));
		if ($query->num_rows() > 0){
		   $ret = true;
		}
		return $ret;
   }
   function usuario_login($email,$clave){
   		$existe = false;
      $this->db->where('email', $email); 
      $this->db->where('pass', md5($clave));
      $query = $this->db->get('usuarios');
      if ($query->num_rows() > 0){
         $existe = true;
      }
      return $existe;
   }
   function dame_select_familiar_guarderia($id){
   		$lista_obj = array();
     	$sql = "SELECT u.id,u.nombre, u.apellidos, u.sexo FROM usuarios u, rel_guarderia_familiar r WHERE r.idfamiliar=u.id AND u.rol='2' AND r.idguarderia= ? ORDER BY nombre,apellidos"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   function dame_select_familiar(){
   		$lista_obj = array();
     	$sql = "SELECT u.id,u.nombre, u.apellidos FROM usuarios u WHERE u.rol='2'"; 
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }
   
   
   function dame_familiares_idnino($id = null){
   		$lista_obj = array();
     	$sql = "SELECT * FROM usuarios u, rel_familiar_nino r WHERE u.id=r.idfamiliar AND r.idnino= ?"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }	
   function dame_familiares_idfamiliar($id = null){
   		$lista_obj = array();
     	$sql = "SELECT * FROM usuarios u, rel_familiar_nino r1, rel_familiar_nino r2 WHERE u.id=r2.idfamiliar AND r1.idnino=r2.idnino AND r1.idfamiliar= ? group by r2.idfamiliar"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }	
   function dame_tutor_idnino($id = null){
   		$lista_obj = array();
     	$sql = "SELECT * FROM usuarios u, rel_clase_nino r1, rel_clase_tutor r2 WHERE u.rol='3' AND u.id=r2.idtutor AND r1.idclase=r2.idclase AND r1.idnino= ?"; 
		$query = $this->db->query($sql, array($id));
		foreach ($query->result_array() as $row)
		{
		   $lista_obj[] = $row;
		}
		return $lista_obj;
   }	
   
   function inserta_usuario($datos = array()){
      
      //clave, encripto
      $datos['pass']=md5($datos['pass']);
   
      $this->db->insert('usuarios', $datos);
      return $this->db->insert_id();
   }
   function inserta_usuario2($datos = array()){
      
   
      $this->db->insert('usuarios', $datos);
      return $this->db->insert_id();
   }
   function actualizar_usuario($datos = array()) {
        $this->db->where('id', $datos['id']);
        return $this->db->update('usuarios', $datos);
    }
   function actualizar_usuario2($datos = array()) {
   		 $datos['pass']=md5($datos['pass']);
		 
        $this->db->where('id', $datos['id']);
        return $this->db->update('usuarios', $datos);
    }
}

?>