<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Registro extends CI_Controller {

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
		$datos = array('titulo' => 'Eyekinder | Registro', 'subtitulo' => 'Eyekinder | Registro de Usuarios','action' => 'registro/controller_editarfamiliar');
		$datos['error'] = $error;
		$this -> load -> view('plantilla/head', $datos);

		$this -> load -> view('plantilla/bodyheaderregistro');
		$this -> load -> view('formularios/nuevo_usuario');
		$this -> load -> view('plantilla/footer');
		
	}
	public function nuevo_invitado($token = null,$guarde = null) {
		$datos = array('titulo' => 'Eyekinder | Registro', 'subtitulo' => 'Eyekinder | Registro de Usuarios','action' => 'registro/controller_editarfamiliar');
		$this -> load -> model('Usuarios_model');
		$listaUser = $this -> Usuarios_model -> dame_usuario_token($token);
		if ($listaUser!=null) {
			$this -> load -> model("Diseno_model");
			$listadiseno = $this->Diseno_model->dame_diseno_idguarderia("0");
			$datos['diseno'] = $listadiseno['0'];
			$datos['error1'] = $listaUser['0'];
			$datos['error'] = $listaUser['0'];
			$datos['guarderia_invitado'] = $guarde;
			$datos['token'] = $token;
			$datos['id_invitado'] = $listaUser['0']['id'];
			
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheaderfancybox');
					$this -> load -> view('movil/formularios/nuevo_usuario');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheaderfancybox');
					$this -> load -> view('formularios/nuevo_usuario');
					$this -> load -> view('plantilla/footer');
			}
		} else {
			show_404();

		}
		
		
	}
	function familiar($error = null) {
		if ($this -> session -> userdata('rol') && $this -> session -> userdata('rol') != '2') {
			$datos = array('titulo' => 'Eyekinder | Registro de Familiar', 'subtitulo' => 'Eyekinder | Registro de Familiar', 'action' => 'registro/controller_familiar');
			$datos['error'] = $error;
			if ($this -> session -> userdata('rol') == '4') {
				$this -> load -> model("Guarderias_model");
				$listaGuardes = $this -> Guarderias_model -> dame_guarderia_iddirector($this -> session -> userdata('id'));
				$idGuarde = $listaGuardes[0]['id'];
				$datos['idGuarderia'] = $idGuarde;
			} else if ($this -> session -> userdata('rol') == '1') {
				$this -> load -> model("Guarderias_model");
				$listaGuardes = $this -> Guarderias_model -> dame_select_guarderia();
				foreach ($listaGuardes as $guarde) {

					$idp = $guarde['id'];
					$desc = $guarde['nombre'];
					$opciones[$idp] = $desc;
				}
				$datos['opciones'] = $opciones;
			} else if ($this -> session -> userdata('rol') == '3') {
				$this -> load -> model("Guarderias_model");
				$listaGuardes = $this -> Guarderias_model -> dame_guarderia_tutor($this -> session -> userdata('id'));
				$idGuarde = $listaGuardes[0]['id'];
				$datos['idGuarderia'] = $idGuarde;
			} else if ($this -> session -> userdata('rol') == '5') {
				$this -> load -> model("Guarderias_model");
				$listaGuardes = $this -> Guarderias_model -> dame_select_guarderia_idgerente($this -> session -> userdata('id'));
				foreach ($listaGuardes as $guarde) {

					$idp = $guarde['id'];
					$desc = $guarde['nombre'];
					$opciones[$idp] = $desc;
				}
				$datos['opciones'] = $opciones;
			}

			$id = $this -> session -> userdata('id');
			$this -> load -> model('Usuarios_model');
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($id);
			if (!$listaUser) {
				show_404();
			}
			$result = array_merge((array)$datos, (array)$listaUser[0]);
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $result);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/formularios/nuevo_usuario');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $result);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('formularios/nuevo_usuario');
					$this -> load -> view('plantilla/footer');
			}
		} else {
			show_404();
		}
	}

	public function controller_familiar() {
		if ($this -> input -> post('form')) {
			$this -> load -> library("form_validation");
			$this -> load -> library("libupload");
			$this -> form_validation -> set_rules("nombre", "Nombre", "trim|required|min_length[2]");
			$this -> form_validation -> set_rules("apellidos", "Apellidos", "trim|required|min_length[2]");
			$this -> form_validation -> set_rules('pass1', 'Contraseña', 'trim|required|min_length[6]');
			$this -> form_validation -> set_rules('pass2', 'Confirmar Contraseña', 'trim|required|matches[pass1]|min_length[6]');
			$this -> form_validation -> set_rules('email', 'Email', 'trim|required|valid_email');
			$this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$this -> form_validation -> set_message("matches", "El campo %s debe ser igual al campo %s.");
			$this -> form_validation -> set_message("min_length", "El campo %s debe tener un mínimo de %s caracteres.");
			$this -> form_validation -> set_message("valid_email", "El formato del email no es el correcto (ejemplo@mail.com)");
			// realizamos un for para multi upload con nuestra libreria
			$imagen = "";
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
			};
			//Recogemos las variables
			$usuarioinfo = array();
			$usuarioinfo['nombre'] = $_POST['nombre'];
			$usuarioinfo['apellidos'] = $_POST['apellidos'];
			$usuarioinfo['pass'] = $_POST['pass1'];
			$usuarioinfo['email'] = $_POST['email'];
			$usuarioinfo['fechanacimiento'] = $_POST['fechanac'];
			$usuarioinfo['imagen'] = $imagen;
			$usuarioinfo['sexo'] = $_POST['sexo'];
			$usuarioinfo['rol'] = "2";
			$relacioninfo = array();
			$relacioninfo['idguarderia'] = $_POST['guarderia'];
			$this -> load -> model("Usuarios_model");

			if ($this -> form_validation -> run() == FALSE || $this -> Usuarios_model -> existe_email($usuarioinfo['email'])) {
				$errorinfo = $usuarioinfo;
				$errorinfo['guarderia'] = $_POST['guarderia'];
				if($this -> Usuarios_model -> existe_email($usuarioinfo['email'])){
					$errorinfo['erroremail'] = "El email que está insertando ya está registrado en la web";
				}
				$this -> familiar($errorinfo);
			} else {
				$idUser = $this -> Usuarios_model -> inserta_usuario($usuarioinfo);
				$relacioninfo['idfamiliar'] = $idUser;
				$this -> load -> model("Rel_guarderia_familiar_model");
				$idUser = $this -> Rel_guarderia_familiar_model -> inserta($relacioninfo);$newdata = array(
                   'exito'  => 'El familiar se ha registrado con éxito'
               	);
				$this->session->set_userdata($newdata);
				redirect("home/exito");
			}
		} else {
			show_404();
		}
	}
	public function controller_editarfamiliar() {
		if ($this -> input -> post('form')) {
			$this -> load -> library("form_validation");
			$this -> load -> library("libupload");
			$this -> form_validation -> set_rules("nombre", "Nombre", "trim|required|min_length[2]");
			$this -> form_validation -> set_rules("apellidos", "Apellidos", "trim|required|min_length[2]");
			$this -> form_validation -> set_rules('pass1', 'Contraseña', 'trim|required|min_length[6]');
			$this -> form_validation -> set_rules('pass2', 'Confirmar Contraseña', 'trim|required|matches[pass1]|min_length[6]');
			$this -> form_validation -> set_rules('email', 'Email', 'trim|required|valid_email');
			$this -> form_validation -> set_rules('condiciones', 'condiciones y política de privacidad', 'required');
			$this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$this -> form_validation -> set_message("matches", "El campo %s debe ser igual al campo %s.");
			$this -> form_validation -> set_message("min_length", "El campo %s debe tener un mínimo de %s caracteres.");
			$this -> form_validation -> set_message("valid_email", "El formato del email no es el correcto (ejemplo@mail.com)");
			// realizamos un for para multi upload con nuestra libreria
			$imagen = "";
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
			};
			//Recogemos las variables
			$usuarioinfo = array();
			$usuarioinfo['nombre'] = $_POST['nombre'];
			$usuarioinfo['id'] = $_POST['iduser'];
			$usuarioinfo['apellidos'] = $_POST['apellidos'];
			$usuarioinfo['pass'] = $_POST['pass1'];
			$usuarioinfo['email'] = $_POST['email'];
			$usuarioinfo['fechanacimiento'] = $_POST['fechanac'];
			$usuarioinfo['imagen'] = $imagen;
			$usuarioinfo['sexo'] = $_POST['sexo'];
			$usuarioinfo['rol'] = "2";
			$relacioninfo = array();
			$relacioninfo['idguarderia'] = $_POST['guarderia'];
			$relacioninfo['idfamiliar'] = $_POST['iduser'];
			$this -> load -> model("Usuarios_model");

			if ($this -> form_validation -> run() == FALSE || $this -> Usuarios_model -> existe_email($usuarioinfo['email'])) {
				$errorinfo = $usuarioinfo;
				$errorinfo['guarderia'] = $_POST['guarderia'];
				if($this -> Usuarios_model -> existe_email($usuarioinfo['email'])){
					$errorinfo['erroremail'] = "El email que está insertando ya está registrado en la web";
				}
				$this -> nuevo_invitado($_POST['token'],$_POST['guarderia']);
			} else {
				$idUser = $this -> Usuarios_model -> actualizar_usuario2($usuarioinfo);
				$this -> load -> model("Rel_guarderia_familiar_model");
				$idUser = $this -> Rel_guarderia_familiar_model -> inserta($relacioninfo);
				$newdata = array(
                   'exito'  => 'El familiar se ha registrado con éxito'
               	);
				$this->session->set_userdata($newdata);
				redirect(base_url());
			}
		} else {
			show_404();
		}
	}
	function familiar_after($idnino=null,$error = null) {
		if ($this -> session -> userdata('rol')) {
			$datos = array('titulo' => 'Eyekinder | Registro de Familiar', 'subtitulo' => 'Eyekinder | Registro de Familiar', 'action' => 'registro/controller_familiar_after');
			$datos['error'] = $error;
			$this -> load -> model("Guarderias_model");
			$idGuarde = $this -> session -> userdata('guarderia');
			$datos['idGuarderia'] = $idGuarde;
			$datos['idNino'] = $idnino;
			$datos['after'] = "after";

			$id = $this -> session -> userdata('id');
			$this -> load -> model('Usuarios_model');
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($id);
			if (!$listaUser) {
				show_404();
			}
			$result = array_merge((array)$datos, (array)$listaUser[0]);
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $result);
					$this -> load -> view('movil/plantilla/bodyheaderfancybox');
					$this -> load -> view('movil/formularios/nuevo_usuario');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $result);
					$this -> load -> view('plantilla/bodyheaderfancybox');
					$this -> load -> view('formularios/nuevo_usuario.php');
					$this -> load -> view('plantilla/footer');
			}
		} else {
			show_404();
		}
	}
	public function controller_familiar_after() {
		if ($this -> input -> post('form')) {
			$this -> load -> library("form_validation");
			$this -> load -> library("libupload");
			$this -> form_validation -> set_rules("nombre", "Nombre", "trim|required|min_length[2]");
			$this -> form_validation -> set_rules("apellidos", "Apellidos", "trim|required|min_length[2]");
			$this -> form_validation -> set_rules('pass1', 'Contraseña', 'trim|required|min_length[6]');
			$this -> form_validation -> set_rules('pass2', 'Confirmar Contraseña', 'trim|required|matches[pass1]|min_length[6]');
			$this -> form_validation -> set_rules('email', 'Email', 'trim|required|valid_email');
			$this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$this -> form_validation -> set_message("matches", "El campo %s debe ser igual al campo %s.");
			$this -> form_validation -> set_message("min_length", "El campo %s debe tener un mínimo de %s caracteres.");
			$this -> form_validation -> set_message("valid_email", "El formato del email no es el correcto (ejemplo@mail.com)");
			// realizamos un for para multi upload con nuestra libreria
			$imagen = "";
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
			};
			//Recogemos las variables
			$usuarioinfo = array();
			$usuarioinfo['nombre'] = $_POST['nombre'];
			$usuarioinfo['apellidos'] = $_POST['apellidos'];
			$usuarioinfo['pass'] = $_POST['pass1'];
			$usuarioinfo['email'] = $_POST['email'];
			$usuarioinfo['fechanacimiento'] = $_POST['fechanac'];
			$usuarioinfo['imagen'] = $imagen;
			$usuarioinfo['sexo'] = $_POST['sexo'];
			$usuarioinfo['rol'] = "2";
			$relacioninfo = array();
			$relacioninfo2 = array();
			$relacioninfo['idguarderia'] = $_POST['guarderia'];
			$relacioninfo2['idnino'] = $_POST['nino'];
			$this -> load -> model("Usuarios_model");

			if ($this -> form_validation -> run() == FALSE || $this -> Usuarios_model -> existe_email($usuarioinfo['email'])) {
				$errorinfo = $usuarioinfo;
				$errorinfo['guarderia'] = $_POST['guarderia'];
				$errorinfo['nino'] = $_POST['nino'];
				if($this -> Usuarios_model -> existe_email($usuarioinfo['email'])){
					$errorinfo['erroremail'] = "El email que está insertando ya está registrado en la web";
				}
				$this -> familiar_after($relacioninfo2['idnino'],$errorinfo);
			} else {
				$idUser = $this -> Usuarios_model -> inserta_usuario($usuarioinfo);
				$relacioninfo['idfamiliar'] = $idUser;
				$this -> load -> model("Rel_guarderia_familiar_model");
				$idUser = $this -> Rel_guarderia_familiar_model -> inserta($relacioninfo);
				$relacioninfo2['idfamiliar'] = $relacioninfo['idfamiliar'];
				$this -> load -> model("Rel_familiar_nino_model");
				$idUser = $this -> Rel_familiar_nino_model -> inserta($relacioninfo2);
				$newdata = array(
                   'exito'  => 'El familiar se ha registrado con éxito'
               	);
				$this->session->set_userdata($newdata);
				redirect("home/exitofancybox");
			}
		} else {
			show_404();
		}
	}
	function tutor($error = null) {
		if ($this -> session -> userdata('rol') && $this -> session -> userdata('rol') != '2' && $this -> session -> userdata('rol') != '3') {
			$datos = array('titulo' => 'Eyekinder | Registro de Tutor', 'subtitulo' => 'Eyekinder | Registro de Tutor', 'action' => 'registro/controller_tutor');
			$datos['error'] = $error;

			if ($this -> session -> userdata('rol') == '4') {
				$this -> load -> model("Guarderias_model");
				$listaGuardes = $this -> Guarderias_model -> dame_guarderia_iddirector($this -> session -> userdata('id'));
				$idGuarde = $listaGuardes[0]['id'];
				$datos['idGuarderia'] = $idGuarde;
			} else if ($this -> session -> userdata('rol') == '1') {
				$this -> load -> model("Guarderias_model");
				$listaGuardes = $this -> Guarderias_model -> dame_select_guarderia();
				foreach ($listaGuardes as $guarde) {

					$idp = $guarde['id'];
					$desc = $guarde['nombre'];
					$opciones[$idp] = $desc;
				}
				$datos['opciones'] = $opciones;
			} else if ($this -> session -> userdata('rol') == '5') {
				$this -> load -> model("Guarderias_model");
				$listaGuardes = $this -> Guarderias_model -> dame_select_guarderia_idgerente($this -> session -> userdata('id'));
				foreach ($listaGuardes as $guarde) {

					$idp = $guarde['id'];
					$desc = $guarde['nombre'];
					$opciones[$idp] = $desc;
				}
				$datos['opciones'] = $opciones;
			}

			$id = $this -> session -> userdata('id');
			$this -> load -> model('Usuarios_model');
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($id);
			if (!$listaUser) {
				show_404();
			}
			$result = array_merge((array)$datos, (array)$listaUser[0]);
			
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $result);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/formularios/nuevo_usuario');
					$this -> load -> view('movil/plantilla/footer');
			}else{
						$this -> load -> view('plantilla/head', $result);
						$this -> load -> view('plantilla/bodyheadermenu');
						$this -> load -> view('formularios/nuevo_usuario');
						$this -> load -> view('plantilla/footer');
			}
		} else {
			show_404();
		}
	}

	public function controller_tutor() {
		if ($this -> input -> post('form')) {
			$this -> load -> library("form_validation");
			$this -> load -> library("libupload");
			$this -> form_validation -> set_rules("nombre", "Nombre", "trim|required|min_length[2]");
			$this -> form_validation -> set_rules("apellidos", "Apellidos", "trim|required|min_length[2]");
			$this -> form_validation -> set_rules('pass1', 'Contraseña', 'trim|required|min_length[6]');
			$this -> form_validation -> set_rules('pass2', 'Confirmar Contraseña', 'trim|required|matches[pass1]|min_length[6]');
			$this -> form_validation -> set_rules('email', 'Email', 'trim|required|valid_email');
			$this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$this -> form_validation -> set_message("matches", "El campo %s debe ser igual al campo %s.");
			$this -> form_validation -> set_message("min_length", "El campo %s debe tener un mínimo de %s caracteres.");
			$this -> form_validation -> set_message("valid_email", "El formato del email no es el correcto (ejemplo@mail.com)");
			// realizamos un for para multi upload con nuestra libreria
			$imagen = "";
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
			};
			//Recogemos las variables
			$usuarioinfo = array();
			$usuarioinfo['nombre'] = $_POST['nombre'];
			$usuarioinfo['apellidos'] = $_POST['apellidos'];
			$usuarioinfo['pass'] = $_POST['pass1'];
			$usuarioinfo['email'] = $_POST['email'];
			$usuarioinfo['fechanacimiento'] = $_POST['fechanac'];
			$usuarioinfo['imagen'] = $imagen;
			$usuarioinfo['sexo'] = $_POST['sexo'];
			$usuarioinfo['rol'] = "3";
			$relacioninfo = array();
			$relacioninfo['idguarderia'] = $_POST['guarderia'];
			$this -> load -> model("Usuarios_model");

			if ($this -> form_validation -> run() == FALSE || $this -> Usuarios_model -> existe_email($usuarioinfo['email'])) {
				$errorinfo = $usuarioinfo;
				$errorinfo['guarderia'] = $_POST['guarderia'];
				if($this -> Usuarios_model -> existe_email($usuarioinfo['email'])){
					$errorinfo['erroremail'] = "El email que está insertando ya está registrado en la web";
				}
				$this -> tutor($errorinfo);
			} else {
				$idUser = $this -> Usuarios_model -> inserta_usuario($usuarioinfo);
				$relacioninfo['idtutor'] = $idUser;
				$this -> load -> model("Rel_guarderia_tutor_model");
				$idUser = $this -> Rel_guarderia_tutor_model -> inserta($relacioninfo);
				$newdata = array(
                   'exito'  => 'El tutor se ha registrado con éxito'
               	);
				$this->session->set_userdata($newdata);
				redirect("home/exito");
			}
		} else {
			show_404();
		}

	}

	function nino($error = null) {
		if ($this -> session -> userdata('rol')) {
			$datos = array('titulo' => 'Eyekinder | Registro de niños', 'subtitulo' => 'Eyekinder | Registro de Niños');
			$datos['error'] = $error;

			if ($this -> session -> userdata('rol') == '4') {
				$this -> load -> model("Guarderias_model");
				$listaGuardes = $this -> Guarderias_model -> dame_guarderia_iddirector($this -> session -> userdata('id'));
				$idGuarde = $listaGuardes[0]['id'];
				$datos['idGuarderia'] = $idGuarde;
				$this -> load -> model("Usuarios_model");
				$listaGuardes = $this -> Usuarios_model -> dame_select_familiar_guarderia($idGuarde);
				$opciones2 = array();
				foreach ($listaGuardes as $guarde) {
					$idp = $guarde['id'];
					$desc = $guarde['nombre'] . " " . $guarde['apellidos'];
					$opciones2[$idp] = $desc;
				}
				$datos['opciones2'] = $opciones2;
			} else if ($this -> session -> userdata('rol') == '1') {
				$this -> load -> model("Guarderias_model");
				$listaGuardes = $this -> Guarderias_model -> dame_select_guarderia();
				foreach ($listaGuardes as $guarde) {

					$idp = $guarde['id'];
					$desc = $guarde['nombre'];
					$opciones[$idp] = $desc;
				}
				$datos['opciones'] = $opciones;
				$this -> load -> model("Usuarios_model");
				$listaGuardes = $this -> Usuarios_model -> dame_select_familiar();
				$opciones2 = array();
				foreach ($listaGuardes as $guarde) {
					$idp = $guarde['id'];
					$desc = $guarde['nombre'] . " " . $guarde['apellidos'];
					$opciones2[$idp] = $desc;
				}
				$datos['opciones2'] = $opciones2;
			} else if ($this -> session -> userdata('rol') == '5') {
				$this -> load -> model("Guarderias_model");
				$listaGuardes = $this -> Guarderias_model -> dame_select_guarderia_idgerente($this -> session -> userdata('id'));
				foreach ($listaGuardes as $guarde) {

					$idp = $guarde['id'];
					$desc = $guarde['nombre'];
					$opciones[$idp] = $desc;
				}
				$datos['opciones'] = $opciones;
				$this -> load -> model("Usuarios_model");
				$opciones2 = array();
				foreach ($opciones as $guarde => $descripcion) {
					$listaGuardes = $this -> Usuarios_model -> dame_select_familiar_guarderia($guarde);
					foreach ($listaGuardes as $guarde) {
						$idp = $guarde['id'];
						$desc = $guarde['nombre'] . " " . $guarde['apellidos'];
						$opciones2[$idp] = $desc;
					}
				}
				$datos['opciones2'] = $opciones2;
			} else if ($this -> session -> userdata('rol') == '3') {
				$this -> load -> model("Guarderias_model");
				$listaGuardes = $this -> Guarderias_model -> dame_guarderia_tutor($this -> session -> userdata('id'));
				$idGuarde = $listaGuardes[0]['id'];
				$datos['idGuarderia'] = $idGuarde;
				$this -> load -> model("Usuarios_model");
				$listaGuardes = $this -> Usuarios_model -> dame_select_familiar_guarderia($idGuarde);
				$opciones2 = array();
				foreach ($listaGuardes as $guarde) {
					$idp = $guarde['id'];
					$desc = $guarde['nombre'] . " " . $guarde['apellidos'];
					$opciones2[$idp] = $desc;
				}
				$datos['opciones2'] = $opciones2;
			}else if ($this -> session -> userdata('rol') == '2') {
				$this -> load -> model("Usuarios_model");
				$listaFamiliares = $this -> Usuarios_model -> dame_familiares_idfamiliar($this -> session -> userdata('id'));
				$datos['familiares'] = $listaFamiliares;
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
			$id = $this -> session -> userdata('id');
			$this -> load -> model('Usuarios_model');
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($id);
			if (!$listaUser) {
				show_404();
			}
			$result = array_merge((array)$datos, (array)$listaUser[0]);
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $result);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/formularios/nuevo_nino');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $result);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('formularios/nuevo_nino');
					$this -> load -> view('plantilla/footer');
			}
		} else {
			show_404();
		}
	}

	public function controller_nino() {
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
			$usuarioinfo = array();
			$usuarioinfo['nombre'] = $_POST['nombre'];
			$usuarioinfo['apellidos'] = $_POST['apellidos'];
			$usuarioinfo['imagen'] = $imagen;
			$usuarioinfo['sexo'] = $_POST['sexo'];
			$usuarioinfo['tipo'] = $_POST['tipo'];
			$usuarioinfo['fechanacimiento'] = $_POST['fechanac'];
			$relacioninfo1 = array();
			$relacioninfo2 = array();
			$relacioninfo1['idguarderia'] = $_POST['guarderia'];

			if ($this -> form_validation -> run() == FALSE) {
				$errorinfo = $usuarioinfo;
				$errorinfo['guarderia'] = $_POST['guarderia'];
				$errorinfo['familiar'] = $_POST['familiar'];
				$this -> nino($errorinfo);
			} else {
				$this -> load -> model("Ninos_model");
				$idUser = $this -> Ninos_model -> inserta_nino($usuarioinfo);
				$relacioninfo1['idnino'] = $idUser;
				$relacioninfo2['idnino'] = $idUser;
				$this -> load -> model("Rel_guarderia_nino_model");
				$this -> Rel_guarderia_nino_model -> inserta($relacioninfo1);
				$this -> load -> model("Rel_familiar_nino_model");
				if($this -> session -> userdata('rol') == "2" ){
					$this -> load -> model("Notificaciones_model");
					$this -> load -> model("Guarderias_model");
					$this -> load -> model("Usuarios_model");
					$destino = $this->Guarderias_model->dame_director_idguarderia($this -> session -> userdata('guarderia'));
					$notificaciones = array();
					$notificaciones['destino_id']=$destino['0']['director'];
					$notificaciones['autor_id']=$this -> session -> userdata('id');
					$notificaciones['objetivo_id']=$idUser;
					$notificaciones['tipo'] = "3";
					$notificaciones['fecha'] = date("Y-m-d H:i:s");
					$idNoti = $this -> Notificaciones_model -> inserta($notificaciones);
					$permisoemail = true;
					if($permisoemail){
						$listato = reset($this->Usuarios_model->dame_usuario_id($destino['0']['director']));
						$from = "admin@eyekinder.com";
						$to=$listato['email'];
						$asunto='EyeKinder - Un familiar ha registrado a un niño';
						$mensaje= "";
						$enlace= "";
						$mensaje = "El familiar ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos')." ha registrado otro niño más en la aplicación, pasa por el enlace y acepta su petición";
						$enlace = base_url().'comun/pizarra';
						$this -> comunes -> enviarEmail($from, $to, $asunto, $mensaje, $enlace);
					}
					
					foreach ($_POST['familiar'] as $key => $value) {
						$relacioninfo2['idfamiliar'] = $value;
						$this -> Rel_familiar_nino_model -> inserta($relacioninfo2);
					}
				}else{
					$relacioninfo2['idfamiliar'] = $_POST['familiar'];
					$this -> Rel_familiar_nino_model -> inserta($relacioninfo2);
				}
				$newdata = array(
                   'exito'  => 'El niño se ha registrado con éxito'
               	);
				$this->session->set_userdata($newdata);
				redirect("home/exito");
			}
		} else {
			show_404();
		}
	}

	function director($error = null, $id = null) {
		if (isset($id) && $id != "" && $this -> session -> userdata('rol') && ($this -> session -> userdata('rol') == '5' || $this -> session -> userdata('rol') == '1')) {
			$datos = array('titulo' => 'Eyekinder | Registro de Director', 'subtitulo' => 'Eyekinder | Registro de Director', 'action' => 'registro/controller_director', 'idAsoc' => $id);
			$datos['error'] = $error;
			$idUser = $this -> session -> userdata('id');
			$this -> load -> model('Usuarios_model');
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($idUser);
			if (!$listaUser) {
				show_404();
			}
			$result = array_merge((array)$datos, (array)$listaUser[0]);
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/formularios/nuevo_usuario');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('formularios/nuevo_usuario');
					$this -> load -> view('plantilla/footer');
			}
		} else {
			show_404();
		}
	}

	public function controller_director() {
		if ($this -> input -> post('form')) {
			$this -> load -> library("form_validation");
			$this -> load -> library("libupload");
			$this -> form_validation -> set_rules("nombre", "Nombre", "trim|required|min_length[2]");
			$this -> form_validation -> set_rules("apellidos", "Apellidos", "trim|required|min_length[2]");
			$this -> form_validation -> set_rules('pass1', 'Contraseña', 'trim|required|min_length[6]');
			$this -> form_validation -> set_rules('pass2', 'Confirmar Contraseña', 'trim|required|matches[pass1]|min_length[6]');
			$this -> form_validation -> set_rules('email', 'Email', 'trim|required|valid_email');
			$this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$this -> form_validation -> set_message("matches", "El campo %s debe ser igual al campo %s.");
			$this -> form_validation -> set_message("min_length", "El campo %s debe tener un mínimo de %s caracteres.");
			$this -> form_validation -> set_message("valid_email", "El formato del email no es el correcto (ejemplo@mail.com)");
			// realizamos un for para multi upload con nuestra libreria
			$imagen = "";
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
			};
			//Recogemos las variables
			$usuarioinfo = array();
			$usuarioinfo['nombre'] = $_POST['nombre'];
			$usuarioinfo['apellidos'] = $_POST['apellidos'];
			$usuarioinfo['pass'] = $_POST['pass1'];
			$usuarioinfo['email'] = $_POST['email'];
			$usuarioinfo['fechanacimiento'] = $_POST['fechanac'];
			$usuarioinfo['imagen'] = $imagen;
			$usuarioinfo['sexo'] = $_POST['sexo'];
			$usuarioinfo['rol'] = "4";
			$this -> load -> model("Usuarios_model");

			if ($this -> form_validation -> run() == FALSE || $this -> Usuarios_model -> existe_email($usuarioinfo['email'])) {
				$errorinfo = $usuarioinfo;
				if($this -> Usuarios_model -> existe_email($usuarioinfo['email'])){
					$errorinfo['erroremail'] = "El email que está insertando ya está registrado en la web";
				}
				$this -> director($errorinfo, $_POST['idAsoc']);
			} else {
				$idUser = $this -> Usuarios_model -> inserta_usuario($usuarioinfo);
				$this -> load -> model("Guarderias_model");
				$listaGuarderia = $this -> Guarderias_model -> dame_guarderia_id($_POST['idAsoc']);
				$guarderiainfo = $listaGuarderia[0];
				$guarderiainfo['director'] = $idUser;
				$id = $this -> Guarderias_model -> actualiza($guarderiainfo);
				$newdata = array(
                   'exito'  => 'La guardería y su correspondiente director se han registrado con éxito'
               	);
				$this->session->set_userdata($newdata);
				redirect("home/exito");
			}
		} else {
			show_404();
		}
	}

	function gerente($error = null, $id = null) {
		if (isset($id) && $id != "" && $this -> session -> userdata('rol') && $this -> session -> userdata('rol') == '1') {
			$datos = array('titulo' => 'Eyekinder | Registro de Gerente', 'subtitulo' => 'Eyekinder | Registro de Gerente', 'action' => 'registro/controller_gerente', 'idAsoc' => $id);
			$datos['error'] = $error;
			$idUser = $this -> session -> userdata('id');
			$this -> load -> model('Usuarios_model');
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($idUser);
			if (!$listaUser) {
				show_404();
			}
			$result = array_merge((array)$datos, (array)$listaUser[0]);
			
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/formularios/nuevo_usuario');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('formularios/nuevo_usuario');
					$this -> load -> view('plantilla/footer');
			}
		} else {
			show_404();
		}
	}

	public function controller_gerente() {
		if ($this -> input -> post('form')) {
			$this -> load -> library("form_validation");
			$this -> load -> library("libupload");
			$this -> form_validation -> set_rules("nombre", "Nombre", "trim|required|min_length[2]");
			$this -> form_validation -> set_rules("apellidos", "Apellidos", "trim|required|min_length[2]");
			$this -> form_validation -> set_rules('pass1', 'Contraseña', 'trim|required|min_length[6]');
			$this -> form_validation -> set_rules('pass2', 'Confirmar Contraseña', 'trim|required|matches[pass1]|min_length[6]');
			$this -> form_validation -> set_rules('email', 'Email', 'trim|required|valid_email');
			$this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$this -> form_validation -> set_message("matches", "El campo %s debe ser igual al campo %s.");
			$this -> form_validation -> set_message("min_length", "El campo %s debe tener un mínimo de %s caracteres.");
			$this -> form_validation -> set_message("valid_email", "El formato del email no es el correcto (ejemplo@mail.com)");
			// realizamos un for para multi upload con nuestra libreria
			$imagen = "";
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
			};
			//Recogemos las variables
			$usuarioinfo = array();
			$usuarioinfo['nombre'] = $_POST['nombre'];
			$usuarioinfo['apellidos'] = $_POST['apellidos'];
			$usuarioinfo['pass'] = $_POST['pass1'];
			$usuarioinfo['email'] = $_POST['email'];
			$usuarioinfo['fechanacimiento'] = $_POST['fechanac'];
			$usuarioinfo['imagen'] = $imagen;
			$usuarioinfo['sexo'] = $_POST['sexo'];
			$usuarioinfo['rol'] = "5";
			$this -> load -> model("Usuarios_model");

			if ($this -> form_validation -> run() == FALSE || $this -> Usuarios_model -> existe_email($usuarioinfo['email'])) {
				$errorinfo = $usuarioinfo;
				if($this -> Usuarios_model -> existe_email($usuarioinfo['email'])){
					$errorinfo['erroremail'] = "El email que está insertando ya está registrado en la web";
				}
				$this -> gerente($errorinfo, $_POST['idAsoc']);
			} else {
				$idUser = $this -> Usuarios_model -> inserta_usuario($usuarioinfo);
				$this -> load -> model("Empresas_model");
				$listaEmpresa = $this -> Empresas_model -> dame_empresa_id($_POST['idAsoc']);
				$empresainfo = $listaEmpresa[0];
				$empresainfo['gerente'] = $idUser;
				$id = $this -> Empresas_model -> actualiza($empresainfo);
				$newdata = array(
                   'exito'  => 'La empresa y su correspondiente gerente se han registrado con éxito'
               	);
				$this->session->set_userdata($newdata);
				redirect("home/exito");
			}
		} else {
			show_404();
		}
	}

	function guarderia($error = null) {
		if ($this -> session -> userdata('rol') && ($this -> session -> userdata('rol') == '5' || $this -> session -> userdata('rol') == '1')) {
			$datos = array('titulo' => 'Eyekinder | Registro de Guarderia', 'subtitulo' => 'Eyekinder | Registro de Guarderia', 'action' => 'registro/controller_guarderia');
			$datos['error'] = $error;
			$this -> load -> model("Provincias_model");
			$listaProvincias = $this -> Provincias_model -> dame_todo();
			$opciones = array();
			foreach ($listaProvincias as $provincias) {
				$idp = $provincias['id_provincia'];
				$desc = $provincias['provincia'];
				$opciones[$idp] = $desc;
			}
			$datos['opciones'] = $opciones;
			$this -> load -> model("Empresas_model");
			if ($this -> session -> userdata('rol') == '1') {
				$listaEmpresas = $this -> Empresas_model -> dame_select_empresa();
				$opciones2 = array();
				$opciones2['0'] = "No asignar ninguna empresa";
				foreach ($listaEmpresas as $empresas) {
					$ide = $empresas['id'];
					$desce = $empresas['nombre'];
					$opciones2[$ide] = $desce;
				}
				$datos['opciones2'] = $opciones2;
			} else {
				$this -> load -> model("Empresas_model");
				$listaEmp = $this -> Empresas_model -> dame_empresa_idgerente($this -> session -> userdata('id'));
				$idemp = $listaEmp[0]['id'];
				$datos['idEmpresa'] = $idemp;
			}

			$id = $this -> session -> userdata('id');
			$this -> load -> model('Usuarios_model');
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($id);
			if (!$listaUser) {
				show_404();
			}
			$result = array_merge((array)$datos, (array)$listaUser[0]);
			
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $result);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/formularios/nueva_guarderia');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $result);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('formularios/nueva_guarderia');
					$this -> load -> view('plantilla/footer');
			}
		} else {
			show_404();
		}
	}

	public function controller_guarderia() {
		if ($this -> input -> post('form')) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules("nombre", "Nombre", "trim|required|min_length[2]");
			$this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$this -> form_validation -> set_message("matches", "El campo %s debe ser igual al campo %s.");
			$this -> form_validation -> set_message("min_length", "El campo %s debe tener un mínimo de %s caracteres.");
			$this -> form_validation -> set_message("valid_email", "El formato del email no es el correcto (ejemplo@mail.com)");

			$guarderiainfo = array();
			$guarderiainfo['nombre'] = $_POST['nombre'];
			$guarderiainfo['url'] = str_replace(' ', '', $_POST['nombre']);
			$guarderiainfo['contacto'] = $_POST['contacto'];
			$guarderiainfo['provincia'] = $_POST['provincia'];
			$relacioninfo = array();
			$relacioninfo['idempresa'] = $_POST['empresa'];

			if ($this -> form_validation -> run() == FALSE) {
				$errorinfo = $guarderiainfo;
				$errorinfo['empresa'] = $_POST['empresa'];
				$this -> guarderia($errorinfo);
			} else {

				$this -> load -> model("Guarderias_model");
				$id = $this -> Guarderias_model -> inserta($guarderiainfo);
				$disenoinfo = array();
				$disenoinfo['idguarderia'] = $id;
				$this -> load -> model("Diseno_model");
				$this -> Diseno_model -> inserta($disenoinfo);

				$relacioninfo['idguarderia'] = $id;
				if (isset($relacioninfo['idempresa']) && $relacioninfo['idempresa'] != "" && $relacioninfo['idempresa'] != 0) {
					$this -> Guarderias_model -> inserta_relacion($relacioninfo);
				}
				$this -> director(null, $id);
			}
		} else {
			show_404();
		}
	}

	function empresa($error = null) {

		if ($this -> session -> userdata('rol') && $this -> session -> userdata('rol') == '1') {
			$datos = array('titulo' => 'Eyekinder | Registro de Empresa', 'subtitulo' => 'Eyekinder | Registro de Empresa', 'action' => 'registro/controller_empresa');
			$datos['error'] = $error;
			$this -> load -> model("Provincias_model");
			$listaProvincias = $this -> Provincias_model -> dame_todo();
			$opciones = array();
			foreach ($listaProvincias as $provincias) {
				$idp = $provincias['id_provincia'];
				$desc = $provincias['provincia'];
				$opciones[$idp] = $desc;
			}
			$datos['opciones'] = $opciones;
			$id = $this -> session -> userdata('id');
			$this -> load -> model('Usuarios_model');
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($id);
			if (!$listaUser) {
				show_404();
			}
			$result = array_merge((array)$datos, (array)$listaUser[0]);
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $result);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/formularios/nueva_empresa');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $result);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('formularios/nueva_empresa');
					$this -> load -> view('plantilla/footer');
			}
		} else {
			show_404();
		}
	}

	public function controller_empresa() {
		if ($this -> input -> post('form')) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules("nombre", "Nombre", "trim|required|min_length[2]");
			$this -> form_validation -> set_rules("razonsocial", "Razon social", "trim|required|min_length[2]");
			$this -> form_validation -> set_rules("contacto", "Contacto", "trim|required|min_length[4]");
			$this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$this -> form_validation -> set_message("matches", "El campo %s debe ser igual al campo %s.");
			$this -> form_validation -> set_message("min_length", "El campo %s debe tener un mínimo de %s caracteres.");
			$this -> form_validation -> set_message("valid_email", "El formato del email no es el correcto (ejemplo@mail.com)");

			$empresainfo = array();
			$empresainfo['nombre'] = $_POST['nombre'];
			$empresainfo['contacto'] = $_POST['contacto'];
			$empresainfo['razonsocial'] = $_POST['razonsocial'];
			$empresainfo['cif'] = $_POST['cif'];
			$empresainfo['provincia'] = $_POST['provincia'];

			if ($this -> form_validation -> run() == FALSE) {
				$this -> empresa($empresainfo);
			} else {
				$this -> load -> model("Empresas_model");
				$id = $this -> Empresas_model -> inserta($empresainfo);
				$this -> gerente(null, $id);
			}
		} else {
			show_404();
		}
	}

	function clase($error = null) {

		if ($this -> session -> userdata('rol') && $this -> session -> userdata('rol') == '4') {
			$datos = array('titulo' => 'Eyekinder | Registro de Clases', 'subtitulo' => 'Eyekinder | Registro de Clases', 'action' => 'registro/controller_clase');
			$datos['error'] = $error;
			$this -> load -> model("Guarderias_model");
			$listaGuardes = $this -> Guarderias_model -> dame_guarderia_iddirector($this -> session -> userdata('id'));
			$idGuarde = $listaGuardes[0]['id'];
			$datos['idGuarderia'] = $idGuarde;
			$id = $this -> session -> userdata('id');
			$this -> load -> model('Usuarios_model');
			$listaUser = $this -> Usuarios_model -> dame_tutor_guarderia($idGuarde);
			$listaTutor = array();
			$opciones = array();
			foreach ($listaUser as $user) {
				if ($this -> Usuarios_model -> es_tutor_libre($user['id'])) {

					$listaTutor[] = $user;
				}
			}
			foreach ($listaTutor as $tutor) {
				$idp = $tutor['id'];
				$desc = $tutor['nombre'] . " " . $tutor['apellidos'];
				$opciones[$idp] = $desc;
			}
			$datos['opciones'] = $opciones;
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($id);
			if (!$listaUser) {
				show_404();
			}
			$result = array_merge((array)$datos, (array)$listaUser[0]);
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $result);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/formularios/nueva_clase');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $result);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('formularios/nueva_clase');
					$this -> load -> view('plantilla/footer');
			}
		} else {
			show_404();
		}
	}

	public function controller_clase() {
		if ($this -> input -> post('form')) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules("tutor", "Tutor", "required");
			$this -> form_validation -> set_rules("nombre", "Nombre", "trim|required|min_length[2]");
			$this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$this -> form_validation -> set_message("matches", "El campo %s debe ser igual al campo %s.");
			$this -> form_validation -> set_message("min_length", "El campo %s debe tener un mínimo de %s caracteres.");

			$claseinfo = array();
			$claseinfo['nombre'] = $_POST['nombre'];
			$claseinfo['descripcion'] = $_POST['descripcion'];
			$claseinfo['guarderia'] = $_POST['guarderia'];

			if ($this -> form_validation -> run() == FALSE) {
				$claseinfo['tutor'] = $_POST['tutor'];
				$this -> clase($claseinfo);
			} else {
				$this -> load -> model("Clases_model");
				$id = $this -> Clases_model -> inserta($claseinfo);
				$this -> load -> model("Rel_guarderia_clase_model");
				$relacion1=array();
				$relacion1['idguarderia'] = $claseinfo['guarderia'];
				$relacion1['idclase'] = $id;
				$this -> Rel_guarderia_clase_model -> inserta($relacion1);
				$this -> load -> model("Rel_clase_tutor_model");
				$relacion2=array();
				$relacion2['idtutor'] = $_POST['tutor'];
				$relacion2['idclase'] = $id;
				$this -> Rel_clase_tutor_model -> inserta($relacion2);
				$newdata = array(
                   'exito'  => 'La clase se ha registrado con éxito'
               	);
				$this->session->set_userdata($newdata);
				redirect("home/exito");
			}
		} else {
			show_404();
		}
	}

	function configura_clase($error = null) {

		if ($this -> session -> userdata('rol') && $this -> session -> userdata('rol') == '4') {
			$datos = array('titulo' => 'Eyekinder | Registro de Clases', 'subtitulo' => 'Eyekinder | Registro de Clases', 'action' => 'registro/controller_configura_clase');
			$datos['error'] = $error;
			$this -> load -> model("Guarderias_model");
			$listaGuardes = $this -> Guarderias_model -> dame_guarderia_iddirector($this -> session -> userdata('id'));
			$idGuarde = $listaGuardes[0]['id'];
			$datos['idGuarderia'] = $idGuarde;
			$id = $this -> session -> userdata('id');
			// $this -> load -> model('Usuarios_model');
			// $listaUser = $this -> Usuarios_model -> dame_tutor_guarderia($idGuarde);
			// $listaTutor = array();
			// $opciones = array();
			// foreach ($listaUser as $user) {
				// if ($this -> Usuarios_model -> es_tutor_libre($user['id'])) {
// 
					// $listaTutor[] = $user;
				// }
			// }
			// foreach ($listaTutor as $tutor) {
				// $idp = $tutor['id'];
				// $desc = $tutor['nombre'] . " " . $tutor['apellidos'];
				// $opciones[$idp] = $desc;
			// }
			// $datos['opciones'] = $opciones;
			$this -> load -> model('Clases_model');
			$listaClase = $this -> Clases_model -> dame_clase_guarderia($idGuarde);
			$listaClaseSelect = array();
			$opciones2 = array();
			// foreach ($listaClase as $clase) {
				// if ($this -> Clases_model -> es_clase_libre($clase['id'])) {
// 
					// $listaClaseSelect[] = $clase;
				// }
			// }
			foreach ($listaClase as $clase) {
				$idp = $clase['id'];
				$desc = $clase['nombre'];
				$opciones2[$idp] = $desc;
			}
			$datos['opciones2'] = $opciones2;
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/formularios/configura_clase');
					$this -> load -> view('movil/plantilla/footer');
			}else{
						$this -> load -> view('plantilla/head', $datos);
						$this -> load -> view('plantilla/bodyheadermenu');
						$this -> load -> view('formularios/configura_clase');
						$this -> load -> view('plantilla/footer');
			}
		} else {
			show_404();
		}
	}

	public function controller_configura_clase() {
		if ($this -> input -> post('form')) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules("clase", "Clase", "required");
			$this -> form_validation -> set_rules("nino", "Niños", "required");
			$this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$this -> form_validation -> set_message("matches", "El campo %s debe ser igual al campo %s.");
			$this -> form_validation -> set_message("min_length", "El campo %s debe tener un mínimo de %s caracteres.");

			$claseinfo = array();
			// $claseinfo['tutor'] = $_POST['tutor'];
			$claseinfo['clase'] = $_POST['clase'];
			if(isset($_POST['nino'])){
			$claseinfo['nino'] = $_POST['nino'];
			}
			$claseinfo['guarderia'] = $_POST['guarderia'];

			if ($this -> form_validation -> run() == FALSE) {
				$this -> configura_clase($claseinfo);
			} else {
				// $this -> load -> model("Rel_guarderia_clase_model");
				// $relacion1=array();
				// $relacion1['idguarderia'] = $claseinfo['guarderia'];
				// $relacion1['idclase'] = $claseinfo['clase'];
				// $id = $this -> Rel_guarderia_clase_model -> inserta($relacion1);
				// $this -> load -> model("Rel_clase_tutor_model");
				// $relacion2=array();
				// $relacion2['idtutor'] = $claseinfo['tutor'];
				// $relacion2['idclase'] = $claseinfo['clase'];
				// $id = $this -> Rel_clase_tutor_model -> inserta($relacion2);
				$this -> load -> model("Usuarios_model");
				$this -> load -> model("Rel_clase_nino_model");
				$this -> load -> model("Notificaciones_model");
				$relacion3=array();
				$relacion3['idclase'] = $claseinfo['clase'];
				foreach($claseinfo['nino']  as $nino){
					
					$relacion3['idnino'] = $nino;
					$id = $this ->Rel_clase_nino_model -> inserta($relacion3);
					$listaFamiliares = $this->Usuarios_model->dame_familiares_idnino($nino);
					foreach ($listaFamiliares as $key => $value) {
						$notificaciones = array();
						$notificaciones['destino_id']=$value['id'];
						$notificaciones['autor_id']=$this -> session -> userdata('id');
						$notificaciones['objetivo_id']=$nino;
						$notificaciones['tipo'] = "4";
						$notificaciones['fecha'] = date("Y-m-d H:i:s");
						$idNoti = $this -> Notificaciones_model -> inserta($notificaciones);
						$permisoemail = true;
						if($permisoemail){
							$listato = reset($this->Usuarios_model->dame_usuario_id($value['id']));
							$from = "admin@eyekinder.com";
							$to=$listato['email'];
							$asunto='EyeKinder - El tutor ha acetado el registro de su niño';
							$mensaje= "";
							$enlace= "";
							$mensaje = "El tutor ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos')." aceptado la petición de registro de su hijo. Para ver el nuevo perfil creado haz click en ele enlace";
							$enlace = base_url().'usuario/perfilnino/'.$nino;
							$this -> comunes -> enviarEmail($from, $to, $asunto, $mensaje, $enlace);
						}
					}
				}
				$newdata = array(
                   'exito'  => 'La configuración de la clase se ha realizado con éxito'
               	);
				$this->session->set_userdata($newdata);
				redirect("home/exito");
			}
		} else {
			show_404();
		}
	}
