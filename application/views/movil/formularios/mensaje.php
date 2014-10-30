<script  type="text/javascript">
			
			function showSelectTutores(){
			    var selO = document.getElementsByName('tutores')[0];
			    var selValues = [];
			    for(i=0; i < selO.length; i++){
			        if(selO.options[i].selected){
			            selValues.push(selO.options[i].value);
			        }
			    }
			    document.getElementById("tutoresdest").value  = selValues;
			}
			function showSelectFamiliares(){
			    var selO = document.getElementsByName('familiares')[0];
			    var selValues = [];
			    for(i=0; i < selO.length; i++){
			        if(selO.options[i].selected){
			            selValues.push(selO.options[i].value);
			        }
			    }
			    document.getElementById("familiaresdest").value  = selValues;
			}
</script>
<div data-role="content">
	<?php if ($this -> session -> userdata('exito')){ ?>
						<p>
							<center  style="color:red;">
								<?= $this -> session -> userdata('exito')  ?>
							</center>
						</p>
						<?php 
							$array_items = array('exito' => '');
							$this->session->unset_userdata($array_items);
						 ?>
					<?php } ?>
	<h3 class="ui-bar ui-bar-a ui-corner-all">Enviar mensaje privado a los destinatarios:</h3>
	<div class="ui-field-contain">
		<label for="tutores">Tutores:</label>
	 <select onchange="showSelectTutores();" name="tutores" id="tutores" multiple="multiple" data-native-menu="false">
			        <option>Elija los tutores</option>
			        <?php foreach ($tutores as $key => $value) { if ($value['id'] != $this -> session -> userdata('id')){?>
	       			<option value="<?= $value['id'] ?>" selected="selected"><?= $value['nombre']." ". $value['apellidos'] ?></option>
					<?php }} ?>
	 </select>
		<label for="tutores">Familiares:</label>
	 <select onchange="showSelectFamiliares();" name="familiares" id="familiares" multiple="multiple" data-native-menu="false">
			        <option>Elija los familiares</option>
			        <optgroup label="Madres">
			        <?php foreach ($familiaresmadres as $key => $value) { if ($value['id'] != $this -> session -> userdata('id')){?>
	       			<option value="<?= $value['id'] ?>" selected="selected"><?= $value['nombre']." ". $value['apellidos'] ?></option>
					<?php }} ?>
					</optgroup>
			        <optgroup label="Padres">
			        <?php foreach ($familiarespadres as $key => $value) { if ($value['id'] != $this -> session -> userdata('id')){?>
	       			<option value="<?= $value['id'] ?>" selected="selected"><?= $value['nombre']." ". $value['apellidos'] ?></option>
					<?php }} ?>
					</optgroup>
	 </select>
	 </div>
	<?php
		$this -> load -> helper("form");
		if ($this -> session -> userdata('errorvalidacion')) {
			echo '<div class="cuadroErrores">' . $this -> session -> userdata('errorvalidacion') . '</div>';
			$newdata = array('errorvalidacion' => '');
			$this -> session -> set_userdata($newdata);
		}
		echo validation_errors('<div class="cuadroErrores">', '</div>');
		echo form_open_multipart($action);
		$primen = true; 
		$listadestinatarios=""; 
		foreach ($tutores as $key => $value) {
		if ($value['id'] != $this -> session -> userdata('id')){
			if($primen){
					$listadestinatarios = $value['id'];
					$primen = false;
				}else{
					$listadestinatarios .= ",".$value['id']; 
				}
			}
		}
		$primen = true; 
		$listadestinatarios2="";
		foreach ($familiaresmadres as $key => $value) {
		if ($value['id'] != $this -> session -> userdata('id')){
			if($primen){
					$listadestinatarios2 = $value['id'];
					$primen = false;
				}else{
					$listadestinatarios2 .= ",".$value['id']; 
				}
			}
		}
		foreach ($familiarespadres as $key => $value) {
		if ($value['id'] != $this -> session -> userdata('id')){
			if($primen){
					$listadestinatarios2 = $value['id'];
					$primen = false;
				}else{
					$listadestinatarios2 .= ",".$value['id']; 
				}
			}
		}
		?>
		<input type="hidden" id="tutoresdest" name="tutoresdest" value="<?= $listadestinatarios ?>">
		<input type="hidden" id="familiaresdest" name="familiaresdest" value="<?= $listadestinatarios2 ?>">
		<?php
		echo form_textarea('mensaje');
		echo '<p>'.form_submit('botonSubmit', 'Enviar','data-theme="b"').'</p>';
		
		echo form_close();
	?>
</div>