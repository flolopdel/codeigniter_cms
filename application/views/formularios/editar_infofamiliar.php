<div class="contenidoBasico1">
				<div class="formularioEstandar" id="registro-form">
		        <div class="container">
					<div class="contentEstandar">
						<form action="<?= base_url() ?>usuario/editar_infonino" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								
										<p><h2>Información de casa (Familiares)
											<?php if(!isset($star)){
												$star = $info['valoracion'];
											} ?>
										<?= $this -> comunes -> estrellas_editar($nino['id'], $year, $mon, $day, $star, "familiar",$info['id']) ?>
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
										echo form_dropdown('salud', $opciones, $info['salud']);
										echo '<div class="label">';
										echo form_label('Descanso', 'descanso');
										echo '</div>';
										$opciones = array(
											'Bien' => 'Bien',
											'Regular' => 'Regular',
											'Mal' => 'Mal',);
										echo form_dropdown('descanso', $opciones, $info['descanso'],'style="width:251px;"');
										echo '<div style="width:50px; float:left; padding-top:10px; text-align:right; margin-right: -47px;">';
										echo form_label('Horas', 'tiempodescanso');
										echo '</div>';
										echo form_input('tiempodescanso',$info['tiempodescanso'],'style="width:40px;"');
										echo '<div class="label">';
										echo form_label('Medicación', 'medicacion');
										echo '</div>';
										echo form_input('medicacion', $info['medicacion'],'style="
																															width: 200px;
																															float: left;
																															margin-left: 81px;"');
										echo '<div style="width:50px; float:left; padding-top:10px; text-align:right;">';
										echo form_label('Dosis', 'dosis');
										echo '</div>';
										echo form_input('dosis',$info['dosis'],'style="
																												width: 40px;
																												float: left;
																												margin-left: 12px;
																												;"');
										echo '<div class="label">';
										echo form_label('Recogida', 'recogida');
										echo '</div>';
										echo form_input('recogida',$info['recogida'],'style="margin-left:21px;"');
										echo '<div class="label">';
										echo form_label('Otros datos', 'informacion');
										echo '</div>';
										echo form_textarea('informacion',$info['informacion'],'style="height: 70px; margin-left:21px;"');
										echo form_hidden('tipo', '2');
										echo form_hidden('nino', $nino['id']);
										echo form_hidden('year', $year);
										echo form_hidden('mon', $mon);
										echo form_hidden('day', $day);
										echo form_hidden('star', $star);
										echo form_hidden('idinfo', $info['id']);
										echo '<p>'.form_submit('botonSubmit', 'Editar','style="float:right; margin-right:70px;"').'</p>';
										 ?>
								</form>
					</div><!-- content -->
				</div><!-- container -->
	        </div>
</div>