<div data-role="content">
						<?php
						$this->load->helper("form");
				        echo form_open_multipart('registro/controller_nino',"data-ajax='false'");
						echo form_hidden("form", "ok");
						echo validation_errors('<div class="cuadroErrores">','</div>');
						echo'<p><div class="texto-form">Completa el siguiente formulario con sus datos de usuario:</div></p>';
						
						if(isset($rol) && $rol == "4"){
							echo form_hidden('guarderia', $idGuarderia);
							
					       	echo '<div class="label">'; echo form_label('Familiar*', 'familiar');echo '</div>';
					        echo form_dropdown('familiar', $opciones2,$error['familiar']);echo '<br>';  
						}else if (isset($rol) && ($rol == "1" || $rol == "5")){
							
					       	echo '<div class="label">'; echo form_label('Guarderia*', 'guarderia');echo '</div>';
					        echo form_dropdown('guarderia', $opciones,$error['guarderia']);echo '<br>'; 
							echo '<div class="label">'; echo form_label('Familiar*', 'familiar');echo '</div>';
					        echo form_dropdown('familiar', $opciones2,$error['familiar']);echo '<br>'; 
							//MOSTRAR TODAS GUARDES
						}else if(isset($rol) && $rol == "3"){
							echo form_hidden('guarderia', $idGuarderia);
							
					       	echo '<div class="label">'; echo form_label('Familiar*', 'familiar');echo '</div>';
					        echo form_dropdown('familiar', $opciones2,$error['familiar']);echo '<br>';  
						}else if(isset($rol) && $rol == "2"){
							echo form_hidden('guarderia', $this -> session -> userdata('guarderia'));
							if (isset($familiares) && !empty($familiares)){
								foreach ($familiares as $key => $value) {
									echo form_hidden('familiar[]', $value['id']);
								}
							}else{
								echo form_hidden('familiar[]', $this -> session -> userdata('id'));
							}
							 
						}
				       echo '<div class="label">'; echo form_label('Nombre*', 'nombre');echo '</div>';
				        echo form_input('nombre',$error['nombre']);echo '<br>';
				       echo '<div class="label">'; echo form_label('Apellidos*', 'apellidos');echo '</div>';
				        echo form_input('apellidos',$error['apellidos']);echo '<br>';  
				       echo '<div class="label">'; echo form_label('Fecha de nacimiento', 'fechanac');echo '</div>';
					   ?>
					   <input type="date" name="fechanac" />
					   <?php
				       echo '<div class="label">'; echo form_label('Imagen', 'imagen0');echo '</div>';
				        echo form_upload('imagen0');echo '<br>';  
						  
						echo '<div class="label">'; echo form_label('Tipo de matrícula', 'tipo');echo '</div>';
				        echo form_dropdown('sexo', $opcionestiponino,$error['tipo']);echo '<br>';    
				       echo '<div class="label">'; echo form_label('Sexo', 'sexo');echo '</div>';
					   $opciones = array(
									'h' => 'Niño',
									'm' => 'Niña'
									                 );
				        echo form_dropdown('sexo', $opciones,$error['sexo'], 'h');echo '<br>';    
				        echo form_submit('botonSubmit', 'Enviar','data-theme="b" data-icon="edit"');
				        echo form_close();
				    ?>
</div>