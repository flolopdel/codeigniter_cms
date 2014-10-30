<div class="contenidoBasico2">
	<?php foreach ($clases as $clase) {
	?>
	<div class="infoclases">
		<div class="formularioEstandar" id="registro-form">
			<div class="container">
				<div class="contentEstandar">
					<form>
						<div class="clases">
							<div class="col1">
								<p class="nombre"><a href="<?= base_url() . 'usuario/perfilnino/' . $clase['idnino']?>"><?= $clase['nombrenino'] . " " . $clase['apellidos'] ?></a></p>
								<p class="imagen"><img title="<?= $clase['nombrenino']. " " .$clase['apellidos'] ?>" alt="<?= $clase['nombrenino']. " " .$clase['apellidos'] ?>" src="<?=base_url().$clase['imagenurl'] ?>"></p>
								<?php if(isset($clase['fechanacimiento']) && $clase['fechanacimiento'] != "" && $clase['fechanacimiento'] != "0000-00-00"){ ?>
								<p class="datos"><b>Edad: </b><?= $this->comunes->calcular_edad($clase['fechanacimiento'])?></p>
								<?php } ?>
								<p class="datos"><b>Sexo: </b><?php if($clase['sexo']=="h")echo "Niño"; else echo "Niña" ?></p>	
								<a rel="external" data-role="button" href="<?= base_url() . 'usuario/editarnino/' . $clase['idnino']?>" title="<?= $clase['nombrenino'] . " " . $clase['apellidos'] ?>" alt="<?= $clase['nombrenino'] . " " . $clase['apellidos'] ?>">
									Editar niño
								</a>
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