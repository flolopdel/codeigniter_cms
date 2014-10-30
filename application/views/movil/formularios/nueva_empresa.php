<div data-role="content">
						<?php
						$this->load->helper("form");
				        echo form_open_multipart($action);
						echo form_hidden("form", "ok");
						echo validation_errors('<div class="cuadroErrores">','</div>');
						echo'<p><div class="texto-form">Para que tenga una empresa funcionalidad en la aplicación debe tener un gerente, en esta página se registrará la guardería y en la siguiente el gerente</div></p>';
						echo'<p><div class="texto-form">Completa el siguiente formulario con los datos de la empresa:</div></p>';
				       	echo form_label('Nombre*', 'nombre');
				        echo form_input('nombre',$error['nombre']);
				       	echo form_label('Razón social*', 'razonsocial');
				        echo form_input('razonsocial',$error['razonsocial']);
				       	echo form_label('Contacto*', 'contacto');
				        echo form_input('contacto',$error['contacto']); 
				       	echo form_label('CIF', 'cif');
				        echo form_input('cif',$error['cif']);   
				        echo form_label('Provincia', 'provincia');
				        echo form_dropdown('provincia', $opciones,$error['provincia']);
				        echo form_submit('botonSubmit', 'Continuar','data-theme="b" data-icon="arrow-r"');
				        echo form_close();
				    ?>
</div>