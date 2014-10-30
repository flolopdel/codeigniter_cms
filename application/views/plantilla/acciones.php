<div class="contenidoBasico1">
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
		<div class="accion">
			<div class="formularioEstandar">
				<div class="container">
					<div class="contentEstandar">
						<form>
							<a href="<?php echo base_url(); ?>registro/empresa"><h2> Registrar Empresa</h2></a>
						</form>
					</div><!-- content -->
				</div><!-- container -->
			</div>
		</div>
		<?php
		}
		?>
		<?php
if ($rol == 1 || $rol == 5){
		?>
		<div class="accion">
			<div class="formularioEstandar">
				<div class="container">
					<div class="contentEstandar">
						<form>
							<a href="<?php echo base_url(); ?>registro/guarderia"><h2> Registrar Guardería</h2></a>
						</form>
					</div><!-- content -->
				</div><!-- container -->
			</div>
		</div>
		<?php
		}
		?>
		<?php
if ($rol == 1 || $rol == 5 || $rol == 4 || $rol == 3){
		?>
		<div class="accion">
			<div class="formularioEstandar">
				<div class="container">
					<div class="contentEstandar">
						<form>
							<a href="<?php echo base_url(); ?>registro/familiar"><h2> Registrar Familiar</h2></a>
						</form>
					</div><!-- content -->
				</div><!-- container -->
			</div>
		</div>
		<?php
		}
		?>
		<?php
	if ($rol == 1 || $rol == 5 || $rol == 4){
		?>
		<div class="accion">
			<div class="formularioEstandar">
				<div class="container">
					<div class="contentEstandar">
						<form>
							<a href="<?php echo base_url(); ?>registro/tutor"><h2> Registrar Tutor</h2></a>
						</form>
					</div><!-- content -->
				</div><!-- container -->
			</div>
		</div>
		<?php
		}
		?>
		<div class="accion">
			<div class="formularioEstandar">
				<div class="container">
					<div class="contentEstandar">
						<form>
							<a href="<?php echo base_url(); ?>registro/nino"><h2> Registrar Niño</h2></a>
						</form>
					</div><!-- content -->
				</div><!-- container -->
			</div>
		</div>

		<?php
if ($rol == 4){
		?>
		<div class="accion">
			<div class="formularioEstandar">
				<div class="container">
					<div class="contentEstandar">
						<form>
							<a href="<?php echo base_url(); ?>registro/clase"><h2> Registrar Clase</h2></a>
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
							<a href="<?php echo base_url(); ?>registro/configura_clase"><h2> Configurar clases</h2></a>
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
							<a href="<?php echo base_url(); ?>registro/enviar_invitacion"><h2> Enviar invitación</h2></a>
						</form>
					</div><!-- content -->
				</div><!-- container -->
			</div>
		</div>
		<?php
		}
	?>
	</div>
