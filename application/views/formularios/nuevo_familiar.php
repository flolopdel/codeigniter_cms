<div class="contenidoBasico1">
				<div class="formularioEstandar" id="registro-form">
		        <div class="container">
					<div class="contentEstandar">
						<?php
						$this->load->helper("form");
				        echo form_open_multipart($action);
						echo form_hidden("form", "ok");
						if(isset ($error['erroremail']) && $error['erroremail'] != ""){
						echo '<div class="cuadroErrores">'.$error['erroremail'].'</div>';
						}
						echo validation_errors('<div class="cuadroErrores">','</div>');
						echo'<p><div class="texto-form">Completa el siguiente formulario con sus datos de usuario:</div></p>';
						if(isset($idAsoc) && $idAsoc != null){
							echo form_hidden('idAsoc', $idAsoc);
						}
						if(isset($rol) && ($rol == "4" || $rol=="3")){
							echo form_hidden('guarderia', $idGuarderia);
						}else if (isset($rol) && ($rol == "1" || $rol == "5")){
							
					       	echo '<div class="label">'; echo form_label('Guarderia', 'guarderia');echo '</div>';
					        echo form_dropdown('guarderia', $opciones,$error['guarderia']);echo '<br>';  
							//MOSTRAR TODAS GUARDES
						}
				       echo '<div class="label">'; echo form_label('Nombre*', 'nombre');echo '</div>';
				        echo form_input('nombre',$error['nombre']);echo '<br>';
				       echo '<div class="label">'; echo form_label('Apellidos*', 'apellidos');echo '</div>';
				        echo form_input('apellidos',$error['apellidos']);echo '<br>';
				       echo '<div class="label">'; echo form_label('Email*', 'email');echo '</div>';
				        echo form_input('email',$error['email']);echo '<br>';
				       echo '<div class="label">'; echo form_label('Contraseña*', 'pass1');echo '</div>';
				        echo form_password('pass1');echo '<br>';
				       echo '<div class="label">'; echo form_label('Confirma contraseña*', 'pass2');echo '</div>';
				        echo form_password('pass2');echo '<br>';    
				       echo '<div class="label">'; echo form_label('Fecha de nacimiento', 'fechanac');echo '</div>';
					   ?>
					   <input type="date" name="fechanac" />
					   <?php
				       echo '<div class="label">'; echo form_label('Imagen', 'imagen0');echo '</div>';
				        echo form_upload('imagen0');echo '<br>';    
						
				       echo '<div class="label">'; echo form_label('Sexo', 'sexo');echo '</div>';
					   $opciones = array(
									'h' => 'Hombre',
									'm' => 'Mujer'
									                 );
				        echo form_dropdown('sexo', $opciones,$error['sexo'], 'h');echo '<br>';    
				        echo form_submit('botonSubmit', 'Enviar');
				        echo form_close();
				    ?>
					</div><!-- content -->
				</div><!-- container -->
	        </div>
</div>