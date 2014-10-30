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
	<div class="ui-grid-a">
						<div class="ui-block-a">
							<h3 class="ui-bar ui-bar-a ui-corner-all"><?= $nombre ." ". $apellidos ?></h3>
						    <div class="ui-body ui-body-a ui-corner-all">
								<p class="nombre"><?= $nombre ." ". $apellidos ?></p>
								<p class="imagen"><img title="<?= $nombre. " " .$apellidos ?>" alt="<?= $nombre. " " .$apellidos ?>" src="<?=base_url().$imagenurl ?>"></p>
								<?php if(isset($fechanacimiento) && $fechanacimiento != "" && $fechanacimiento != "0000-00-00"){ ?>
								<p class="datos"><b>Edad: </b><?= $this->comunes->calcular_edad($fechanacimiento)?></p>
								<?php } ?>
								<p class="datos"><b>Sexo: </b><?php if($sexo=="h")echo "Hombre"; else echo "Mujer" ?></p>
						    </div>	
						</div>
						<div class="ui-block-b">
							 <?php
							if($rol == 2){
								
							?>
							<h3 class="ui-bar ui-bar-a ui-corner-all">Niños relacionados con el familiar</h3>
						    <div class="ui-body ui-body-a ui-corner-all">
								<?php if(isset($listaninos)){ foreach ($listaninos as $nino) { ?>
							<div data-role="collapsible">
													<h3><a href="<?= base_url() . 'usuario/perfilnino/' . $nino['id']?>"><?= $nino['nombre'] . " " . $nino['apellidos'] ?></a></h3>
													<p class="imagen2"><img title="<?= $nino['nombre'] . " " . $nino['apellidos'] ?>" alt="<?= $nino['nombre'] . " " . $nino['apellidos'] ?>" src="<?=base_url() . $nino['imagenurl'] ?>"></p>
													<?php if(isset($nino['fechanacimiento']) && $nino['fechanacimiento'] != "" && $nino['fechanacimiento']!= "0000-00-00"){ ?>
													<p class="datos"><b>Edad: </b><?= $this -> comunes -> calcular_edad($nino['fechanacimiento']) ?></p>
													<?php } ?>
													<p class="datos"><b>Sexo: </b><?php if($nino['sexo']=="h")echo "Niño"; else echo "Niña" ?></p>
							</div>
							<?php }} ?>
						    </div>	
						 <?php }else if ($rol == 3) { ?> 
							<?php if(isset($listaclases)){ foreach ($listaclases as $clase) { ?>
							<h3 class="ui-bar ui-bar-a ui-corner-all">Clase: <?= $clase['nombre'] ?></h3>
						    <div class="ui-body ui-body-a ui-corner-all">
						    	<a href="<?= base_url() ?>comun/clase/<?= $clase['id'] ?>" title="<?= $clase['nombre'] ?>"> <img src="<?= base_url() ?>images/icofinder/clase.png" title="<?= $clase['nombre'] ?>"  alt="<?= $clase['nombre'] ?>"></a>
								<h3><b>Tutor: </b><a href="<?= base_url() ?>usuario/perfil/<?= $clase['idtutor'] ?>" title="<?= $clase['nombretutor'] ?>"><?= $clase['nombretutor'] ?></a></h3>
								<h3><b>Nº de alumnos: </b><?= $clase['numeroalumnos'] ?></h3>
						    </div>	
							<?php }} ?>
						 <?php }else { ?> 
						 	
						<?php }	?> 
		</div>
	</div> 
	   
