
<div class="contenidoBasico1">
	<?php if($this->session->userdata('rol') != "2"){ ?>
	<div class="accion">
			<div class="formularioEstandar">
				<div class="container">
					<div class="contentEstandar">
						<form>
							<a href="<?php echo base_url(); ?>comun/album/salgo"><h2>Fotos en las que salgo</h2></a>
						</form>
					</div><!-- content -->
				</div><!-- container -->
			</div>
		</div>
	<div class="accion">
			<div class="formularioEstandar">
				<div class="container">
					<div class="contentEstandar">
						<form>
							<a href="<?php echo base_url(); ?>comun/album/subidas"><h2>Fotos subidas por mi</h2></a>
						</form>
					</div><!-- content -->
				</div><!-- container -->
			</div>
		</div>
	<div class="accion">
			<div class="formularioEstandar">
				<div class="container">
					<div class="contentEstandar">
						<form>
							<a href="<?php echo base_url(); ?>comun/album/subir"><h2>Subir imagen</h2></a>
						</form>
					</div><!-- content -->
				</div><!-- container -->
			</div>
		</div>
		<? } ?>
	<div class="formularioEstandar" id="registro-form">
		<div class="container">
			<div class="contentEstandar" style="float:left;">
				<div class="album">
				<?php
				$this -> load -> helper("form");
				echo form_open("comun/subirimagen2");
				echo "<h1 style='clear:both; width:100%;'>2. Etiquetas de la foto</h1>";
				echo "<img style='width:75%; height:auto;' src='".base_url()."images/galeria/$imagen' title='$imagen' alt='$imagen'>";
						echo form_hidden("form", "ok");
						echo form_hidden("idimagen", $idimagen);
						echo validation_errors('<div class="cuadroErrores">','</div>');
				echo '<div class="label">'; echo form_label('En esta foto aparece:', 'usuarios');echo '</div>';
						 ?>
					        <input type="text" id="ninos" name="blah" />
					        <script type="text/javascript">
					        $(document).ready(function() {
					            $("#ninos").tokenInput("<?php echo base_url(); ?>usuario/usuarios/<?php echo $this->session->userdata('guarderia'); ?>", {
					                preventDuplicates: true
					            });
					        });
					        </script>
						 <?php 
				echo '<br>';
				echo '<div class="label">';
				echo '</div>';
				echo '<div class="label">';
				echo '</div>';
				echo '<div class="label">';
				echo '</div>';
				echo form_submit('botonSubmit', 'Finalizar');
				echo form_close();
				?>
				</div>
			</div>
		</div><!-- content -->
	</div><!-- container -->
</div>