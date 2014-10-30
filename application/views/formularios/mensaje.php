<script  type="text/javascript">
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

function showSelectsd(name,dest){
    var selO = document.getElementsByName(name);
    var actual = document.getElementById(dest).value;
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
    document.getElementById(dest).value  = array;
}

function selectAll(name,source,dest) {
	checkboxes = document.getElementsByName(name);
	for(var i=0, n=checkboxes.length;i<n;i++) {
		checkboxes[i].checked = source.checked;
	}
	showSelectsd(name,dest);
}
</script>
<div class="contenidoBasico1">
	<div class="pizarra1">
		
	</div>
	<div class="pizarra2">
		<h2>Historial de mensajes</h2>
	<div class="pizarranoti" style="padding-top:10px; ">
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
	<h1 style="margin: 0px 0px 0px 0px;display: block;z-index: 100;text-align: center;">
		Enviar mensaje privado a los destinatarios:   <a class="fancybox" href="#select-mensaje-masivo" role="button">Enviar a</a>
	</h1>
	<div id="select-mensaje-masivo"id="select-mensaje-masivo" id="select-mensaje-masivo">
		<div class="select-tutores">
			<h1>Elija los tutores</h1>
			<label><input onclick="selectAll('check-tutores',this,'tutoresdest');"type="checkbox" name="select-all1" value="select-all1" checked/> Seleccionar todos </label>
			<?php foreach ($tutores as $key => $value) { if ($value['id'] != $this -> session -> userdata('id')){?>
	       			<label>
	       				<input onclick="showSelectsd('check-tutores','tutoresdest');"type="checkbox" name="check-tutores" value="<?= $value['id'] ?>" checked/>
	       				<?= $value['nombre']." ". $value['apellidos'] ?>
	       			</label>
			<?php }} ?>			
    	</div>
		
		<div class="select-madres" name="select-madres">
			<h1>Elija madres</h1>
			<label><input onclick="selectAll('check-madres',this,'familiaresdest');"type="checkbox" name="select-all2" value="select-all2" checked/> Seleccionar todos </label>
			<?php foreach ($familiaresmadres as $key => $value) { if ($value['id'] != $this -> session -> userdata('id')){?>
	       			<label>
	       				<input onclick="showSelectsd('check-madres','familiaresdest');"type="checkbox" name="check-madres" value="<?= $value['id'] ?>" checked/>
	       				<?= $value['nombre']." ". $value['apellidos'] ?>
	       			</label>
			<?php }} ?>			
    	</div>
    	
    	<div class="select-padres" name="select-padres">
			<h1>Elija padres</h1>
			<label><input onclick="selectAll('check-padres',this,'familiaresdest');"type="checkbox" name="select-all3" value="select-all3" checked/> Seleccionar todos </label>
			<?php foreach ($familiarespadres as $key => $value) { if ($value['id'] != $this -> session -> userdata('id')){?>
	       			<label>
	       				<input onclick="showSelectsd('check-padres','familiaresdest');" type="checkbox" name="check-padres" value="<?= $value['id'] ?>" checked/>
	       				<?= $value['nombre']." ". $value['apellidos'] ?>
	       			</label>
			<?php }} ?>			
    	</div>
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
		echo form_textarea('mensaje','','class="textarea-class", style="margin-top:10px;width:90%;"');
		echo '<p>'.form_submit('botonSubmit', 'Enviar','class="enviar-class"').'</p>';
		
		echo form_close();
	?>
	</div>
	</div>
	<div class="pizarra3">
		
	</div>
	

</div>