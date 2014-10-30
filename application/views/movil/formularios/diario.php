<!-- <script>
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
</script> -->
<!-- VISTA HORINZONTAL -->
<div data-role="content" id="horizontal" style="display:block;">
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
			 } ?>
			<input type="hidden" id="ninos2" name="ninos2" value="<?= $listaninovalue ?>">
			<div class="ui-field-contain">
				
			    <label for="ninos">Campos del formulario:</label>
			    <select onchange="showCampos();" name="campos" id="campos" multiple="multiple" data-native-menu="false">
			        <option>Elija los campos del formulario</option>
			        	<optgroup label="Asistencial">
       					 <option value="valoracion" <?= $formulario['valoracionselect'] ?>>Valoración</option>
       					 <option value="alimentacion" <?= $formulario['alimentacionselect'] ?>>Alimentación</option>
       					 <option value="salud" <?= $formulario['saludselect'] ?>>Salud</option>
       					 <option value="descanso" <?= $formulario['descansoselect'] ?>>Descanso</option>
       					 <option value="pipi" <?= $formulario['pipiselect'] ?>>Pipi</option>
       					 <option value="caca" <?= $formulario['cacaselect'] ?>>Caca</option>
       					 <option value="panales" <?= $formulario['panalesselect'] ?>>Cambio de pañales</option>
			        	</optgroup>
			        	<optgroup label="Comportamental">
       					 <option value="actitud" <?= $formulario['actitudselect'] ?>>Actitud</option>
       					 <option value="relaciones" <?= $formulario['relacionesselect'] ?>>Relaciones</option>
			        	</optgroup>
			        	<optgroup label="Educativo">
       					 <option value="lectivo" <?= $formulario['lectivoselect'] ?>>Lectivo</option>
       					 <option value="ludico" <?= $formulario['ludicoselect'] ?>>Lúdico</option>
       					 <option value="informacion" <?= $formulario['informacionselect'] ?>>Información</option>
			        	</optgroup>
			   
			    </select>
			    </div>
			<div class="ui-field-contain">
				
			    <label for="ninos">Aplicar a:</label>
			    <select onchange="showSelectsd();" name="ninos" id="ninos" multiple="multiple" data-native-menu="false">
			        <option>Elija los niños</option>
			        	<optgroup label="Grupo de mañana">
			       	<?php  foreach ($opcionesninos1 as $key => $value) { ?>
       					 <option value="<?= $value['id'] ?>" selected="selected"><?= $value['desc'] ?></option>
			        <?php } ?>
			        	</optgroup>
			        	<optgroup label="Grupo de mañana y tarde">
			        <?php  foreach ($opcionesninos2 as $key => $value) { ?>
       					 <option value="<?= $value['id'] ?>" selected="selected"><?= $value['desc'] ?></option>
			        <?php } ?>
			        	</optgroup>
			        	<optgroup label="Grupo de comedor">
			       	<?php  foreach ($opcionesninos3 as $key => $value) { ?>
       					 <option value="<?= $value['id'] ?>" selected="selected"><?= $value['desc'] ?></option>
			        <?php } ?>
			        	</optgroup>
			        	<optgroup label="Grupo de tarde">
			        <?php  foreach ($opcionesninos4 as $key => $value) { ?>
       					 <option value="<?= $value['id'] ?>" selected="selected"><?= $value['desc'] ?></option>
			        <?php } ?>
			        	</optgroup>
			    </select>
			    </div>
	<h3 class="ui-bar ui-bar-a ui-corner-all">Asistencial</h3>
	<?php 
	echo '<div class="ui-field-contain" id="valoracion" '.$formulario['valoracionstyle'].'>';
		echo form_label('Valoración', 'valoracion');
		$opciones = array(
		'1' => '1 Estrella',
		'2' => '2 Estrellas',
		'3' => '3 Estrellas',
		'4' => '4 Estrellas',
		'5' => '5 Estrellas',);
		echo form_dropdown('valoracion', $opciones);
		echo "<input type='hidden' id='valoracion2' name='valoracion2' value='".$formulario['valoracion']."'/>";
		echo '</div>';
		echo '
		<div class="ui-field-contain" id="alimentacion" '.$formulario['alimentacionstyle'].'>
		';
		echo form_label('Alimentación', 'alimentacion');
		$opciones = array(
		'Poco' => 'Poco',
		'Mucho' => 'Mucho',
		'Nada' => 'Nada',);
		echo form_dropdown('alimentacion', $opciones, $this -> session -> userdata('alimentacion'));
		echo "<input type='hidden' id='alimentacion2' name='alimentacion2' value='".$formulario['alimentacion']."'/>";
		echo '
		</div>';
		echo '
		<div class="ui-field-contain" id="salud" '.$formulario['saludstyle'].'>
		';
		echo form_label('Salud', 'salud');
		$opciones = array(
		'Bien' => 'Bien',
		'Fiebre leve' => 'Fiebre leve',
		'Resfriado' => 'Resfriado',);
		echo form_dropdown('salud', $opciones, $this -> session -> userdata('salud'));
		echo "<input type='hidden' id='salud2' name='salud2' value='".$formulario['salud']."'/>";
		echo '
		</div>';
		echo '
		<div class="ui-field-contain" id="descanso" '.$formulario['descansostyle'].'>
		';
		echo form_label('Descanso', 'descanso');
		echo '<input type="range" name="descanso" value="30" min="0" max="150" step="15" data-highlight="true">';
		echo "<input type='hidden' id='descanso2' name='descanso2' value='".$formulario['descanso']."'/>";
		echo '</div>';
		echo '
		<div class="ui-field-contain" id="pipi" '.$formulario['pipistyle'].'>
		';
		echo form_label('Pipi', 'pipi');
		echo '<input type="range" name="pipi" value="1" min="0" max="6" data-highlight="true">';
		echo "<input type='hidden' id='pipi2' name='pipi2' value='".$formulario['pipi']."'/>";
		echo '</div>';
		echo '
		<div class="ui-field-contain" id="caca" '.$formulario['cacastyle'].'>
		';
		echo form_label('Caca', 'caca');
		echo '<input type="range" name="caca" value="1" min="0" max="6" data-highlight="true">';
		echo "<input type='hidden' id='caca2' name='caca2' value='".$formulario['caca']."'/>";
		echo '</div>';
		echo '
		<div class="ui-field-contain" id="panales"  '.$formulario['panalesstyle'].'>
		';
		echo form_label('Cambio de pañales', 'panales');
		echo '<input type="range" name="panales" value="1" min="0" max="6" data-highlight="true">';
		echo "<input type='hidden' id='panales2' name='panales2' value='".$formulario['pipi']."'/>";
		echo '</div>';
		echo '
		<h3 class="ui-bar ui-bar-a ui-corner-all">Comportamental</h3>
		';
		echo '
		<div class="ui-field-contain" id="actitud" '.$formulario['actitudstyle'].'>
		';
		echo form_label('Actitud', 'actitud');
		$opciones = array(
		'Buena' => 'Buena',
		'Mala' => 'Mala',
		'Regular' => 'Regualar',);
		echo form_dropdown('actitud', $opciones, $this -> session -> userdata('actitud'));
		echo "<input type='hidden' id='actitud2' name='actitud2' value='".$formulario['actitud']."'/>";
		echo '
		</div>';
		echo '
		<div class="ui-field-contain" id="relaciones" '.$formulario['relacionesstyle'].'>
		';
		echo form_label('Relaciones', 'relaciones');
		$opciones = array(
		'Bien' => 'Bien',
		'Mal' => 'Mal',
		'Regular' => 'Regualar',);
		echo form_dropdown('relaciones', $opciones, $this -> session -> userdata('relaciones'));
		echo "<input type='hidden' id='relaciones2' name='relaciones2' value='".$formulario['relaciones']."'/>";
		echo '
		</div>';
		echo '
		<h3 class="ui-bar ui-bar-a ui-corner-all">Educativo</h3>
		';
		echo '
		<div class="ui-field-contain" id="lectivo" '.$formulario['lectivostyle'].'>
		';
		echo form_label('Lectivo', 'lectivo');
		echo form_input('lectivo',$this -> session -> userdata('lectivo'));
		echo "<input type='hidden' id='lectivo2' name='lectivo2' value='".$formulario['lectivo']."'/>";
		echo '
		</div>';
		echo '
		<div class="ui-field-contain" id="ludico" '.$formulario['ludicostyle'].'>
		';
		echo form_label('Lúdico', 'ludico');
		echo form_input('ludico',$this -> session -> userdata('ludico'));
		echo "<input type='hidden' id='ludico2' name='ludico2' value='".$formulario['ludico']."'/>";
		echo '
		</div>';
		echo '
		<div class="ui-field-contain" id="informacion" '.$formulario['informacionstyle'].'>
		';
		echo form_label('Otros datos', 'informacion');
		echo form_textarea('informacion',$this -> session -> userdata('informacion'));
		echo "<input type='hidden' id='informacion2' name='informacion2' value='".$formulario['informacion']."'/>";
		echo '
		</div>';
		echo form_hidden('tipo', '3');
		echo form_hidden('clase', $claseuri);

		echo form_submit('botonSubmit', 'Enviar','data-theme="b" data-icon="edit"');
		echo form_close();
	?>
			</div>

			<script  type="text/javascript">
			
			function showSelectsd(){
			    var selO = document.getElementsByName('ninos')[0];
			    var selValues = [];
			    for(i=0; i < selO.length; i++){
			        if(selO.options[i].selected){
			            selValues.push(selO.options[i].value);
			        }
			    }
			    document.getElementById("ninos2").value  = selValues;
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
			    var selO = document.getElementsByName('campos')[0];
			    var selValues = [];
			    for(i=0; i < selO.length; i++){
			        if(selO.options[i].selected){
						$("#"+selO.options[i].value).css("display", "block");
						 document.getElementById(selO.options[i].value+"2").value  = "1";
			        }
			    }
			    
			}
			</script>
<!-- VISTA VERTICAL -->
<!-- <div data-role="content" id="vertical"  style="display:block;">
						
</div> -->
