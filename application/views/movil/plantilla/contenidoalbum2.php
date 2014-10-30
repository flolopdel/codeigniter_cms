
<script type="text/javascript">
$(document).ready(function() {
    $("#ninos").tokenInput("<?php echo base_url(); ?>usuario/usuarios/<?php echo $this->session->userdata('guarderia'); ?>", {
        preventDuplicates: true
    });
});
</script>
<style>
div.ui-input-text>:first-child
{
display:none;
}
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/token-input.css" type="text/css" />
<div data-role="content">
	<h3 class="ui-bar ui-bar-a ui-corner-all"><center>GALERÍA</center></h3>
	<?php if($this->session->userdata('rol') != "2"){ ?>
	<div class="ui-grid-b">
	<div class="ui-block-a"><div class="ui-bar ui-bar-a"><a rel="external" href="<?php echo base_url(); ?>comun/album/salgo">Etiquetas</a></div></div>
	<div class="ui-block-b"><div class="ui-bar ui-bar-a"><a href="<?php echo base_url(); ?>comun/album/subidas">Subidas</a></div></div>
	<div class="ui-block-c"><div class="ui-bar ui-bar-a"><a href="<?php echo base_url(); ?>comun/album/subir">Subir</a></div></div>
	</div>
	<? } ?>
		<div class="album2" style="overflow:auto; max-height:700px;">
					
				<?php
				$this -> load -> helper("form");
				echo form_open("comun/subirimagen2");
				echo '<h3 class="ui-bar ui-bar-a ui-corner-all">2. Etiquetas de la foto</h3>';
				echo "<img style='width:75%; height:auto;' src='".base_url()."images/galeria/$imagen' title='$imagen' alt='$imagen'>";
						echo form_hidden("form", "ok");
						echo form_hidden("idimagen", $idimagen);
						echo validation_errors('<div class="cuadroErrores">','</div>');
				echo '<div class="label">'; echo form_label('En esta foto aparece:', 'usuarios');echo '</div>';
						 ?>
					        <input type="text" id="ninos" name="blah" />
						 <?php 
				echo '<br>';
				echo form_submit('botonSubmit', 'Finalizar','data-theme="b" data-icon="arrow-r"');
				echo form_close();
				?>
		</div>		   
</div>
