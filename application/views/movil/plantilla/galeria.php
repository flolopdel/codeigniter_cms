
<script src="<?php echo base_url(); ?>lightbox/js/lightbox-2.6.min.js"></script>
<link href="<?php echo base_url(); ?>lightbox/css/lightbox.css" rel="stylesheet" />
<style>
	.lightbox{
		display:none;
	}
</style>
<div data-role="content">
	<h3 class="ui-bar ui-bar-a ui-corner-all"><center>GALERÍA</center></h3>
	<?php if($this->session->userdata('rol') != "2"){ ?>
	<div class="ui-grid-b">
	<div class="ui-block-a"><div class="ui-bar ui-bar-a"><a rel="external" href="<?php echo base_url(); ?>comun/album/salgo">Etiquetas</a></div></div>
	<div class="ui-block-b"><div class="ui-bar ui-bar-a"><a href="<?php echo base_url(); ?>comun/album/subidas">Subidas</a></div></div>
	<div class="ui-block-c"><div class="ui-bar ui-bar-a"><a href="<?php echo base_url(); ?>comun/album/subir">Subir</a></div></div>
	</div>
	<? } ?>
		<div class="album2">
					
				<?php
				$this -> load -> helper("form");
				echo form_open("registro/invitacion");
				echo '<h3 class="ui-bar ui-bar-a ui-corner-all">Fotos en las que aparezco</h3>';
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