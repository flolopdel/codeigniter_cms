<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Agenda extends CI_Controller {

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
		redirect(base_url());
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
			$datos['listanino'] = $listaNino;
			$datos['listafamiliares'] = $listaFamiliares;

			$this -> load -> view('plantilla/head', $datos);
			$this -> load -> view('plantilla/bodyheadermenu');
			$this -> load -> view('plantilla/contenidoclases');
			$this -> load -> view('plantilla/footer');
		}
	}

	public function construccion($id = null) {
		if ($this -> session -> userdata('rol') == FALSE) {
			redirect(base_url());
		} else {

			$datos = array('titulo' => 'Eyerkinder | En desarrollo', 'rol' => $this -> session -> userdata('rol'));

			$this -> load -> view('plantilla/head', $datos);
			$this -> load -> view('plantilla/bodyheadermenu');
			$this -> load -> view('plantilla/construccion');
			$this -> load -> view('plantilla/footer');
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