</div>
<!-- VISTA VERTICAL -->
<div data-role="content" id="vertical" style="display:block;">
							<h3 class="ui-bar ui-bar-a ui-corner-all"><?= $nombre ." ". $apellidos ?></h3>
						   <a data-theme="b" data-icon="grid" data-role="button" href="<?= base_url() ?>comun/mensaje/<?= $id ?>" title="Enviar mensaje">Mensaje a <?= $nombre ?></a>
								 <div class="ui-body ui-body-a ui-corner-all">
								<p class="nombre"><?= $nombre ." ". $apellidos ?></p>
								<p class="imagen"><img title="<?= $nombre. " " .$apellidos ?>" alt="<?= $nombre. " " .$apellidos ?>" src="<?=base_url().$imagenurl ?>"></p>
								<?php if(isset($fechanacimiento) && $fechanacimiento != "" && $fechanacimiento != "0000-00-00"){ ?>
								<p class="datos"><b>Edad: </b><?= $this->comunes->calcular_edad($fechanacimiento)?></p>
								<?php } ?>
								<p class="datos"><b>Sexo: </b><?php if($sexo=="h")echo "Hombre"; else echo "Mujer" ?></p>
						    </div>	
							 <?php
							if($rol == 2){
								
							?>
							<h3 class="ui-bar ui-bar-a ui-corner-all">Niños relacionados con el familiar</h3>
						    <div class="ui-body ui-body-a ui-corner-all">
								<?php if(isset($listaninos)){ foreach ($listaninos as $nino) { ?>
							<div data-role="collapsible">
													<h3><a href="<?= base_url() . 'usuario/perfilnino/' . $nino['id']?>"><?= $nino['nombre'] . " " . $nino['apellidos'] ?></a></h3>
													<p class="imagen2"><img title="<?= $nino['nombre'] . " " . $nino['apellidos'] ?>" alt="<?= $nino['nombre'] . " " . $nino['apellidos'] ?>" src="<?=base_url() . $nino['imagenurl'] ?>"></p>
													<?php if(isset($nino['fechanacimiento']) && $nino['fechanacimiento'] != "" && $nino['fechanacimiento']!= "0000-00-00"){ ?>
													<p class="datos"><b>Edad: </b><?= $this -> comunes -> calcular_edad($nino['fechanacimiento']) ?></p>
													<?php } ?>
													<p class="datos"><b>Sexo: </b><?php if($nino['sexo']=="h")echo "Niño"; else echo "Niña" ?></p>
							</div>
							<?php }} ?>
						    </div>	
						 <?php }else if ($rol == 3) { ?> 
							<?php $primen = true; if(isset($listaclases)){ foreach ($listaclases as $clase) { 
								if($primen){ $primen=false; ?>
								
						<div data-role="collapsible"  data-collapsed="false">
							<h3 >Clase: <?= $clase['nombre'] ?></h3>
						    <div class="ui-body ui-body-a ui-corner-all">
						    	<a data-icon="arrow-r" data-role="button" href="<?= base_url() ?>comun/clase/<?= $clase['id'] ?>" title="<?= $clase['nombre'] ?>">Ir a la clase <?= $clase['nombre'] ?></a>
								<h3><b>Tutor: </b><a href="<?= base_url() ?>usuario/perfil/<?= $clase['idtutor'] ?>" title="<?= $clase['nombretutor'] ?>"><?= $clase['nombretutor'] ?></a></h3>
								<h3><b>Nº de alumnos: </b><?= $clase['numeroalumnos'] ?></h3>
						    </div>
						    </div>
						    <?php  }else{ ?>
								
						<div data-role="collapsible">
							<h3 >Clase: <?= $clase['nombre'] ?></h3>
						    <div class="ui-body ui-body-a ui-corner-all">
						    	<a data-icon="arrow-r" data-role="button" href="<?= base_url() ?>comun/clase/<?= $clase['id'] ?>" title="<?= $clase['nombre'] ?>">Ir a la clase <?= $clase['nombre'] ?></a>
								<h3><b>Tutor: </b><a href="<?= base_url() ?>usuario/perfil/<?= $clase['idtutor'] ?>" title="<?= $clase['nombretutor'] ?>"><?= $clase['nombretutor'] ?></a></h3>
								<h3><b>Nº de alumnos: </b><?= $clase['numeroalumnos'] ?></h3>
						    </div>
						    </div>
							<?php }}} ?>
						 <?php }else { ?> 
						 	
						<?php }	?> 
	   
</div>