
<div class="contenidoBasico1">
	<div class="infoperfil">
				<div class="formularioEstandar">
		        <div class="container">
					<div class="contentEstandar">
							<form>
								<p class="nombre"><?= $nombre . " " . $apellidos ?></p>
								<p class="imagen"><img title="<?= $nombre . " " . $apellidos ?>" alt="<?= $nombre . " " . $apellidos ?>" src="<?=base_url() . $imagenurl ?>"></p>
								<?php if(isset($fechanacimiento) && $fechanacimiento != "" && $fechanacimiento != "0000-00-00"){ ?>
								<p class="datos"><b>Edad: </b><?= $this -> comunes -> calcular_edad($fechanacimiento) ?></p>
								<?php } ?>
								<p class="datos"><b>Sexo: </b><?php if($sexo=="h")echo "Niño"; else echo "Niña" ?></p>
								<h2>Clase</h2>
								<p class="nombre"><a href="<?= base_url() . 'comun/clase/' . $clase['id']?>" title="Ir a <?=$clase['nombre']?>"><?= $clase['nombre'] ?></a></p>
								<h2>Tutor</h2>
								<p class="nombre"><a href="<?= base_url() . 'usuario/perfil/' . $tutor[0]['id']?>" title="Ver perfil de <?= $tutor[0]['nombre'] . " " . $tutor[0]['apellidos'] ?>"><?= $tutor[0]['nombre'] . " " . $tutor[0]['apellidos'] ?></a></p>
								<p class="imagen"><img title="<?= $tutor[0]['nombre'] . " " . $tutor[0]['apellidos'] ?>" alt="<?= $tutor[0]['nombre'] . " " . $tutor[0]['apellidos'] ?>" src="<?=base_url() . $tutor[0]['imagenurl'] ?>"></p>
								<!-- <p class="datos"><b>Edad: </b><?= $this -> comunes -> calcular_edad($tutor[0]['fechanacimiento']) ?></p>
								<p class="datos"><b>Sexo: </b><?php if($tutor[0]['sexo']=="h")echo "Hombre"; else echo "Mujer" ?></p> -->
							</form>
					</div><!-- content -->
				</div><!-- container -->
	        </div>
	  </div>   
	<div class="infodetalleclase">
		<div >
			<div class="formularioEstandar" id="registro-form">
					<div class="container">
						<div class="contentEstandar">
							<form>	
							<h1>Familiares</h1>
							</form>
						</div><!-- content -->
					</div><!-- container -->
			</div>
		</div>
							<?php if(isset($familiares)){ foreach ($familiares as $nino) {
							?>
		<div class="nino">
			<div class="formularioEstandar" id="registro-form">
				<div class="container">
					<div class="contentEstandar">
						<form>
							<div class="infonino">
								<h3><a href="<?= base_url() . 'usuario/perfil/' . $nino['id']?>"><?= $nino['nombre'] . " " . $nino['apellidos'] ?></a></h3>
								<p class="imagen2"><img title="<?= $nino['nombre'] . " " . $nino['apellidos'] ?>" alt="<?= $nino['nombre'] . " " . $nino['apellidos'] ?>" src="<?=base_url() . $nino['imagenurl'] ?>"></p>
								<?php if(isset($nino['fechanacimiento']) && $nino['fechanacimiento'] != "" && $nino['fechanacimiento']!= "0000-00-00"){ ?>
								<p class="datos"><b>Edad: </b><?= $this -> comunes -> calcular_edad($nino['fechanacimiento']) ?></p>
								<?php } ?>
								<p class="datos"><b>Sexo: </b><?php if($nino['sexo']=="h")echo "Niño"; else echo "Niña" ?></p>
							</div>
						</form>
					</div><!-- content -->
				</div><!-- container -->
			</div>
		</div>
							<?php
							}
							}
							?>
	</div> 
</div>