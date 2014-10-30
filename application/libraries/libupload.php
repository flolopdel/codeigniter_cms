<?php
if (!defined('BASEPATH'))
	exit('No permitir el acceso directo al script');
/**
 *  Libreria para manejo de cargas (uploads)
 */
//creamos la clase Libupload
class Libupload {
	//creamos nuestro constructor
	function __construct() {
		//creamos una instancia de CI para poder utilizar todo lo que queramos de CI en nuestra libreria externa
		$this -> CI = &get_instance();
	}

	// algunos argumentos para utilizar este método son obligatorios algunos otros no por eso están = NULL
	public function doUpload($i, $files, $dir, $kind, $size = NULL, $width = NULL, $height = NULL, $name = NULL) {
		//le damos unset a $config por si el arreglo esta en memoria previniendo errores
		unset($config);
		// checamos los argumentos no obligatorios su alguno tiene valor
		//$filename: lo usaremos para darle un nombre espesifico a nuestro archivo
		if ($name != NULL) {      $config['file_name'] = $name;
		}
		//$size: lo usaremos para darle un tamaño maximo a nuestro archivo
		if ($size != NULL) {      $config['max_size'] = $size;
		}
		//$width: daremos un ancho espesifico
		if ($width != NULL) {  $config['max_width'] = $width;
		}
		//$height: es para un alto espesifico
		if ($height != NULL) { $config['max_height'] = $height;
		}
		$config['image_library'] = 'GD2';
		//$dir sera la dirección donde queremos guardar nuestro archivo
		$config['upload_path'] = './' . $dir . '/';
		//$kind: lo utilizaremos para ver a que tipo de archivos le daremos permiso
		$config['allowed_types'] = $kind;
		$config['overwrite'] = FALSE;
		$config['remove_spaces'] = TRUE;

		//llamamos a la libreria upload de CI con la instancia que hemos creado
		$this -> CI -> load -> library('upload', $config);

		//verificamos si el archivo no esta vació
		if (!empty($files['name'])) {
			//checamos si se pudo realizar el upload
			if (!$upload = $this -> CI -> upload -> do_upload('imagen' . $i)) {
				//si no se subio el archivo guardamos los errores  y le damos return
				$error = array('error' => $this -> CI -> upload -> display_errors());
				return $error;
			} else {
				// de lo contrario recuperamos el data del archivo subido
				$data = array('data' => $this -> CI -> upload -> data());
				return $data;
			}
		}
	}
	public function delete($dir, $file, $image = NULL) {
		//el archivo1 es obligatorio el archivo2 es solo si es imagen y se creo thumbnail esto para borrar ambos
		// $dir es el nombre de la carpeta o direccion $file es el archivo
		$archivo1 = './' . $dir . '/' . $file;
		//solo si imagen es true esto es para borrar un thumb
		if ($image == TRUE) { $archivo2 = './' . $dir . '/thumb/' . $file;
		}
		//buscamos si el archivo1 existe
		if (file_exists($archivo1)) {
			//borramos el archivo
			if (unlink($archivo1)) {
				//si se borro regresamos true
				$return[0] = TRUE;
			} else {
				$return[0] = FALSE;
			}
		}
		//lo mismo pero solo si es imagen y tememos thumb
		if (file_exists($archivo2)) {
			if (unlink($archivo2)) {
				$return[1] = TRUE;
			} else {
				$return[2] = FALSE;
			}
		}
		return $return;
	}

	public function doThumb($img, $dir, $width, $height) {
		//unset al arreglo config por si existe en memoria
		unset($config);
		$config['image_library'] = 'GD2';
		$config['source_image'] = './' . $dir . '/' . $img;
		//se debe de crear la carpeta thumb dentro de nuestro directorio $dir
		$config['new_image'] = './' . $dir . '/perfil/' . $img;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = $width;
		$config['height'] = $height;

		//verificamos que no este bacio nuestro archivo a subir
		if (!empty($config['source_image'])) {
			//cargamos desde CI  a nuestra libreria image_lib
			$this -> CI -> load -> library('image_lib', $config);
			// iniciamos image_lib con el contenido de $config
			$this -> CI -> image_lib -> initialize($config);

			//le hacemos resize a nuestra imagen
			if (!$this -> CI -> image_lib -> resize()) {
				$error = array('error' => $this -> CI -> image_lib -> display_errors());
				return $error;
			} else {
				return TRUE;
			}
			//limpeamos el contenido de image_lib esto para crear varias thumbs
			$this -> CI -> image_lib -> clear();
		}
	}

}
