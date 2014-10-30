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

<div id="final" data-role="content">
	<h3 class="ui-bar ui-bar-a ui-corner-all">Conversacion <?= $emisornombre ?> - <?= $receptornombre ?></h3>
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
		<a data-icon="plus" data-role="button" href="<?= base_url() ?>comun/mensaje/<?= $vara ?>/<?= $varb ?>" title="Ver mensajes anteriores...">Ver mensajes anteriores...</a>
	<?php } ?>
	
	<?php
	foreach ($listaFechas as $key2 => $value2) {
	$res = "";
		foreach ($mensajes as $key => $value) {
				if ($value2['fecha'] == $value['fecha']) {
					if ($value['emisor'] == $this -> session -> userdata('id')) {
						$res .= '<div class="ui-body ui-body-a ui-corner-all" align="right" style="background-color:bisque; margin-left:10%; margin-bottom:5px;">
								<p>' . $value['mensaje'] . '</p><small><small>' . $value['hora'] . '</small></small></div>';
					} else if ($value['emisor'] != $this -> session -> userdata('id')) {
						$res .= '<div class="ui-body ui-body-a ui-corner-all" style="margin-right:10%; margin-bottom:5px;">
								<p>' . $value['mensaje'] . '</p> <small><small>' . $value['hora'] . '</small></small></div>';
					}
			}
		}
		echo '<h5 class="ui-bar ui-bar-a ui-corner-all"><center>' . $this->comunes->fechamensajes($value2['fecha']) . '</center></h5>';
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
		echo form_textarea('mensaje');
		echo form_hidden('receptor',$receptorid);
		echo '<p>'.form_submit('botonSubmit', 'Enviar','data-theme="b"').'</p>';
		echo form_close();
	?>
	
</div>