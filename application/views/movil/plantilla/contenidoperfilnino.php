<div data-role="content">
	<h3 class="ui-bar ui-bar-a ui-corner-all"><center><?= $nombre . " " . $apellidos ?></center>
		
					<center><a href="#popupCalendar" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-calendar ui-btn-icon-left ui-btn-a" data-transition="pop">Cambiar fecha</a>
					<div data-role="popup" id="popupCalendar" data-overlay-theme="b" data-theme="a" data-tolerance="15,15" class="ui-content">
						
						<?= $calendar ?>
					</div></center>
	</h3>
	<!-- <h3 class="ui-bar ui-bar-a ui-corner-all"><div class="ui-grid-a">
						<div class="ui-block-a">
								<center><img title="<?= $nombre . " " . $apellidos ?>" alt="<?= $nombre . " " . $apellidos ?>" src="<?=base_url() . $imagenurl ?>"></p>
								</center>
						</div>
						<div class="ui-block-b">
							<p><?= $nombre . " " . $apellidos ?></p>
							<?php if(isset($fechanacimiento) && $fechanacimiento != "" && $fechanacimiento != "0000-00-00"){ ?>
								<p class="datos"><b>Edad: </b><?= $this -> comunes -> calcular_edad($fechanacimiento) ?></p>
								<?php } ?>
								<p class="datos"><b>Sexo: </b><?php if($sexo=="h")echo "Niño"; else echo "Niña" ?>
						</div>
					</div>
					</h3> -->			
					<!-- <div class="ui-grid-a">
						<div class="ui-block-a">
								<p class="imagen"><img title="<?= $nombre . " " . $apellidos ?>" alt="<?= $nombre . " " . $apellidos ?>" src="<?=base_url() . $imagenurl ?>"></p>
								<?php if(isset($fechanacimiento) && $fechanacimiento != "" && $fechanacimiento != "0000-00-00"){ ?>
								<p class="datos"><b>Edad: </b><?= $this -> comunes -> calcular_edad($fechanacimiento) ?></p>
								<?php } ?>
								<p class="datos"><b>Sexo: </b><?php if($sexo=="h")echo "Niño"; else echo "Niña" ?></p>
						</div>
						<div class="ui-block-b">
							<p><?= $calendar ?></p>
						</div>
					</div> -->
					<?php
						$configurabletutor = false;
						foreach ($tutor as $key => $value) {
							if (($value['id']) == $this -> session -> userdata('id')) {
								$configurabletutor = true;
							}
						}
						$configurablefamilia = false;
						foreach ($familiares as $key => $value) {
							if (($value['id']) == $this -> session -> userdata('id')) {
								$configurablefamilia = true;
							}
						}
					?>
			<h3 class="ui-bar ui-bar-a ui-corner-all"><center><?= $this -> comunes -> fechaElegida($year, $mon, $day) ?></center></h3>
			
			<div class="ui-body ui-body-a ui-corner-all">
				<?php if(isset($infotutor)){ ?>
							<h3 class="ui-bar ui-bar-a ui-corner-all">Información diaria (Tutores)</h3>
							
							<div class="ui-body ui-body-a ui-corner-all">
									<p><b>Valoración: </b>	<?= $this -> comunes -> estrellas_resultado($id, $year, $mon, $day, $infotutor['valoracion']) ?></p>
									<?php if($infotutor['salud'] || $infotutor['alimentacion'] || $infotutor['descanso'] || $infotutor['caca']
											|| $infotutor['pipi'] || $infotutor['panales']){?>
									<h3 class="ui-bar ui-bar-a ui-corner-all">Asistencial</h3>
									<?php if($infotutor['salud']) {?><p><b>Salud: </b><?= $infotutor['salud'] ?></p><?php } ?>
									<?php if($infotutor['alimentacion']) {?><p><b>Alimentación: </b><?= $infotutor['alimentacion'] ?></p><?php } ?>
									<?php if($infotutor['descanso']) {?><p><b>Descanso: </b><?php echo $infotutor['descanso']. " minutos"; ?></p><?php } ?>
									<?php if($infotutor['pipi']) {?><p><b>Pipi: </b><?php if($infotutor['pipi']== "1"){echo $infotutor['pipi']." vez."; }else if($infotutor['pipi'] != "0"){echo $infotutor['pipi']." veces.";}  ?></p><?php } ?>
									<?php if($infotutor['caca']) {?><p><b>Caca: </b><?php if($infotutor['caca']== "1"){echo $infotutor['caca']." vez."; }else if($infotutor['caca'] != "0"){echo $infotutor['caca']." veces.";}  ?></p><?php } ?>
									<?php if($infotutor['panales']) {?><p><b>Cambio de pañales: </b><?php if($infotutor['panales']== "1"){echo $infotutor['panales']." vez."; }else if($infotutor['panales'] != "0"){echo $infotutor['panales']." veces.";}  ?></p><?php } ?>
									<?php } ?>
									<?php if($infotutor['actitud'] || $infotutor['relaciones']){?>
									<h3 class="ui-bar ui-bar-a ui-corner-all">Comportamental</h3>
									<?php if($infotutor['actitud']) {?><p><b>Actitud: </b><?= $infotutor['actitud'] ?></p><?php } ?>
									<?php if($infotutor['relaciones']) {?><p><b>Relaciones: </b><?= $infotutor['relaciones'] ?></p><?php } ?>
									<?php } ?>
									<?php if($infotutor['lectivo'] || $infotutor['ludico']){?>
									<h3 class="ui-bar ui-bar-a ui-corner-all">Educativo</h3>
									<?php if($infotutor['lectivo']) {?><p><b>Lectivo: </b><?= $infotutor['lectivo'] ?></p><?php } ?>
									<?php if($infotutor['ludico']) {?><p><b>Lúdico: </b><?= $infotutor['ludico'] ?></p><?php } ?>
									<?php } ?>
									<?php if($infotutor['informacion']) {?><p><b>Otra información: </b><?= $infotutor['informacion'] ?></p><?php } ?>
									<?php if($tutornombrepublicadopor) {?><p><b><small>Publicado por: </b><a href="<?= base_url() ?>usuario/perfil/<?= $infotutor['publicadopor'] ?>"><?= $tutornombrepublicadopor ?></a></small></p><?php } ?>
									<?php if($configurabletutor) {?>
											<a href="#popupVideo" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-edit ui-btn-icon-left ui-btn-a" data-transition="pop">Editar información diaria</a>
											<div data-role="popup" id="popupVideo" data-overlay-theme="b" data-theme="a" data-tolerance="15,15" class="ui-content">
											    <!-- <iframe src="<?= base_url() ?>usuario/editar_infotutor/<?= $infotutor['id']."/".$id."/".$year."/".$mon ."/".$day ?>" width="497" height="298" seamless=""></iframe> -->
											    <form action="<?= base_url() ?>usuario/editar_infonino" method="post" accept-charset="utf-8" enctype="multipart/form-data">
							
										<h3 class="ui-bar ui-bar-a ui-corner-all">Información diaria (<?= $this -> comunes -> fechaElegida($year, $mon, $day) ?>)</h3>
										<?php
										$this -> load -> helper("form");
										if ($this -> session -> userdata('errorvalidacion')) {
											echo '<div class="cuadroErrores">' . $this -> session -> userdata('errorvalidacion') . '</div>';
											$newdata = array('errorvalidacion' => '');
											$this -> session -> set_userdata($newdata);
										}
										if(!isset($star)){
												$star = $infotutor['valoracion'];
											}
										echo validation_errors('<div class="cuadroErrores">', '</div>');
										
										echo '
										<h3 class="ui-bar ui-bar-a ui-corner-all">Asistencial</h3>
										';
										echo '<div class="label">';
										echo form_label('Valoración', 'valoracion');
										echo '</div>';
										$opciones = array(
											'1' => '1 Estrella',
											'2' => '2 Estrellas',
											'3' => '3 Estrellas',
											'4' => '4 Estrellas',
											'5' => '5 Estrellas',);
										echo form_dropdown('valoracion', $opciones, $star);
										echo '
										<div class="ui-field-contain" id="alimentacion">
										';
										echo form_label('Alimentación', 'alimentacion');
										$opciones = array(
										'Poco' => 'Poco',
										'Mucho' => 'Mucho',
										'Nada' => 'Nada',);
										echo form_dropdown('alimentacion', $opciones, $infotutor['alimentacion']);
										echo '
										</div>';
										echo '
										<div class="ui-field-contain" id="salud">
										';
										echo form_label('Salud', 'salud');
										$opciones = array(
										'Bien' => 'Bien',
										'Fiebre leve' => 'Fiebre leve',
										'Resfriado' => 'Resfriado',);
										echo form_dropdown('salud',$opciones, $infotutor['salud']);
										echo '
										</div>';
										echo '
										<div class="ui-field-contain" id="descanso">
										';
										echo form_label('Descanso', 'descanso');
										echo '<input type="range" name="descanso" value="'.$infotutor['descanso'].'" min="0" max="150" step="15" data-highlight="true">';
										echo '</div>';
										echo '
										<div class="ui-field-contain" id="pipi">
										';
										echo form_label('Pipi', 'pipi');
										echo '<input type="range" name="pipi" value="'.$infotutor['pipi'].'" min="0" max="6" data-highlight="true">';
										echo '</div>';
										echo '
										<div class="ui-field-contain" id="caca">
										';
										echo form_label('Caca', 'caca');
										echo '<input type="range" name="caca" value="'.$infotutor['caca'].'" min="0" max="6" data-highlight="true">';
										echo '</div>';
										echo '
										<div class="ui-field-contain" id="panales">
										';
										echo form_label('Cambio de pañales', 'panales');
										echo '<input type="range" name="panales" value="'.$infotutor['panales'].'" min="0" max="6" data-highlight="true">';
										echo '</div>';
										echo '
										<h3 class="ui-bar ui-bar-a ui-corner-all">Comportamental</h3>
										';
										echo '
										<div class="ui-field-contain" id="actitud">
										';
										echo form_label('Actitud', 'actitud');
										$opciones = array(
										'Buena' => 'Buena',
										'Mala' => 'Mala',
										'Regular' => 'Regular',);
										echo form_dropdown('actitud', $opciones, $infotutor['actitud']);
										echo '
										</div>';
										echo '
										<div class="ui-field-contain" id="relaciones">
										';
										echo form_label('Relaciones', 'relaciones');
										$opciones = array(
										'Bien' => 'Bien',
										'Mal' => 'Mal',
										'Regular' => 'Regular',);
										echo form_dropdown('relaciones', $opciones, $infotutor['relaciones']);
										echo '
										</div>';
										echo '
										<h3 class="ui-bar ui-bar-a ui-corner-all">Educativo</h3>
										';
										echo '
										<div class="ui-field-contain" id="lectivo">
										';
										echo form_label('Lectivo', 'lectivo');
										echo form_input('lectivo',$infotutor['lectivo']);
										echo '
										</div>';
										echo '
										<div class="ui-field-contain" id="ludico">
										';
										echo form_label('Lúdico', 'ludico');
										echo form_input('ludico',$infotutor['ludico']);
										echo '
										</div>';
										echo '
										<div class="ui-field-contain" id="informacion">
										';
										echo form_label('Otros datos', 'informacion');
										echo form_textarea('informacion',$infotutor['informacion']);
										echo '
										</div>';
										echo form_hidden('tipo', '3');
										echo form_hidden('nino', $id);
										echo form_hidden('year', $year);
										echo form_hidden('mon', $mon);
										echo form_hidden('day', $day);
										echo form_hidden('star', $star);
										echo form_hidden('idinfo', $infotutor['id']);
										echo '<p>'.form_submit('botonSubmit', 'Editar','data-theme="b" data-icon="edit"').'</p>';
										 ?>
								
								</form>
											
							</div></div>
									<?php } ?>
								<?php }else{ 
										if($configurabletutor){?>
											<h3 class="ui-bar ui-bar-a ui-corner-all">Información diaria (Tutores)</h3>
												<div class="ui-body ui-body-a ui-corner-all">
											<a href="#popupInfotutor" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-edit ui-btn-icon-left ui-btn-a" data-transition="pop">Insertar información diaria</a>
											<div data-role="popup" id="popupInfotutor" data-overlay-theme="b" data-theme="a" data-tolerance="15,15" class="ui-content">
												<h3 class="ui-bar ui-bar-a ui-corner-all">Información diaria (Tutores)</h3>
										<?php
										echo form_open_multipart(base_url()."usuario/guardar_infonino");
										$this -> load -> helper("form");
										if ($this -> session -> userdata('errorvalidacion')) {
											echo '<div class="cuadroErrores">' . $this -> session -> userdata('errorvalidacion') . '</div>';
											$newdata = array('errorvalidacion' => '');
											$this -> session -> set_userdata($newdata);
										}
										echo validation_errors('<div class="cuadroErrores">', '</div>');
										echo '
										<h3 class="ui-bar ui-bar-a ui-corner-all">Asistencial</h3>
										';
										echo '<div class="label">';
										echo form_label('Valoración', 'valoracion');
										echo '</div>';
										$opciones = array(
											'1' => '1 Estrella',
											'2' => '2 Estrellas',
											'3' => '3 Estrellas',
											'4' => '4 Estrellas',
											'5' => '5 Estrellas',);
										echo form_dropdown('valoracion', $opciones, $star);
										echo '
										<div class="ui-field-contain" id="alimentacion">
										';
										echo form_label('Alimentación', 'alimentacion');
										$opciones = array(
										'Poco' => 'Poco',
										'Mucho' => 'Mucho',
										'Nada' => 'Nada',);
										echo form_dropdown('alimentacion', $opciones, $this -> session -> userdata('alimentacion'));
										echo '
										</div>';
										echo '
										<div class="ui-field-contain" id="salud">
										';
										echo form_label('Salud', 'salud');
										$opciones = array(
										'Bien' => 'Bien',
										'Fiebre leve' => 'Fiebre leve',
										'Resfriado' => 'Resfriado',);
										echo form_dropdown('salud', $opciones, $this -> session -> userdata('salud'));
										echo '
										</div>';
										echo '
										<div class="ui-field-contain" id="descanso">
										';
										echo form_label('Descanso', 'descanso');
										echo '<input type="range" name="descanso" value="'.$this -> session -> userdata('descanso').'" min="0" max="150" step="15" data-highlight="true">';
										echo '</div>';
										echo '
										<div class="ui-field-contain" id="pipi">
										';
										echo form_label('Pipi', 'pipi');
										echo '<input type="range" name="pipi" value="'.$this -> session -> userdata('pipi').'" min="0" max="6" data-highlight="true">';
										echo '</div>';
										echo '
										<div class="ui-field-contain" id="caca">
										';
										echo form_label('Caca', 'caca');
										echo '<input type="range" name="caca" value="'.$this -> session -> userdata('caca').'" min="0" max="6" data-highlight="true">';
										echo '</div>';
										echo '
										<div class="ui-field-contain" id="panales">
										';
										echo form_label('Cambio de pañales', 'panales');
										echo '<input type="range" name="panales" value="'.$this -> session -> userdata('panales').'" min="0" max="6" data-highlight="true">';
										echo '</div>';
										echo '
										<h3 class="ui-bar ui-bar-a ui-corner-all">Comportamental</h3>
										';
										echo '
										<div class="ui-field-contain" id="actitud">
										';
										echo form_label('Actitud', 'actitud');
										$opciones = array(
										'Buena' => 'Buena',
										'Mala' => 'Mala',
										'Regular' => 'Regular',);
										echo form_dropdown('actitud', $opciones, $this -> session -> userdata('actitud'));
										echo '
										</div>';
										echo '
										<div class="ui-field-contain" id="relaciones">
										';
										echo form_label('Relaciones', 'relaciones');
										$opciones = array(
										'Bien' => 'Bien',
										'Mal' => 'Mal',
										'Regular' => 'Regular',);
										echo form_dropdown('relaciones', $opciones, $this -> session -> userdata('relaciones'));
										echo '
										</div>';
										echo '
										<h3 class="ui-bar ui-bar-a ui-corner-all">Educativo</h3>
										';
										echo '
										<div class="ui-field-contain" id="lectivo">
										';
										echo form_label('Lectivo', 'lectivo');
										echo form_input('lectivo',$this -> session -> userdata('lectivo'));
										echo '
										</div>';
										echo '
										<div class="ui-field-contain" id="ludico">
										';
										echo form_label('Lúdico', 'ludico');
										echo form_input('ludico',$this -> session -> userdata('ludico'));
										echo '
										</div>';
										echo '
										<div class="ui-field-contain" id="informacion">
										';
										echo form_label('Otros datos', 'informacion');
										echo form_textarea('informacion',$this -> session -> userdata('informacion'));
										echo '
										</div>';
										echo form_hidden('tipo', '3');
										echo form_hidden('nino', $id);
										echo form_hidden('year', $year);
										echo form_hidden('mon', $mon);
										echo form_hidden('day', $day);
										echo form_hidden('star', $star);
										echo '<p>'.form_submit('botonSubmit', 'Guardar','data-theme="b" data-icon="edit"').'</p>';
										echo form_close();
										?>
										</div></div>
									<?php }else{
										?>
										<h3 class="ui-bar ui-bar-a ui-corner-all">Información diaria (Tutores)</h3>
										<div class="ui-body ui-body-a ui-corner-all">
										<p>La información de este día aun no ha sido insertada por el tutor</p></br>
										</div>
										<?php
									}}?>
							<?php if(isset($infofamiliar)){ ?>
							<h3 class="ui-bar ui-bar-a ui-corner-all">Información de casa (Familiares)</h3>
							<div class="ui-body ui-body-a ui-corner-all">
									<p><b>Valoración: </b>	<?= $this -> comunes -> estrellas_resultado($id, $year, $mon, $day, $infofamiliar['valoracion']) ?></p>
									<?php if($infofamiliar['salud']) {?><p><b>Salud: </b><?= $infofamiliar['salud'] ?></p><?php } ?>
									<?php if($infofamiliar['descanso']) {?><p><b>Descanso: </b><?php echo $infofamiliar['descanso']; if($infofamiliar['tiempodescanso']){  echo " durante ".$infofamiliar['tiempodescanso']. " horas"; } ?></p><?php } ?>
									<?php if($infofamiliar['medicacion']) {?><p><b>Medicación: </b><?php echo $infofamiliar['medicacion']; if($infofamiliar['dosis']){  echo ", ".$infofamiliar['dosis']; } ?></p><?php } ?>
									<?php if($infofamiliar['recogida']) {?><p><b>Recogida: </b><?= $infofamiliar['recogida'] ?></p><?php } ?>
									<?php if($infofamiliar['informacion']) {?><p><b>Otra información: </b><?= $infofamiliar['informacion'] ?></p><?php } ?>
									<?php if($familiarnombrepublicadopor) {?><p><b><small>Publicado por: </b><a href="<?= base_url() ?>usuario/perfil/<?= $infofamiliar['publicadopor'] ?>"><?= $familiarnombrepublicadopor ?></a></small></p><?php } ?>
									<?php if($configurablefamilia) {?>
											<a href="#popupVideo2" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-edit ui-btn-icon-left ui-btn-a" data-transition="pop">Editar información de casa</a>
											<div data-role="popup" id="popupVideo2" data-overlay-theme="b" data-theme="a" data-tolerance="15,15" class="ui-content">
												<form action="<?= base_url() ?>usuario/editar_infonino" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								
										
											<?php if(!isset($star)){
												$star = $infofamiliar['valoracion'];
											} ?>
										<h3 class="ui-bar ui-bar-a ui-corner-all">Información de casa (<?= $this -> comunes -> fechaElegida($year, $mon, $day) ?>)</h3>
										<?php
										$this -> load -> helper("form");
										if ($this -> session -> userdata('errorvalidacion')) {
											echo '<div class="cuadroErrores">' . $this -> session -> userdata('errorvalidacion') . '</div>';
											$newdata = array('errorvalidacion' => '');
											$this -> session -> set_userdata($newdata);
										}
										echo validation_errors('<div class="cuadroErrores">', '</div>');
										echo '<div class="label">';
										echo form_label('Valoración', 'valoracion');
										echo '</div>';
										$opciones = array(
											'1' => '1 Estrella',
											'2' => '2 Estrellas',
											'3' => '3 Estrellas',
											'4' => '4 Estrellas',
											'5' => '5 Estrellas',);
										echo form_dropdown('valoracion', $opciones, $star);
										echo '<div class="label">';
										echo form_label('Salud', 'salud');
										echo '</div>';
										$opciones = array(
											'Bien' => 'Bien',
											'Fiebre leve' => 'Fiebre leve',
											'Resfriado' => 'Resfriado',);
										echo form_dropdown('salud', $opciones, $infofamiliar['salud']);
										echo '<div class="label">';
										echo form_label('Descanso', 'descanso');
										echo '</div>';
										$opciones = array(
											'Bien' => 'Bien',
											'Regular' => 'Regular',
											'Mal' => 'Mal',);
										echo form_dropdown('descanso', $opciones, $infofamiliar['descanso']);
										echo '<div class="label">';
										echo form_label('Horas', 'tiempodescanso');
										echo '</div>';
										echo form_input('tiempodescanso',$infofamiliar['tiempodescanso']);
										echo '<div class="label">';
										echo form_label('Medicación', 'medicacion');
										echo '</div>';
										echo form_input('medicacion', $infofamiliar['medicacion']);
										echo '<div class="label">';
										echo form_label('Dosis', 'dosis');
										echo '</div>';
										echo form_input('dosis',$infofamiliar['dosis']);
										echo '<div class="label">';
										echo form_label('Recogida', 'recogida');
										echo '</div>';
										echo form_input('recogida',$infofamiliar['recogida']);
										echo '<div class="label">';
										echo form_label('Otros datos', 'informacion');
										echo '</div>';
										echo form_textarea('informacion',$infofamiliar['informacion']);
										echo form_hidden('tipo', '2');
										echo form_hidden('nino', $id);
										echo form_hidden('year', $year);
										echo form_hidden('mon', $mon);
										echo form_hidden('day', $day);
										echo form_hidden('star', $star);
										echo form_hidden('idinfo', $infofamiliar['id']);
										echo '<p>'.form_submit('botonSubmit', 'Editar','data-theme="b" data-icon="edit"').'</p>';
										 ?>
								</form>
										</div></div>
									<?php } ?>
								<?php }else{
										if($configurablefamilia){
										?>
										<h3 class="ui-bar ui-bar-a ui-corner-all">Información de casa (Familiares)</h3>
										<div class="ui-body ui-body-a ui-corner-all">
											<a href="#popupinfofamiliar" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-edit ui-btn-icon-left ui-btn-a" data-transition="pop">Insertar información de casa</a>
											<div data-role="popup" id="popupinfofamiliar" data-overlay-theme="b" data-theme="a" data-tolerance="15,15" class="ui-content">
												<h3 class="ui-bar ui-bar-a ui-corner-all">Información de casa (Familiares)</h3>
											 <?php
										echo form_open_multipart(base_url()."usuario/guardar_infonino");
										$this -> load -> helper("form");
										if ($this -> session -> userdata('errorvalidacion')) {
											echo '<div class="cuadroErrores">' . $this -> session -> userdata('errorvalidacion') . '</div>';
											$newdata = array('errorvalidacion' => '');
											$this -> session -> set_userdata($newdata);
										}
										echo validation_errors('<div class="cuadroErrores">', '</div>');
										echo '<div class="label">';
										echo form_label('Valoración', 'valoracion');
										echo '</div>';
										$opciones = array(
											'1' => '1 Estrella',
											'2' => '2 Estrellas',
											'3' => '3 Estrellas',
											'4' => '4 Estrellas',
											'5' => '5 Estrellas',);
										echo form_dropdown('valoracion', $opciones, $star);
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
										echo form_dropdown('descanso', $opciones, $this -> session -> userdata('descanso'));
										echo '<div class="label">';
										echo form_label('Horas', 'tiempodescanso');
										echo '</div>';
										echo form_input('tiempodescanso',$this -> session -> userdata('tiempodescanso'));
										echo '<div class="label">';
										echo form_label('Medicación', 'medicacion');
										echo '</div>';
										echo form_input('medicacion', $this -> session -> userdata('medicacion'));
										echo '<div class="label">';
										echo form_label('Dosis', 'dosis');
										echo '</div>';
										echo form_input('dosis',$this -> session -> userdata('dosis'));
										echo '<div class="label">';
										echo form_label('Recogida', 'recogida');
										echo '</div>';
										echo form_input('recogida',$this -> session -> userdata('nombre')." ".$this -> session -> userdata('apellidos'));
										echo '<div class="label">';
										echo form_label('Otros datos', 'informacion');
										echo '</div>';
										echo form_textarea('informacion',$this -> session -> userdata('informacion'));
										echo form_hidden('tipo', '2');
										echo form_hidden('nino', $id);
										echo form_hidden('year', $year);
										echo form_hidden('mon', $mon);
										echo form_hidden('day', $day);
										echo form_hidden('star', $star);
										echo '<p>'.form_submit('botonSubmit', 'Guardar','data-theme="b" data-icon="edit"').'</p>';
										echo form_close();
										 ?>
											</div></div>
									<?php }else{
										?>
										<h3 class="ui-bar ui-bar-a ui-corner-all">Información de casa (Familiares)</h3>
										<div class="ui-body ui-body-a ui-corner-all">
										<p>La información de este día aun no ha sido insertada por ningún familiar</p></br>
										</div>
										<?php
									}}?>
			</div>
</div>