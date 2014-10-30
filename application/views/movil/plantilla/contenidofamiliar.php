
	<div data-role="content">
		<?php if ($this -> session -> userdata('exito')){ ?>
						<p style="color:red;">
							<center>
								<?= $this -> session -> userdata('exito')  ?>
							</center>
						</p>
						<?php 
							$array_items = array('exito' => '');
							$this->session->unset_userdata($array_items);
						 ?>
					<?php }?>
	<h3 class="ui-bar ui-bar-a ui-corner-all">Mis alumnos</h3>
		<?php 
		$primen = true;
		foreach ($clases as $clase) {
			if($primen){
				$primen = false;
				?>
				<div data-role="collapsible" data-collapsed="false">
				<h3><?= $clase['nombrenino'] . " " . $clase['apellidos'] ?></h3>
				<p>		
					<div class="ui-grid-a">
						<div class="ui-block-a">
							<a rel="external" href="<?= base_url() . 'usuario/perfilnino/' . $clase['idnino']?>" title="<?= $clase['nombrenino'] . " " . $clase['apellidos'] ?>" alt="<?= $clase['nombrenino'] . " " . $clase['apellidos'] ?>">
								<img title="<?= $clase['nombrenino'] . " " . $clase['apellidos'] ?>" alt="<?= $clase['nombrenino'] . " " . $clase['apellidos'] ?>" src="<?=base_url() . $clase['imagenurl'] ?>">
							</a>	
							<a rel="external" data-role="button" href="<?= base_url() . 'usuario/editarnino/' . $clase['idnino']?>" title="<?= $clase['nombrenino'] . " " . $clase['apellidos'] ?>" alt="<?= $clase['nombrenino'] . " " . $clase['apellidos'] ?>">
								Editar niño
							</a>				
						</div>
						<div class="ui-block-b">
							<?php if(isset($clase['fechanacimiento']) && $clase['fechanacimiento'] != "" && $clase['fechanacimiento'] != "0000-00-00"){ ?>
							<p class="datos"><b>Edad: </b><?= $this -> comunes -> calcular_edad($clase['fechanacimiento']) ?> años</p>
							<?php } ?>
							<p class="datos"><b>Sexo: </b><?php if($clase['sexo']=="h")echo "Niño"; else echo "Niña" ?></p>
							<p class="datos"><b>Clase:</b><a href="<?= base_url() ?>comun/clase/<?= $clase['id'] ?>" title="<?= $clase['nombre'] ?>"> <?= $clase['nombre'] ?></a></p>
							<p class="datos"><b>Tutor: </b><a href="<?= base_url() ?>usuario/perfil/<?= $clase['idtutor'] ?>" title="<?= $clase['nombretutor'] ?>"><?= $clase['nombretutor'] ?></a></p>
							<p class="datos"><b>Nº de alumnos: </b><?= $clase['numeroalumnos'] ?></p>
							
						</div>
					</div><!-- /grid-a -->
				</p>
				</div>
				<?php
				}else{
	?>
	
	<div data-role="collapsible">
				<h3><?= $clase['nombrenino'] . " " . $clase['apellidos'] ?></h3>
				<p>		
					<div class="ui-grid-a">
						<div class="ui-block-a">
							<a rel="external" href="<?= base_url() . 'usuario/perfilnino/' . $clase['idnino']?>" title="<?= $clase['nombrenino'] . " " . $clase['apellidos'] ?>" alt="<?= $clase['nombrenino'] . " " . $clase['apellidos'] ?>">
								<img title="<?= $clase['nombrenino'] . " " . $clase['apellidos'] ?>" alt="<?= $clase['nombrenino'] . " " . $clase['apellidos'] ?>" src="<?=base_url() . $clase['imagenurl'] ?>">
							</a>	
							<a rel="external" data-role="button" href="<?= base_url() . 'usuario/editarnino/' . $clase['idnino']?>" title="<?= $clase['nombrenino'] . " " . $clase['apellidos'] ?>" alt="<?= $clase['nombrenino'] . " " . $clase['apellidos'] ?>">
								Editar niño
							</a>				
						</div>
						<div class="ui-block-b">
							<?php if(isset($clase['fechanacimiento']) && $clase['fechanacimiento'] != "" && $clase['fechanacimiento'] != "0000-00-00"){ ?>
							<p class="datos"><b>Edad: </b><?= $this -> comunes -> calcular_edad($clase['fechanacimiento']) ?> años</p>
							<?php } ?>
							<p class="datos"><b>Sexo: </b><?php if($clase['sexo']=="h")echo "Niño"; else echo "Niña" ?></p>
							<p class="datos"><b>Clase:</b><a href="<?= base_url() ?>comun/clase/<?= $clase['id'] ?>" title="<?= $clase['nombre'] ?>"> <?= $clase['nombre'] ?></a></p>
							<p class="datos"><b>Tutor: </b><a href="<?= base_url() ?>usuario/perfil/<?= $clase['idtutor'] ?>" title="<?= $clase['nombretutor'] ?>"><?= $clase['nombretutor'] ?></a></p>
							<p class="datos"><b>Nº de alumnos: </b><?= $clase['numeroalumnos'] ?></p>
						</div>
					</div><!-- /grid-a -->
				</p>
	</div>
	<!-- <div class="infoclases">
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
							</div>
							<div class="col23">
								<h1>Clase:<a href="<?= base_url() ?>comun/clase/<?= $clase['id'] ?>" title="<?= $clase['nombre'] ?>"> <?= $clase['nombre'] ?></a></h1>
								<h3><b>Tutor: </b><a href="<?= base_url() ?>usuario/perfil/<?= $clase['idtutor'] ?>" title="<?= $clase['nombretutor'] ?>"><?= $clase['nombretutor'] ?></a></h3>
								<h3><b>Nº de alumnos: </b><?= $clase['numeroalumnos'] ?></h3>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> -->
	<?php
		}}
	?>	
	</div>