<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox({
			maxWidth : 800,
			maxHeight : 600,
			fitToView : false,
			width : '100%',
			height : '100%',
			autoSize : true,
			closeClick : false,
			openEffect : 'none',
			closeEffect : 'none',
		});
	}); 
</script>
<div class="contenidoBasico1">
	<div class="infoperfiles">
		<div class="formularioEstandar">
			<div class="container">
				<div class="contentEstandar">
					<?php
						$this->load->helper("form");
				        echo form_open($action,"id=formglobal");
						echo form_hidden("form", "ok");
						echo validation_errors('<div class="cuadroErrores">','</div>');
					?>
					<?php $primen = true; $listaninovalue=""; foreach ($opcionesninos as $key => $value) {
						if($primen){
							$listaninovalue = $value['id'];
							$primen = false;
						}else{
							$listaninovalue .= ",".$value['id']; 
						}
					 } 
					 ?>
					<input type="hidden" id="ninos2" name="ninos2" value="<?= $listaninovalue ?>">
					<p>
						<h2 style="clear: both">Información diaria (Tutores)</h2>
					</p>
			    	<p><a class="fancybox" href="#multiselect" role="button">Campos del formulario</a></p>
			    	<div id="multiselect" class="multiselect-campos" name="multiselect-campos">
				   		<h1>Asistencial </h1>
					    <label><input onclick="showCampos();"type="checkbox" name="campos" value="valoracion" checked/><span>Valoración</span></label>
					  	<label><input onclick="showCampos();"type="checkbox" name="campos" value="alimentacion" checked/><span>Alimentación</span></label>
					  	<label><input onclick="showCampos();"type="checkbox" name="campos" value="salud" checked/><span>Salud</span></label>
					  	<label><input onclick="showCampos();"type="checkbox" name="campos" value="descanso" checked/><span>Descanso</span></label>
					  	<label><input onclick="showCampos();"type="checkbox" name="campos" value="pipi" checked/><span>Pipi</span></label>
					  	<label><input onclick="showCampos();"type="checkbox" name="campos" value="caca" checked/><span>Caca</span></label>
					  	<label><input onclick="showCampos();"type="checkbox" name="campos" value="panales" checked/><span>Pañales</span></label>
					  	<h1>Comportamental</h1>
					  	<label><input onclick="showCampos();"type="checkbox" name="campos" value="actitud" checked/><span>Actitud</span></label>
					  	<label><input onclick="showCampos();"type="checkbox" name="campos" value="relaciones" checked/><span>Relaciones</span></label>
					  	<h1>Educativo</h1>
					  	<label><input onclick="showCampos();"type="checkbox" name="campos" value="lectivo" checked/><span>Lectivo</span></label>
					  	<label><input onclick="showCampos();"type="checkbox" name="campos" value="ludico" checked/><span>Lúdico</span></label>
					  	<label><input onclick="showCampos();"type="checkbox" name="campos" value="informacion" checked/><span>Información</span></label>
					</div>				
			    	<p><a class="fancybox" href="#select-ninos" role="button">Aplicar a</a></p>  
					<div id="select-ninos"id="select-ninos" id="select-ninos">
							<div class="multiselect-ninos1" name="multiselect-ninos1">
								<h1>Grupo de mañana</h1>
								<label><input onclick="selectAll('select-ninos1',this);"type="checkbox" name="select-all1" value="select-all1" checked/> Seleccionar todos </label>
								<?php foreach ($opcionesninos1 as $key => $value)  { ?>
						      		<label><input onclick="showSelectsd('select-ninos1');"type="checkbox" name="select-ninos1" value="<?= $value['id'] ?>" checked/> <?= $value['desc'] ?> </label>
				 				<?php } ?>						        	
				        	</div>
							<div class="multiselect-ninos2" name="multiselect-ninos2">
								<h1>Grupo de mañana y tarde</h1> 
								<label><input onclick="selectAll('select-ninos2',this);"type="checkbox" name="select-all2" value="select-all2" checked/> Seleccionar todos </label>
								<?php foreach ($opcionesninos2 as $key => $value)  { ?>
						      		<label><input onclick="showSelectsd('select-ninos2');"type="checkbox" name="select-ninos2" value="<?= $value['id'] ?>" checked/> <?= $value['desc'] ?> </label>
				 				<?php } ?>
				        	</div>
				        	<div class="multiselect-ninos3" name="multiselect-ninos3">
				        		<h1>Grupo de comedor</h1>
				        			<label><input onclick="selectAll('select-ninos3',this);"type="checkbox" name="select-all3" value="select-all3" checked/> Seleccionar todos </label>
								<?php foreach ($opcionesninos3 as $key => $value)  { ?>
						      		<label><input onclick="showSelectsd('select-ninos3');"type="checkbox" name="select-ninos3" value="<?= $value['id'] ?>" checked/> <?= $value['desc'] ?> </label>
				 				<?php } ?>
						        				        	</div>
				        	<div class="multiselect-ninos4" name="multiselect-ninos4">
				        		<h1>Grupo de tarde</h1>
				        		<label><input onclick="selectAll('select-ninos4',this);"type="checkbox" name="select-all4" value="select-all4" checked/> Seleccionar todos </label>
								<?php foreach ($opcionesninos4 as $key => $value)  { ?>
						      		<label><input onclick="showSelectsd('select-ninos4');"type="checkbox" name="select-ninos4" value="<?= $value['id'] ?>" checked/> <?= $value['desc'] ?> </label>
				 				<?php } ?>						        	
				        	</div>       				
			 			</div>
	
	<h2 style="clear: both">Asistencial</h2>		
	<?php 
		
		echo '<div id="valoracion"  style="clear:both;">';
		echo '<div class="label">';
		echo form_label('Valoración', 'valoracion');
		echo '</div>';
		$opciones = array(
		'1' => '1 Estrella',
		'2' => '2 Estrellas',
		'3' => '3 Estrellas',
		'4' => '4 Estrellas',
		'5' => '5 Estrellas',);
		echo form_dropdown('valoracion', $opciones,'style="width:90%;"');
		echo "<input type='hidden' id='valoracion2' name='valoracion2' value='1'/>";
		echo '</div>';
		
		echo '<div id="salud-oculto" style="display:none; width: 400px; height:55px;float:left;">';
		echo '<div class="label">';
		echo '</div>';
		echo '</div>';
		
		
		echo '<div id="salud" class="div-izquierda">';
		echo '<div class="label">';
		echo form_label('Salud', 'salud');
		echo '</div>';
		$opciones = array(
			'Bien' => 'Bien',
			'Fiebre leve' => 'Fiebre leve',
			'Resfriado' => 'Resfriado',);
		echo form_dropdown('salud', $opciones, $this -> session -> userdata('salud'),'style="width:170px;"');
		echo "<input type='hidden' id='salud2' name='salud2' value='1'/>";
		echo '</div>';
		echo '<div id="alimentacion-oculto" style="display:none; width: 272px; height:55px; float: right;">';
		echo '<div style="width: 100px;
							float: left;
							padding-top: 10px;
							text-align: right;
							margin-right: -67px;">';		
		echo '</div>';
		echo '</div>';
		echo '<div id="alimentacion" class="div-derecha">';
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
		echo form_dropdown('alimentacion', $opciones, $this -> session -> userdata('alimentacion'),'style="width:152px;"');										
		echo "<input type='hidden' id='alimentacion2' name='alimentacion2' value='1'/>";								
		echo '</div>';
		
		echo '<div id="descanso-oculto" style="display:none; width: 400px; height:55px;float:left;">';
		echo '<div class="label">';
		echo '</div>';
		echo '</div>';
		
		echo '<div id="descanso" class="div-izquierda">';								
		echo '<div class="label">';
		echo form_label('Descanso', 'descanso');
		echo '</div>';
		
		$datos= array(	'name'=>'descanso' ,
						'type'=>'text', 
						'class' =>'descanso numberman' , 
						'style'=>'',
						'onkeypress'=>'validarNumeros(\'descanso\');',
						'onKeyUp'=>'validarNumeros(\'descanso\');',
						'style' => 'width:118px'); 
		
		 
		echo form_input($datos,'0',$this -> session -> userdata('descanso'));
		?>
		<div class="incremento">
			<div style="">
				<img src="<?php echo base_url(); ?>images/button1.png" onclick='incrementValue(15,"descanso");'/>
			</div>
			<div style="">
				<img src="<?php echo base_url(); ?>images/button2.png" onclick='incrementValue(-15,"descanso");'/>
			</div>	
			
		</div>
		
		<?php
		echo "<input type='hidden' id='descanso2' name='descanso2' value='1'/>";
		echo '</div>';
		echo '<div id="panales-oculto" style="display:none; width: 272px; height:55px; float: right;">';
		echo '<div style="width: 100px;
							float: left;
							padding-top: 10px;
							text-align: right;
							margin-right: -67px;">';		
		echo '</div>';
		echo '</div>';
		echo '<div id="panales"class="div-derecha">';
		echo '<div style="width: 100px;
							float: left;
							padding-top: 10px;
							text-align: right;
							margin-right: -67px;">';
		echo form_label('Cambio de pañales', 'panales');
		echo '</div>';
		$datos= array(	'name'=>'panales' ,
						'type'=>'text', 
						'class' =>'panales numberman' , 
						'style'=>'',
						'onkeypress'=>'validarNumeros(\'panales\');',
						'onKeyUp'=>'validarNumeros(\'panales\');'); 
		
		 
		echo form_input($datos,'0',$this -> session -> userdata('panales'));
		?>
		<div class="incremento">
			<div style="">
				<img src="<?php echo base_url(); ?>images/button1.png" onclick='incrementValue(1,"panales");'/>
			</div>
			<div style="">
				<img src="<?php echo base_url(); ?>images/button2.png" onclick='incrementValue(-1,"panales");'/>
			</div>	
			
		</div>
		
		<?php
		echo "<input type='hidden' id='panales2' name='panales2' value='1'/>";
		echo '</div>';		
		echo '<div id="pipi" class="div-izquierda">';
		echo '<div class="label">';
		echo form_label('Pipi', 'pipi');
		echo '</div>';
		$datos= array(	'name'=>'pipi' ,
						'type'=>'text', 
						'class' =>'pipi numberman' , 
						'style'=>'',
						'onkeypress'=>'validarNumeros(\'pipi\');',
						'onKeyUp'=>'validarNumeros(\'pipi\');',						
						'style' => 'width:118px');
		
		 
		echo form_input($datos,'0',$this -> session -> userdata('pipi'));
		?>
		<div class="incremento">
			<div style="">
				<img src="<?php echo base_url(); ?>images/button1.png" onclick='incrementValue(1,"pipi");'/>
			</div>
			<div style="">
				<img src="<?php echo base_url(); ?>images/button2.png" onclick='incrementValue(-1,"pipi");'/>
			</div>	
			
		</div>
		
		<?php
		echo "<input type='hidden' id='pipi2' name='pipi2' value='1'/>";
		echo '</div>';
		echo '<div id="caca"class="div-derecha">';
		echo '<div style="width: 100px;
							float: left;
							padding-top: 10px;
							text-align: right;
							margin-right: -67px;">';
		echo form_label('Caca', 'caca');
		echo '</div>';
		$datos= array(	'name'=>'caca' ,
						'type'=>'text', 
						'class' =>'caca numberman' , 
						'style'=>'',
						'onkeypress'=>'validarNumeros(\'caca\');',
						'onKeyUp'=>'validarNumeros(\'caca\');'); 
		
		 
		echo form_input($datos,'0',$this -> session -> userdata('caca'));
		?>
		<div class="incremento">
			<div style="">
				<img src="<?php echo base_url(); ?>images/button1.png" onclick='incrementValue(1,"caca");'/>
			</div>
			<div style="">
				<img src="<?php echo base_url(); ?>images/button2.png" onclick='incrementValue(-1,"caca");'/>
			</div>	
			
		</div>
		
		<?php
		echo "<input type='hidden' id='caca2' name='caca2' value='1'/>";
		echo '</div>';
			
		echo '<p><h2 style="clear: both">Comportamental</h2></p>';
		
		echo '<div id="actitud" class="div-izquierda">';
		echo '<div class="label">';
		echo form_label('Actitud', 'actitud');
		echo '</div>';
		$opciones = array(
			'Bien' => 'Bien',
			'Mal' => 'Mal',
			'Regular' => 'Regular');
		echo form_dropdown('actitud', $opciones, $this -> session -> userdata('actitud'),'style="width:170px;"');
		echo "<input type='hidden' id='actitud2' name='actitud2' value='1'/>";
		echo '</div>';
		echo '<div id="relaciones"class="div-derecha">';
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
		echo form_dropdown('relaciones', $opciones, $this -> session -> userdata('relaciones'),'style="width:152px;"');
		echo "<input type='hidden' id='relaciones2' name='relaciones2' value='1'/>";
		echo '</div>';

		echo '<p><h2 style="clear: both">Educativo</h2></p>';
		echo '<div id="lectivo">';								
		echo '<div class="label">';
		echo form_label('Lectivo', 'lectivo');
		echo '</div>';
		echo form_input('lectivo','',$this -> session -> userdata('lectivo'),'style="margin-left:21px;"');
		echo "<input type='hidden' id='lectivo2' name='lectivo2' value='1'/>";
		echo '</div>';
		echo '<div id="ludico">';
		echo '<div class="label">';
		echo form_label('Lúdico', 'ludico');
		echo '</div>';
		echo form_input('ludico','',$this -> session -> userdata('ludico'),'style="margin-left:21px;"');
		echo "<input type='hidden' id='ludico2' name='ludico2' value='1'/>";
		echo '</div>';
		echo '<div id="informacion">';
		echo '<div class="label">';
		echo form_label('Otros datos', 'informacion');
		echo '</div>';
		echo form_textarea('informacion','',$this -> session -> userdata('informacion'),'style="height: 70px; margin-left:21px;"');
		echo "<input type='hidden' id='informacion2' name='informacion2' value='1'/>";
		echo '</div>';
		?>
		
		
		<?php
		
		echo form_hidden('tipo', '3');
		echo form_hidden('clase', $claseuri);

		echo form_submit('botonSubmit', 'Enviar','style="float:right; margin-right:70px;"');
		echo form_close();
	?>
					<div style="height: 20px;"></div>
				</div>
			</div>
		</div>
	</div>
