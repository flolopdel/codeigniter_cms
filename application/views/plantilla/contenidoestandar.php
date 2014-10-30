<div class="contenidoBasico1">
				<div class="formularioEstandar" id="registro-form">
		        <div class="container">
					<div class="contentEstandar">
						<?php echo validation_errors(); ?>
						<?php
				        echo form_open('usuario/nuevo_usuario');
						echo'<p><div class="texto-form">Completa el siguiente formulario con sus datos de usuario:</div></p>';
				       echo '<div class="label">'; echo form_label('Nombre', 'nombre');echo '</div>';
				        echo form_input('nombre');echo '<br>';
				       echo '<div class="label">'; echo form_label('Apellidos', 'apellidos');echo '</div>';
				        echo form_input('apellidos');echo '<br>';
				       echo '<div class="label">'; echo form_label('Email', 'email');echo '</div>';
				        echo form_input('email');echo '<br>';
				       echo '<div class="label">'; echo form_label('Contraseña', 'pass1');echo '</div>';
				        echo form_password('pass1');echo '<br>';
				       echo '<div class="label">'; echo form_label('Confirma contraseña', 'pass2');echo '</div>';
				        echo form_password('pass2');echo '<br>';    
				       echo '<div class="label">'; echo form_label('Fecha de nacimiento', 'fechanac');echo '</div>';
				        echo form_input('fechanac');echo '<br>';    
				       echo '<div class="label">'; echo form_label('Imagen', 'imagen');echo '</div>';
				        echo form_upload('imagen');echo '<br>';    
				        echo form_submit('botonSubmit', 'Enviar');
				        echo form_close();
				    ?>
					</div><!-- content -->
				</div><!-- container -->
	        </div>
</div>