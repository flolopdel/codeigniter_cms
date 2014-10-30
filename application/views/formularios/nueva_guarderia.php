<div class="contenidoBasico1">
				<div class="formularioEstandar" id="registro-form">
		        <div class="container">
					<div class="contentEstandar">
						<?php
						$this->load->helper("form");
				        echo form_open_multipart($action);
						echo form_hidden("form", "ok");
						echo validation_errors('<div class="cuadroErrores">','</div>');
						echo'<p><div class="texto-form">Para que tenga una guardería funcionalidad en la aplicación debe tener un director, en esta página se registrará la guardería y en la siguiente el director</div></p>';
						echo'<p><div class="texto-form">Completa el siguiente formulario con los datos de la guardería:</div></p>';
						if($rol == 1){
					       	echo '<div class="label">'; echo form_label('Empresa', 'empresa');echo '</div>';
					        echo form_dropdown('empresa', $opciones2,$error['empresa']);echo '<br>';   
						}else{
							echo form_hidden("empresa", $idEmpresa);
						}
				       	echo '<div class="label">'; echo form_label('Nombre*', 'nombre');echo '</div>';
				        echo form_input('nombre',$error['nombre']);echo '<br>'; 
				       	echo '<div class="label">'; echo form_label('Contacto', 'contacto');echo '</div>';
				        echo form_input('contacto',$error['contacto']);echo '<br>';   
				       	echo '<div class="label">'; echo form_label('Provincia', 'provincia');echo '</div>';
				        echo form_dropdown('provincia', $opciones,$error['provincia']);echo '<br>';   
				        echo form_submit('botonSubmit', 'Continuar');
				        echo form_close();
				    ?>
					</div><!-- content -->
				</div><!-- container -->
	        </div>
</div>