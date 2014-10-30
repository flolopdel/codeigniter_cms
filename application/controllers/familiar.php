<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Familiar extends CI_Controller {

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
		if ($this -> session -> userdata('rol') == FALSE || $this -> session -> userdata('rol') != '2') {
			redirect(base_url());
		} else {
			$this -> load -> helper('url');
			$this -> load -> model('Usuarios_model');
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($id);

			$datos = array('titulo' => 'Eyerkinder | ' . $nombre, 'rol' => $this -> session -> userdata('rol'));
			$this -> load -> model("Clases_model");
			$listaClases = $this -> Clases_model -> dame_clase_hijo_familiar($this -> session -> userdata('id'));
			foreach ($listaClases as $key => $value) {
				$numeroalumnos = $this -> Clases_model -> dame_numeroalumnos_idclase($value['id']);
				$listatutor = $this -> Clases_model -> dame_tutor_idclase($value['id']);
				$listaClases[$key]['numeroalumnos'] = $numeroalumnos[0]['numero'];
				$listaClases[$key]['nombretutor'] = $listatutor[0]['nombre'] . " " . $listatutor[0]['apellidos'];
				$listaClases[$key]['idtutor'] = $listatutor[0]['id'];
				$imagenurl = "";
				$existeimagen = false;
				$imagenurl = 'images/subidas/' . $listaClases[$key]['imagen'];
				if ($listaClases[$key]['imagen'] != "" && file_exists($imagenurl)) {
					$existeimagen = true;
				}
				if (!$existeimagen) {
					if ($listaClases[$key]['sexo'] == "h") {
						$imagenurl = "images/icofinder/nino.png";
					} else {
						$imagenurl = "images/icofinder/nina.png";
					}
				}
				$listaClases[$key]['imagenurl'] = $imagenurl;

			}
			$datos['clases'] = $listaClases;
			if (!$listaUser) {
				//no he recibido ningún artículo
				//voy a lanzar un error 404 de página no encontrada
				show_404();
			} else {
				
				if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/plantilla/contenidofamiliar');
					$this -> load -> view('movil/plantilla/footer');
				}else{
					$result = array_merge((array)$datos, (array)$listaUser[0]);
					$this -> load -> view('plantilla/head', $result);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('plantilla/contenidofamiliar');
					$this -> load -> view('plantilla/footer');
				}
			}
		}
	}

	public function alumnos() {
		$id = $this -> session -> userdata('id');
		$nombre = $this -> session -> userdata('nombre') . " " . $this -> session -> userdata('apellidos');
		if ($this -> session -> userdata('rol') == FALSE || $this -> session -> userdata('rol') != '2') {
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
				$this -> load -> view('plantilla/contenidoAlumno');
				$this -> load -> view('plantilla/footer');
			}
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
