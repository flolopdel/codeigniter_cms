<div class="contenidoBasico1">
	<div class="formularioEstandar" id="registro-form">
		<div class="container">
			<div class="contentEstandar">
				<?php $this -> load -> helper("form");
				echo form_open_multipart($action);
				echo form_hidden("form", "ok");
				echo form_hidden("idNino", $error['id']);
				echo validation_errors('<div class="cuadroErrores">', '</div>');
				echo '<p><div class="texto-form">Completa el siguiente formulario con los datos del usuario:</div></p>';
				echo '<div class="label">';
				echo form_label('Nombre*', 'nombre');
				echo '</div>';
				echo form_input('nombre', $error['nombre']);
				echo '<br>';
				echo '<div class="label">';
				echo form_label('Apellidos*', 'apellidos');
				echo '</div>';
				echo form_input('apellidos', $error['apellidos']);
				echo '<br>';
				echo '<div class="label">';
				echo form_label('Fecha de nacimiento', 'fechanac');
				echo '</div>';
				?>
				
				<input type="date" name="fechanac" value="<?php echo $error['fechanacimiento'] ?>" />
				<?php
				if (isset($error['imagen']) && $error['imagen'] != "") {
					echo '<div class="label">';
					echo form_label('Imagen actual', 'imagenactual');
					echo '</div>';
					echo '<div class="input">';
					?>
					<img id="photo" src="<?= base_url().$this -> comunes -> imagen_nino($error); ?>" alt="<?= $error['nombre']." ".$error['apellidos'] ?>"
							title="<?= $error['nombre']." ".$error['apellidos'] ?>">
					<?php
					echo form_hidden("imagenactual", $error['imagen']);
					echo '</div>';
				}
				echo '<div class="label">';
				echo form_label('Imagen', 'imagen0');
				echo '</div>';
				echo form_upload('imagen0');
				echo '<br>';
				echo '<div class="label">'; echo form_label('Tipo de matrícula', 'tipo');echo '</div>';
				        echo form_dropdown('tipo', $opcionestiponino,$error['tipo']);echo '<br>'; 
				echo '<div class="label">';
				echo form_label('Sexo', 'sexo');
				echo '</div>';
				$opciones = array('h' => 'Niño', 'm' => 'Niña');
				echo form_dropdown('sexo', $opciones, $error['sexo'], 'h');
				echo '<br>';
				echo form_submit('botonSubmit', 'Editar','data-theme="b" data-icon="edit"');
				echo form_close();
				?>
			</div><!-- content -->
		</div><!-- container -->
	</div>
</div>