public function personalizar() {
		if ($this -> session -> userdata('rol') == '4') {
			$datos = array('titulo' => 'Eyekinder | Personalizar web', 'action' => 'registro/controller_personalizar');

			$id = $this -> session -> userdata('id');
			$this -> load -> model('Diseno_model');
			$listaUser = $this -> Diseno_model -> dame_diseno_idguarderia($this -> session -> userdata('guarderia'));
			if (!$listaUser) {
				show_404();
			}
			$datos['error'] = $listaUser['0'];
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/formularios/personalizar');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('formularios/personalizar');
					$this -> load -> view('plantilla/footer');
			}
		} else {
			redirect(base_url());

		}
	}

	public function controller_personalizar() {
		if ($this -> input -> post('form')) {
			$this -> load -> library("form_validation");
			$this -> load -> library("libupload");
			// realizamos un for para multi upload con nuestra libreria
			$idguarderia = $_POST['idGuarderia'];
			$logo = "";
			if ($this -> input -> post('logoactual')) {
				$logo = $this -> input -> post('logoactual');
			}
			for ($i = 0; $i < count($_FILES); $i++) {
				//no le hacemos caso a los vacios
				if (!empty($_FILES['imagen' . $i]['name'])) {
					mkdir(base_url()."images/diseno/2", 0700);
					die("hola");
					$respuesta[] = $this -> libupload -> doUpload($i, $_FILES['imagen' . $i], 'images/diseno/'.$idguarderia.'', 'jpg|png|jpeg|gif', 9999, 9999, 0);

					// foreach ($respuesta as $key => $value) {
						// foreach ($value as $key2 => $value2) {
							// $thumb = $this -> libupload -> doThumb($value2['file_name'], 'images/subidas', 200, 200);
							// // print_r($value);
							// $imagen = $value2['file_name'];
						// }
					// }
				}
			}
			print_r($respuesta[0]);
			die("hola");
			
			//Recogemos las variables
			$this -> load -> model("Diseno_model");
			$listaUsuarios = array();
			$listaDiseno = $this -> Diseno_model -> dame_diseno_idguarderia($idguarderia);
			$disenoinfo = $listaDiseno[0];
			$disenoinfo['idguarderia'] = $idguarderia;
			$disenoinfo['idguarderia'] = $idguarderia;
			$disenoinfo['idguarderia'] = $idguarderia;
			$disenoinfo['idguarderia'] = $idguarderia;
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

public function invitacion() {
		$this -> form_validation -> set_rules("email", "Email", "required");
		if ($this -> form_validation -> run() == FALSE) {
			$this -> index(). '#form-olvido';
		} else {
				$datos = array();
				$datos['token']=md5(uniqid(rand(), true));
				$datos['rol']= "2";
				$from='admin@eyekinder.com';
				$to=$_REQUEST['email'];
				$asunto='EyeKinder - Registro nuevo usuario';
				$mensaje= "";
				$enlace= "";
				$mensaje = "Has recibido una invitación para registrarte en Eyekinder un portal donde podás llevar el control diario de la actividad de los niños en la guardería. 
										Para acceder al registro solo tiene que hacer click en el enlace siguiente";
				$enlace = base_url() . 'registro/nuevo_invitado/'.$datos['token'].'/'.$this -> session -> userdata('guarderia');
				$this -> load -> model("Usuarios_model");
				$this->Usuarios_model->inserta_usuario2($datos);
				$this -> comunes -> enviarEmail($from, $to, $asunto, $mensaje, $enlace);
		}
	}

	public function enviar_invitacion($error = null) {
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
					$this -> load -> view('movil/formularios/enviar_invitacion');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('formularios/enviar_invitacion');
					$this -> load -> view('plantilla/footer');
			}
		} else {
			redirect(base_url());

		}
	}
