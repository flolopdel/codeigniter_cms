<div class="contenidoBasico1">
				<div class="formularioEstandar" id="registro-form">
		        <div class="container">
					<div class="contentEstandar">
						<?php
						$this->load->helper("form");
				        echo form_open_multipart($action);
						echo form_hidden("form", "ok");
						echo validation_errors('<div class="cuadroErrores">','</div>');
						echo'<p><div class="texto-form">Para que tenga una empresa funcionalidad en la aplicación debe tener un gerente, en esta página se registrará la guardería y en la siguiente el gerente</div></p>';
						echo'<p><div class="texto-form">Completa el siguiente formulario con los datos de la empresa:</div></p>';
				       	echo '<div class="label">'; echo form_label('Nombre*', 'nombre');echo '</div>';
				        echo form_input('nombre',$error['nombre']);echo '<br>';
				       	echo '<div class="label">'; echo form_label('Razón social*', 'razonsocial');echo '</div>';
				        echo form_input('razonsocial',$error['razonsocial']);echo '<br>';  
				       	echo '<div class="label">'; echo form_label('Contacto*', 'contacto');echo '</div>';
				        echo form_input('contacto',$error['contacto']);echo '<br>';  
				       	echo '<div class="label">'; echo form_label('CIF', 'cif');echo '</div>';
				        echo form_input('cif',$error['cif']);echo '<br>';   
				       	echo '<div class="label">'; echo form_label('Provincia', 'provincia');echo '</div>';
				        echo form_dropdown('provincia', $opciones,$error['provincia']);echo '<br>'; 
				        echo form_submit('botonSubmit', 'Continuar');
				        echo form_close();
				    ?>
					</div><!-- content -->
				</div><!-- container -->
	        </div>
</div>