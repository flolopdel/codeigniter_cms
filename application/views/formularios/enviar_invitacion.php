<div class="contenidoBasico1">
	<div class="formularioEstandar" id="registro-form">
		<div class="container">
			<div class="contentEstandar">		    
			    <?php 
			   	$this->load->helper("form");
				echo form_open("registro/invitacion");
				echo form_hidden("form", "ok");
				echo form_hidden("idUsuario", $error['id']);
				if(isset ($errorpass) && $errorpass != ""){
				echo '<div class="cuadroErrores">'.$errorpass.'</div>';
				}
				echo validation_errors('<div class="cuadroErrores">', '</div>');
				echo '<p><div class="texto-form">Enviaras un email al correo introducido  que contendrá un enlace al registro del usuario</div></p>';
				echo '<div class="label">';
				echo form_label('E-Mail', 'email');
				echo '</div>';
				echo form_input('email','','placeholder="Introduce email" required="" id="email" name="email"');
				echo '<br>';
			    echo form_submit('botonSubmit', 'Enviar');
				echo form_close();
				?>
			    </div>
			</div><!-- content -->
		</div><!-- container -->
	</div>
</div>
