<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Comun extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$id = $this -> session -> userdata('id');
		$nombre = $this -> session -> userdata('nombre') . " " . $this -> session -> userdata('apellidos');
		if ($this -> session -> userdata('rol') == FALSE) {
			redirect(base_url());
		} else {
			$this -> load -> helper('url');
			$this -> load -> model('Usuarios_model');
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($id);

			$datos = array('titulo' => 'Eyerkinder | ' . $nombre, 'rol' => $this -> session -> userdata('rol'));
			if (!$listaUser) {
				//no he recibido ningún artículo
				//voy a lanzar un error 404 de página no encontrada
				show_404();
			} else {

				$result = array_merge((array)$datos, (array)$listaUser[0]);
				$this -> load -> view('plantilla/head', $result);
				$this -> load -> view('plantilla/bodyheadermenu');
				$this -> load -> view('plantilla/contenidoHome');
				$this -> load -> view('plantilla/footer');
			}
		}
	}

	public function acciones() {
		$id = $this -> session -> userdata('id');
		$nombre = $this -> session -> userdata('nombre') . " " . $this -> session -> userdata('apellidos');
		if ($this -> session -> userdata('rol') == FALSE) {
			redirect(base_url());
		} else {
			$this -> load -> helper('url');
			$this -> load -> model('Usuarios_model');
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($id);

			$datos = array('titulo' => 'Eyerkinder | ' . $nombre, 'rol' => $this -> session -> userdata('rol'));
			if (!$listaUser) {
				//no he recibido ningún artículo
				//voy a lanzar un error 404 de página no encontrada
				show_404();
			} else {

				$result = array_merge((array)$datos, (array)$listaUser[0]);
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/plantilla/acciones');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $result);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('plantilla/acciones');
					$this -> load -> view('plantilla/footer');
			}
			}
		}
	}
	public function marcar_notificaciones($id_usuario){
		if ($this -> session -> userdata('rol') == FALSE) {
			redirect(base_url());
		} else {
			$this -> load -> model("Notificaciones_model");
			$notificaciones =  $this -> Notificaciones_model -> dame_notificaciones_iddestino($id_usuario);
			foreach ($notificaciones as $key => $value) {
				$value['vista']= "1";
				$this -> Notificaciones_model -> update($value);
			}
			$this->pizarra();
		}
	}
	public function marcar_notificacion_id($id){
		if ($this -> session -> userdata('rol') == FALSE) {
			redirect(base_url());
		} else {
			$this -> load -> model("Notificaciones_model");
			$notificaciones =  reset($this -> Notificaciones_model -> dame_notificaciones_id($id));
			$notificaciones['vista']= "1";
			$this -> Notificaciones_model -> update($notificaciones);
			$this->pizarra();
		}
	}
		
	public function clase($id = null) {
		if ($this -> session -> userdata('rol') == FALSE) {
			redirect(base_url());
		} else {
			$this -> load -> helper('url');
			$this -> load -> model("Clases_model");
			$listaClases = $this -> Clases_model -> dame_clase_id($id);
			$numeroalumnos = $this -> Clases_model -> dame_numeroalumnos_idclase($id);
			$listatutor = $this -> Clases_model -> dame_tutor_idclase($id);
			$listaClases[0]['numeroalumnos'] = $numeroalumnos[0]['numero'];
			// No tutor en la clase
			$listaClases[0]['nombretutor'] = $listatutor[0]['nombre'] . " " . $listatutor[0]['apellidos'];
			$listaClases[0]['idtutor'] = $listatutor[0]['id'];
			$this -> load -> model('Usuarios_model');
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($listatutor[0]['id']);
			$this -> load -> model('Ninos_model');
			$listaNino = $this -> Ninos_model -> dame_ninos_idclase($id);

			$datos = array('titulo' => 'Eyerkinder | ' . $listaClases[0]['nombre'], 'rol' => $this -> session -> userdata('rol'));
			$datos['clase'] = $listaClases[0];
			$datos['tutor'] = $listaUser[0];
			$datos['tutor']['imagenurl'] = $this -> comunes -> imagen_usuario($listaUser[0]);
			foreach ($listaNino as $key => $value) {
				$listaNino[$key]['imagenurl'] = $this -> comunes -> imagen_nino($value);
				$listaFamiliares[$value['id']] = $this -> Usuarios_model -> dame_familiares_idnino($value['id']);
			}
			$count= 0;
			if(isset($listaFamiliares) && !empty($listaFamiliares)){
				$count = count($listaFamiliares);
			}
			$listaidpermitidos = array();
			foreach ($listaNino as $key => $value) {
				foreach ($listaFamiliares[$value['id']] as $key => $value) {
					$listaidpermitidos[] = $value['id'];
				}
			}
			for ($i=0; $i < $count ; $i++) { 
			}
			$listaidpermitidos[] = $listaUser[0]['id'];
			$datos['listanino'] = $listaNino;
			if(isset($listaFamiliares) && !empty($listaFamiliares)){
				$datos['listafamiliares'] = $listaFamiliares;
			}
			
				$this -> load -> model('Agenda_model');
				$day = date("d");
				$mon = date("m");
				$year = date("Y");
				$permitido = false;
			foreach ($listaidpermitidos as $key => $value) {
				if ($value == $this -> session -> userdata('id') || $this -> session -> userdata('rol') == '1' ||
				 $this -> session -> userdata('rol') == '4' || $this -> session -> userdata('rol') == '5' || $this -> session -> userdata('rol') == '3') {
					$permitido = true;
				}
			}
			if ($permitido) {
				if($this->session->userdata('movil') || $this->session->userdata('tablet')){
	
						$this -> load -> view('movil/plantilla/head', $datos);
						$this -> load -> view('movil/plantilla/bodyheadermenu');
						$this -> load -> view('movil/plantilla/contenidoclases');
						$this -> load -> view('movil/plantilla/footer');
				}else{
						$this -> load -> view('plantilla/head', $datos);
						$this -> load -> view('plantilla/bodyheadermenu');
						$this -> load -> view('plantilla/contenidoclases');
						$this -> load -> view('plantilla/footer');
				}
			} else {
				redirect(base_url());
			}
		}
	}

	public function construccion($id = null) {
		if ($this -> session -> userdata('rol') == FALSE) {
			redirect(base_url());
		} else {
			$datos = array('titulo' => 'Eyerkinder | En desarrollo', 'rol' => $this -> session -> userdata('rol'));
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/plantilla/construccion');
					$this -> load -> view('movil/plantilla/footer');
			}else{
				$this -> load -> view('plantilla/head', $datos);
				$this -> load -> view('plantilla/bodyheadermenu');
				$this -> load -> view('plantilla/construccion');
				$this -> load -> view('plantilla/footer');
			}
		}
	}
	public function buscar($id = null) {
		if ($this -> session -> userdata('guarderia') == FALSE) {
			redirect(base_url());
		} else {

			$datos = array('titulo' => 'Eyerkinder | En desarrollo', 'rol' => $this -> session -> userdata('rol'));
			$this -> load -> model("Clases_model");
			$this -> load -> model("Usuarios_model");
			$this -> load -> model("Ninos_model");
			$listaClases = $this -> Clases_model -> dame_clase_guarderia($this -> session -> userdata('guarderia'));
			$listaTotal = array();
			
			$i = 0;
			if(isset($listaClases)){
				foreach ($listaClases as $key => $value) {
					$listaTotal[$i]['id'] = $value['id'];
					$listaTotal[$i]['desc'] = $value['nombre'];
					$listaTotal[$i]['tipo'] = "clase";
					$i++;
				}
			}
			$listaClases = $this -> Usuarios_model -> dame_select_familiar_guarderia($this -> session -> userdata('guarderia'));
			if(isset($listaClases)){
				foreach ($listaClases as $key => $value) {
					$listaTotal[$i]['id'] = $value['id'];
					$listaTotal[$i]['desc'] = $value['nombre']." ".$value['apellidos'];
					$listaTotal[$i]['tipo'] = "familiar";
					$i++;
				}
			}
			$listaClases = $this -> Usuarios_model -> dame_tutor_guarderia($this -> session -> userdata('guarderia'));
			if(isset($listaClases)){
				foreach ($listaClases as $key => $value) {
					$listaTotal[$i]['id'] = $value['id'];
					$listaTotal[$i]['desc'] = $value['nombre']." ".$value['apellidos'];
					$listaTotal[$i]['tipo'] = "tutor";
					$i++;
				}
			}
			$listaClases = $this -> Ninos_model -> dame_nino_guarderia2($this -> session -> userdata('guarderia'));
			if(isset($listaClases)){
				foreach ($listaClases as $key => $value) {
					$listaTotal[$i]['id'] = $value['id'];
					$listaTotal[$i]['desc'] = $value['nombre']." ".$value['apellidos'];
					$listaTotal[$i]['tipo'] = "nino";
					$i++;
				}
			}
			$datos['listaTotal'] =  $listaTotal;
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/plantilla/buscador');
					$this -> load -> view('movil/plantilla/footer');
			}else{
				$this -> load -> view('plantilla/head', $datos);
				$this -> load -> view('plantilla/bodyheadermenu');
				$this -> load -> view('plantilla/construccion');
				$this -> load -> view('plantilla/footer');
			}
		}
	}
	
	function enviar_notificacion($destino_id=null,$autor_id=null,$objetivo_id=null,$tipo=null) {
		$notificaciones = array();
		$notificaciones['destino_id']=$destino_id;
		$notificaciones['autor_id']=$autor_id;
		$notificaciones['objetivo_id']=$objetivo_id;
		$notificaciones['tipo'] = $tipo;
		$notificaciones['fecha'] = date("Y-m-d H:i:s");
		
	}
	public function construccion2($id = null) {
		if ($this -> session -> userdata('rol') == FALSE) {
			redirect(base_url());
		} else {

			$datos = array('titulo' => 'Eyerkinder | En desarrollo', 'rol' => $this -> session -> userdata('rol'));

			$this -> load -> view('plantilla/head', $datos);
			$this -> load -> view('plantilla/bodyheadermenu');
			$this -> load -> view('plantilla/construccion2');
			$this -> load -> view('plantilla/footer');
		}
	}
	public function ver_notificaciones() {
		if ($this -> session -> userdata('rol') == FALSE || !$_POST['redirect']) {
			redirect(base_url());
		} else {
			$this -> load -> model('Notificaciones_model');
			$idnoti = $_POST['idnoti'];
			$redirect = $_POST['redirect'];
			$notificaciones = array();
			$notificaciones = $this->Notificaciones_model->dame_notificaciones_id($idnoti);
			$notificaciones[0]['vista'] = "1";
			$this->Notificaciones_model->update($notificaciones[0]);
			redirect(base_url().$redirect);
		}
	}
	public function ver_notificaciones_mensajes() {
		if ($this -> session -> userdata('rol') == FALSE || !$_POST['redirect']) {
			redirect(base_url());
		} else {
			$this -> load -> model('Mensajes_model');
			$redirect = $_POST['redirect'];
			$notificaciones = array();
			$notificaciones['emisor'] = $_POST['emisor'];
			$notificaciones['receptor'] = $_POST['receptor'];
			$this->Mensajes_model->update2($notificaciones);
			redirect(base_url().$redirect);
		}
	}
	public function mensaje($id = null,$resta=null) {
		if ($this -> session -> userdata('rol') == FALSE) {
			redirect(base_url());
		} else {
			$datos = array('titulo' => 'Eyerkinder | En desarrollo', 'action' => "comun/controller_enviarmensaje");
			$this -> load -> model('Mensajes_model');
			$this -> load -> model('Usuarios_model');
			$listaMensajes = $this -> Mensajes_model -> dame_mensaje_emisor_receptor($id, $this -> session -> userdata('id'));
			$i=0;
			foreach ($listaMensajes as $key => $value) {
				$i++;
			}
			if(isset($resta)){
				$resta = $i-$resta;
			}else{
				$resta = $i - 10;
			}
			if($resta < 0){
				$resta = 0; 
			}
			$datos['i'] = $i;
			$listaMensajes = $this -> Mensajes_model -> dame_mensaje_emisor_receptor_limit($id, $this -> session -> userdata('id'),$resta,$i);
			$listaFechas= $this -> Mensajes_model -> dame_mensaje_emisor_receptor_groupby($id, $this -> session -> userdata('id'));
			
			foreach ($listaMensajes as $key => $value) {
				$tiempofecha = explode("-", $value['fecha']);
				$listaMensajes[$key]["year"] = $tiempofecha[0];
				$listaMensajes[$key]["mon"] = $tiempofecha[1];
				$listaMensajes[$key]["day"] = $tiempofecha[2];
				$i++;
			}
			$datos['mensajes'] = $listaMensajes;
			$fechasoptimas = array();
			foreach ($listaFechas as $key => $value) {
				foreach ($listaMensajes as $key2 => $value2) {
					if($value['fecha'] == $value2['fecha']){
						$fechasoptimas[$key] = $listaFechas[$key];
					}
				}
			} 
			$datos['listaFechas'] = $fechasoptimas;
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($this -> session -> userdata('id'));
			$datos['emisornombre'] = $listaUser[0]['nombre']. " ".$listaUser[0]['apellidos'];
			$datos['emisorid'] = $listaUser[0]['id'];
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($id);
			$datos['receptornombre'] = $listaUser[0]['nombre']. " ".$listaUser[0]['apellidos'];
			$datos['receptorid'] = $listaUser[0]['id'];
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){
					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/plantilla/mensaje');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('plantilla/mensaje');
					$this -> load -> view('plantilla/footer');
			}
		}
	}
	public function galeria() {
		if ($this -> session -> userdata('rol') == FALSE) {
			redirect(base_url());
		} else {
			$datos = array('titulo' => 'Eyerkinder | Galería');
			$datos['titulo'] = 'Eyerkinder | Imagenes en las que salgo';		
				$this -> load -> model('Imagenes_model');
				$id =$this -> session -> userdata('id');
				$listaimagenes = $this -> Imagenes_model -> dame_imagen_idusuario($id);
				if($listaimagenes==null){
					$datos['errorpass']="No hay imagenes en este album";
				}else{
					$datos['listaimagenes']=$listaimagenes;
				}
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){
					$this -> load -> view('movil/plantilla/headgaleria', $datos);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/plantilla/galeria');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('plantilla/galeria');
					$this -> load -> view('plantilla/footer');
			}
		}
	}
	public function album($tipo,$error = false) {
		if ($this -> session -> userdata('rol') == FALSE) {
			redirect(base_url());
		} else {
			$datos = array();	
			$datos['album'] = $tipo;		
			if($tipo=='salgo'){
				$datos['titulo'] = 'Eyerkinder | Imagenes en las que salgo';		
				$this -> load -> model('Imagenes_model');
				$id =$this -> session -> userdata('id');
				$listaimagenes = $this -> Imagenes_model -> dame_imagen_idusuario($id);
				if($listaimagenes==null){
					$datos['errorpass']="No hay imagenes en este album";
				}else{
					$datos['listaimagenes']=$listaimagenes;
				}
			}else if($tipo=='subidas'){
				$datos['titulo'] = 'Eyerkinder | Imagenes subidas por mi';	
				$this -> load -> model('Imagenes_model');
				$id =$this -> session -> userdata('id');
				$listaimagenes = $this -> Imagenes_model -> dame_imagen_subidas_idusuario($id);
				if($listaimagenes==null){
					$datos['errorpass']="No hay imagenes en este album";
				}else{
					$datos['listaimagenes']=$listaimagenes;
				}
			}else if($tipo=='subir'){
				$datos['titulo'] = 'Eyerkinder | Subir imagen';
				if($error){
					$datos['errorpass'] = 'Debes seleccionar una imagen';	
				}
			}else{
				show_404();
			}
			
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){
					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/plantilla/contenidoalbum');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('plantilla/contenidoalbum');
					$this -> load -> view('plantilla/footer');
			}
		}
	}
	public function eliminar_imagen($filename,$path) {
		// $filename= "20121101_172149.jpg";
		// $path = "subidas/";
		if(is_file($_SERVER['DOCUMENT_ROOT'].'/images/'.$path.$filename)):
			@unlink($_SERVER['DOCUMENT_ROOT'].'/images/'.$path.$filename);
		endif;
	}
	public function subirimagen1() {
		if ($this -> session -> userdata('rol') == FALSE) {
			redirect(base_url());
		} else {
			$this -> load -> library("form_validation");
			$this -> load -> library("libupload");
			$this -> form_validation -> set_rules("imagen0", "Imagen", "required");
			$this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$imagen = "";
			$noimagen = false;
			for ($i = 0; $i < count($_FILES); $i++) {
				//no le hacemos caso a los bacios
				if (!empty($_FILES['imagen' . $i]['name'])) {
					$respuesta[] = $this -> libupload -> doUpload($i, $_FILES['imagen' . $i], 'images/galeria', 'jpg|png|jpeg|gif', 9999, 9999, 0);

					foreach ($respuesta as $key => $value) {
						foreach ($value as $key2 => $value2) {
							// $thumb = $this -> libupload -> doThumb($value2['file_name'], 'images/subidas', 200, 200);
							
							$imagen = $value2['file_name'];
						}
					}
				}else{
					$noimagen = true;
				}
			}
			$imageninfo = array();
			$imageninfo['subidapor'] = $this -> session -> userdata('id');
			$imageninfo['imagen'] = $imagen;
			if ($noimagen) {
				$this->album("subir",true);
			}else{
				$this -> load -> model("Imagenes_model");
				$idimagen = $this -> Imagenes_model -> inserta($imageninfo);
				$datos = array();
				$datos['titulo'] = "Subir imagen";
				$datos['idimagen'] = $idimagen;
				$datos['imagen'] = $imagen;
				if($this->session->userdata('movil') || $this->session->userdata('tablet')){
						$this -> load -> view('movil/plantilla/head', $datos);
						$this -> load -> view('movil/plantilla/bodyheadermenu');
						$this -> load -> view('movil/plantilla/contenidoalbum2');
						$this -> load -> view('movil/plantilla/footer');
				}else{
						$this -> load -> view('plantilla/head', $datos);
						$this -> load -> view('plantilla/bodyheadermenu');
						$this -> load -> view('plantilla/contenidoalbum2');
						$this -> load -> view('plantilla/footer');
				}
			}
			
		}
	}
	public function subirimagen112() {
		if ($this -> session -> userdata('rol') == FALSE) {
			redirect(base_url());
		} else {
			$this -> load -> library("form_validation");
			$this -> load -> library("libupload");
			$this -> form_validation -> set_rules("imagen0", "Imagen", "required");
			$this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$imagen = "";
			$noimagen = false;
			$config	= array(
					'file_name'			=> strtolower('sub_'.$this -> session -> userdata('id').'_'.date("dmYHisu")),
					'upload_path'		=> 'images/galeria',
					'allowed_types'		=> 'jpg|png|jpeg|gif'
				);
				
				$this->load->library('upload');
				$this->upload->initialize($config); 
				if($this->upload->do_upload('url_imagen')){
					$upload_data		= $this->upload->data();
					$filename = strtolower($config['file_name'].$upload_data["file_ext"]);
					$filetype = mime_content_type($_SERVER['DOCUMENT_ROOT'].'/images/galeria/'.$filename);
					$archivo = $_SERVER['DOCUMENT_ROOT'].'/images/galeria/'.$filename;
					$imagen = strtolower($config['file_name'].$upload_data["file_ext"]);	
				}
			$imageninfo = array();
			$imageninfo['subidapor'] = $this -> session -> userdata('id');
			$imageninfo['imagen'] = $imagen;
			if ($noimagen) {
				$this->album("subir",true);
			}else{
				$this -> load -> model("Imagenes_model");
				$idimagen = $this -> Imagenes_model -> inserta($imageninfo);
				$datos = array();
				$datos['titulo'] = "Subir imagen";
				$datos['idimagen'] = $idimagen;
				$datos['imagen'] = $imagen;
				if($this->session->userdata('movil') || $this->session->userdata('tablet')){
						$this -> load -> view('movil/plantilla/head', $datos);
						$this -> load -> view('movil/plantilla/bodyheadermenu');
						$this -> load -> view('movil/plantilla/contenidoalbum2');
						$this -> load -> view('movil/plantilla/footer');
				}else{
						$this -> load -> view('plantilla/head', $datos);
						$this -> load -> view('plantilla/bodyheadermenu');
						$this -> load -> view('plantilla/contenidoalbum2');
						$this -> load -> view('plantilla/footer');
				}
			}
			
		}
	}
	public function subirimagen2() {
		if ($this -> session -> userdata('rol') == FALSE) {
			redirect(base_url());
		} else {
			$this -> load -> model("Usuarios_model");
			$this -> load -> model("Ninos_model");
			$this -> load -> library("form_validation");
			$this -> load -> library("libupload");
			$imageninfo = array();
			$imageninfo['idimagen'] = $_POST['idimagen'];
			$usuariosetiq = array();
			if(isset($_POST['nino'])){
				foreach ($_POST['nino'] as $key => $value) {
					$idactual = str_replace($_POST['tipo'][$key]."_", "", $value);
					if($_POST['tipo'][$key] == "nino"){
						$padres = $this -> Usuarios_model -> dame_familiares_idnino($idactual);
						foreach ($padres as $key2 => $value2) {
							$usuariosetiq[] = $value2['id'];
						}
					}else if($_POST['tipo'][$key] == "clase"){
						$ninos = $this -> Ninos_model -> dame_ninos_idclase($idactual);
						foreach ($ninos as $key2 => $value2) {
							$padres = $this -> Usuarios_model -> dame_familiares_idnino($value2['id']);
							foreach ($padres as $key3 => $value3) {
								$usuariosetiq[] = $value3['id'];
							}
						}
					}else{
						$usuariosetiq[] = $idactual;
					}
				}
			}
			$usuariosetiq = array_unique($usuariosetiq);
			if ( FALSE ) {
				$this->album("subir");
			}else{
				$this -> load -> model("Rel_imagen_usuario_model");
				$this -> load -> model("Notificaciones_model");
				$this -> load -> model("Usuarios_model");
				$relacion3 = array();
				$relacion3['idimagen'] = $_POST['idimagen'];
				$notificaciones = array();
				foreach($usuariosetiq  as $nino){
					$relacion3['idusuario'] = $nino;
					$idimagen = $this -> Rel_imagen_usuario_model -> inserta($relacion3);
						if($this -> session -> userdata('id') != $nino){
							$notificaciones['destino_id']=$nino;
							$notificaciones['autor_id']=$this -> session -> userdata('id');
							$notificaciones['objetivo_id']=$_POST['idimagen'];
							$notificaciones['tipo'] = "5";
							$notificaciones['fecha'] = date("Y-m-d H:i:s");
							$idNoti = $this -> Notificaciones_model -> inserta($notificaciones);
							$permisoemail = true;
							if($permisoemail){
								$listato = reset($this->Usuarios_model->dame_usuario_id($nino));
								$from = "admin@eyekinder.com";
								$to=$listato['email'];
								$asunto='EyeKinder - Nuevas etiquetas de foto';
								$mensaje= "";
								$enlace= "";
								$mensaje = "Se le ha etiquetado en una foto, puedes hacer click en el siguiente enlace para entrar en la aplicación y verla";
								$enlace = base_url().'comun/galeria';
								$this -> comunes -> enviarEmail($from, $to, $asunto, $mensaje, $enlace, false);
							}
						}
					}
				}
				$this->galeria();
			}
	}

	public function ver_album() {
		if ($this -> session -> userdata('rol') == FALSE) {
			redirect(base_url());
		} else {
			$token = $this->uri->segment(3);
			$this -> load -> model('imagenes_model');
			$id = $this -> session -> userdata('id');
			$listaimagenes = $this -> Imagenes_model -> dame_imagen_idusuario($id);
			
		}	
	}
	public function enviar_mensaje($nodest = false) {
		if ($this -> session -> userdata('rol') == FALSE || $this -> session -> userdata('rol') == "2") {
			redirect(base_url());
		} else {
			$datos = array('titulo' => 'Eyerkinder | En desarrollo', 'action' => "comun/controller_enviarmensaje_masivo");
			$this -> load -> model('Usuarios_model');
			$i = 0;
			$familiaresmadres = array();
			$familiarespadres = array();
			$listaClases = $this -> Usuarios_model -> dame_select_familiar_guarderia($this -> session -> userdata('guarderia'));
			foreach ($listaClases as $key => $value) {
				if($value['sexo'] == "h"){
					$familiarespadres[] = $value;
				}else{
					$familiaresmadres[] = $value;
				}
			}
			$datos['familiarespadres'] = $familiarespadres;
			$datos['familiaresmadres'] = $familiaresmadres;
			$listaClases = $this -> Usuarios_model -> dame_tutor_guarderia($this -> session -> userdata('guarderia'));
			$datos['tutores'] = $listaClases;
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){
					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/formularios/mensaje');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('formularios/mensaje');
					$this -> load -> view('plantilla/footer');
			}
		}
	}
	public function controller_enviarmensaje() {
		if ($_POST['receptor']) {
			$this -> load -> library("form_validation");
			$this -> load -> library("libupload");
			$this -> form_validation -> set_rules('mensaje', 'Mensaje', 'trim|required|min_length[1]');
			$this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$this -> form_validation -> set_message("matches", "El campo %s debe ser igual al campo %s.");
			$this -> form_validation -> set_message("min_length", "El campo %s debe tener un mínimo de %s caracteres.");
			$this -> form_validation -> set_message("valid_email", "El formato del email no es el correcto (ejemplo@mail.com)");
			
			//Recogemos las variables
			$day = date("d");
			$mon = date("m");
			$year = date("Y");
			$mensaje = array();
			$mensaje['mensaje'] = $_POST['mensaje'];
			$mensaje['receptor'] = $_POST['receptor'];
			$mensaje['emisor'] = $this -> session -> userdata('id');
			$mensaje['leido'] = "0";
			$mensaje['fecha'] = date('Y-m-d');
			$mensaje['hora'] = date('H:i:s');
			$mensaje['tipo'] = "1";
			$mensaje['padre'] = "0";
			
			if ($this -> form_validation -> run() == FALSE) {
				$this -> mensaje($_POST['receptor']);
			} else {
					$this -> load -> model("Mensajes_model");
					$idmp = $this->Mensajes_model->inserta($mensaje);
					$this -> mensaje($_POST['receptor']);
			}
		} else {
			show_404();
		}
	}
	public function controller_enviarmensaje_masivo() {
		if ($_POST['mensaje']) {
			$this -> load -> library("form_validation");
			$this -> load -> library("libupload");
			$this -> form_validation -> set_rules('mensaje', 'Mensaje', 'trim|required|min_length[1]');
			$this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$this -> form_validation -> set_message("matches", "El campo %s debe ser igual al campo %s.");
			$this -> form_validation -> set_message("min_length", "El campo %s debe tener un mínimo de %s caracteres.");
			$this -> form_validation -> set_message("valid_email", "El formato del email no es el correcto (ejemplo@mail.com)");
			
			//Recogemos las variables
			$day = date("d");
			$mon = date("m");
			$year = date("Y");
			$mensaje = array();
			$mensaje['mensaje'] = $_POST['mensaje'];
			$mensaje['emisor'] = $this -> session -> userdata('id');
			$mensaje['leido'] = "0";
			$mensaje['fecha'] = date('Y-m-d');
			$mensaje['hora'] = date('H:i:s');
			$mensaje['tipo'] = "1";
			$mensaje['padre'] = "0";
			$destinatarios1 = $_POST['tutoresdest'];
			$listadestinatarios1 = array();
			$listadestinatarios1 = explode(",", $destinatarios1);
			$destinatarios2 = $_POST['familiaresdest'];
			$listadestinatarios2 = array();
			$listadestinatarios2 = explode(",", $destinatarios2);
			
			if ($this -> form_validation -> run() == FALSE ) {
				$this -> enviar_mensaje();
			} else {
					$this -> load -> model("Mensajes_model");
					foreach ($listadestinatarios1 as $value) {
						$mensaje['receptor'] = $value;
						$idmp = $this->Mensajes_model->inserta($mensaje);
					}
					foreach ($listadestinatarios2 as $value) {
						$mensaje['receptor'] = $value;
						$idmp = $this->Mensajes_model->inserta($mensaje);
					}
					$newdata = array(
	                   'exito'  => 'El mensaje ha sido enviado con exito'
	               	);
					$this->session->set_userdata($newdata);
					redirect("comun/enviar_mensaje");
			}
		} else {
			show_404();
		}
	}
	public function pizarra($id = null) {
		if ($this -> session -> userdata('rol') == FALSE) {
			redirect(base_url());
		} else {
			$datos = array('titulo' => 'Eyerkinder | Pizarra', 'rol' => $this -> session -> userdata('rol'));
			
			$this -> load -> model('Notificaciones_model');
			$this -> load -> model('Usuarios_model');
			$this -> load -> model('Mensajes_model');
			$this -> load -> model('Imagenes_model');
			$this -> load -> model('Ninos_model');
			$listaUser = $this -> Notificaciones_model -> dame_notificaciones_iddestino_notipo($this -> session -> userdata('id'),"6");
			$notificaciones = array();
			foreach ($listaUser as $key => $value) {
				$notificaciones[$key]['id']=$value['id'];
				$notificaciones[$key]['destino_id']=$value['destino_id'];
				$lista_destino = $this->Usuarios_model->dame_usuario_id($value['destino_id']);
				$notificaciones[$key]['destino_nombre'] = $lista_destino[0]['nombre']." ".$lista_destino[0]['apellidos'];
				$notificaciones[$key]['autor_id']=$value['autor_id'];
				$lista_autor = $this->Usuarios_model->dame_usuario_id($value['autor_id']);
				$notificaciones[$key]['autor_nombre'] = $lista_autor[0]['nombre']." ".$lista_autor[0]['apellidos'];
				$notificaciones[$key]['autor_rol'] = $lista_autor[0]['rolnombre'];
				$notificaciones[$key]['objetivo_id']=$value['objetivo_id'];
				$notificaciones[$key]['tipo'] = $value['tipo'];
				$notificaciones[$key]['year'] = $value['year'];
				$notificaciones[$key]['mon'] = $value['mon'];
				$notificaciones[$key]['day'] = $value['day'];
				$listafechatime = explode(" ", $value['fecha']);
				$listafecha = explode("-", $listafechatime[0]);
				$notificaciones[$key]['hora'] = $listafechatime[1];
				$notificaciones[$key]['fecha'] = $listafecha[2]."-".$listafecha[1]."-".$listafecha[0];
				$notificaciones[$key]['notinueva'] = 'class="notinueva"';
				if($value['vista'] == 1){
					$notificaciones[$key]['notinueva'] = '';
				} 
				if($value['tipo'] == "1" || $value['tipo'] == "2"){
					$lista_objetivo = $this->Ninos_model->dame_nino_id($value['objetivo_id']);
					$notificaciones[$key]['objetivo_nombre'] = $lista_objetivo[0]['nombre']." ".$lista_objetivo[0]['apellidos'];
					$notificaciones[$key]['objetivo_sexo'] = $lista_objetivo[0]['sexo'];
					$notificaciones[$key]['objetivo_enlace'] = "usuario/perfilnino/".$value['objetivo_id']."/".$value['year']."/".$value['mon']."/".$value['day'];
				}else if($value['tipo'] == "3"){
					$lista_objetivo = $this->Ninos_model->dame_nino_id($value['objetivo_id']);
					$notificaciones[$key]['objetivo_nombre'] = $lista_objetivo[0]['nombre']." ".$lista_objetivo[0]['apellidos'];
					$notificaciones[$key]['objetivo_sexo'] = $lista_objetivo[0]['sexo'];
					$notificaciones[$key]['objetivo_enlace'] = "registro/configura_clase";
				}else if($value['tipo'] == "4"){
					$lista_objetivo = $this->Ninos_model->dame_nino_id($value['objetivo_id']);
					$notificaciones[$key]['objetivo_nombre'] = $lista_objetivo[0]['nombre']." ".$lista_objetivo[0]['apellidos'];
					$notificaciones[$key]['objetivo_sexo'] = $lista_objetivo[0]['sexo'];
					$notificaciones[$key]['objetivo_enlace'] = "usuario/perfilnino/".$value['objetivo_id'];
				}else if($value['tipo'] == "5"){
					$listaimagenes = $this -> Imagenes_model -> dame_imagen_id($value['objetivo_id']);
					$notificaciones[$key]['imagen'] = $listaimagenes[0];
					// $notificaciones[$key]['objetivo_sexo'] = $lista_objetivo[0]['sexo'];
					if($this -> session -> userdata('rol') == "2"){
						$notificaciones[$key]['objetivo_enlace'] = "comun/album/salgo/".$value['objetivo_id'];
					}else{
						$notificaciones[$key]['objetivo_enlace'] = "comun/galeria/".$value['objetivo_id'];
					}
				}else if($value['tipo'] == "6"){
					$lista_objetivo = $this->Mensajes_model->dame_mensaje_id($value['objetivo_id']);
					if($value['autor_id'] == $this -> session -> userdata('id')){
						$notificaciones[$key]['objetivo_enlace'] = "comun/mensaje/".$value['destino_id']."#formsend";
					}else{
						$notificaciones[$key]['objetivo_enlace'] = "comun/mensaje/".$value['autor_id']."#formsend";
					}
				}
			}
			
			 $datos['notificaciones'] = $this->comunes->paginar($notificaciones,"comun/pizarra/pagina","10","4"); 
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/plantilla/contenidopizarra');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('plantilla/contenidopizarra');
					$this -> load -> view('plantilla/footer');
			}
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
