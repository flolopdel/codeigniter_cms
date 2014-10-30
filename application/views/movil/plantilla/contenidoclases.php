<script>
	$(window).bind("orientationchange", function(event) {
		if (event.orientation == "portrait"){
			$("#horizontal").css("display", "none");
			$("#vertical").css("display", "block");
		}else if (event.orientation == "landscape"){
			$("#horizontal").css("display", "block");
			$("#vertical").css("display", "none");
		}else{
			$("#horizontal").css("display", "none");
			$("#vertical").css("display", "block");
		}
	}); 
</script>
<!-- VISTA HORINZONTAL -->
<div data-role="content" id="horizontal" style="display:none;">
	<div data-role="collapsible"  data-collapsed="false">
		<h4>Clase: <?= $clase['nombre'] ?></h4>
							<a data-role="button" href="<?= base_url() . 'usuario/perfil/' . $tutor['id']?>">Tutor: <?= $tutor['nombre'] . " " . $tutor['apellidos'] ?></a>
						    <!-- <div class="ui-body ui-body-a ui-corner-all">
								<p class="nombre"><?= $tutor['nombre'] . " " . $tutor['apellidos'] ?></p>
								<p class="imagen"><img title="<?= $tutor['nombre'] . " " . $tutor['apellidos'] ?>" alt="<?= $tutor['nombre'] . " " . $tutor['apellidos'] ?>" src="<?=base_url() . $tutor['imagenurl'] ?>"></p>
								<p class="datos"><b>Edad: </b><?= $this -> comunes -> calcular_edad($tutor['fechanacimiento']) ?></p>
								<p class="datos"><b>Sexo: </b><?php if($tutor['sexo']=="h")echo "Hombre"; else echo "Mujer" ?></p>		
						    </div>	 -->	
							<h3 class="ui-bar ui-bar-a ui-corner-all">Alumnos</h3>
							<?php if($this->session->userdata('rol') == '3' && $this->session->userdata('id') == $tutor['id']){ ?>
							 <a rel="external" data-role="button" href="<?= base_url() . 'registro/diario/'.$clase['id'] ?>">Completar información diaria</a>
						   	<?php } ?>
						    <div class="ui-body ui-body-a ui-corner-all"><div class="ui-grid-d">
							<?php if(isset($listafamiliares)){ foreach ($listanino as $nino) {
							?>
   							<div class="ui-block-e"><div class="ui-bar ui-bar-e"><center><b><?= $nino['nombre'] . " " . $nino['apellidos'] ?></b></center>
   								
											<a href="<?= base_url() . 'usuario/perfilnino/' . $nino['id']?>">
												<img title="<?= $nino['nombre'] . " " . $nino['apellidos'] ?>" alt="<?= $nino['nombre'] . " " . $nino['apellidos'] ?>" src="<?=base_url() . $nino['imagenurl'] ?>">
											</a>
   							</div></div>
							<!-- <div data-role="collapsible">
											<h3><a href="<?= base_url() . 'usuario/perfilnino/' . $nino['id']?>"><?= $nino['nombre'] . " " . $nino['apellidos'] ?></a></h3>
											<a href="<?= base_url() . 'usuario/perfilnino/' . $nino['id']?>"><p class="imagen2"><img title="<?= $nino['nombre'] . " " . $nino['apellidos'] ?>" alt="<?= $nino['nombre'] . " " . $nino['apellidos'] ?>" src="<?=base_url() . $nino['imagenurl'] ?>"></p></a>
											<?php if(isset($nino['fechanacimiento']) && $nino['fechanacimiento'] != "" && $nino['fechanacimiento']!= "0000-00-00"){ ?>
											<p class="datos"><b>Edad: </b><?= $this -> comunes -> calcular_edad($nino['fechanacimiento']) ?></p>
											<?php } ?>
											<p class="datos"><b>Sexo: </b><?php if($nino['sexo']=="h")echo "Niño"; else echo "Niña" ?></p>
											
							</div> -->
							<?php
							}
							}else{
								?>
								Añadir niño
								<?php
							}
							?>
			</div><!-- /grid-c -->
						</div>
	</div>
</div>
<!-- VISTA VERTICAL -->
<div data-role="content" id="vertical"  style="display:block;">
							<h3 class="ui-bar ui-bar-a ui-corner-all">Clase: <?= $clase['nombre'] ?></h3>
							<a rel="external" data-role="button" href="<?= base_url() . 'usuario/perfil/' . $tutor['id']?>">Tutor: <?= $tutor['nombre'] . " " . $tutor['apellidos'] ?></a>
						    <!-- <h3 class="ui-bar ui-bar-a ui-corner-all">Tutor</h3>
						    <div class="ui-body ui-body-a ui-corner-all">
								<p class="nombre"><?= $tutor['nombre'] . " " . $tutor['apellidos'] ?></p>
								<p class="imagen"><img title="<?= $tutor['nombre'] . " " . $tutor['apellidos'] ?>" alt="<?= $tutor['nombre'] . " " . $tutor['apellidos'] ?>" src="<?=base_url() . $tutor['imagenurl'] ?>"></p>
								<p class="datos"><b>Edad: </b><?= $this -> comunes -> calcular_edad($tutor['fechanacimiento']) ?></p>
								<p class="datos"><b>Sexo: </b><?php if($tutor['sexo']=="h")echo "Hombre"; else echo "Mujer" ?></p>		
						    </div>	 -->	
							<h3 class="ui-bar ui-bar-a ui-corner-all">Alumnos</h3>
							<?php if($this->session->userdata('rol') == '3' && $this->session->userdata('id') == $tutor['id']){ ?>
							 <a rel="external" data-role="button" href="<?= base_url() . 'registro/diario/'.$clase['id']  ?>">Completar información diaria</a>
						   <?php } ?>
						    <div class="ui-body ui-body-a ui-corner-all">
							<?php if(isset($listafamiliares)){ foreach ($listanino as $nino) {
							?>
							<div data-role="collapsible">
											<h3><a href="<?= base_url() . 'usuario/perfilnino/' . $nino['id']?>"><?= $nino['nombre'] . " " . $nino['apellidos'] ?></a></h3>
											<a href="<?= base_url() . 'usuario/perfilnino/' . $nino['id']?>"><p class="imagen2"><img title="<?= $nino['nombre'] . " " . $nino['apellidos'] ?>" alt="<?= $nino['nombre'] . " " . $nino['apellidos'] ?>" src="<?=base_url() . $nino['imagenurl'] ?>"></p></a>
											<?php if(isset($nino['fechanacimiento']) && $nino['fechanacimiento'] != "" && $nino['fechanacimiento']!= "0000-00-00"){ ?>
											<p class="datos"><b>Edad: </b><?= $this -> comunes -> calcular_edad($nino['fechanacimiento']) ?></p>
											<?php } ?>
											<p class="datos"><b>Sexo: </b><?php if($nino['sexo']=="h")echo "Niño"; else echo "Niña" ?></p>
											
							</div>
							<?php
							}
							}else{
								?>
		<a rel="external" data-theme="e" data-role="button" href="<?php echo base_url(); ?>registro/nino">Registrar Niño</a>
								<?php
							}
							?>
						</div>
</div>
