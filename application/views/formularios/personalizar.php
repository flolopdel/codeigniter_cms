<div class="contenidoBasico1">
	<div class="formularioEstandar" id="registro-form">
		<div class="container">
			<div class="contentEstandar tamanoimagenes">
				<?php $this -> load -> helper("form");
				echo form_open_multipart($action);
				echo form_hidden("form", "ok");
				echo form_hidden("idGuarderia", $error['idguarderia']);
				echo validation_errors('<div class="cuadroErrores">', '</div>');
				echo '<p><div class="texto-form">Completa el siguiente formulario con las imágenes para personalizar la página de login:</div></p>';
				?>
				<!-- imagen0 -->
				<?php
				if (isset($error['imagen0']) && $error['imagen0'] != "") {
					echo '<div class="label">';
					echo form_label('Logo', 'imagen0');
					echo '</div>';
					echo '<div class="input">';
					?>
					<img src="<?= base_url()."images/diseno/".$error['idguarderia']."/".$error['imagen0'] ?>" alt="imagen0" title="imagen0">
					<?php
					echo form_hidden("imagen0actual", $error['imagen0']);
					echo '</div>';
				}
				echo '<div class="label">';
				echo form_label('Logo', 'imagen0');
				echo '</div>';
				echo form_upload('imagen0');
				echo '<br>';
				?>
				<!-- Imagen 1 -->
				<?php
				if (isset($error['imagen1']) && $error['imagen1'] != "") {
					echo '<div class="label">';
					echo form_label('Imagen 1', 'imagen1');
					echo '</div>';
					echo '<div class="input">';
					?>
					<img src="<?= base_url()."images/diseno/".$error['idguarderia']."/".$error['imagen1'] ?>" alt="logo" title="logo">
					<?php
					echo form_hidden("imagen1actual", $error['imagen1']);
					echo '</div>';
				}
				echo '<div class="label">';
				echo form_label('Imagen 1', 'imagen1');
				echo '</div>';
				echo form_upload('imagen1');
				echo '<br>';
				?>
				<!-- Imagen2 -->
				<?php
				if (isset($error['imagen2']) && $error['imagen2'] != "") {
					echo '<div class="label">';
					echo form_label('Imagen 2', 'imagen2');
					echo '</div>';
					echo '<div class="input">';
					?>
					<img src="<?= base_url()."images/diseno/".$error['idguarderia']."/".$error['imagen2'] ?>" alt="imagen2" title="imagen2">
					<?php
					echo form_hidden("imagen2actual", $error['imagen2']);
					echo '</div>';
				}
				echo '<div class="label">';
				echo form_label('Imagen 2', 'imagen2');
				echo '</div>';
				echo form_upload('imagen2');
				echo '<br>';
				?>
				<!-- imagen3 -->
				<?php
				if (isset($error['imagen3']) && $error['imagen3'] != "") {
					echo '<div class="label">';
					echo form_label('Imagen 3', 'imagen3');
					echo '</div>';
					echo '<div class="input">';
					?>
					<img src="<?= base_url()."images/diseno/".$error['idguarderia']."/".$error['imagen3']  ?>" alt="imagen3" title="imagen3">
					<?php
					echo form_hidden("imagen3actual", $error['imagen3']);
					echo '</div>';
				}
				echo '<div class="label">';
				echo form_label('Imagen 3', 'imagen3');
				echo '</div>';
				echo form_upload('imagen3');
				echo '<br>';
				?>
				<!-- imagen4 -->
				<?php
				if (isset($error['imagen4']) && $error['imagen4'] != "") {
					echo '<div class="label">';
					echo form_label('Imagen 4', 'imagen4');
					echo '</div>';
					echo '<div class="input">';
					?>
					<img id="photo" src="<?= base_url()."images/diseno/".$error['idguarderia']."/".$error['imagen4']  ?>" alt="imagen4" title="imagen4">
					<?php
					echo form_hidden("imagen4actual", $error['imagen4']);
					echo '</div>';
				}
				echo '<div class="label">';
				echo form_label('Imagen 4', 'imagen4');
				echo '</div>';
				echo form_upload('imagen4');
				echo '<br>';
				?>
				<?php
				echo form_submit('botonSubmit', 'Guardar');
				echo form_close();
				?>
			</div><!-- content -->
		</div><!-- container -->
	</div>
</div>