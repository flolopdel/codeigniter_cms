
<style>
div.ui-input-text>:first-child
{
display:none;
}
</style>
<div data-role="content">
						<?php
						$this->load->helper("form");
				        echo form_open_multipart($action);
						echo form_hidden("form", "ok");
						echo validation_errors('<div class="cuadroErrores">','</div>');
						echo'<p><div class="texto-form">Completa el formulario para registrar la clase a esta guardería</div></p>';
							echo form_hidden("guarderia", $idGuarderia);
					       	// echo '<div class="label">'; echo form_label('Tutor*', 'tutor');echo '</div>';
					        // echo form_dropdown('tutor', $opciones,$error['tutor']);echo '<br>';
					       	echo '<div class="label">'; echo form_label('Clase*', 'clase');echo '</div>';
					        echo form_dropdown('clase', $opciones2,$error['clase']);echo '<br>'; 
							echo '<div class="label">'; echo form_label('Niños*', 'ninos');echo '</div>';
						 ?>
					        <input type="text" id="ninos" name="blah" />
					        <script type="text/javascript">
					        $(document).ready(function() {
					            $("#ninos").tokenInput("<?php echo base_url(); ?>usuario/ninos/<?php echo $idGuarderia; ?>", {
					                preventDuplicates: true
					            });
					        });
					        </script>
						 <?php 
				        echo form_submit('botonSubmit', 'Enviar');
				        echo form_close();
				    ?>
</div>