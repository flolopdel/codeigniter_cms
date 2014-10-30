<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox({
			maxWidth : 800,
			maxHeight : 600,
			fitToView : false,
			width : '70%',
			height : '70%',
			autoSize : true,
			closeClick : false,
			openEffect : 'none',
			closeEffect : 'none',
			afterClose : function() {
				window.location.reload();
			},
		});
	}); 
</script>

<div class="contenidoBasico2">
	<div class="infoperfil">
				<div class="formularioEstandar">
		        <div class="container">
					<div class="contentEstandar">
							<form>
								<?php if($this->session->userdata('rol') == '3' && $this->session->userdata('id') == $tutor['id']){ ?>
							
						   	<?php } ?>
								<h1>Clase</h1>
								
								<p class="nombre"><?= $clase['nombre'] ?></p>
								<h3><a rel="external" data-role="button" href="<?= base_url() . 'registro/diario/'.$clase['id'] ?>">Completar información diaria</a></h3>
								<h1>Tutor</h1>
								<p class="nombre"><a href="<?= base_url() ?>usuario/perfil/<?= $tutor['id'] ?>" title="<?= $tutor['nombre'] . " " . $tutor['apellidos'] ?>"><?= $tutor['nombre'] . " " . $tutor['apellidos'] ?></a></p>
								<p class="imagen"><img title="<?= $tutor['nombre'] . " " . $tutor['apellidos'] ?>" alt="<?= $tutor['nombre'] . " " . $tutor['apellidos'] ?>" src="<?=base_url() . $tutor['imagenurl'] ?>"></p>
								<p class="datos"><b>Edad: </b><?= $this -> comunes -> calcular_edad($tutor['fechanacimiento']) ?></p>
								<p class="datos"><b>Sexo: </b><?php if($tutor['sexo']=="h")echo "Hombre"; else echo "Mujer" ?></p>
							</form>
					</div><!-- content -->
				</div><!-- container -->
	        </div>
	  </div>  
	<div class="infodetalleclase">
		<?php if(isset($listafamiliares)){ foreach ($listanino as $nino) {
		?>
		<div class="nino">
			<div class="formularioEstandar" id="registro-form">
				<div class="container">
					<div class="contentEstandar">
						<form>
							<div class="infonino">
								<h3><a href="<?= base_url() . 'usuario/perfilnino/' . $nino['id']?>"><?= $nino['nombre'] . " " . $nino['apellidos'] ?></a></h3>
								<!-- <p>
								<ul class="ch-grid">
									<li>
										<div class="ch-item ch-img-1">				
											<div class="ch-info-wrap">
												<div class="ch-info">
													<div class="ch-info-front ch-img-1"  style="
																	background-image: url(<?=base_url() . $nino['imagenurl'] ?>);
																	background-repeat: no-repeat;
																	background-color:#FFE4C4;"></div>
													<div class="ch-info-back">
														<p>Familiares</p>
														<?php if (isset($listafamiliares[$nino['id']])){
															$anadirfamiliar = false;
															if($this -> session -> userdata('rol') != 2){
																$anadirfamiliar = true;
															}
															$i=0;
																foreach ($listafamiliares[$nino['id']] as $key=>$familiar){
																	 $i++;
																	if($this -> session -> userdata('rol') == 2 && $this -> session -> userdata('id') == $familiar['id']){
																		$anadirfamiliar = true;
																	} 
																	 ?>
															<div class="familiar1"><a href="<?= base_url() . 'usuario/perfil/' . $familiar['id']?>"><?= $familiar['nombre']." ".$familiar['apellidos'] ?></a></div>
														<?php }
															
														 if($i=="1" && $anadirfamiliar){
														 	?>
															<div class="familiar1"><a class="fancybox" data-fancybox-type="iframe"  href="<?= base_url() ?>registro/familiar_after/<?= $nino['id'] ?>"> <img src="<?= base_url() ?>images/icofinder/add_familiar.png" title="Añadir familiar" alt="añadir familiar a eyekinder" width="20" /> Añadir Familiar</a></div>
														 <?php 
														 }
														}?>
													</div>	
												</div>
											</div>
										</div>
									</li>
								</ul>
								</p> -->
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
							}else{
								?>
		<div class="nino">
			<div class="formularioEstandar" id="registro-form">
				<div class="container">
					<div class="contentEstandar">
						<form>
							<div class="infonino">
								Añadir niño
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
</div>