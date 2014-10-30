<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
	public function index($error = null) {
				$this -> load -> library('Mobile_Detect');
				$newdata = array('movil' => false);
				$this -> session -> set_userdata($newdata);
				$newdata = array('tablet' => false);
				$this -> session -> set_userdata($newdata);
				$detect = new Mobile_Detect();
				$movil= false;
				if ($detect->isMobile()) {
					$newdata = array(
	                   'movil'  => true
	               	);
					$this->session->set_userdata($newdata);
				}
				if ($detect->isTablet()) {
					$newdata = array(
	                   'tablet'  => true
	               	);
					$this->session->set_userdata($newdata);
				}
				// TODO Quitar cuando acaben pruebas
					// $newdata = array(
	                   // 'movil'  => true
	               	// );
					// $this->session->set_userdata($newdata);
					// $newdata = array(
	                   // 'tablet'  => true
	               	// );
					// $this->session->set_userdata($newdata);
					//FIN
					
				$datos= array();
				$this -> load -> model("Diseno_model");
				$listadiseno = $this->Diseno_model->dame_diseno_idguarderia("0");
				$datos['diseno'] = $listadiseno['0'];
		switch ($this->session->userdata('rol')) {
			case '' :
				$data['token'] = $this -> token();
				$datos['titulo'] = 'Eyekinder | Bienvenido';
				if (isset($error) && $error != "") {
					$datos['error'] = $error;
				}
				if($this->session->userdata('movil') || $this->session->userdata('tablet')){
					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/index');
				}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheaderprincipal');
					$this -> load -> view('plantilla/footer');
				}
				break;
			//admin
			case '1' :
				redirect("admin/");
				break;
			//familiar
			case '2' :
				redirect("familiar/");
				break;
			//tutor
			case '3' :
				redirect("tutor/");
				break;
			//director
			case '4' :
				redirect("director/");
				break;
			//gerente
			case '5' :
				redirect("gerente/");
				break;
			default :
				$this -> load -> helper('url');
				$datos['titulo'] = 'Eyekinder | Bienvenido';
				if (isset($error) && $error != "") {
					$datos['error'] = $error;
				}
				
				if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/index');
				}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheaderprincipal');
					$this -> load -> view('plantilla/footer');
				}
		}
	}

	public function comprobar_login() {
		$this -> form_validation -> set_rules("usuario", "Email", "required");
		$this -> form_validation -> set_rules("password", "Password", "required|min_length[5]");
		$this -> form_validation -> set_message("required", "El campo %s es obligatorio");
		$this -> form_validation -> set_message("min_length", "El campo %s debe tener 5 caracteres como mínimo");
		if ($this -> form_validation -> run() == FALSE) {
			$this -> index();
		} else {
			$this -> load -> model("Usuarios_model");
			$this -> load -> model("Empresas_model");
			$this -> load -> model("Guarderias_model");
			$this -> load -> model("Rel_clase_tutor_model");
			$this -> load -> model("Rel_guarderia_tutor_model");
			$this -> load -> model("Rel_guarderia_familiar_model");
			if ($this -> Usuarios_model -> usuario_login($_REQUEST['usuario'], $_REQUEST['password'])) {
				$listaUsuarios = $this -> Usuarios_model -> dame_usuario_email_pass($_REQUEST['usuario'], $_REQUEST['password']);
				$idUser = $listaUsuarios[0]['id'];
				$listaUsuarios[0]['logueado'] = true;
				$rutarol = "";
				$guarderia = "";
				$empresa = "";
				$clase = "";
				 if ($listaUsuarios[0]['rol'] == 2) {
				 	$listaGuardes = $this -> Rel_guarderia_familiar_model -> dame_guarderia_idfamiliar($idUser);
					if ($listaGuardes) {
						$guarderia = $listaGuardes[0]['idguarderia'];
					}
				} else if ($listaUsuarios[0]['rol'] == 3) {
					$listaGuardes = $this -> Rel_guarderia_tutor_model -> dame_guarderia_idtutor($idUser);
					if ($listaGuardes) {
						$guarderia = $listaGuardes[0]['idguarderia'];
					}
					$listaClases = $this -> Rel_clase_tutor_model -> dame_clase_idtutor($idUser);
					if ($listaClases) {
						$clase = $listaClases[0]['idclase'];
					}
				} else if ($listaUsuarios[0]['rol'] == 4) {

					$listaGuardes = $this -> Guarderias_model -> dame_guarderia_iddirector($idUser);
					if ($listaGuardes) {
						$guarderia = $listaGuardes[0]['id'];
					}
					$listaClases = $this -> Rel_clase_tutor_model -> dame_clase_idtutor($idUser);
					if ($listaClases) {
						$clase = $listaClases[0]['idclase'];
					}
				} else if ($listaUsuarios[0]['rol'] == 5) {

					$listaEmpresas = $this -> Empresas_model -> dame_empresa_idgerente($idUser);
					if ($listaEmpresas) {
						$empresa = $listaEmpresas[0]['id'];
					}
				}
				
				$listaUsuarios[0]['empresa'] = $empresa;
				$listaUsuarios[0]['guarderia'] = $guarderia;
				$listaUsuarios[0]['clase'] = $clase;
				$listaUsuarios[0]['rutarol'] = $rutarol;
				$listaUsuarios[0]['imagenurl'] = $this->comunes->imagen_usuario($listaUsuarios[0]);
				$this -> session -> set_userdata($listaUsuarios[0]);
				$this -> index();
			} else {
				$error = "El email y la contraseña no coinciden";
				$this -> index($error);
			}
		}
	}
	
	public function olvido_contrasena() {
		$this -> form_validation -> set_rules("email", "Email", "required");
		if ($this -> form_validation -> run() == FALSE) {
			$this -> index(). '#form-olvido';
		} else {
			$this -> load -> model("Usuarios_model");
			if ($this -> Usuarios_model -> existe_email($_REQUEST['email'])) {
				$listaUsuarios = $this -> Usuarios_model -> dame_usuario_email($_REQUEST['email']);
				$datos=array();
				$datos['id']=$listaUsuarios[0]['id'];
				$datos['token']=md5(uniqid(rand(), true));
				$this -> load -> model("Usuarios_model");
				$this -> Usuarios_model -> actualizar_usuario($datos);
				
				$from='flolopdel@gmail.com';
				$to=$listaUsuarios[0]['email'];
				$asunto='EyeKinder - Recuperar contraseña';
				$mensaje= "";
				$enlace= "";
				$mensaje = "Para cambiar su contraña debe hacer click en el siguiente enlace";
				$enlace= base_url() . 'usuario/nuevapass/' . $datos['token'];
				
				
				$this -> comunes -> enviarEmail($from, $to, $asunto, $mensaje, $enlace);
			} else {
				$error = "El email no corresponde con ninguna cuenta";
				$this -> index($error). '#form-olvido';
				
			}
		}
	}

	public function token() {
		$token = md5(uniqid(rand(), true));
		$this -> session -> set_userdata('token', $token);
		return $token;
	}

	function logout() {
		$this -> session -> sess_destroy();
		$this -> index();
	}

	public function valid_date($str) {
		$CI = &get_instance();
		$CI -> form_validation -> set_message('valid_date', 'Sorry - the %s field must be a date with format dd-mm-yyyy');

		if (preg_match("/^(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[012])-(19|20)[0-9]{2}$/", $str)) {
			$arr = explode("-", $str);
			$yyyy = $arr[2];
			$mm = $arr[1];
			$dd = $arr[0];
			if (is_numeric($yyyy) && is_numeric($mm) && is_numeric($dd)) {
				return checkdate($mm, $dd, $yyyy);
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	function buscador() {
		// Is there a posted query string?
		if ($_POST['query']) {
			$q = $_POST['query'];
			$this -> load -> model("Usuarios_model");
			$listaUsuarios = $this -> Usuarios_model -> dame_busqueda($q,$this -> session -> userdata('guarderia'));
			echo '<div style="clear:both;"><a href="#" style="cursor: default;">Usuarios</a></div>';

			foreach ($listaUsuarios as $row) {
				$nombre = $row['nombre'];
				$ape = $row['apellidos'];
				$img = $row['imagen'];
				$rol = $row['nombrerol'];
				$idUser = $row['id'];
				// $guarderia=$row['guarderia'];

				$nombreResaltado = '<b>' . $q . '</b>';
				$apeResaltado = '<b>' . $q . '</b>';

				$nombreFinal = str_ireplace($q, $nombreResaltado, $nombre);
				$apeFinal = str_ireplace($q, $apeResaltado, $ape);
				$imagen = $this -> comunes -> imagen_usuario($row);
				echo '<a href="' . base_url() . 'usuario/perfil/' . $idUser . '"><div class="display_box" align="left">
						<img src="' . base_url() . $imagen . '" style="width:50px; float:left; margin-right:6px"    />' . $nombreFinal . '&nbsp;' . $apeFinal . '<br/>
						<span>' . $rol . '</span><br/>
					</div></a>';
			}
			
			
			$this -> load -> model("Ninos_model");
			$listaNinos = $this -> Ninos_model -> dame_busqueda($q,$this -> session -> userdata('guarderia'));
			echo '<div style="clear:both;"><a href="#" style="cursor: default;">Niños</a></div>';			
			foreach ($listaNinos as $row) {
				$nombre = $row['nombre'];
				$ape = $row['apellidos'];
				$img = $row['imagen'];
				$nombreclase = $row['nombreclase'];
				$idUser = $row['id'];
				// $guarderia=$row['guarderia'];
				$nombreResaltado = '<b>' . $q . '</b>';
				$apeResaltado = '<b>' . $q . '</b>';
				$nombreFinal = str_ireplace($q, $nombreResaltado, $nombre);
				$apeFinal = str_ireplace($q, $apeResaltado, $ape);
				$imagen = $this -> comunes -> imagen_nino($row);
				echo '<a href="' . base_url() . 'usuario/perfilnino/' . $idUser . '"><div class="display_box" align="left">
						<img src="' . base_url() . $imagen . '" style="width:50px; float:left; margin-right:6px"    />' . $nombreFinal . '&nbsp;' . $apeFinal . '<br/>
						<span>' . $nombreclase . '</span><br/>
					</div></a>';
			}

			$this -> load -> model("Clases_model");
			$listaClases = $this -> Clases_model -> dame_busqueda($q,$this -> session -> userdata('guarderia'));
			echo '<div style="clear:both;"><a href="#" style="cursor: default;">Clases</a></div>';

			foreach ($listaClases as $row) {
				$nombre = $row['nombre'];
				$descripcion = $row['descripcion'];
				$idUser = $row['id'];
				// $guarderia=$row['guarderia'];

				$nombreResaltado = '<b>' . $q . '</b>';

				$nombreFinal = str_ireplace($q, $nombreResaltado, $nombre);
				
				echo '<a href="' . base_url() . 'comun/clase/' . $idUser . '"><div class="display_box" align="left">
						<span  style="width:50px; float:left; margin-right:6px"></span>' . $nombreFinal . '&nbsp; <br/>
						<span>' . $descripcion . '</span><br/>
					</div></a>';
			}
		} else {
			show_404();
		}
	}

	public function ninos($idGuarde = null) {
		if (!isset($idGuarde) || $idGuarde == "") {
			//no he recibido ningún artículo
			//voy a lanzar un error 404 de página no encontrada
			show_404();
		} else {
			$listaUsuarios = array();
			$this -> load -> model("Ninos_model");
			$q = "%" . $_GET["q"] . "%";
			$listaUsuarios = $this -> Ninos_model -> dame_nino_guarderia($idGuarde, $q);
			foreach ($listaUsuarios as $key => $value) {
				if (!$this -> Ninos_model -> es_nino_libre($value['id'])) {
					unset($listaUsuarios[$key]);
				}
			}
			$listaResponse = array();
			$i = 0;
			foreach ($listaUsuarios as $usuario) {
				$listaResponse[$i]['name'] = $usuario['nombre'] . " " . $usuario['apellidos'];
				$listaResponse[$i]['id'] = $usuario['id'];
				$listaResponse[$i]['tipo'] = "nino";
				$i++;
			}
			# JSON-encode the response
			$json_response = json_encode($listaResponse);

			# Return the response
			echo $json_response;
		}
	}
	public function usuarios($idGuarde = null) {
		if (!isset($idGuarde) || $idGuarde == "") {
			//no he recibido ningún artículo
			//voy a lanzar un error 404 de página no encontrada
			show_404();
		} else {
			$listaUsuarios = array();
			$this -> load -> model("Usuarios_model");
			$this -> load -> model("Ninos_model");
			$this -> load -> model("Clases_model");
			$q = "%" . $_GET["q"] . "%";
			// $listaUsuarios = $this -> Usuarios_model -> dame_familiares_guarderia($idGuarde, $q);
			$listaUsuarios = $this -> Usuarios_model -> dame_director_guarderia($idGuarde, $q);
			$listaUsuarios2 = $this -> Usuarios_model -> dame_tutores_guarderia($idGuarde, $q);
			$listaUsuarios3 = $this -> Ninos_model -> dame_nino_guarderia($idGuarde, $q);
			$listaUsuarios4 = $this -> Clases_model -> dame_clases_guarderia_auto($idGuarde, $q);
			// foreach ($listaUsuarios as $key => $value) {
				// if (!$this -> Ninos_model -> es_nino_libre($value['id'])) {
					// unset($listaUsuarios[$key]);
				// }
			// }
			$listaResponse = array();
			$i = 0;
			foreach ($listaUsuarios as $usuario) {
				$listaResponse[$i]['name'] = $usuario['nombre'] . " " . $usuario['apellidos']. " (Director)";
				$listaResponse[$i]['id'] = "usuario_".$usuario['id'];
				$listaResponse[$i]['tipo'] = "usuario";
				$i++;
			}
			foreach ($listaUsuarios2 as $usuario) {
				$listaResponse[$i]['name'] = $usuario['nombre'] . " " . $usuario['apellidos']. " (Tutor)";
				$listaResponse[$i]['id'] = "usuario_".$usuario['id'];
				$listaResponse[$i]['tipo'] = "usuario";
				$i++;
			}
			foreach ($listaUsuarios3 as $usuario) {
				$listaResponse[$i]['name'] = $usuario['nombre'] . " " . $usuario['apellidos']. " (Niño)";
				$listaResponse[$i]['id'] = "nino_".$usuario['id'];
				$listaResponse[$i]['tipo'] = "nino";
				$i++;
			}
			foreach ($listaUsuarios4 as $usuario) {
				$listaResponse[$i]['name'] = $usuario['nombre']. " (Clase)";
				$listaResponse[$i]['id'] = "clase_".$usuario['id'];
				$listaResponse[$i]['tipo'] = "clase";
				$i++;
			}
			# JSON-encode the response
			$json_response = json_encode($listaResponse);

			# Return the response
			echo $json_response;
		}
	}

	public function perfil($id = null) {
		if (!isset($id) || $id == "") {
			//no he recibido ningún artículo
			//voy a lanzar un error 404 de página no encontrada
			show_404();
		} else {
			$this -> load -> helper('url');
			$this -> load -> model('Usuarios_model');
			$listaUsuarios = $this -> Usuarios_model -> dame_usuario_id($id);
			if (!$listaUsuarios) {
				//no he recibido ningún artículo
				//voy a lanzar un error 404 de página no encontrada
				show_404();
			} else {

				$datos = array('titulo' => 'Eyekinder | ' . $listaUsuarios[0]['nombre'] . " " . $listaUsuarios[0]['apellidos']);
				$listaUsuarios[0]['imagenurl'] = $this->comunes->imagen_usuario($listaUsuarios[0]);
				$this -> load -> model("Rel_familiar_nino_model");
				$listaNino = $this -> Rel_familiar_nino_model -> dame_nino_idfamiliar($id);
				foreach ($listaNino as $key => $value) {
					$listaNino[$key]['imagenurl'] = $this->comunes->imagen_nino($value);
				}
				$this -> load -> model("Clases_model");
				$listaClases = $this -> Clases_model -> dame_listaclase_idtutor($id);
				foreach ($listaClases as $key => $value) {
					$numeroalumnos = $this ->Clases_model -> dame_numeroalumnos_idclase($value['id']);
					$listatutor = $this ->Clases_model -> dame_tutor_idclase($value['id']);
					$listaClases[$key]['numeroalumnos'] = $numeroalumnos[0]['numero'];
					$listaClases[$key]['nombretutor'] = $listatutor[0]['nombre']. " ".$listatutor[0]['apellidos'];
					$listaClases[$key]['idtutor'] = $listatutor[0]['id'];
				}
				$datos['listaninos'] = $listaNino;
				$datos['listaclases'] = $listaClases;
				$result = array_merge((array)$datos, (array)$listaUsuarios[0]);
				if ($this -> session -> userdata('movil') || $this -> session -> userdata('tablet')) {

					$this -> load -> view('movil/plantilla/head', $result);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/plantilla/contenidoperfil');
					$this -> load -> view('movil/plantilla/footer');
				} else {
					$this -> load -> view('plantilla/head', $result);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('plantilla/contenidoperfil');
					$this -> load -> view('plantilla/footer');
				}
			}
		}
	}

	public function perfilnino($id = null, $year = null, $mon = null, $day = null, $star = null) {
		if (!isset($id) || $id == "") {
			//no he recibido ningún artículo
			//voy a lanzar un error 404 de página no encontrada
			show_404();
		} else {
			$year = (empty($year) || !is_numeric($year)) ? date('Y') : $year;
			$mon = (empty($mon) || !is_numeric($mon)) ? date('m') : $mon;
			$day = (empty($day) || !is_numeric($day)) ? date('d') : $day;
			$data = array();
			$this -> load -> model('Agenda_model');
			$listaAgenda = $this -> Agenda_model -> dame_info_mes($year, $mon, $id);
			foreach ($listaAgenda as $key => $value) {
				$dia = substr($value['fecha'], 8);
				if ($dia < 10) {
					$diaformato = substr($dia, 1);
				} else {
					$diaformato = $dia;
				}
				$data[$diaformato] = base_url() . "usuario/perfilnino/" . $id . "/" . str_replace("-", "/", $value['fecha']);
			}
			$this -> load -> helper('url');
			$this -> load -> library('calendar', $this -> _setting($year, $mon, $id));
			$calendar = $this -> calendar -> generate($year, $mon, $data);
			$this -> load -> model('Ninos_model');
			$this -> load -> model('Usuarios_model');
			$listaUsuarios = $this -> Ninos_model -> dame_nino_id($id);
			$listaFamiliares = $this -> Usuarios_model -> dame_familiares_idnino($id);
			$listaTutor = $this -> Usuarios_model -> dame_tutor_idnino($id);
			if (!$listaUsuarios) {
				//no he recibido ningún artículo
				//voy a lanzar un error 404 de página no encontrada
				show_404();
			} else {

				$datos = array('titulo' => 'Eyekinder | ' . $listaUsuarios[0]['nombre'] . " " . $listaUsuarios[0]['apellidos'], 'calendar' => $calendar);
				$imagenurl = "";
				$existeimagen = false;
				$imagenurl = 'images/subidas/' . $listaUsuarios[0]['imagen'];
				if ($listaUsuarios[0]['imagen'] != "" && file_exists($imagenurl)) {
					$existeimagen = true;
				}
				if (!$existeimagen) {
					if ($listaUsuarios[0]['sexo'] == "h") {
						$imagenurl = "images/icofinder/nino.png";
					} else {
						$imagenurl = "images/icofinder/nina.png";
					}
				}
				
				$permitido = false;
				foreach ($listaFamiliares as $key => $value) {
					$listaFamiliares[$key]['imagenurl'] = $this->comunes->imagen_usuario($value);
					if(($this -> session -> userdata('rol') == "2" && $this -> session -> userdata('id') == $value['id'])
							 || $this -> session -> userdata('rol') != "2"){
						$permitido = true;
					}
				}
				
				$datos['year'] = $year;
				$datos['mon'] = $mon;
				$datos['day'] = $day;
				$datos['star'] = $star;
				$datos['familiares'] = $listaFamiliares;
				$infodiaria = $this -> Agenda_model -> dame_info_dia($year, $mon, $day, $id);
				if ($infodiaria) {
					foreach ($infodiaria as $key => $value) {
						if ($value['tipo'] == "2") {
							$datos['infofamiliar'] = $value;
							$listaPublicadoPor = $this -> Usuarios_model -> dame_usuario_id($value['publicadopor']);
							$datos['familiarnombrepublicadopor'] =  $listaPublicadoPor[0]['nombre']." ".$listaPublicadoPor[0]['apellidos'];
						} else {
							$datos['infotutor'] = $value;
							$listaPublicadoPor = $this -> Usuarios_model -> dame_usuario_id($value['publicadopor']);
							$datos['tutornombrepublicadopor'] =  $listaPublicadoPor[0]['nombre']." ".$listaPublicadoPor[0]['apellidos'];
						}
					}
				}
				foreach ($listaAgenda as $key => $value) {
					$dia = substr($value['fecha'], 8);
					if ($dia < 10) {
						$diaformato = substr($dia, 1);
					} else {
						$diaformato = $dia;
					}
					$data[$diaformato] = base_url() . "usuario/perfilnino/" . $id . "/" . str_replace("-", "/", $value['fecha']);
				}
				$listaUsuarios[0]['imagenurl'] = $imagenurl;
				$this -> load -> model("Rel_clase_nino_model");
				$relClase = $this -> Rel_clase_nino_model -> dame_clase_idnino($id);
				$this -> load -> model("Clases_model");
				$listaClases = $this -> Clases_model -> dame_clase_id($relClase[0]['idclase']);
				$numeroalumnos = $this -> Clases_model -> dame_numeroalumnos_idclase($relClase[0]['idclase']);
				$listaClases[0]['numeroalumnos'] = $numeroalumnos[0]['numero'];
				$listaClases[0]['nombretutor'] = $listaTutor[0]['nombre'] . " " . $listaTutor[0]['apellidos'];
				$listaClases[0]['idtutor'] = $listaTutor[0]['id'];
				$datos['clase'] = $listaClases[0];
				$listaTutor[0]['imagenurl'] = $this -> comunes -> imagen_usuario($listaTutor[0]);
				$datos['tutor'] = $listaTutor;
				
				
				$result = array_merge((array)$datos, (array)$listaUsuarios[0]);
				
				if($this->session->userdata('movil') || $this->session->userdata('tablet')){
	
						$this -> load -> view('movil/plantilla/head', $result);
						$this -> load -> view('movil/plantilla/bodyheadermenu');
						if($permitido){
							$this -> load -> view('movil/plantilla/contenidoperfilnino');
						}else{
							$this -> load -> view('movil/plantilla/contenidoperfilnino2');
						}
						$this -> load -> view('movil/plantilla/footer');
				}else{
						$this -> load -> view('plantilla/head', $result);
						$this -> load -> view('plantilla/bodyheadermenu');
						if($permitido){
							$this -> load -> view('plantilla/contenidoperfilnino');
						}else{
							$this -> load -> view('plantilla/contenidoperfilnino2');
						}
						$this -> load -> view('plantilla/footer');
				}
			}
		}
	}
	public function mensaje() {
		if ($this -> session -> userdata('rol') == FALSE) {
			redirect(base_url());
		} else {
			$datos = array('titulo' => 'Eyerkinder | En desarrollo', 'action' => "comun/controller_enviarmensaje");
			$this -> load -> model('Mensajes_model');
			$this -> load -> model('Usuarios_model');
			$this -> load -> model('Notificaciones_model');
			$listaMensajes = $this -> Mensajes_model -> dame_mensaje_emisor($this -> session -> userdata('id'));
			$listaMensajes2 = $this -> Mensajes_model -> dame_mensaje_receptor($this -> session -> userdata('id'));
			$receptores = array();
			foreach ($listaMensajes as $key => $value) {
				$tiempofecha = explode("-", $value['fecha']);
				$listaMensajes[$key]["year"] = $tiempofecha[0];
				$listaMensajes[$key]["mon"] = $tiempofecha[1];
				$listaMensajes[$key]["day"] = $tiempofecha[2];
				$mensajesnoleidos = $this -> Mensajes_model -> dame_mensajes_noleidos($value['receptor'],$this -> session -> userdata('id'));
				//TODO XX ERROR Padre-tutor. probar
				$listaUser = $this -> Usuarios_model -> dame_usuario_id($value['receptor']);
				$listaMensajes[$key]['receptornombre'] = $listaUser[0]['nombre']. " ".$listaUser[0]['apellidos'];
				$listaMensajes[$key]['noleido'] = $mensajesnoleidos;
				$receptores[] = $value['receptor'];
			}
			foreach ($listaMensajes2 as $key2 => $value2) {
				if(!in_array($value2['emisor'], $receptores, true)){
					$tiempofecha = explode("-", $value2['fecha']);
					$listaMensajes2[$key2]["year"] = $tiempofecha[0];
					$listaMensajes2[$key2]["mon"] = $tiempofecha[1];
					$listaMensajes2[$key2]["day"] = $tiempofecha[2];
					$mensajesnoleidos2 = $this -> Mensajes_model -> dame_mensajes_noleidos($value2['emisor'],$this -> session -> userdata('id'));
					$listaUser = $this -> Usuarios_model -> dame_usuario_id($value2['emisor']);
					$listaMensajes2[$key2]['emisornombre'] = $listaUser[0]['nombre']. " ".$listaUser[0]['apellidos'];
					$listaMensajes2[$key2]['noleido'] = $mensajesnoleidos2;
				}
			}
				
			$datos['mensajes'] = $listaMensajes;
			$datos['mensajes2'] = $listaMensajes2;
			$orignennoti = array();
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){
					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/plantilla/mensajetodos');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('plantilla/mensajetodos');
					$this -> load -> view('plantilla/footer');
			}
		}
	}
	public function guardar_infonino() {
		$tipo = $_POST['tipo'];
		if ($tipo) {
			$this -> load -> library("form_validation");
			// $this -> form_validation -> set_rules("informacion", "Informacion", "trim|required");
			// $this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$idnino = $_POST['nino'];
			$year = $_POST['year'];
			$mon = $_POST['mon'];
			$day = $_POST['day'];
			$star = $_POST['star'];
			$this -> load -> model("Usuarios_model");
			$listaFamiliares = $this -> Usuarios_model -> dame_familiares_idnino($idnino);
			$listaTutores = $this -> Usuarios_model -> dame_tutor_idnino($idnino);
			$agenda = array();
			$error = array();
			$agenda['tipo'] = $tipo;
			$agenda['nino'] = $idnino;
			if (isset($_POST['valoracion'])) {
				$agenda['valoracion'] = $_POST['valoracion'];
			}
			$agenda['publicadopor'] = $this -> session -> userdata('id');
			$agenda['fecha'] = "$year-$mon-$day";
			if(strlen($day) == "1" && $day < 10){
				$day = "0$day";
			}
			if(isset($_POST['medicacion'])) $agenda['medicacion'] = $_POST['medicacion'];
			if(isset($_POST['dosis'])) $agenda['dosis'] = $_POST['dosis'];
			if(isset($_POST['recogida'])) $agenda['recogida'] = $_POST['recogida'];
			if(isset($_POST['pipi'])) $agenda['pipi'] = $_POST['pipi'];
			if(isset($_POST['caca'])) $agenda['caca'] = $_POST['caca'];
			if(isset($_POST['panales'])) $agenda['panales'] = $_POST['panales'];
			if(isset($_POST['actitud'])) $agenda['actitud'] = $_POST['actitud'];
			if(isset($_POST['alimentacion'])) $agenda['alimentacion'] = $_POST['alimentacion'];
			if(isset($_POST['lectivo'])) $agenda['lectivo'] = $_POST['lectivo'];
			if(isset($_POST['ludico'])) $agenda['ludico'] = $_POST['ludico'];
			if(isset($_POST['salud'])) $agenda['salud'] = $_POST['salud'];
			if(isset($_POST['relaciones'])) $agenda['relaciones'] = $_POST['relaciones'];
			if(isset($_POST['descanso'])) $agenda['descanso'] = $_POST['descanso'];
			if(isset($_POST['informacion'])) $agenda['informacion'] = $_POST['informacion'];
			if (/*$this -> form_validation -> run() == FALSE || */!isset($_POST['valoracion'])) {
				if (!isset($_POST['valoracion'])) {
					$newdata = array('errorvalidacion' => 'Debe valorar de 1 a 5 estrellas el resumen del día');
					$this -> session -> set_userdata($newdata);
				}
				
				$this -> session -> set_userdata($agenda);
				$this -> perfilnino($idnino,$year,$mon,$day,$star);
			} else {
				$this -> load -> model("Agenda_model");
				$idUser = $this -> Agenda_model -> inserta($agenda);
				// $this -> perfilnino($idnino,$year,$mon,$day,$star);
				$this -> load -> model("Notificaciones_model");
				foreach ($listaFamiliares as $key => $value) {
					if($this -> session -> userdata('id') != $value['id']){
						$notificaciones = array();
						$notificaciones['destino_id']=$value['id'];
						$notificaciones['autor_id']=$this -> session -> userdata('id');
						$notificaciones['objetivo_id']=$idnino;
						$notificaciones['tipo'] = "1";
						$notificaciones['year'] = $year;
						$notificaciones['mon'] = $mon;
						$notificaciones['day'] = $day;
						$notificaciones['fecha'] = date("Y-m-d H:i:s");
						$idNoti = $this -> Notificaciones_model -> inserta($notificaciones);
						$permisoemail = true;
						if($permisoemail){
							$listato = reset($this->Usuarios_model->dame_usuario_id($value['id']));
							$from = "admin@eyekinder.com";
							$to=$listato['email'];
							$mensaje= "";
							$enlace= "";
							$asunto='EyeKinder - Nueva información disponible de su hijo';
							$mensaje = "El tutor ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos')." ha insertado nueva información de su hijo correspondiente al dia $day/$mon/$year";
							$enlace = base_url()."usuario/perfilnino/$idnino/$year/$mon/$day";
							$this -> comunes -> enviarEmail($from, $to, $asunto, $mensaje, $enlace);
						}
					}
				}
				foreach ($listaTutores as $key => $value) {
					if($this -> session -> userdata('id') != $value['id']){
						$notificaciones = array();
						$notificaciones['destino_id']=$value['id'];
						$notificaciones['autor_id']=$this -> session -> userdata('id');
						$notificaciones['objetivo_id']=$idnino;
						$notificaciones['tipo'] = "1";
						$notificaciones['year'] = $year;
						$notificaciones['mon'] = $mon;
						$notificaciones['day'] = $day;
						$notificaciones['fecha'] = date("Y-m-d H:i:s");
						$idNoti = $this -> Notificaciones_model -> inserta($notificaciones);
						$permisoemail = true;
						if($permisoemail){
							$listato = reset($this->Usuarios_model->dame_usuario_id($value['id']));
							$from = "admin@eyekinder.com";
							$to=$listato['email'];
							$mensaje= "";
							$enlace= "";
							$asunto='EyeKinder - Nueva información disponible de su hijo';
							$mensaje = "El tutor ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos')." ha insertado nueva información de su hijo correspondiente al dia $day/$mon/$year";
							$enlace = base_url()."usuario/perfilnino/$idnino/$year/$mon/$day";
							$this -> comunes -> enviarEmail($from, $to, $asunto, $mensaje, $enlace);
						}
					}
				}
				redirect(base_url()."usuario/perfilnino/$idnino/$year/$mon/$day");
			}

		} else {
			show_404();
		}
	}
	public function editar_infonino() {
		$tipo = $_POST['tipo'];
		if ($tipo) {
			$this -> load -> library("form_validation");
			// $this -> form_validation -> set_rules("informacion", "Informacion", "trim|required");
			// $this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$idinfo = $_POST['idinfo'];
			$idnino = $_POST['nino'];
			$year = $_POST['year'];
			$mon = $_POST['mon'];
			$day = $_POST['day'];
			$star = $_POST['star'];
			$this -> load -> model("Usuarios_model");
			$listaFamiliares = $this -> Usuarios_model -> dame_familiares_idnino($idnino);
			$listaTutores = $this -> Usuarios_model -> dame_tutor_idnino($idnino);
			$agenda = array();
			$error = array();
			$agenda['id'] = $idinfo;
			if (isset($_POST['valoracion'])) {
				$agenda['valoracion'] = $_POST['valoracion'];
			}
			$agenda['publicadopor'] = $this -> session -> userdata('id');
			if(strlen($day) == "1" && $day < 10){
				$day = "0$day";
			}
			if(isset($_POST['deposiciones'])) $agenda['deposiciones'] = $_POST['deposiciones'];
			if(isset($_POST['medicacion'])) $agenda['medicacion'] = $_POST['medicacion'];
			if(isset($_POST['dosis'])) $agenda['dosis'] = $_POST['dosis'];
			if(isset($_POST['recogida'])) $agenda['recogida'] = $_POST['recogida'];
			if(isset($_POST['pipi'])) $agenda['pipi'] = $_POST['pipi'];
			if(isset($_POST['caca'])) $agenda['caca'] = $_POST['caca'];
			if(isset($_POST['panales'])) $agenda['panales'] = $_POST['panales'];
			if(isset($_POST['actitud'])) $agenda['actitud'] = $_POST['actitud'];
			if(isset($_POST['alimentacion'])) $agenda['alimentacion'] = $_POST['alimentacion'];
			if(isset($_POST['lectivo'])) $agenda['lectivo'] = $_POST['lectivo'];
			if(isset($_POST['ludico'])) $agenda['ludico'] = $_POST['ludico'];
			if(isset($_POST['salud'])) $agenda['salud'] = $_POST['salud'];
			if(isset($_POST['relaciones'])) $agenda['relaciones'] = $_POST['relaciones'];
			if(isset($_POST['descanso'])) $agenda['descanso'] = $_POST['descanso'];
			if(isset($_POST['informacion'])) $agenda['informacion'] = $_POST['informacion'];
			if (/*$this -> form_validation -> run() == FALSE || */!isset($_POST['valoracion'])) {
				if (!isset($_POST['valoracion'])) {
					$newdata = array('errorvalidacion' => 'Debe valorar de 1 a 5 estrellas el resumen del día');
					$this -> session -> set_userdata($newdata);
				}
				
				$this -> session -> set_userdata($agenda);
				if($tipo == "2"){
					$this->editar_infofamiliar($idinfo,$idnino, $year, $mon, $day, $star);
				}else{
					$this->editar_infotutor($idinfo,$idnino, $year, $mon, $day, $star);
				}
			} else {
				$this -> load -> model("Agenda_model");
				$this -> Agenda_model -> update($agenda);
				$this -> load -> model("Notificaciones_model");
				foreach ($listaFamiliares as $key => $value) {
					if($this -> session -> userdata('id') != $value['id']){
						$notificaciones = array();
						$notificaciones['destino_id']=$value['id'];
						$notificaciones['autor_id']=$this -> session -> userdata('id');
						$notificaciones['objetivo_id']=$idnino;
						$notificaciones['tipo'] = "2";
						$notificaciones['year'] = $year;
						$notificaciones['mon'] = $mon;
						$notificaciones['day'] = $day;
						$notificaciones['fecha'] = date("Y-m-d H:i:s");
						$idNoti = $this -> Notificaciones_model -> inserta($notificaciones);
						$permisoemail = true;
						if($permisoemail){
							$listato = reset($this->Usuarios_model->dame_usuario_id($value['id']));
							$from = "admin@eyekinder.com";
							$to=$listato['email'];
							$mensaje= "";
							$enlace= "";
							$asunto='EyeKinder - La información de uno de sus hijos ha sido actualizada';
							$mensaje = "El tutor ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos')." ha modificado la información de su hijo correspondiente al dia $day/$mon/$year";
							$enlace = base_url()."usuario/perfilnino/$idnino/$year/$mon/$day";
							$this -> comunes -> enviarEmail($from, $to, $asunto, $mensaje, $enlace);
						}
					}
				}
				foreach ($listaTutores as $key => $value) {
					if($this -> session -> userdata('id') != $value['id']){
						$notificaciones = array();
						$notificaciones['destino_id']=$value['id'];
						$notificaciones['autor_id']=$this -> session -> userdata('id');
						$notificaciones['objetivo_id']=$idnino;
						$notificaciones['tipo'] = "2";
						$notificaciones['year'] = $year;
						$notificaciones['mon'] = $mon;
						$notificaciones['day'] = $day;
						$notificaciones['fecha'] = date("Y-m-d H:i:s");
						$idNoti = $this -> Notificaciones_model -> inserta($notificaciones);
						$permisoemail = true;
						if($permisoemail){
							$listato = reset($this->Usuarios_model->dame_usuario_id($value['id']));
							$from = "admin@eyekinder.com";
							$to=$listato['email'];
							$mensaje= "";
							$enlace= "";
							$asunto='EyeKinder - La información de uno de sus hijos ha sido actualizada';
							$mensaje = "El tutor ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos')." ha modificado la información de su hijo correspondiente al dia $day/$mon/$year";
							$enlace = base_url()."usuario/perfilnino/$idnino/$year/$mon/$day";
							$this -> comunes -> enviarEmail($from, $to, $asunto, $mensaje, $enlace);
						}
					}
				}
				// $this -> perfilnino($idnino,$year,$mon,$day,$star);
				// redirect(base_url()."usuario/perfilnino/$idnino/$year/$mon/$day");
				if($this->session->userdata('movil') || $this->session->userdata('tablet')){
					redirect(base_url()."usuario/perfilnino/$idnino/$year/$mon/$day");
				}else{
					$newdata = array(
	                   'exito'  => 'La información se ha actualizado correctamente'
	               	);
					$this->session->set_userdata($newdata);
					redirect("home/exitofancybox");
				}
			}

		} else {
			show_404();
		}
	}

	// setting tampilan kalender
	function _setting($year, $mon, $id) {
		return array('start_day' => 'lunes', 'show_next_prev' => true, 'next_prev_url' => site_url('usuario/perfilnino/' . $id), 'month_type' => 'long', 'day_type' => '', 
		'template' => '{table_open}<table style="width: 180px;
													font-size: 17px;
													margin-left: -15px;" border="1" cellpadding="4" cellspacing="4">{/table_open}
								{heading_row_start}<tr>{/heading_row_start} {heading_previous_cell}<th><a rel="external" href="{previous_url}">&lt;&lt;</a></th> {/heading_previous_cell}
								{heading_title_cell}<th colspan="{colspan}">{heading}</th> {/heading_title_cell}
								{heading_next_cell}<th><a rel="external" href="{next_url}">&gt;&gt;</a></th> {/heading_next_cell}
								{heading_row_end}</tr>{/heading_row_end}
								{week_row_start}<tr>{/week_row_start} {week_day_cell}<td>{week_day}</td>{/week_day_cell} {week_row_end}</tr>{/week_row_end}
								{cal_row_start}<tr>{/cal_row_start} {cal_cell_start}<td>{/cal_cell_start}
								{cal_cell_content}<a rel="external" href="{content}">{day}</a>{/cal_cell_content} {cal_cell_content_today}<div class="highlight">
								<a rel="external" href="{content}">{day}</a></div>{/cal_cell_content_today}
								{cal_cell_no_content}<a rel="external" class="colorgris" href="' . base_url() . 'usuario/perfilnino/' . $id . '/' . $year . '/' . $mon . '/{day}">{day}</a>{/cal_cell_no_content} {cal_cell_no_content_today}<div class="highlight">{day}</div> {/cal_cell_no_content_today}
								{cal_cell_blank}&nbsp;{/cal_cell_blank} {cal_cell_end}</td>{/cal_cell_end}
								{cal_row_end}</tr>{/cal_row_end} {table_close}</table>{/table_close}
								');
	}

	public function editar() {
		if ($this -> session -> userdata('rol')) {
			$datos = array('titulo' => 'Eyekinder | Editar usuario', 'subtitulo' => 'Eyekinder | Editar usuario', 'action' => 'usuario/controller_editar');

			$id = $this -> session -> userdata('id');
			$this -> load -> model('Usuarios_model');
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($id);
			if (!$listaUser) {
				show_404();
			}
			$datos['error'] = $listaUser['0'];
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/formularios/editar_usuario');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('formularios/editar_usuario');
					$this -> load -> view('plantilla/footer');
			}
		} else {
			redirect(base_url());

		}
	}

	public function controller_editar() {
		if ($this -> input -> post('form')) {
			$this -> load -> library("form_validation");
			$this -> load -> library("libupload");
			$this -> form_validation -> set_rules("nombre", "Nombre", "trim|required|min_length[2]");
			$this -> form_validation -> set_rules("apellidos", "Apellidos", "trim|required|min_length[2]");
			$this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$this -> form_validation -> set_message("matches", "El campo %s debe ser igual al campo %s.");
			$this -> form_validation -> set_message("min_length", "El campo %s debe tener un mínimo de %s caracteres.");
			$this -> form_validation -> set_message("valid_email", "El formato del email no es el correcto (ejemplo@mail.com)");
			// realizamos un for para multi upload con nuestra libreria
			$imagen = "";
			if ($this -> input -> post('imagenactual')) {
				$imagen = $this -> input -> post('imagenactual');
			}
			for ($i = 0; $i < count($_FILES); $i++) {
				//no le hacemos caso a los bacios
				if (!empty($_FILES['imagen' . $i]['name'])) {
					$respuesta[] = $this -> libupload -> doUpload($i, $_FILES['imagen' . $i], 'images/subidas', 'jpg|png|jpeg|gif', 9999, 9999, 0);

					foreach ($respuesta as $key => $value) {
						foreach ($value as $key2 => $value2) {
							$thumb = $this -> libupload -> doThumb($value2['file_name'], 'images/subidas', 200, 200);
							// print_r($value);
							$imagen = $value2['file_name'];
						}
					}
				}
			}
			//Recogemos las variables
			$this -> load -> model("Usuarios_model");
			$listaUsuarios = array();
			$listaUsuarios = $this -> Usuarios_model -> dame_usuario_id2($this -> input -> post('idUsuario'));
			$usuarioinfo = $listaUsuarios[0];
			$usuarioinfo['nombre'] = $_POST['nombre'];
			$usuarioinfo['apellidos'] = $_POST['apellidos'];
			$usuarioinfo['fechanacimiento'] = $_POST['fechanac'];
			$usuarioinfo['imagen'] = $imagen;
			$usuarioinfo['sexo'] = $_POST['sexo'];
			$usuarioinfo2 = $usuarioinfo;
			$usuarioinfo2['imagenurl'] = $this -> comunes -> imagen_usuario($usuarioinfo);

			if ($this -> form_validation -> run() == FALSE) {
				$this -> editar();
			} else {
				$this -> load -> model("Usuarios_model");
				$idUser = $this -> Usuarios_model -> actualizar_usuario($usuarioinfo);
				$this -> session -> set_userdata($usuarioinfo2);
				$exito = "Los datos del usuario se han modificado con exito.";
				redirect("home/exito/" . $exito);
			}
		} else {
			show_404();
		}
	}
	public function editarnino($id=null) {
		if ($this -> session -> userdata('rol')) {
			$datos = array('titulo' => 'Eyekinder | Editar niño', 'subtitulo' => 'Eyekinder | Editar niño', 'action' => 'usuario/controller_editarnino');

			$this -> load -> model('Ninos_model');
			$listaUser = $this -> Ninos_model -> dame_nino_id($id);
			if (!$listaUser) {
				show_404();
			}
			
				$this -> load -> model("Ninos_model");
				$listaTipos = $this -> Ninos_model -> dame_tiponino();
				$opciones2 = array();
				foreach ($listaTipos as $guarde) {
					$idp = $guarde['id'];
					$desc = $guarde['descripcion'];
					$opciones2[$idp] = $desc;
				}
				$datos['opcionestiponino'] = $opciones2;
			$datos['error'] = $listaUser['0'];
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/formularios/editar_nino');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('formularios/editar_nino');
					$this -> load -> view('plantilla/footer');
			}
		} else {
			redirect(base_url());

		}
	}

	public function controller_editarnino() {
		if ($this -> input -> post('form')) {
			$this -> load -> library("form_validation");
			$this -> load -> library("libupload");
			$this -> form_validation -> set_rules("nombre", "Nombre", "trim|required|min_length[2]");
			$this -> form_validation -> set_rules("apellidos", "Apellidos", "trim|required|min_length[2]");
			$this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$this -> form_validation -> set_message("matches", "El campo %s debe ser igual al campo %s.");
			$this -> form_validation -> set_message("min_length", "El campo %s debe tener un mínimo de %s caracteres.");
			$this -> form_validation -> set_message("valid_email", "El formato del email no es el correcto (ejemplo@mail.com)");
			// realizamos un for para multi upload con nuestra libreria
			$imagen = "";
			if ($this -> input -> post('imagenactual')) {
				$imagen = $this -> input -> post('imagenactual');
			}
			for ($i = 0; $i < count($_FILES); $i++) {
				//no le hacemos caso a los bacios
				if (!empty($_FILES['imagen' . $i]['name'])) {
					$respuesta[] = $this -> libupload -> doUpload($i, $_FILES['imagen' . $i], 'images/subidas', 'jpg|png|jpeg|gif', 9999, 9999, 0);

					foreach ($respuesta as $key => $value) {
						foreach ($value as $key2 => $value2) {
							$thumb = $this -> libupload -> doThumb($value2['file_name'], 'images/subidas', 200, 200);
							// print_r($value);
							$imagen = $value2['file_name'];
						}
					}
				}
			}
			//Recogemos las variables
			$this -> load -> model("Ninos_model");
			$listaUsuarios = array();
			$listaUsuarios = $this -> Ninos_model -> dame_nino_id($this -> input -> post('idNino'));
			$usuarioinfo = $listaUsuarios[0];
			$usuarioinfo['nombre'] = $_POST['nombre'];
			$usuarioinfo['apellidos'] = $_POST['apellidos'];
			$usuarioinfo['fechanacimiento'] = $_POST['fechanac'];
			$usuarioinfo['imagen'] = $imagen;
			$usuarioinfo['sexo'] = $_POST['sexo'];
			$usuarioinfo['tipo'] = $_POST['tipo'];

			if ($this -> form_validation -> run() == FALSE) {
				$this -> editarnino($usuarioinfo['id']);
			} else {
				$idUser = $this -> Ninos_model -> actualizar_nino($usuarioinfo);
				$this -> editarnino($usuarioinfo['id']);
			}
		} else {
			show_404();
		}
	}

	public function editarpass($error = null) {
		if ($this -> session -> userdata('rol')) {
			$datos = array('titulo' => 'Eyekinder | Editar contraseña', 'subtitulo' => 'Eyekinder | Editar contraseña', 'action' => 'usuario/controller_editarpass');

			$id = $this -> session -> userdata('id');
			$this -> load -> model('Usuarios_model');
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($id);
			if (!$listaUser) {
				show_404();
			}
			$datos['error'] = $listaUser['0'];
			$datos['errorpass'] = $error;
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/formularios/editar_pass');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('formularios/editar_pass');
					$this -> load -> view('plantilla/footer');
			}
		} else {
			redirect(base_url());

		}
	}
	public function nuevapass($error1 = null) {
		$token = $this->uri->segment(3);
		$this -> load -> model('Usuarios_model');
		$listaUser = $this -> Usuarios_model -> dame_usuario_token($token);
		if ($listaUser!=null) {
			$datos = array('titulo' => 'Eyekinder | Nueva contraseña', 'subtitulo' => 'Eyekinder | Nueva contraseña', 'action' => 'usuario/controller_nuevapass');
			$this -> load -> model("Diseno_model");
			$listadiseno = $this->Diseno_model->dame_diseno_idguarderia("0");
			$datos['diseno'] = $listadiseno['0'];
			$datos['error1'] = $listaUser['0'];
			if($error1!=$token){
				$datos['errorpass'] = $error1;
			}
			
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheaderprincipal2');
					$this -> load -> view('movil/formularios/nueva_pass');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheaderprincipal2');
					$this -> load -> view('formularios/nueva_pass');
					$this -> load -> view('plantilla/footer');
			}
		} else {
			show_404();

		}
	}
	
	public function controller_editarpass() {
		if ($this -> input -> post('form')) {
			$this -> load -> library("form_validation");
			$this -> load -> library("libupload");
			$this -> form_validation -> set_rules('passactual', 'Contraseña actual', 'trim|required|min_length[6]');
			$this -> form_validation -> set_rules('pass1', 'Contraseña nueva', 'trim|required|min_length[6]');
			$this -> form_validation -> set_rules('pass2', 'Confirmar Contraseña', 'trim|required|matches[pass1]|min_length[6]');
			$this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$this -> form_validation -> set_message("matches", "El campo %s debe ser igual al campo %s.");
			$this -> form_validation -> set_message("min_length", "El campo %s debe tener un mínimo de %s caracteres.");
			$this -> form_validation -> set_message("valid_email", "El formato del email no es el correcto (ejemplo@mail.com)");
			// realizamos un for para multi upload con nuestra libreria
			$imagen = "";
			if ($this -> input -> post('imagenactual')) {
				$imagen = $this -> input -> post('imagenactual');
			}
			//Recogemos las variables
			$this -> load -> model("Usuarios_model");
			$listaUsuarios = array();
			$listaUsuarios = $this -> Usuarios_model -> dame_usuario_id2($this -> input -> post('idUsuario'));
			$usuarioinfo = $listaUsuarios[0];
			$passactual = $_POST['passactual'];
			$pass1 = $_POST['pass1'];
			$pass2 = $_POST['pass2'];
			if ($this -> form_validation -> run() == FALSE) {
				$this -> editarpass();
			} else {
				if ($this -> Usuarios_model -> existe_pass($passactual)) {
					$this -> load -> model("Usuarios_model");
					$usuarioinfo['pass'] = md5($pass1);
					$idUser = $this -> Usuarios_model -> actualizar_usuario($usuarioinfo);
					$exito = "Los datos del usuario se han modificado con exito.";
					redirect(base_url());
				} else {
					$error = "La contraseña actual no es correcta";
					$this -> editarpass($error);
				}
			}
		} else {
			show_404();
		}
	}
