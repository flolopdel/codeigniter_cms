<div class="contenidoBasico1">
	<?php foreach ($clases as $clase) {
	?>
	<div class="infoclases">
		<div class="formularioEstandar" id="registro-form">
			<div class="container">
				<div class="contentEstandar">
					<form>
						<div class="clases">
							<div class="col1">
								<img src="<?= base_url() ?>images/icofinder/clase.png" title="<?= $clase['nombre'] ?>"  alt="<?= $clase['nombre'] ?>">
							</div>
							<div class="col23">
								<h1>Clase:<a href="<?= base_url() ?>comun/clase/<?= $clase['id'] ?>" title="<?= $clase['nombre'] ?>"> <?= $clase['nombre'] ?></a></h1>
								<h3><b>Tutor: </b><a href="<?= base_url() ?>usuario/perfil/<?= $clase['idtutor'] ?>" title="<?= $clase['nombretutor'] ?>"><?= $clase['nombretutor'] ?></a></h3>
								<h3><b>Nº de alumnos: </b><?= $clase['numeroalumnos'] ?></h3>
							</div>
						</div>
					</form>
				</div><!-- content -->
			</div><!-- container -->
		</div>
	</div>
	<?php	
	}
	?>
</div>