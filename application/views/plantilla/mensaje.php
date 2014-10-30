<?php
	if(!$this->uri->segment(4)){
?>	
<script>
 $("body").animate({scrollTop: 1220 },
1500);
</script>
<?php	
	}
?>

<div class="contenidoBasico1">
	<div class="pizarra1">
		
	</div>
	<div class="pizarra2">		
		<h2 style="font-size: 30px;">Conversacion <?= $receptornombre ?>  -  <?= $emisornombre ?></h2>
		<div class='button_left' id='button_left' style=''>
			<a href="<?php echo base_url(); ?>usuario/mensaje"><img  src="<?php echo base_url(); ?>images/arrow_left.png" style="width: 100%"/> </a>
		</div>
		<div class="pizarranoti" style="padding-top:10px; ">
		<div class='button_down' id='button_down' style=''></div>
		
		<?php
		$vara = $this->uri->segment(3);
		if($this->uri->segment(4)){
			$varb = $this->uri->segment(4)+10;
		}else{
			$varb = $this->uri->segment(4)+20;
		}
		$moduloa = $varb/10;
		$moduloi = $i/10;
		if($i>$varb-9){
		?>
			<a style="color: snow;padding: 5px;cursor: pointer;margin-left:32px;float:left;width:70%;" data-icon="plus" data-role="button" href="<?= base_url() ?>comun/mensaje/<?= $vara ?>/<?= $varb ?>" title="Ver mensajes anteriores...">Ver mensajes anteriores...</a>
		<?php } ?>
		
		<?php
		$res = "";
		foreach ($listaFechas as $key2 => $value2) {
			foreach ($mensajes as $key => $value) {
					if ($value2['fecha'] == $value['fecha']) {
						if ($value['emisor'] == $this -> session -> userdata('id')) {
							$res .= '<div class="ui-body ui-body-a ui-corner-all" align="right" style="background-color:black; margin-left:10%;word-wrap:break-word; margin-bottom:5px;border-radius:15px;">
									<p style="text-align:right;padding:10px; margin-left:10px; margin-right:10px ">' . $value['mensaje'] . '</p><small style="margin-left:10px; margin-right:10px"><small>' . $value['hora'] . '</small></small></div>';
						} else if ($value['emisor'] != $this -> session -> userdata('id')) {
							$res .= '<div class="ui-body ui-body-a ui-corner-all" style="background-color:white; color:black; margin-right:10%;word-wrap:break-word; margin-bottom:5px;border-radius:15px;">
									<p style="text-align:left;padding:10px; margin-left:10px; margin-right:10px">' . $value['mensaje'] . '</p> <small style="margin-left:10px; margin-right:10px"><small>' . $value['hora'] . '</small></small></div>';
						}
				}
			}
			echo '<h2 style="font-size: 20px;clear:both; "><center>' . $this->comunes->fechamensajes($value2['fecha']) . '</center></h2>';
			echo $res;
		}
		?>
		<?php
			$this -> load -> helper("form");
			if ($this -> session -> userdata('errorvalidacion')) {
				echo '<div class="cuadroErrores">' . $this -> session -> userdata('errorvalidacion') . '</div>';
				$newdata = array('errorvalidacion' => '');
				$this -> session -> set_userdata($newdata);
			}
			echo validation_errors('<div class="cuadroErrores">', '</div>');
			echo form_open_multipart($action,"id=formsend");
			echo form_textarea('mensaje','','class="textarea-class", style="margin-top:10px;width:90%;"');
			echo form_hidden('receptor',$receptorid);
			echo '<p>'.form_submit('botonSubmit', 'Enviar','id="scroll-bottom" class="enviar-class"').'</p>';
			echo form_close();
		?>
		</div>
	</div>
	<div class="pizarra3">
		
	</div>
	
</div>
<script type="text/javascript">
	$('#button_down').click(
		function (e) {
			document.getElementById('scroll-bottom').scrollIntoView(true);
		} 
	);
	
</script>