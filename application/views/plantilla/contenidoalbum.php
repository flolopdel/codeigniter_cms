<?php if($album == "subir"){ ?>
	<script src="<?php echo base_url(); ?>lightbox/js/lightbox-2.6.min.js"></script>
<link href="<?php echo base_url(); ?>lightbox/css/lightbox.css" rel="stylesheet" />
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
				echo form_open_multipart("comun/subirimagen1");
						echo form_hidden("form", "ok");
				echo "<h1 style='clear:both; width:100%;'>1. Selecciona la imagen</h1>";
						echo validation_errors('<div class="cuadroErrores">','</div>');
				 echo '<div class="label">'; echo form_label('Imagen', 'imagen0');echo '</div>';
				 echo form_upload('imagen0');echo '<br>';  
				echo '<br>';
				echo '<div class="label">';
				echo '</div>';
				echo '<div class="label">';
				echo '</div>';
				echo '<div class="label">';
				echo '</div>';
				echo form_submit('botonSubmit', 'Siguiente');
				echo form_close();
				?>
				</div>
			</div>
		</div><!-- content -->
	</div><!-- container -->
</div>
<?php }else{ ?>
<script src="<?php echo base_url(); ?>lightbox/js/lightbox-2.6.min.js"></script>
<link href="<?php echo base_url(); ?>lightbox/css/lightbox.css" rel="stylesheet" />
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
				<div class="album" style="overflow:auto; max-height:700px;">
					
				<?php
				$this -> load -> helper("form");
				echo form_open("registro/invitacion");
				if($album == "subidas"){
					echo "<h1 style='clear:both; width:100%;'>Subidas por mi</h1>";
				}else{
					echo "<h1 style='clear:both; width:100%;'>Fotos en las que aparezco</h1>";
				}
				if(isset ($errorpass) && $errorpass != ""){
					echo '<div class="cuadroErrores">'.$errorpass.'</div>';
				}else{
					foreach ($listaimagenes as $imagen) {
						?>
						<a id="<?=$imagen['imagen']?>" href="<?= base_url().'images/galeria/'.$imagen['imagen']?>" data-lightbox="album" title="<?=$imagen['imagen']?>" name="<?=$imagen['etiquetas']?>">
							<img src="<?= base_url().'images/galeria/'.$imagen['imagen']?>"/>
						</a>	
					<?php }} ?>
				</div>
			</div>
		</div><!-- content -->
	</div><!-- container -->
</div>
<?php } ?>