</div>

			<script  type="text/javascript">
					
			function showSelectsd(name){
			    var selO = document.getElementsByName(name);
			    var actual = document.getElementById("ninos2").value;
			    var array=actual.split(",");	
			    if(array[0]==""){
			    	array=[]    	
			    } 
			    for(i=0; i < selO.length; i++){
			        if(selO[i].checked){			            
			            if(array.indexOf(selO[i].value) == -1){
			        		array.push(selO[i].value);
			        	}		
			        }else{
			        	if(array.indexOf(selO[i].value) > -1){
			        		var index = array.indexOf(selO[i].value);
				        	array.splice(index,1);
			        	}			        	
			        }
			    }
			    document.getElementById("ninos2").value  = array;
			    console.log(document.getElementById("ninos2").value);
			}
			
			function selectAll(name,source) {
  				checkboxes = document.getElementsByName(name);
  				for(var i=0, n=checkboxes.length;i<n;i++) {
    				checkboxes[i].checked = source.checked;
  				}
  				showSelectsd(name);
			}
			
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
			
			function showCampos(){
			    $("#valoracion").css("display", "none");
			    document.getElementById("valoracion2").value  = "0";
			    $("#alimentacion").css("display", "none");
			    document.getElementById("alimentacion2").value  = "0";
			    $("#descanso").css("display", "none");
			    document.getElementById("descanso2").value  = "0";
			    $("#salud").css("display", "none");
			    document.getElementById("salud2").value  = "0";
			    $("#pipi").css("display", "none");
			    document.getElementById("pipi2").value  = "0";
			    $("#caca").css("display", "none");
			    document.getElementById("caca2").value  = "0";
			    $("#panales").css("display", "none");
			    document.getElementById("panales2").value  = "0";
			    $("#actitud").css("display", "none");
			    document.getElementById("actitud2").value  = "0";
			    $("#relaciones").css("display", "none");
			    document.getElementById("relaciones2").value  = "0";
			    $("#lectivo").css("display", "none");
			    document.getElementById("lectivo2").value  = "0";
			    $("#ludico").css("display", "none");
			    document.getElementById("ludico2").value  = "0";
			    $("#informacion").css("display", "none");
			    document.getElementById("informacion2").value  = "0";
			    var selO = document.getElementsByName("multiselect-campos")[0].children;
			    var selValues = [];
			    for(i=0; i<selO.length;i++){
			    	if(selO[i].firstChild!=null){
			        	if(selO[i].firstChild.checked){
							$("#"+selO[i].firstChild.value).css("display", "block");
						 	document.getElementById(selO[i].firstChild.value+"2").value  = "1";
			        	}
			        }
			    }
			    if($("#alimentacion2").val()==0){
			    	$("#alimentacion-oculto").css("display","block");
			    }else{
			    	$("#alimentacion-oculto").css("display","none");
			    }if($("#panales2").val()==0){
			    	$("#panales-oculto").css("display","block");
			    }else{
			    	$("#panales-oculto").css("display","none");
			    }if($("#salud2").val()==0){
			    	$("#salud-oculto").css("display","block");
			    }else{
			    	$("#salud-oculto").css("display","none");
			    }if($("#descanso2").val()==0){
			    	$("#descanso-oculto").css("display","block");
			    }else{
			    	$("#descanso-oculto").css("display","none");
			    }
			    
			}
			
			</script>

