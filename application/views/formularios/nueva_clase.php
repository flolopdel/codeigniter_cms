<div class="contenidoBasico1">
				<div class="formularioEstandar" id="registro-form">
		        <div class="container">
					<div class="contentEstandar">
						<?php
						$this->load->helper("form");
				        echo form_open_multipart($action);
						echo form_hidden("form", "ok");
						echo validation_errors('<div class="cuadroErrores">','</div>');
						echo'<p><div class="texto-form">Completa el formulario para registrar la clase a esta guardería</div></p>';
						if($rol == 4){
							echo form_hidden("guarderia", $idGuarderia);
					       	echo '<div class="label">'; echo form_label('Tutor*', 'tutor');echo '</div>';
					        echo form_dropdown('tutor', $opciones,$error['tutor']);echo '<br>';
						}
				       	echo '<div class="label">'; echo form_label('Nombre*', 'nombre');echo '</div>';
				        echo form_input('nombre',$error['nombre']);echo '<br>'; 
				       	echo '<div class="label">'; echo form_label('Descripción', 'descripcion');echo '</div>';
				        echo form_textarea('descripcion',$error['descripcion']);echo '<br>';  
				        echo form_submit('botonSubmit', 'Enviar');
				        echo form_close();
				    ?>
					</div><!-- content -->
				</div><!-- container -->
	        </div>
</div>