public function diario($clase = null) {
		if ($this -> session -> userdata('rol') == '3') {
			$datos = array('titulo' => 'Eyekinder | Personalizar web', 'action' => 'registro/controller_diario');

			
			$this -> load -> model('Ninos_model');
			$datos['claseuri'] = $clase;
			$opciones = array();
			$opciones1 = array();
			$opciones2 = array();
			$opciones3 = array();
			$opciones4 = array();
			$listaClase = $this -> Ninos_model -> dame_ninos_idclase($clase);
			foreach ($listaClase as $key => $clase) {
				$idp = $clase['id'];
				$desc = $clase['nombre']." ".$clase['apellidos'];
				$opciones[$key]['id'] = $idp;
				$opciones[$key]['desc'] = $desc;
				$opciones[$key]['tipo'] = $clase['tipo'];
				if ($clase['tipo'] == "1"){
					$opciones1[$key]['id'] = $idp;
					$opciones1[$key]['desc'] = $desc;
					$opciones1[$key]['tipo'] = $clase['tipo'];
				}else if ($clase['tipo'] == "2"){
					$opciones2[$key]['id'] = $idp;
					$opciones2[$key]['desc'] = $desc;
					$opciones2[$key]['tipo'] = $clase['tipo'];
				
				}else if ($clase['tipo'] == "3"){
					$opciones3[$key]['id'] = $idp;
					$opciones3[$key]['desc'] = $desc;
					$opciones3[$key]['tipo'] = $clase['tipo'];
					
				}else if ($clase['tipo'] == "4"){
					$opciones4[$key]['id'] = $idp;
					$opciones4[$key]['desc'] = $desc;
					$opciones4[$key]['tipo'] = $clase['tipo'];
					
				}
			}
			$datos['opcionesninos'] = $opciones;
			$datos['opcionesninos1'] = $opciones1;
			$datos['opcionesninos2'] = $opciones2;
			$datos['opcionesninos3'] = $opciones3;
			$datos['opcionesninos4'] = $opciones4;
			
			$this -> load -> model('Formularios_model');
			$formbd = $this->Formularios_model->dame_form_clase($datos['claseuri']);
			if(isset($formbd) && !empty($formbd) ){
				foreach ($formbd as $key => $value) {
					if($value['valoracion'] == "1"){
						$formbd[$key]['valoracionstyle'] = '';
						$formbd[$key]['valoracionselect'] = 'selected="selected"';
					}else{
						$formbd[$key]['valoracionstyle'] = 'style="display:none;"';
						$formbd[$key]['valoracionselect'] = '';
					}
					if($value['alimentacion'] == "1"){
						$formbd[$key]['alimentacionstyle'] = '';
						$formbd[$key]['alimentacionselect'] = 'selected="selected"';
					}else{
						$formbd[$key]['alimentacionstyle'] = 'style="display:none;"';
						$formbd[$key]['alimentacionselect'] = '';
					}
					if($value['salud'] == "1"){
						$formbd[$key]['saludstyle'] = '';
						$formbd[$key]['saludselect'] = 'selected="selected"';
					}else{
						$formbd[$key]['saludstyle'] = 'style="display:none;"';
						$formbd[$key]['saludselect'] = '';
					}
					if($value['descanso'] == "1"){
						$formbd[$key]['descansostyle'] = '';
						$formbd[$key]['descansoselect'] = 'selected="selected"';
					}else{
						$formbd[$key]['descansostyle'] = 'style="display:none;"';
						$formbd[$key]['descansoselect'] = '';
					}
					if($value['pipi'] == "1"){
						$formbd[$key]['pipistyle'] = '';
						$formbd[$key]['pipiselect'] = 'selected="selected"';
					}else{
						$formbd[$key]['pipistyle'] = 'style="display:none;"';
						$formbd[$key]['pipiselect'] = '';
					}
					if($value['caca'] == "1"){
						$formbd[$key]['cacastyle'] = '';
						$formbd[$key]['cacaselect'] = 'selected="selected"';
					}else{
						$formbd[$key]['cacastyle'] = 'style="display:none;"';
						$formbd[$key]['cacaselect'] = '';
					}
					if($value['panales'] == "1"){
						$formbd[$key]['panalesstyle'] = '';
						$formbd[$key]['panalesselect'] = 'selected="selected"';
					}else{
						$formbd[$key]['panalesstyle'] = 'style="display:none;"';
						$formbd[$key]['panalesselect'] = '';
					}
					if($value['relaciones'] == "1"){
						$formbd[$key]['relacionesstyle'] = '';
						$formbd[$key]['relacionesselect'] = 'selected="selected"';
					}else{
						$formbd[$key]['relacionesstyle'] = 'style="display:none;"';
						$formbd[$key]['relacionesselect'] = '';
					}
					if($value['actitud'] == "1"){
						$formbd[$key]['actitudstyle'] = '';
						$formbd[$key]['actitudselect'] = 'selected="selected"';
					}else{
						$formbd[$key]['actitudstyle'] = 'style="display:none;"';
						$formbd[$key]['actitudselect'] = '';
					}
					if($value['ludico'] == "1"){
						$formbd[$key]['ludicostyle'] = '';
						$formbd[$key]['ludicoselect'] = 'selected="selected"';
					}else{
						$formbd[$key]['ludicostyle'] = 'style="display:none;"';
						$formbd[$key]['ludicoselect'] = '';
					}
					if($value['lectivo'] == "1"){
						$formbd[$key]['lectivostyle'] = '';
						$formbd[$key]['lectivoselect'] = 'selected="selected"';
					}else{
						$formbd[$key]['lectivostyle'] = 'style="display:none;"';
						$formbd[$key]['lectivoselect'] = '';
					}
					if($value['informacion'] == "1"){
						$formbd[$key]['informacionstyle'] = '';
						$formbd[$key]['informacionselect'] = 'selected="selected"';
					}else{
						$formbd[$key]['informacionstyle'] = 'style="display:none;"';
						$formbd[$key]['valoracionselect'] = '';
					}
				}
			}else{
				$key = "0";
				$formbd=array();
				$formbd[$key]['valoracionstyle'] = '';
				$formbd[$key]['valoracion'] = '1';
				$formbd[$key]['valoracionselect'] = 'selected="selected"';
				$formbd[$key]['saludstyle'] = '';
				$formbd[$key]['salud'] = '1';
				$formbd[$key]['saludselect'] = 'selected="selected"';
				$formbd[$key]['actitudstyle'] = '';
				$formbd[$key]['actitud'] = '1';
				$formbd[$key]['actidudselect'] = 'selected="selected"';
				$formbd[$key]['pipistyle'] = '';
				$formbd[$key]['pipi'] = '1';
				$formbd[$key]['pipiselect'] = 'selected="selected"';
				$formbd[$key]['cacastyle'] = '';
				$formbd[$key]['caca'] = '1';
				$formbd[$key]['cacaselect'] = 'selected="selected"';
				$formbd[$key]['panalesstyle'] = '';
				$formbd[$key]['panales'] = '1';
				$formbd[$key]['panalesselect'] = 'selected="selected"';
				$formbd[$key]['descansostyle'] = '';
				$formbd[$key]['descanso'] = '1';
				$formbd[$key]['descansoselect'] = 'selected="selected"';
				$formbd[$key]['alimentacionstyle'] = '';
				$formbd[$key]['alimentacion'] = '1';
				$formbd[$key]['alimentacionselect'] = 'selected="selected"';
				$formbd[$key]['ludicostyle'] = '';
				$formbd[$key]['ludico'] = '1';
				$formbd[$key]['ludicoselect'] = 'selected="selected"';
				$formbd[$key]['lectivostyle'] = '';
				$formbd[$key]['lectivo'] = '1';
				$formbd[$key]['lectivoselect'] = 'selected="selected"';
				$formbd[$key]['informacionstyle'] = '';
				$formbd[$key]['informacion'] = '1';
				$formbd[$key]['informacionselect'] = 'selected="selected"';
				$formbd[$key]['relacionesstyle'] = '';
				$formbd[$key]['relaciones'] = '1';
				$formbd[$key]['informacionselect'] = 'selected="selected"';
			}
			
			$datos['formulario'] = $formbd[0];
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/formularios/diario');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('formularios/diario');
					$this -> load -> view('plantilla/footer');
			}
		} else {
			redirect(base_url());

		}
	}

	public function controller_diario() {
		$tipo = $_POST['tipo'];
		if ($tipo) {
			$this -> load -> library("form_validation");
			// $this -> form_validation -> set_rules("informacion", "Informacion", "trim|required");
			// $this -> form_validation -> set_message("required", "El campo %s es obligatorio");
			$day = date("d");
			$mon = date("m");
			$year = date("Y");
			$agenda = array();
			$formulario = array();
			$formulario['idclase'] = $_POST['clase'];
			$formulario['pipi'] = "0";
			$formulario['caca'] = "0";
			$formulario['panales'] = "0";
			$formulario['actitud'] = "0";
			$formulario['alimentacion'] = "0";
			$formulario['lectivo'] = "0";
			$formulario['ludico'] = "0";
			$formulario['salud'] = "0";
			$formulario['relaciones'] = "0";
			$formulario['descanso'] = "0";
			$formulario['informacion'] = "0";
			$formulario['valoracion'] = "0";
			$error = array();
			$agenda['tipo'] = $tipo;
			if (isset($_POST['valoracion2']) && $_POST['valoracion2'] == "1" && isset($_POST['valoracion'])) {
				$agenda['valoracion'] = $_POST['valoracion'];
				$formulario['valoracion'] = "1";
			}
			$agenda['publicadopor'] = $this -> session -> userdata('id');
			$agenda['fecha'] = "$year-$mon-$day";
			if(strlen($day) == "1" && $day < 10){
				$day = "0$day";
			}
			
			if(isset($_POST['pipi2']) && $_POST['pipi2'] == "1" && isset($_POST['pipi'])) { $agenda['pipi'] = $_POST['pipi']; $formulario['pipi'] = "1";}
			if(isset($_POST['caca2']) && $_POST['caca2'] == "1" && isset($_POST['caca'])){ $agenda['caca'] = $_POST['caca']; $formulario['caca'] = "1";}
			if(isset($_POST['panales2']) && $_POST['panales2'] == "1" && isset($_POST['panales'])){ $agenda['panales'] = $_POST['panales']; $formulario['panales'] = "1";}
			if(isset($_POST['actitud2']) && $_POST['actitud2'] == "1" && isset($_POST['actitud'])){ $agenda['actitud'] = $_POST['actitud']; $formulario['actitud'] = "1";}
			if(isset($_POST['alimentacion2']) && $_POST['alimentacion2'] == "1" && isset($_POST['alimentacion'])){ $agenda['alimentacion'] = $_POST['alimentacion']; $formulario['alimentacion'] = "1";}
			if(isset($_POST['lectivo2']) && $_POST['lectivo2'] == "1" && isset($_POST['lectivo'])){ $agenda['lectivo'] = $_POST['lectivo']; $formulario['lectivo'] = "1";}
			if(isset($_POST['ludico2']) && $_POST['ludico2'] == "1" && isset($_POST['ludico'])){ $agenda['ludico'] = $_POST['ludico']; $formulario['ludico'] = "1";}
			if(isset($_POST['salud2']) && $_POST['salud2'] == "1" && isset($_POST['salud'])){ $agenda['salud'] = $_POST['salud']; $formulario['salud'] = "1";}
			if(isset($_POST['relaciones2']) && $_POST['relaciones2'] == "1" && isset($_POST['relaciones'])){ $agenda['relaciones'] = $_POST['relaciones']; $formulario['relaciones'] = "1";}
			if(isset($_POST['descanso2']) && $_POST['descanso2'] == "1" && isset($_POST['descanso'])){ $agenda['descanso'] = $_POST['descanso']; $formulario['descanso'] = "1";}
			if(isset($_POST['informacion2']) && $_POST['informacion2'] == "1" && isset($_POST['informacion'])){ $agenda['informacion'] = $_POST['informacion']; $formulario['informacion'] = "1";}
			
			
			if (/*$this -> form_validation -> run() == FALSE || */!isset($_POST['valoracion'])) {
				if (!isset($_POST['valoracion'])) {
					$newdata = array('errorvalidacion' => 'Debe valorar de 1 a 5 estrellas el resumen del día');
					$this -> session -> set_userdata($newdata);
				}
				
				$this -> session -> set_userdata($agenda);
				redirect(base_url());
			} else {
				$listaNinos = array();
				$listaClase2 = array();
				$listaNinos = explode(",", $_POST['ninos2']);
				$this -> load -> model("Agenda_model");
				$this -> load -> model("Usuarios_model");
				$this -> load -> model("Notificaciones_model");
				$this -> load -> model("Formularios_model");
				foreach ($listaNinos as $value2) {
					$listaClase2 = $this -> Agenda_model -> dame_info_dia($year, $mon, $day, $value2);
					$actualizar = false;
					unset($agenda['id']);
					if(isset($listaClase2) && !empty($listaClase2) ){
						$actualizar = true;
						$agenda['id'] = $listaClase2[0]['id'];
						if(isset($listaClase2[0]['informacion']) && $listaClase2[0]['informacion'] != ""){
							$agenda['informacion']. ". ". $listaClase2[0]['informacion'];
						}
					}
					$agenda['nino'] = $value2;
					$tiponoti = "";
					if($actualizar){
						$this -> Agenda_model -> update($agenda);
						$tiponoti = "2";
					}else{
						$idUser = $this -> Agenda_model -> inserta($agenda);
						$tiponoti = "1";
					}
					$listaFamiliares = $this -> Usuarios_model -> dame_familiares_idnino($value2);
					foreach ($listaFamiliares as $key => $value) {
						if($this -> session -> userdata('id') != $value['id']){
							$notificaciones = array();
							$notificaciones['destino_id']=$value['id'];
							$notificaciones['autor_id']=$this -> session -> userdata('id');
							$notificaciones['objetivo_id']=$value2;
							$notificaciones['tipo'] = $tiponoti;
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
								if($tiponoti == "2"){
									$asunto='EyeKinder - La información de uno de sus hijos ha sido actualizada';
									$mensaje = "El tutor ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos')." ha modificado la información de su hijo correspondiente al dia $day/$mon/$year";
								}else{
									$asunto='EyeKinder - Nueva información disponible de su hijo';
									$mensaje = "El tutor ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos')." ha insertado nueva información de su hijo correspondiente al dia $day/$mon/$year";
								}
								$enlace = base_url().'comun/pizarra';
								$this -> comunes -> enviarEmail($from, $to, $asunto, $mensaje, $enlace, false);
							}
						}
					}
				}
					$formbd = $this->Formularios_model->dame_form_clase($_POST['clase']);
					$actualizar2 = false;
					if(isset($formbd) && !empty($formbd) ){
						$actualizar2 = true;
					}
					if($actualizar2){
						$id = $this->Formularios_model->update($formulario);	
					}else{
						$id = $this->Formularios_model->inserta($formulario);	
					}
				// $this -> perfilnino($idnino,$year,$mon,$day,$star);
				redirect(base_url());
			}

		} else {
			show_404();
		}
		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
