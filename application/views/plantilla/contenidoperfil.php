<div class="contenidoBasico1">
	<div class="infoperfil">
				<div class="formularioEstandar">
		        <div class="container">
					<div class="contentEstandar">
							<form>
								<p class="nombre"><?= $nombre ." ". $apellidos ?></p>
								<p class="imagen"><img title="<?= $nombre. " " .$apellidos ?>" alt="<?= $nombre. " " .$apellidos ?>" src="<?=base_url().$imagenurl ?>"></p>
								<?php if(isset($fechanacimiento) && $fechanacimiento != "" && $fechanacimiento != "0000-00-00"){ ?>
								<p class="datos"><b>Edad: </b><?= $this->comunes->calcular_edad($fechanacimiento)?></p>
								<?php } ?>
								<p class="datos"><b>Sexo: </b><?php if($sexo=="h")echo "Hombre"; else echo "Mujer" ?></p>
							</form>
					</div><!-- content -->
				</div><!-- container -->
	        </div>
	  </div> 
	    <?php
							if($rol == 2){
								
							?>
		<div class="infodetalleclase">
		<div >
			<div class="formularioEstandar" id="registro-form">
					<div class="container">
						<div class="contentEstandar">
							<form>	
							<h1>Niños relacionados con el familiar</h1>
							</form>
						</div><!-- content -->
					</div><!-- container -->
			</div>
		</div>
		<?php if(isset($listaninos)){ foreach ($listaninos as $nino) { ?>
		<div class="nino">
			<div class="formularioEstandar" id="registro-form">
				<div class="container">
					<div class="contentEstandar">
						<form>
							<div class="infonino">
								<h3><a href="<?= base_url() . 'usuario/perfilnino/' . $nino['id']?>"><?= $nino['nombre'] . " " . $nino['apellidos'] ?></a></h3>
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
		<?php }} ?>
	</div>  
	 <?php }else if ($rol == 3) { ?> 
	 	<div class="infodetalleclase">
		<?php if(isset($listaclases)){ foreach ($listaclases as $clase) { ?>
		<div>
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
		<?php }} ?>
	</div>  
	 <?php }else { ?> 
	 	
	<?php }	?> 
</div>