public function controller_nuevapass() {
		if ($this -> input -> post('form')) {
			$this -> load -> library("form_validation");
			$this -> load -> library("libupload");
			$this -> form_validation -> set_rules('pass1', 'Contraseña nueva', 'trim|required|min_length[6]');
			$this -> form_validation -> set_rules('pass2', 'Confirmar Contraseña', 'trim|required|matches[pass1]|min_length[6]');
			$this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$this -> form_validation -> set_message("matches", "El campo %s debe ser igual al campo %s.");
			$this -> form_validation -> set_message("min_length", "El campo %s debe tener un mínimo de %s caracteres.");
			$this -> form_validation -> set_message("valid_email", "El formato del email no es el correcto (ejemplo@mail.com)");
			// realizamos un for para multi upload con nuestra libreria
			$imagen = "";
			if ($this -> input -> post('imagenactual')) {
				$imagen = $this -> input -> post('imagenactual');
			}
			//Recogemos las variables
			$this -> load -> model("Usuarios_model");
			$listaUsuarios = array();
			$listaUsuarios = $this -> Usuarios_model -> dame_usuario_id2($this -> input -> post('idUsuario'));
			$usuarioinfo = $listaUsuarios[0];
			$pass1 = $_POST['pass1'];
			$pass2 = $_POST['pass2'];
			if ($this -> form_validation -> run() == FALSE) {
				$this -> nuevapass();
			} else {
				if ($this -> Usuarios_model -> existe_id($usuarioinfo['id'])) {
					$this -> load -> model("Usuarios_model");
					$usuarioinfo['pass'] = md5($pass1);
					$idUser = $this -> Usuarios_model -> actualizar_usuario($usuarioinfo);
					$datos=array();
					$datos['id']=$listaUsuarios[0]['id'];
					$datos['token']=NULL;
					$this -> load -> model("Usuarios_model");
					$this -> Usuarios_model -> actualizar_usuario($datos);
					$exito = "Los datos del usuario se han modificado con exito.";
					redirect(base_url());
				} else {
					$error = "La contraseña actual no es correcta";
					$this -> nuevapass($error);
				}
			}
		} else {
			show_404();
		}
	}
	public function editar_infotutor($idinfo = null,$id = null, $year = null, $mon = null, $day = null, $star = null,$error = null) {
		if ($this -> session -> userdata('rol')) {
			$datos = array('titulo' => 'Eyekinder | Editar información diaria', 'action' => 'usuario/controller_editarinfotutor');

			$this -> load -> model('Ninos_model');
			$listaNino = $this -> Ninos_model -> dame_nino_id($id);
			$this -> load -> model('Agenda_model');
			$listaInfo = $this -> Agenda_model -> dame_agenda_id($idinfo);
			if (!$listaNino) {
				show_404();
			}
			$datos['year'] = $year;
			$datos['mon'] = $mon;
			$datos['day'] = $day;
			$datos['star'] = $star;
			$datos['nino'] = $listaNino[0];
			$datos['info'] = $listaInfo[0];
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheaderfancybox');
					$this -> load -> view('movil/formularios/editar_infotutor');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheaderfancybox');
					$this -> load -> view('formularios/editar_infotutor');
					$this -> load -> view('plantilla/footer');
			}
		} else {
			redirect(base_url());

		}
	}
	public function editar_infofamiliar($idinfo = null,$id = null, $year = null, $mon = null, $day = null, $star = null,$error = null) {
		if ($this -> session -> userdata('rol')) {
			$datos = array('titulo' => 'Eyekinder | Editar información de casa', 'action' => 'usuario/controller_editarinfofamiliar');

			$this -> load -> model('Ninos_model');
			$listaNino = $this -> Ninos_model -> dame_nino_id($id);
			$this -> load -> model('Agenda_model');
			$listaInfo = $this -> Agenda_model -> dame_agenda_id($idinfo);
			if (!$listaNino) {
				show_404();
			}
			$datos['year'] = $year;
			$datos['mon'] = $mon;
			$datos['day'] = $day;
			$datos['star'] = $star;
			$datos['nino'] = $listaNino[0];
			$datos['info'] = $listaInfo[0];
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheaderfancybox');
					$this -> load -> view('movil/formularios/editar_infofamiliar');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheaderfancybox');
					$this -> load -> view('formularios/editar_infofamiliar');
					$this -> load -> view('plantilla/footer');
			}
		} else {
			redirect(base_url());

		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
