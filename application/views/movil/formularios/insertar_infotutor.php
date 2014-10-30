<div data-role="content">
				<?php $this -> load -> helper("form");
				echo form_open_multipart($action);
				echo form_hidden("form", "ok");
				echo form_hidden("idUsuario", $error['id']);
				if(isset ($errorpass) && $errorpass != ""){
				echo '<div class="cuadroErrores">'.$errorpass.'</div>';
				}
				echo validation_errors('<div class="cuadroErrores">', '</div>');
				echo '<div class="label">';
				echo form_label('Contraseña actual*', 'passactual');
				echo '</div>';
				echo form_password('passactual');
				echo '<br>';
				echo '<div class="label">';
				echo form_label('Contraseña nueva*', 'pass1');
				echo '</div>';
				echo form_password('pass1');
				echo '<br>';
				echo '<div class="label">';
				echo form_label('Confirma contraseña*', 'pass2');
				echo '</div>';
				echo form_password('pass2');
				echo '<br>';
				echo form_submit('botonSubmit', 'Guardar','data-theme="b"');
				echo form_close();
				?>
</div>