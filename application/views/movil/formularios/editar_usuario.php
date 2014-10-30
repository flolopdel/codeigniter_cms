<div data-role="content">
				<?php $this -> load -> helper("form");
				echo form_open_multipart($action,"data-ajax='false'");
				echo form_hidden("form", "ok");
				echo form_hidden("idUsuario", $error['id']);
				echo validation_errors('<div class="cuadroErrores">', '</div>');
				echo form_label('Nombre*', 'nombre');
				echo form_input('nombre', $error['nombre']);
				echo form_label('Apellidos*', 'apellidos');
				echo form_input('apellidos', $error['apellidos']);
				echo form_label('Fecha de nacimiento', 'fechanac');
				?>
				<input type="date" name="fechanac" value="<?php echo $error['fechanacimiento'] ?>" />
				<!-- <div data-role="fieldcontain">
				    <fieldset data-role="controlgroup" data-type="horizontal">
				        <label for="select-choice-month">Month</label>
				        <select name="select-choice-month" id="select-choice-month">
				            <option>Month</option>
				            <option value="jan">January</option>
				            
				        </select>
				    
				        <label for="select-choice-day">Day</label>
				        <select name="select-choice-day" id="select-choice-day">
				            <option>Day</option>
				            <option value="1">1</option>
				        </select>
				    
				        <label for="select-choice-year">Year</label>
				        <select name="select-choice-year" id="select-choice-year">
				            <option>Year</option>
				            <option value="2011">2011</option>
				            
				        </select>
				        
				    </fieldset>
				</div> -->
				<?php
				if (isset($error['imagen']) && $error['imagen'] != "") {
					echo '<div class="label">';
					echo form_label('Imagen actual', 'imagenactual');
					echo '</div>';
					echo '<div class="input">';
					?>
					<img style="width:90%; margin-left:5%;" id="photo" src="<?= base_url().$this -> comunes -> imagen_usuario($error); ?>" alt="<?= $error['nombre']." ".$error['apellidos'] ?>"
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

				echo '<div class="label">';
				echo form_label('Sexo', 'sexo');
				echo '</div>';
				$opciones = array('h' => 'Hombre', 'm' => 'Mujer');
				echo form_dropdown('sexo', $opciones, $error['sexo'], 'h');
				echo '<br>';
				echo form_submit('botonSubmit', 'Guardar','data-theme="b"');
				echo form_close();
				?>	
</div>