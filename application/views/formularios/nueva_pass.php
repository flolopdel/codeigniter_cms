<div class="contenidoBasico1">
	<div class="formularioEstandar" id="registro-form">
		<div class="container">
			<div class="contentEstandar">
				<?php $this -> load -> helper("form");
				echo form_open_multipart($action);
				echo form_hidden("form", "ok");
				echo form_hidden("idUsuario", $error1['id']);
				echo form_hidden("tokenUsuario", $error1['token']);
				if(isset ($errornp) && $errornp != ""){
					echo '<div class="cuadroErrores">'.$errornp.'</div>';
				}
				echo validation_errors('<div class="cuadroErrores">', '</div>');
				echo '<p><div class="texto-form">Completa el siguiente formulario con los datos del usuario:</div></p>';
				echo '<div class="label">';
				echo form_label('Contraseña nueva*', 'pass1');
				echo '</div>';
				echo form_password('pass1');
				echo '<br>';
				echo '<div class="label">';
				echo form_label('Confirma contraseña*', 'pass2');
				echo '</div>';
				echo form_password('pass2');
				echo '<br>';
				echo form_submit('botonSubmit', 'Guardar');
				echo form_close();
				?>
			</div><!-- content -->
		</div><!-- container -->
	</div>
</div>