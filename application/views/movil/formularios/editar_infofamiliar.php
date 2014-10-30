<div data-role="content">
						<form action="<?= base_url() ?>usuario/editar_infonino" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								
										
											<?php if(!isset($star)){
												$star = $info['valoracion'];
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
										echo form_dropdown('salud', $opciones, $info['salud']);
										echo '<div class="label">';
										echo form_label('Descanso', 'descanso');
										echo '</div>';
										$opciones = array(
											'Bien' => 'Bien',
											'Regular' => 'Regular',
											'Mal' => 'Mal',);
										echo form_dropdown('descanso', $opciones, $info['descanso']);
										echo '<div class="label">';
										echo form_label('Horas', 'tiempodescanso');
										echo '</div>';
										echo form_input('tiempodescanso',$info['tiempodescanso']);
										echo '<div class="label">';
										echo form_label('Medicación', 'medicacion');
										echo '</div>';
										echo form_input('medicacion', $info['medicacion']);
										echo '<div class="label">';
										echo form_label('Dosis', 'dosis');
										echo '</div>';
										echo form_input('dosis',$info['dosis']);
										echo '<div class="label">';
										echo form_label('Recogida', 'recogida');
										echo '</div>';
										echo form_input('recogida',$info['recogida']);
										echo '<div class="label">';
										echo form_label('Otros datos', 'informacion');
										echo '</div>';
										echo form_textarea('informacion',$info['informacion']);
										echo form_hidden('tipo', '2');
										echo form_hidden('nino', $nino['id']);
										echo form_hidden('year', $year);
										echo form_hidden('mon', $mon);
										echo form_hidden('day', $day);
										echo form_hidden('star', $star);
										echo form_hidden('idinfo', $info['id']);
										echo '<p>'.form_submit('botonSubmit', 'Editar','data-theme="b"').'</p>';
										 ?>
								</form>
</div>