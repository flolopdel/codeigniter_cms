
<div data-role="content">
			<h3 class="ui-bar ui-bar-a ui-corner-all"><?= $nombre . " " . $apellidos ?></h3>
			<div class="ui-body ui-body-a ui-corner-all">
					<div class="ui-grid-a">
						<div class="ui-block-a">
								<p class="imagen"><img title="<?= $nombre . " " . $apellidos ?>" alt="<?= $nombre . " " . $apellidos ?>" src="<?=base_url() . $imagenurl ?>"></p>
						</div>
						<div class="ui-block-b">
								<?php if(isset($fechanacimiento) && $fechanacimiento != "" && $fechanacimiento != "0000-00-00"){ ?>
								<p class="datos"><b>Edad: </b><?= $this -> comunes -> calcular_edad($fechanacimiento) ?></p>
								<?php } ?>
								<p class="datos"><b>Sexo: </b><?php if($sexo=="h")echo "Niño"; else echo "Niña" ?></p>
								<p class="datos"><b>Clase: </b><a href="<?= base_url() . 'comun/clase/' . $clase['id'] ?>" title="Ir a <?=$clase['nombre'] ?>"><?= $clase['nombre'] ?></a></p>
								<p class="nombre"><b>Tutor: </b><a href="<?= base_url() . 'usuario/perfil/' . $tutor[0]['id'] ?>" title="Ver perfil de <?= $tutor[0]['nombre'] . " " . $tutor[0]['apellidos'] ?>"><?= $tutor[0]['nombre'] . " " . $tutor[0]['apellidos'] ?></a></p>
						</div>
					</div>
							
			</div>
			
			<h3 class="ui-bar ui-bar-a ui-corner-all">Familiares</h3>
		    <?php if(isset($familiares)){ foreach ($familiares as $nino) {
							?>
			<div class="ui-body ui-body-a ui-corner-all">
					<div data-role="collapsible">
											<h3><?= $nino['nombre'] . " " . $nino['apellidos'] ?></h3>
											<a href="<?= base_url() . 'usuario/perfil/' . $nino['id']?>"><p class="imagen2"><img title="<?= $nino['nombre'] . " " . $nino['apellidos'] ?>" alt="<?= $nino['nombre'] . " " . $nino['apellidos'] ?>" src="<?=base_url() . $nino['imagenurl'] ?>"></p></a>
											<?php if(isset($nino['fechanacimiento']) && $nino['fechanacimiento'] != "" && $nino['fechanacimiento']!= "0000-00-00"){ ?>
											<p class="datos"><b>Edad: </b><?= $this -> comunes -> calcular_edad($nino['fechanacimiento']) ?></p>
											<?php } ?>
											<p class="datos"><b>Sexo: </b><?php if($nino['sexo']=="h")echo "Hombre"; else echo "Mujer" ?></p>
											
							</div>	
		    </div>
							<?php
							}
							}
							?>	
</div>
						
