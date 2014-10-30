<div class="contenidoBasico1">
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
		<script src="<?php echo base_url(); ?>lightbox/js/lightbox-2.6.min.js"></script>
<link href="<?php echo base_url(); ?>lightbox/css/lightbox.css" rel="stylesheet" />
	<div class="formularioEstandar" id="registro-form">
		<div class="container">
			<div class="contentEstandar" style="float:left;">
				<div class="album" style="overflow:auto; max-height:700px;">
					
				<?php
				$this -> load -> helper("form");
				echo form_open("registro/invitacion");
				echo "<h1 style='clear:both; width:100%;'>Fotos en las que aparezco</h1>";
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

