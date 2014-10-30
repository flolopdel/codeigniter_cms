<div data-role="content">
<h3 class="ui-bar ui-bar-a ui-corner-all"><center>ACCIONES</center>	</h3>	
<div data-role="controlgroup">
		<?php
if(isset($exito) && $exito != ""){
		?>

		<div class="exito">
			<?php
			echo $exito;
			?>
		</div>
		<?php
		}
		?>
		<?php
if ($rol == 1){
		?>
		<a rel="external" data-role="button" href="<?php echo base_url(); ?>registro/empresa">Registrar Empresa</a>
					
		<?php
		}
		?>
		<?php
if ($rol == 1 || $rol == 5){
		?>
		<a rel="external" data-role="button" href="<?php echo base_url(); ?>registro/guarderia">Registrar Guardería</a>
		
		<?php
		}
		?>
		<?php
if ($rol == 1 || $rol == 5 || $rol == 4 || $rol == 3){
		?>
		<a rel="external" data-role="button" href="<?php echo base_url(); ?>registro/familiar">Registrar Familiar</a>
	
		<?php
		}
		?>
		<?php
	if ($rol == 1 || $rol == 5 || $rol == 4){
		?>
		<a rel="external" data-role="button" href="<?php echo base_url(); ?>registro/tutor">Registrar Tutor</a>
		
		<?php
		}
		?>
		<a rel="external" data-theme="e" data-role="button" href="<?php echo base_url(); ?>registro/nino">Registrar Niño</a>

		<?php
if ($rol == 4){
		?>
		<a rel="external" data-role="button" href="<?php echo base_url(); ?>registro/clase">Registrar Clase</a>
		
		<a rel="external" data-role="button" href="<?php echo base_url(); ?>registro/configura_clase">Configurar clases</a>
		<?php
		}
	?>
	</div>
</div>
