<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Comunes {
	
	function __construct() {
		//creamos una instancia de CI para poder utilizar todo lo que queramos de CI en nuestra libreria externa
		$this -> CI = &get_instance();
	}
	////////////////////////////////////////////////////
	//Convierte fecha de mysql a español
	////////////////////////////////////////////////////
	function fecha_mysql_a_espanol($fecha) {
		ereg("([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha);
		$lafecha = $mifecha[3] . "/" . $mifecha[2] . "/" . $mifecha[1];
		return $lafecha;
	}

	////////////////////////////////////////////////////
	//Convierte fecha de español a mysql
	////////////////////////////////////////////////////
	function fecha_espanol_a_mysql($fecha) {
		ereg("([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha);
		$lafecha = $mifecha[3] . "-" . $mifecha[2] . "-" . $mifecha[1];
		return $lafecha;
	}
	
	function paginar($lista,$url,$registros,$urisegmento){
			$this->CI->load->library('pagination'); //Cargamos la librería de paginación
			$segmento = $this->CI->uri->segment($urisegmento);
				   		$totalfilas=0;
				       foreach ($lista as $key => $value) {
				           $totalfilas++;
				       }
			        $config['base_url'] = base_url().$url; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
			        $config['total_rows'] = $totalfilas;//calcula el número de filas  
			        $config['per_page'] = $registros; //Número de registros mostrados por páginas
			        $config['num_links'] = ($config['total_rows']/$config['per_page']) + 1; //Número de links mostrados en la paginación
			        $config['first_link'] = 'Primera';//primer link
			        $config['last_link'] = 'Última';//último link
			        $config["uri_segment"] = $urisegmento;//el segmento de la paginación
			        $config['next_link'] = 'Siguiente';//siguiente link
			        $config['prev_link'] = 'Anterior';//anterior link
			        $config['full_tag_open'] = '<div id="paginacion">';//el div que debemos maquetar
			        $config['full_tag_close'] = '</div>';//el cierre del div de la paginación
			        $this->CI->pagination->initialize($config); //inicializamos la paginación
				   	if(isset($segmento) && !empty($segmento)){
				   		$i=$segmento;
				   	}else{
				   		$i=0;
				   	}
					$result2 = array();
				   	foreach ($lista as $key => $value) {
				   		if($key>=$segmento){
						   if($i<$registros + $segmento){
						   	$result2[] = $value;
						   }
						   $i++;
				   		}
					   }
			       	return $result2;   
	}

	function send_email($datos) {
		$ret = "";
		$this -> load -> library('phpmailer');
		$this -> load -> helper('url');
		$mail = new PHPMailer();
		// defaults to using php "mail()"
		$mail -> CharSet = "UTF-8";
		$path = base_url() . $datos['rutaplantilla'];
		$body = file_get_contents($path);
		$mail -> SetFrom($datos['emailFrom'], $datos['nombreFrom']);
		$address = $datos['emailA'];
		$mail -> AddAddress($address, "Guest");
		$mail -> Subject = $datos['asunto'];
		;
		$mail -> MsgHTML($body);
		$mail -> AddEmbeddedImage('logo.jpg', 'logo', 'logo.jpg', 'base64', 'image/jpeg');
		if (!$mail -> Send()) {
			echo "Mailer Error: " . $mail -> ErrorInfo;
		} else {
			echo "Se ha enviado a  '" . $_POST['email'] . "' Please Check Email  and Spam too.";
		}

	}
	function notificaciones_nueva($id) {
		$this -> CI -> load -> model('Notificaciones_model');
		$notificaciones = $this -> CI -> Notificaciones_model -> dame_notificaciones_iddestino_notipo($id,"6");
		$i=0;
		foreach ($notificaciones as $key => $value) {
				if($value['vista'] == 0){
					$i++;
				}
		}
		return $i;
	}
	function mensajes_nuevos($id) {
		$this -> CI -> load -> model('Mensajes_model');
		$mensajes = $this -> CI -> Mensajes_model -> dame_mensajes_recibidos_usuario($id);
		$i=0;
		foreach ($mensajes as $key => $value) {
				if($value['leido'] == 0){
					$i++;
				}
		}
		return $i;
	}
	// TODO ENVIAR EMAIL VÁLIDO	
	function enviarEmail($from, $to, $asunto, $mensaje, $enlace, $redirect = true) {
		$config = array();
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this-> CI -> email->initialize($config);
		
		$this -> CI -> email -> clear();
		$this -> CI -> email -> to($to);
		$this -> CI -> email -> from($from);
		$this -> CI -> email -> subject($asunto);
		$message = '<html><body>';
		$message .= '<table border="1" cellpadding="0" cellspacing="0" width="100%">
						 <tr>
						  <td width="260" valign="top">
						   <table border="1" cellpadding="0" cellspacing="0" width="100%">
						    <tr>
						     <td style="padding: 50px;">
						      <img src="'.base_url().'images/logos/eyekinder.png" alt="" width="100%" height="140" style="display: block;" />
						     </td>
						    </tr>
						    <tr>
						     <td style="padding: 25px;">
						     <p><b>Asunto</b>: '.$mensaje.'</p>
						     <p><b>Enlace</b>: '.$enlace.'</p>
						     </td>
						    </tr>
						   </table>
						  </td>
						 </tr>
						</table>';
		$message .= "</body></html>";
		$this -> CI -> email -> message($message);
		$this -> CI -> email -> send();
		if($redirect){
			redirect(base_url());
		}

	}

	function imagen_usuario($usuario) {
		$imagenurl = "";
		$existeimagen = false;
		if (isset($usuario['imagen']) && $usuario['imagen'] != "" && file_exists('images/subidas/' . $usuario['imagen'])) {
			$existeimagen = true;
		}
		$imagenurl = 'images/subidas/' . $usuario['imagen'];
		if ($usuario['rol'] == 1) {
			if (!$existeimagen) {
				$imagenurl = "images/icofinder/profe.png";
			}
		} else if ($usuario['rol'] == 2) {
			if (!$existeimagen) {
				if ($usuario['sexo'] == "h") {
					$imagenurl = "images/icofinder/padre.png";
				} else {
					$imagenurl = "images/icofinder/madre.png";
				}
			}
		} else if ($usuario['rol'] == 3) {
			if (!$existeimagen) {
				$imagenurl = "images/icofinder/profe.png";
			}
		} else if ($usuario['rol'] == 4) {
			if (!$existeimagen) {
				$imagenurl = "images/icofinder/profe.png";
			}
		} else if ($usuario['rol'] == 5) {
			if (!$existeimagen) {
				$imagenurl = "images/icofinder/profe.png";
			}
		}
		return $imagenurl;
	}

	function imagen_nino($usuario) {
		$imagenurl = "";
		$existeimagen = false;
		if (isset($usuario['imagen']) && $usuario['imagen'] != "" && file_exists('images/subidas/' . $usuario['imagen'])) {
			$existeimagen = true;
		}
		$imagenurl = 'images/subidas/' . $usuario['imagen'];
		if (!$existeimagen) {
			if ($usuario['sexo'] == "h") {
				$imagenurl = "images/icofinder/nino.png";
			} else {
				$imagenurl = "images/icofinder/nina.png";
			}
		}
		return $imagenurl;
	}

	function estrellas_editar($id, $year, $mon, $day, $numero = null, $href = null, $idinfo = null) {

		if (!isset($href)) {
			$href1 = base_url() . 'usuario/perfilnino/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/1#redirec';
			$href2 = base_url() . 'usuario/perfilnino/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/2#redirec';
			$href3 = base_url() . 'usuario/perfilnino/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/3#redirec';
			$href4 = base_url() . 'usuario/perfilnino/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/4#redirec';
			$href5 = base_url() . 'usuario/perfilnino/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/5#redirec';
		} else if ($href == "familiar") {
			$href1 = base_url() . 'usuario/editar_infofamiliar/' . $idinfo . '/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/1#redirec';
			$href2 = base_url() . 'usuario/editar_infofamiliar/' . $idinfo . '/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/2#redirec';
			$href3 = base_url() . 'usuario/editar_infofamiliar/' . $idinfo . '/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/3#redirec';
			$href4 = base_url() . 'usuario/editar_infofamiliar/' . $idinfo . '/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/4#redirec';
			$href5 = base_url() . 'usuario/editar_infofamiliar/' . $idinfo . '/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/5#redirec';

		} else if ($href == "tutor") {
			$href1 = base_url() . 'usuario/editar_infotutor/' . $idinfo . '/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/1#redirec';
			$href2 = base_url() . 'usuario/editar_infotutor/' . $idinfo . '/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/2#redirec';
			$href3 = base_url() . 'usuario/editar_infotutor/' . $idinfo . '/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/3#redirec';
			$href4 = base_url() . 'usuario/editar_infotutor/' . $idinfo . '/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/4#redirec';
			$href5 = base_url() . 'usuario/editar_infotutor/' . $idinfo . '/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/5#redirec';

		} else {
			$href1 = base_url() . 'usuario/perfilnino/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/1#redirec';
			$href2 = base_url() . 'usuario/perfilnino/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/2#redirec';
			$href3 = base_url() . 'usuario/perfilnino/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/3#redirec';
			$href4 = base_url() . 'usuario/perfilnino/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/4#redirec';
			$href5 = base_url() . 'usuario/perfilnino/' . $id . '/' . $year . '/' . $mon . '/' . $day . '/5#redirec';
		}

		$resultado = "";
		switch ($numero) {
			case '0' :
				$resultado = '<div class="ec-stars-wrapper" id="redirec">
							<a href="' . $href1 . '" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
							<a href="' . $href2 . '" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
							<a href="' . $href3 . '" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
							<a href="' . $href4 . '" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
							<a href="' . $href5 . '" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
						 </div>
						 <input type="hidden" name="valoracion" value="0">';
				break;
			case '1' :
				$resultado = '<div class="ec-stars-wrapper" id="redirec">
							<a href="' . $href1 . '" class="selected" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
							<a href="' . $href2 . '" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
							<a href="' . $href3 . '" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
							<a href="' . $href4 . '" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
							<a href="' . $href5 . '" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
						 </div>
						 <input type="hidden" name="valoracion" value="1">';
				break;
			case '2' :
				$resultado = '<div class="ec-stars-wrapper" id="redirec">
							<a href="' . $href1 . '" class="selected" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
							<a href="' . $href2 . '" class="selected" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
							<a href="' . $href3 . '" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
							<a href="' . $href4 . '" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
							<a href="' . $href5 . '" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
						 </div>
						 <input type="hidden" name="valoracion" value="2">';
				break;
			case '3' :
				$resultado = '<div class="ec-stars-wrapper" id="redirec">
							<a href="' . $href1 . '" class="selected" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
							<a href="' . $href2 . '" class="selected" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
							<a href="' . $href3 . '" class="selected" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
							<a href="' . $href4 . '" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
							<a href="' . $href5 . '" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
						 </div>
						 <input type="hidden" name="valoracion" value="3">';
				break;
			case '4' :
				$resultado = '<div class="ec-stars-wrapper" id="redirec">
							<a href="' . $href1 . '" class="selected" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
							<a href="' . $href2 . '" class="selected" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
							<a href="' . $href3 . '" class="selected" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
							<a href="' . $href4 . '" class="selected" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
							<a href="' . $href5 . '" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
						 </div>
						 <input type="hidden" name="valoracion" value="4">';
				break;
			case '5' :
				$resultado = '<div class="ec-stars-wrapper" id="redirec">
							<a href="' . $href1 . '" class="selected" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
							<a href="' . $href2 . '" class="selected" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
							<a href="' . $href3 . '" class="selected" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
							<a href="' . $href4 . '" class="selected" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
							<a href="' . $href5 . '" class="selected" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
						 </div>
						 <input type="hidden" name="valoracion" value="5">';
				break;

			default :
				$resultado = '<div class="ec-stars-wrapper">
							<a href="' . $href1 . '" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
							<a href="' . $href2 . '" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
							<a href="' . $href3 . '" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
							<a href="' . $href4 . '" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
							<a href="' . $href5 . '" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
						 </div>';
				break;
		}
		return $resultado;
	}

	function estrellas_resultado($id, $year, $mon, $day, $numero = null) {

		$resultado = "";
		switch ($numero) {
			case '0' :
				$resultado = '<div class="resultado-star">
							<a data-value="1" title="1 estrellas">&#9733;</a>
							<a data-value="2" title="2 estrellas">&#9733;</a>
							<a data-value="3" title="3 estrellas">&#9733;</a>
							<a data-value="4" title="4 estrellas">&#9733;</a>
							<a data-value="5" title="5 estrellas">&#9733;</a>
						 </div>';
				break;
			case '1' :
				$resultado = '<div class="resultado-star">
							<a data-value="1" class="selected" title="1 estrellas">&#9733;</a>
							<a data-value="2" title="2 estrellas">&#9733;</a>
							<a data-value="3" title="3 estrellas">&#9733;</a>
							<a data-value="4" title="4 estrellas">&#9733;</a>
							<a data-value="5" title="5 estrellas">&#9733;</a>
						 </div>';
				break;
			case '2' :
				$resultado = '<div class="resultado-star">
							<a data-value="1" class="selected" title="1 estrellas">&#9733;</a>
							<a data-value="2" class="selected" title="2 estrellas">&#9733;</a>
							<a data-value="3" title="3 estrellas">&#9733;</a>
							<a data-value="4" title="4 estrellas">&#9733;</a>
							<a data-value="5" title="5 estrellas">&#9733;</a>
						 </div>';
				break;
			case '3' :
				$resultado = '<div class="resultado-star">
							<a  data-value="1" class="selected" title="1 estrellas">&#9733;</a>
							<a data-value="2" class="selected" title="2 estrellas">&#9733;</a>
							<a data-value="3" class="selected" title="3 estrellas">&#9733;</a>
							<a data-value="4" title="4 estrellas">&#9733;</a>
							<a data-value="5" title="5 estrellas">&#9733;</a>
						 </div>';
				break;
			case '4' :
				$resultado = '<div class="resultado-star">
							<a data-value="1" class="selected" title="1 estrellas">&#9733;</a>
							<a data-value="2" class="selected" title="2 estrellas">&#9733;</a>
							<a data-value="3" class="selected" title="3 estrellas">&#9733;</a>
							<a data-value="4" class="selected" title="4 estrellas">&#9733;</a>
							<a data-value="5" title="5 estrellas">&#9733;</a>
						 </div>';
				break;
			case '5' :
				$resultado = '<div class="resultado-star">
							<a data-value="1" class="selected" title="1 estrellas">&#9733;</a>
							<a data-value="2" class="selected" title="2 estrellas">&#9733;</a>
							<a data-value="3" class="selected" title="3 estrellas">&#9733;</a>
							<a data-value="4" class="selected" title="4 estrellas">&#9733;</a>
							<a data-value="5" class="selected" title="5 estrellas">&#9733;</a>
						 </div>';
				break;

			default :
				$resultado = '<div class="resultado-star">
							<a data-value="1" title="1 estrellas">&#9733;</a>
							<a data-value="2" title="2 estrellas">&#9733;</a>
							<a data-value="3" title="3 estrellas">&#9733;</a>
							<a data-value="4" title="4 estrellas">&#9733;</a>
							<a data-value="5" title="5 estrellas">&#9733;</a>
						 </div>';
				break;
		}
		return $resultado;
	}

	function calcular_edad($fecha) {
		$dias = explode("-", $fecha, 3);
		$dias = mktime(0, 0, 0, $dias[1], $dias[2], $dias[0]);
		$edad = (int)((time() - $dias) / 31556926);
		return $edad;
	}

	function fechaHoy() {
		$dia = date("l");

		if ($dia == "Monday")
			$dia = "Lunes";
		if ($dia == "Tuesday")
			$dia = "Martes";
		if ($dia == "Wednesday")
			$dia = "Miércoles";
		if ($dia == "Thursday")
			$dia = "Jueves";
		if ($dia == "Friday")
			$dia = "Viernes";
		if ($dia == "Saturday")
			$dia = "Sabado";
		if ($dia == "Sunday")
			$dia = "Domingo";
		$mes = date("F");

		if ($mes == "January")
			$mes = "Enero";
		if ($mes == "February")
			$mes = "Febrero";
		if ($mes == "March")
			$mes = "Marzo";
		if ($mes == "April")
			$mes = "Abril";
		if ($mes == "May")
			$mes = "Mayo";
		if ($mes == "June")
			$mes = "Junio";
		if ($mes == "July")
			$mes = "Julio";
		if ($mes == "August")
			$mes = "Agosto";
		if ($mes == "September")
			$mes = "Septiembre";
		if ($mes == "October")
			$mes = "Octubre";
		if ($mes == "November")
			$mes = "Noviembre";
		if ($mes == "December")
			$mes = "Diciembre";

		$ano = date("Y");
		$numerodia = date("d");
		return $dia . ", " . $numerodia . " de " . $mes . " del " . $ano;
	}

	function fechamensajes($fecha) {
		$listafecha = explode("-", $fecha);
		$ano = $listafecha[0];
		$mes = $listafecha[1];
		$numerodia = $listafecha[2];
		$dia = date("l", mktime(0, 0, 0, $mes, $numerodia, $ano));
		if ($dia == "Monday")
			$dia = "Lunes";
		if ($dia == "Tuesday")
			$dia = "Martes";
		if ($dia == "Wednesday")
			$dia = "Miércoles";
		if ($dia == "Thursday")
			$dia = "Jueves";
		if ($dia == "Friday")
			$dia = "Viernes";
		if ($dia == "Saturday")
			$dia = "Sabado";
		if ($dia == "Sunday")
			$dia = "Domingo";
		$mes = date("F", mktime(0, 0, 0, $mes, $numerodia, $ano));

		if ($mes == "January")
			$mes = "ENERO";
		if ($mes == "February")
			$mes = "FEBRERO";
		if ($mes == "March")
			$mes = "MARZO";
		if ($mes == "April")
			$mes = "ABRIL";
		if ($mes == "May")
			$mes = "MAYO";
		if ($mes == "June")
			$mes = "JUNIO";
		if ($mes == "July")
			$mes = "JULIO";
		if ($mes == "August")
			$mes = "AGOSTO";
		if ($mes == "September")
			$mes = "SEPTIEMBRE";
		if ($mes == "October")
			$mes = "OCTUBRE";
		if ($mes == "November")
			$mes = "NOVIEMBRE";
		if ($mes == "December")
			$mes = "DICIEMBRE";

		return $numerodia ." ". $mes . " " . $ano;
	}
	function fechaElegida($ano, $mes, $numerodia) {
		$dia = date("l", mktime(0, 0, 0, $mes, $numerodia, $ano));
		if ($dia == "Monday")
			$dia = "Lunes";
		if ($dia == "Tuesday")
			$dia = "Martes";
		if ($dia == "Wednesday")
			$dia = "Miércoles";
		if ($dia == "Thursday")
			$dia = "Jueves";
		if ($dia == "Friday")
			$dia = "Viernes";
		if ($dia == "Saturday")
			$dia = "Sabado";
		if ($dia == "Sunday")
			$dia = "Domingo";
		$mes = date("F", mktime(0, 0, 0, $mes, $numerodia, $ano));

		if ($mes == "January")
			$mes = "Enero";
		if ($mes == "February")
			$mes = "Febrero";
		if ($mes == "March")
			$mes = "Marzo";
		if ($mes == "April")
			$mes = "Abril";
		if ($mes == "May")
			$mes = "Mayo";
		if ($mes == "June")
			$mes = "Junio";
		if ($mes == "July")
			$mes = "Julio";
		if ($mes == "August")
			$mes = "Agosto";
		if ($mes == "September")
			$mes = "Setiembre";
		if ($mes == "October")
			$mes = "Octubre";
		if ($mes == "November")
			$mes = "Noviembre";
		if ($mes == "December")
			$mes = "Diciembre";

		return $dia . ", " . $numerodia . " de " . $mes . " del " . $ano;
	}

}

/* Fin del fichero */
/* No necesito cerrar PHP y de hecho no se recomienda para no insertar saltos de línea al final */
