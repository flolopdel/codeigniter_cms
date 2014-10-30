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
							</form>
					</div><!-- content -->
				</div><!-- container -->
	        </div>
				<div class="formularioEstandar">
		        <div class="container">
					<div class="contentEstandar">
							<form>
								<p><?= $calendar ?></p>
							</form>
					</div><!-- content -->
				</div><!-- container -->
	        </div>
	  </div>    
	<div class="infonino">
				<div class="formularioEstandar">
		        <div class="container">
					<div class="contentEstandar">
						<?php 
						$configurabletutor = false;
						foreach ($tutor as $key => $value) {
							if (($value['id']) == $this -> session -> userdata('id')) {
								$configurabletutor = true;
							}
						}
						?>
							<form action="<?= base_url() ?>usuario/guardar_infonino" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								<h1><?= $this -> comunes -> fechaElegida($year, $mon, $day) ?></h1>
								<?php if(isset($infotutor)){ ?>
									<h2>Información diaria (Tutores)</h2>
									<?php if($infotutor['salud'] || $infotutor['alimentacion'] || $infotutor['descanso'] || $infotutor['caca']
											|| $infotutor['pipi'] || $infotutor['panales']){?>
									<h2>Asistencial</h2>
											<h3>Valoración 
												<?= $this -> comunes -> estrellas_resultado($id, $year, $mon, $day, $infotutor['valoracion']) ?>
											</h3>
									<?php if($infotutor['salud']) {?><p class="cuaderno"><b>Salud: </b><?= $infotutor['salud'] ?></p><?php } ?>
									<?php if($infotutor['alimentacion']) {?><p class="cuaderno"><b>Alimentación: </b><?= $infotutor['alimentacion'] ?></p><?php } ?>
									<?php if($infotutor['descanso']) {?><p class="cuaderno"><b>Descanso: </b><?php echo $infotutor['descanso']. " minutos"; ?></p><?php } ?>
									<?php if($infotutor['pipi']) {?><p class="cuaderno"><b>Pipi: </b><?php if($infotutor['pipi']== "1"){echo $infotutor['pipi']." vez."; }else if($infotutor['pipi'] != "0"){echo $infotutor['pipi']." veces.";}  ?></p><?php } ?>
									<?php if($infotutor['caca']) {?><p class="cuaderno"><b>Caca: </b><?php if($infotutor['caca']== "1"){echo $infotutor['caca']." vez."; }else if($infotutor['caca'] != "0"){echo $infotutor['caca']." veces.";}  ?></p><?php } ?>
									<?php if($infotutor['panales']) {?><p class="cuaderno"><b>Cambio de pañales: </b><?php if($infotutor['panales']== "1"){echo $infotutor['panales']." vez."; }else if($infotutor['panales'] != "0"){echo $infotutor['panales']." veces.";}  ?></p><?php } ?>
									
									<?php } ?>
									<?php if($infotutor['actitud'] || $infotutor['relaciones']){?>
									<h2>Comportamental</h2>
									<?php if($infotutor['actitud']) {?><p class="cuaderno"><b>Actitud: </b><?= $infotutor['actitud'] ?></p><?php } ?>
									<?php if($infotutor['relaciones']) {?><p class="cuaderno"><b>Relaciones: </b><?= $infotutor['relaciones'] ?></p><?php } ?>
									<?php } ?>
									
									
									<?php if($infotutor['lectivo'] || $infotutor['ludico'] || $infotutor['informacion']){?>
									<h2>Educativo</h2>
									<?php if($infotutor['lectivo']) {?><p class="cuaderno"><b>Lectivo: </b><?= $infotutor['lectivo'] ?></p><?php } ?>
									<?php if($infotutor['ludico']) {?><p class="cuaderno"><b>Lúdico: </b><?= $infotutor['ludico'] ?></p><?php } ?>
									<?php } ?>
									<?php if($infotutor['informacion']) {?><p class="cuaderno"><b>Otra información: </b><?= $infotutor['informacion'] ?></p><?php } ?>
									
									<?php if($tutornombrepublicadopor) {?><p class="cuaderno"><b><small>Publicado por: </b><a href="<?= base_url() ?>usuario/perfil/<?= $infotutor['publicadopor'] ?>"><?= $tutornombrepublicadopor ?></a></small></p><?php } ?>
									<?php if($configurabletutor) {?>
									<p><a class="fancybox" data-fancybox-type="iframe" href="<?= base_url() ?>usuario/editar_infotutor/<?= $infotutor['id']."/".$id."/".$year."/".$mon ."/".$day ?>">Editar información diaria</a></p>
									<?php } ?>
								<?php }else{ 
										if($configurabletutor){?>
										<p><h2>Información diaria (Tutores)</h2>
											<h2>Asistencial</h2>
											<h3>Valoración 
												<?= $this -> comunes -> estrellas_editar($id, $year, $mon, $day, $star) ?>
											</h3>
										
										</p>
										<?php
										$this -> load -> helper("form");
										if ($this -> session -> userdata('errorvalidacion')) {
											echo '<div class="cuadroErrores">' . $this -> session -> userdata('errorvalidacion') . '</div>';
											$newdata = array('errorvalidacion' => '');
											$this -> session -> set_userdata($newdata);
										}
										echo validation_errors('<div class="cuadroErrores">', '</div>');
										
										
										echo '<div class="label">';
										echo form_label('Salud', 'salud');
										echo '</div>';
										$opciones = array(
											'Bien' => 'Bien',
											'Fiebre leve' => 'Fiebre leve',
											'Resfriado' => 'Resfriado',);
										echo form_dropdown('salud', $opciones, $this -> session -> userdata('salud'),'style="width:170px;"');
										echo '<div style="width: 100px;
															float: left;
															padding-top: 10px;
															text-align: right;
															margin-right: -67px;">';
										echo form_label('Alimentación', 'alimentacion');
										echo '</div>';
										$opciones = array(
											'Mucho' => 'Mucho',
											'Poco' => 'Poco',
											'Nada' => 'Nada',);
										echo form_dropdown('alimentacion', $opciones, $this -> session -> userdata('alimentacion'),'style="width:120px;"');										
										
										
										echo '<div class="label">';
										echo form_label('Descanso', 'descanso');
										echo '</div>';
										$datos= array(	'name'=>'descanso' ,
														'type'=>'number', 
														'class' =>'descanso' , 
														'style'=>'',
														'onkeypress'=>'validarNumeros(\'descanso\');',
														'onKeyUp'=>'validarNumeros(\'descanso\');'); 
		
		 
										echo form_input($datos,'0',$this -> session -> userdata('descanso'));
										?>
										<div style="float: left; margin-left: 5px;">
											<div style="">
												<img src="<?php echo base_url(); ?>images/button1.png" onclick='incrementValue(15,"descanso");'/>
											</div>
											<div style="">
												<img src="<?php echo base_url(); ?>images/button2.png" onclick='incrementValue(-15,"descanso");'/>
											</div>	
											
										</div>
										
										<?php
										echo '<div style="width: 100px;
															float: left;
															padding-top: 10px;
															text-align: right;
															margin-right: -67px;">';
										echo form_label('Cambio de pañales', 'panales');
										echo '</div>';
										$datos= array(	'name'=>'panales' ,
														'type'=>'number', 
														'class' =>'panales' , 
														'style'=>'',
														'onkeypress'=>'validarNumeros(\'panales\');',
														'onKeyUp'=>'validarNumeros(\'panales\');'); 
		
		 
										echo form_input($datos,'0',$this -> session -> userdata('panales'));
										?>
										<div style="float: left; margin-left: 5px;">
											<div style="">
												<img src="<?php echo base_url(); ?>images/button1.png" onclick='incrementValue(1,"panales");'/>
											</div>
											<div style="">
												<img src="<?php echo base_url(); ?>images/button2.png" onclick='incrementValue(-1,"panales");'/>
											</div>	
											
										</div>
										
										<?php
										
										
										
										echo '<div class="label">';
										echo form_label('Pipi', 'pipi');
										echo '</div>';
										$datos= array(	'name'=>'pipi' ,
														'type'=>'number', 
														'class' =>'pipi' , 
														'style'=>'',
														'onkeypress'=>'validarNumeros(\'pipi\');',
														'onKeyUp'=>'validarNumeros(\'pipi\');'); 
										
										 
										echo form_input($datos,'0',$this -> session -> userdata('pipi'));
										?>
										<div style="float: left; margin-left: 5px;">
											<div style="">
												<img src="<?php echo base_url(); ?>images/button1.png" onclick='incrementValue(1,"pipi");'/>
											</div>
											<div style="">
												<img src="<?php echo base_url(); ?>images/button2.png" onclick='incrementValue(-1,"pipi");'/>
											</div>	
											
										</div>
										
										<?php
										echo '<div style="width: 100px;
															float: left;
															padding-top: 10px;
															text-align: right;
															margin-right: -67px;">';
										echo form_label('Caca', 'caca');
										echo '</div>';
										$datos= array(	'name'=>'caca' ,
						'type'=>'number', 
						'class' =>'caca' , 
						'style'=>'',
						'onkeypress'=>'validarNumeros(\'caca\');',
						'onKeyUp'=>'validarNumeros(\'caca\');'); 
		
		 
						echo form_input($datos,'0',$this -> session -> userdata('caca'));
						?>
						<div style="float: left; margin-left: 5px;">
							<div style="">
								<img src="<?php echo base_url(); ?>images/button1.png" onclick='incrementValue(1,"caca");'/>
							</div>
							<div style="">
								<img src="<?php echo base_url(); ?>images/button2.png" onclick='incrementValue(-1,"caca");'/>
							</div>	
							
						</div>
								
										
										
										
										<?php
										echo '<p><h2 style="clear: both">Comportamental</h2></p>';
										echo '<div class="label">';
										echo form_label('Actitud', 'actitud');
										echo '</div>';
										
										$opciones = array(
											'Bien' => 'Bien',
											'Mal' => 'Mal',
											'Regular' => 'Regular');
										echo form_dropdown('actitud', $opciones, $this -> session -> userdata('actitud'),'style="width:170px;"');
										
										echo '<div style="width: 100px;
															float: left;
															padding-top: 10px;
															text-align: right;
															margin-right: -67px;">';
										echo form_label('Relaciones', 'relaciones');
										echo '</div>';
										$opciones = array(
											'Bien' => 'Bien',
											'Mal' => 'Mal',
											'Regular' => 'Regular');
										echo form_dropdown('relaciones', $opciones, $this -> session -> userdata('relaciones'),'style="width:120px;"');
										?>
										
										
										<?php
											echo '<p><h2 style="clear: both">Educativo</h2></p>';
											echo '<div class="label">';
											echo form_label('Lectivo', 'lectivo');
											echo '</div>';
											echo form_input('lectivo',$this -> session -> userdata('lectivo'),'style="margin-left:21px;"');
											echo '<div class="label">';
											echo form_label('Lúdico', 'ludico');
											echo '</div>';
											echo form_input('ludico',$this -> session -> userdata('ludico'),'style="margin-left:21px;"');
											echo '<div class="label">';
											echo form_label('Otros datos', 'informacion');
											echo '</div>';
											echo form_textarea('informacion',$this -> session -> userdata('informacion'),'style="height: 70px; margin-left:21px;"');
											echo form_hidden('tipo', '3');
											echo form_hidden('nino', $id);
											echo form_hidden('year', $year);
											echo form_hidden('mon', $mon);
											echo form_hidden('day', $day);
											echo form_hidden('star', $star);
										?>
									<?php 
										echo '<p>'.form_submit('botonSubmit', 'Enviar','style="float:right; margin-right:70px;"').'</p>';
										}else{
										?>
										<h2>Información diaria (Tutores)</h2>
										<p>La información de este día aun no ha sido insertada por el tutor</p></br>
									<?php
									}}?>
								
								</form>
								<?php 
								$configurablefamilia = false;
									foreach ($familiares as $key => $value) {
										if (($value['id']) == $this -> session -> userdata('id')) {
											$configurablefamilia = true;
										}
									}
								?>
								<form action="<?= base_url() ?>usuario/guardar_infonino" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								<?php if(isset($infofamiliar)){ ?>
									<h2>Información de casa (Familiares)</h2>
									<h3>Valoración 
										<?= $this -> comunes -> estrellas_resultado($id, $year, $mon, $day, $infofamiliar['valoracion']) ?>
									</h3>
									<?php if($infofamiliar['salud']) {?><p class="cuaderno"><b>Salud: </b><?= $infofamiliar['salud'] ?></p><?php } ?>
									<?php if($infofamiliar['descanso']) {?><p class="cuaderno"><b>Descanso: </b><?php echo $infofamiliar['descanso']; if($infofamiliar['tiempodescanso']){  echo " durante ".$infofamiliar['tiempodescanso']. " horas"; } ?></p><?php } ?>
									<?php if($infofamiliar['medicacion']) {?><p class="cuaderno"><b>Medicación: </b><?php echo $infofamiliar['medicacion']; if($infofamiliar['dosis']){  echo ", ".$infofamiliar['dosis']; } ?></p><?php } ?>
									<?php if($infofamiliar['recogida']) {?><p class="cuaderno"><b>Recogida: </b><?= $infofamiliar['recogida'] ?></p><?php } ?>
									<?php if($infofamiliar['informacion']) {?><p class="cuaderno"><b>Otra información: </b><?= $infofamiliar['informacion'] ?></p><?php } ?>
									<?php if($familiarnombrepublicadopor) {?><p class="cuaderno"><b><small>Publicado por: </b><a href="<?= base_url() ?>usuario/perfil/<?= $infofamiliar['publicadopor'] ?>"><?= $familiarnombrepublicadopor ?></a></small></p><?php } ?>
									<?php if($configurablefamilia) {?>
										<p><a class="fancybox" data-fancybox-type="iframe" href="<?= base_url() ?>usuario/editar_infofamiliar/<?= $infofamiliar['id']."/".$id."/".$year."/".$mon ."/".$day ?>">Editar información de casa</a></p>
									<?php } ?>
								<?php }else{
										if($configurablefamilia){
										?>
										<p><h2>Información de casa (Familiares)
										<?= $this -> comunes -> estrellas_editar($id, $year, $mon, $day, $star) ?>
										</h2></p>
										<?php
										$this -> load -> helper("form");
										if ($this -> session -> userdata('errorvalidacion')) {
											echo '<div class="cuadroErrores">' . $this -> session -> userdata('errorvalidacion') . '</div>';
											$newdata = array('errorvalidacion' => '');
											$this -> session -> set_userdata($newdata);
										}
										echo validation_errors('<div class="cuadroErrores">', '</div>');
										echo '<div class="label">';
										echo form_label('Salud', 'salud');
										echo '</div>';
										$opciones = array(
											'Bien' => 'Bien',
											'Fiebre leve' => 'Fiebre leve',
											'Resfriado' => 'Resfriado',);
										echo form_dropdown('salud', $opciones, $this -> session -> userdata('salud'));
										echo '<div class="label">';
										echo form_label('Descanso', 'descanso');
										echo '</div>';
										$opciones = array(
											'Bien' => 'Bien',
											'Regular' => 'Regular',
											'Mal' => 'Mal',);
										echo form_dropdown('descanso', $opciones, $this -> session -> userdata('descanso'),'style="width:251px;"');
										echo '<div style="width:50px; float:left; padding-top:10px; text-align:right; margin-right: -47px;">';
										echo form_label('Horas', 'tiempodescanso');
										echo '</div>';
										echo form_input('tiempodescanso',$this -> session -> userdata('tiempodescanso'),'style="width:40px;"');
										echo '<div class="label">';
										echo form_label('Medicación', 'medicacion');
										echo '</div>';
										echo form_input('medicacion', $this -> session -> userdata('medicacion'),'style="
																															width: 200px;
																															float: left;
																															margin-left: 81px;"');
										echo '<div style="width:50px; float:left; padding-top:10px; text-align:right;">';
										echo form_label('Dosis', 'dosis');
										echo '</div>';
										echo form_input('dosis',$this -> session -> userdata('dosis'),'style="
																												width: 40px;
																												float: left;
																												margin-left: 12px;
																												;"');
										echo '<div class="label">';
										echo form_label('Recogida', 'recogida');
										echo '</div>';
										echo form_input('recogida',$this -> session -> userdata('nombre')." ".$this -> session -> userdata('apellidos'),'style="margin-left:21px;"');
										echo '<div class="label">';
										echo form_label('Otros datos', 'informacion');
										echo '</div>';
										echo form_textarea('informacion',$this -> session -> userdata('informacion'),'style="height: 70px; margin-left:21px;"');
										echo form_hidden('tipo', '2');
										echo form_hidden('nino', $id);
										echo form_hidden('year', $year);
										echo form_hidden('mon', $mon);
										echo form_hidden('day', $day);
										echo form_hidden('star', $star);
										echo '<p>'.form_submit('botonSubmit', 'Enviar','style="float:right; margin-right:70px;"').'</p>';
										 ?>
									<?php }else{
										?>
										<h2>Información de casa (Familiares)</h2>
										<p>La información de este día aun no ha sido insertada por ningñun familiar</p></br>
										<?php
									}}?>
								
								</form>
					</div><!-- content -->
				</div><!-- container -->
	        </div>
	  </div>    
</div>

<script  type="text/javascript">		
			function incrementValue(v,id){
				cur = parseInt($("."+id).val())+v;
				$("."+id).val(cur);
				if(parseInt($("."+id).val())<0 || $("."+id).val()=="NaN" || $("."+id).val()==""){
					$("."+id).val(0);
				}				
			}
			
			function validarNumeros(id){
			   var val2 = $('.'+id).val();
			   var reg = new RegExp("\\D", 'g');
			   var rep = val2.replace(reg, "");
			   $('.'+id).val(rep);
			}
			
</script>