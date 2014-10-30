<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Home extends CI_Controller {

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
				$this -> load -> view('plantilla/acciones');
				$this -> load -> view('plantilla/footer');
			}
		}
	}

	public function exito() {
		$id = $this -> session -> userdata('id');
		$nombre = $this -> session -> userdata('nombre') . " " . $this -> session -> userdata('apellidos');
		if ($this -> session -> userdata('rol') == FALSE) {
			redirect(base_url());
		} else {
			$this -> load -> helper('url');
			$this -> load -> model('Usuarios_model');
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($id);

			$datos = array('titulo' => 'Eyerkinder | ' . $nombre);
			if (!$listaUser) {
				//no he recibido ningún artículo
				//voy a lanzar un error 404 de página no encontrada
				show_404();
			} else {

				$result = array_merge((array)$datos, (array)$listaUser[0]);
				
			if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $result);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/formularios/exito');
					$this -> load -> view('movil/plantilla/footer');
			}else{
					$this -> load -> view('plantilla/head', $result);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('formularios/exito');
					$this -> load -> view('plantilla/footer');
				}
			}
		}
	}

	public function exitofancybox() {
		$id = $this -> session -> userdata('id');
		$nombre = $this -> session -> userdata('nombre') . " " . $this -> session -> userdata('apellidos');
		if ($this -> session -> userdata('rol') == FALSE) {
			redirect(base_url());
		} else {
			$this -> load -> helper('url');
			$this -> load -> model('Usuarios_model');
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($id);

			$datos = array('titulo' => 'Eyerkinder | ' . $nombre);
			if (!$listaUser) {
				//no he recibido ningún artículo
				//voy a lanzar un error 404 de página no encontrada
				show_404();
			} else {

				$result = array_merge((array)$datos, (array)$listaUser[0]);
				$this -> load -> view('plantilla/head', $result);
				$this -> load -> view('plantilla/bodyheaderfancybox');
				$this -> load -> view('formularios/exito');
				$this -> load -> view('plantilla/footer');
			}
		}
	}

	public function guarderia($nombre = null) {
		$datos = array();
		$this -> load -> model("Guarderias_model");
		$listaguarderia = $this -> Guarderias_model -> dame_guarderia_url($nombre);
		$this -> load -> model("Diseno_model");
		$listadiseno = $this -> Diseno_model -> dame_diseno_idguarderia("0");
		$datos['diseno'] = $listadiseno['0'];
		if(isset($listaguarderia) && !empty($listaguarderia)){
			$listadiseno = $this -> Diseno_model -> dame_diseno_idguarderia($listaguarderia[0]['id']);
		}
		$datos['disenonuevo'] = $listadiseno['0'];
		$this -> load -> helper('url');
		$datos['titulo'] = 'Eyekinder | Bienvenido';

		$this -> load -> view('plantilla/head', $datos);
		$this -> load -> view('plantilla/bodyheaderprincipal');
		$this -> load -> view('plantilla/footer');

	}
	public function movil() {
		$datos = array();
		// $this -> load -> model("Guarderias_model");
		// $listaguarderia = $this -> Guarderias_model -> dame_guarderia_url($nombre);
		// $this -> load -> model("Diseno_model");
		// $listadiseno = $this -> Diseno_model -> dame_diseno_idguarderia("0");
		// $datos['diseno'] = $listadiseno['0'];
		// if(isset($listaguarderia) && !empty($listaguarderia)){
			// $listadiseno = $this -> Diseno_model -> dame_diseno_idguarderia($listaguarderia[0]['id']);
		// }
		// $datos['disenonuevo'] = $listadiseno['0'];
		$this -> load -> helper('url');
		$datos['titulo'] = 'Eyekinder | Bienvenido';

		$this -> load -> view('movil/head', $datos);
		$this -> load -> view('movil/index');

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
