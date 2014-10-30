<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Director extends CI_Controller {

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
		if ($this -> session -> userdata('rol') == FALSE || $this -> session -> userdata('rol') != '4') {
			redirect(base_url());
		} else {
			$this -> load -> helper('url');

			$datos = array('titulo' => 'Eyerkinder | ' . $nombre, 'rol' => $this -> session -> userdata('rol'));
			$this -> load -> model("Clases_model");
			$listaClases = $this ->Clases_model -> dame_clase_guarderia($this -> session -> userdata('guarderia'));
			foreach ($listaClases as $key => $value) {
				$numeroalumnos = $this ->Clases_model -> dame_numeroalumnos_idclase($value['id']);
				$listatutor = $this ->Clases_model -> dame_tutor_idclase($value['id']);
				$listaClases[$key]['numeroalumnos'] = $numeroalumnos[0]['numero'];
				//fallo al no tener guarderia asignada
				$listaClases[$key]['nombretutor'] = $listatutor[0]['nombre']. " ".$listatutor[0]['apellidos'];
				$listaClases[$key]['idtutor'] = $listatutor[0]['id'];
				
			}
			$datos['clases'] = $listaClases;
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $datos);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/plantilla/contenidoHome');
					$this -> load -> view('movil/plantilla/footer');
				}else{
					$this -> load -> view('plantilla/head', $datos);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('plantilla/contenidoHome');
					$this -> load -> view('plantilla/footer');
				}
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
