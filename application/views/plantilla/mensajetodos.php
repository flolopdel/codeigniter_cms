<div class="contenidoBasico1">
	<div class="pizarra1">
		
	</div>
	<div class="pizarra2">
		<h2>Historial de mensajes</h2>
	<div class="pizarranoti" style="padding-top:10px; ">
			<?php if ($this -> session -> userdata('rol') != "2"){ ?>
		 		<div style="text-align: right;font-size: 30px;margin-right: 6%;">
		 			<a rel="external" data-theme="b" data-role="button" href="<?= base_url() . 'comun/enviar_mensaje/'?>">Enviar mensaje masivo</a>
		 		</div>
			<?php } ?>
			<form style="float: right">
			    <input data-type="search" placeholder="Buscador" id="search" type="text" >
			</form>
			<div class="mensajes-pizarra" data-role="controlgroup" data-filter="true" data-input="#filterControlgroup-input">
				
				<?php
				$numeraciones = array();
				foreach ($mensajes as $key => $value) {
					if($value['noleido']){
					?>
					<form id="form<?= $value['id'] ?>" action="<?= base_url() ?>comun/ver_notificaciones_mensajes" method="post" accept-charset="utf-8" enctype="multipart/form-data">
					<input type="hidden" name="redirect" value="comun/mensaje/<?= $value['receptor'] ?>" />
					<input type="hidden" name="receptor" value="<?= $value['receptor'] ?>" />
					<input type="hidden" name="emisor" value="<?= $value['emisor'] ?>" />
					</form>
					<a rel="external" onclick="form<?= $value['id'] ?>.submit();" class="ui-btn ui-shadow ui-corner-all">
						<?= $value['receptornombre'] ?><span  class="ui-li-count"> *</span></a>
			    <?php }else{ ?>
					<a rel="external" href="<?= base_url()."comun/mensaje/".$value['receptor'] ?>#formsend" class="ui-btn ui-shadow ui-corner-all"><?= $value['receptornombre'] ?></a>
				<?php }}
				foreach ($mensajes2 as $key => $value) { if(isset($value['emisornombre'])){?>
				<?php	if($value['noleido']){
					?>
					<form id="form<?= $value['id'] ?>" action="<?= base_url() ?>comun/ver_notificaciones_mensajes" method="post" accept-charset="utf-8" enctype="multipart/form-data">
					<input type="hidden" name="redirect" value="comun/mensaje/<?= $value['emisor'] ?>" />
					<input type="hidden" name="receptor" value="<?= $value['receptor'] ?>" />
					<input type="hidden" name="emisor" value="<?= $value['emisor'] ?>" />
					</form>
					<a rel="external" onclick="form<?= $value['id'] ?>.submit();" class="ui-btn ui-shadow ui-corner-all">
						<?= $value['emisornombre'] ?><span  class="ui-li-count">*</span></a>
			    <?php }else{ ?>
					<a rel="external" href="<?= base_url()."comun/mensaje/".$value['emisor'] ?>#formsend" class="ui-btn ui-shadow ui-corner-all"><?= $value['emisornombre'] ?></a>
				<?php } ?>
			    <?php } }?>
		</div>
		</div>
	</div>
	<div class="pizarra3">
		
	</div>
	
</div>
<script type="text/javascript">
	$('#search').keyup(function(){
   var valThis = $(this).val().toLowerCase();
    $('.mensajes-pizarra>a').each(function(){
     var text = $(this).text().toLowerCase();
        (text.indexOf(valThis) == -1) ? $(this).hide():$(this).show();            
   });
});

</script>