<div class="contenidoBasico1">
				<div class="formularioEstandar" id="registro-form">
		        <div class="container">
					<div class="contentEstandar">
						<form action="<?= base_url() ?>usuario/editar_infonino" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								<h1><?= $this -> comunes -> fechaElegida($year, $mon, $day) ?></h1>
									<p><h2>Información diaria (Tutores)</h2>
										<h2>Asistencial</h2>
										<h3>Valoración 
											<?php if(!isset($star)){
												$star = $info['valoracion'];
											} ?>
										<?= $this -> comunes -> estrellas_editar($nino['id'], $year, $mon, $day, $star, "tutor",$info['id']) ?>
										</h3></p>
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
										echo form_dropdown('salud', $opciones, $info['salud'],'style="width:170px;"');
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
										echo form_dropdown('alimentacion', $opciones, $info['alimentacion'],'style="width:120px;"');										
										
										echo '<div class="label">';
										echo form_label('Descanso', 'descanso');
										echo '</div>';
										$datos= array(	'name'=>'descanso' ,
														'type'=>'number', 
														'class' =>'descanso' , 
														'style'=>'',
														'onkeypress'=>'validarNumeros(\'descanso\');',
														'onKeyUp'=>'validarNumeros(\'descanso\');',
														'value' => $info['descanso']); 
										
		 
										echo form_input($datos,'0',$info['descanso']);
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
														'onKeyUp'=>'validarNumeros(\'panales\');',
														'value' => $info['panales']); 
		
		 
										echo form_input($datos,'0',$info['panales']);
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
														'onKeyUp'=>'validarNumeros(\'pipi\');',
														'value' => $info['pipi']); 
										
		 
										echo form_input($datos,'0');
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
														'onKeyUp'=>'validarNumeros(\'caca\');',
														'value' => $info['caca']); 
		
		 
									echo form_input($datos,'0');
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
										echo form_dropdown('actitud', $opciones, $info['actitud'],'style="width:170px;"');
										
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
										echo form_dropdown('relaciones', $opciones, $info['relaciones'],'style="width:120px;"');
										?>
										
										
										<?php
										echo '<p><h2 style="clear: both">Educativo</h2></p>';
											echo '<div class="label">';
											echo form_label('Lectivo', 'lectivo');
											echo '</div>';
											echo form_input('lectivo',$info['lectivo'],'style="margin-left:21px;"');
											echo '<div class="label">';
											echo form_label('Lúdico', 'ludico');
											echo '</div>';
											echo form_input('ludico',$info['ludico'],'style="margin-left:21px;"');
											echo '<div class="label">';
											echo form_label('Otros datos', 'informacion');
											echo '</div>';
											echo form_textarea('informacion',$info['informacion'],'style="height: 70px; margin-left:21px;"');
										echo form_hidden('tipo', '3');
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