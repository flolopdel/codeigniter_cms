<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Gerente extends CI_Controller {

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
		$nombre = $this -> session -> userdata('nombre'). " " . $this -> session -> userdata('apellidos');
		if ($this -> session -> userdata('rol') == FALSE || $this -> session -> userdata('rol') != '5') {
			 redirect(base_url());
		} else {
			$this -> load -> helper('url');
			$this -> load -> model('Usuarios_model');
			$listaUser = $this -> Usuarios_model -> dame_usuario_id($id);

			$datos = array('titulo' => 'Eyerkinder | '.$nombre, 'rol' => $this -> session -> userdata('rol'));
			if (!$listaUser) {
				//no he recibido ningún artículo
				//voy a lanzar un error 404 de página no encontrada
				show_404();
			} else {

				$result = array_merge((array)$datos, (array)$listaUser[0]);
				if($this->session->userdata('movil') || $this->session->userdata('tablet')){

					$this -> load -> view('movil/plantilla/head', $result);
					$this -> load -> view('movil/plantilla/bodyheadermenu');
					$this -> load -> view('movil/plantilla/construccion');
					$this -> load -> view('movil/plantilla/footer');
				}else{
					$this -> load -> view('plantilla/head', $result);
					$this -> load -> view('plantilla/bodyheadermenu');
					$this -> load -> view('plantilla/construccion');
					$this -> load -> view('plantilla/footer');
				}
			}
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
