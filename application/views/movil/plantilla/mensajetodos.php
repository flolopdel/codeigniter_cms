

<div data-role="content">
	<?php if ($this -> session -> userdata('rol') != "2"){ ?>
	 	<a rel="external" data-theme="b" data-role="button" href="<?= base_url() . 'comun/enviar_mensaje/'?>">Enviar mensaje masivo</a>
	 <?php } ?>
	<h3 class="ui-bar ui-bar-a ui-corner-all"><center>Conversaciones</center></h3>
	
	<div class="ui-body ui-body-a ui-corner-all">
		<form>
		    <input data-type="search" id="filterControlgroup-input">
		</form>
		<div data-role="controlgroup" data-filter="true" data-input="#filterControlgroup-input">
			
			<?php
			$numeraciones = array();
			foreach ($mensajes as $key => $value) {
				if($value['noleido']){
				?>
				<form id="form<?= $value['id'] ?>" action="<?= base_url() ?>comun/ver_notificaciones_mensajes" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<a rel="external" onclick="form<?= $value['id'] ?>.submit();" class="ui-btn ui-shadow ui-corner-all">
					<?= $value['receptornombre'] ?><span  class="ui-li-count">*</span></a>
				<input type="hidden" name="redirect" value="comun/mensaje/<?= $value['receptor'] ?>" />
				<input type="hidden" name="receptor" value="<?= $value['receptor'] ?>" />
				<input type="hidden" name="emisor" value="<?= $value['emisor'] ?>" />
				</form>
		    <?php }else{ ?>
				<a rel="external" href="<?= base_url()."comun/mensaje/".$value['receptor'] ?>#formsend" class="ui-btn ui-shadow ui-corner-all"><?= $value['receptornombre'] ?></a>
			<?php }}
			foreach ($mensajes2 as $key => $value) { if(isset($value['emisornombre'])){?>
			<?php	if($value['noleido']){
				?>
				<form id="form<?= $value['id'] ?>" action="<?= base_url() ?>comun/ver_notificaciones_mensajes" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<a rel="external" onclick="form<?= $value['id'] ?>.submit();" class="ui-btn ui-shadow ui-corner-all">
					<?= $value['emisornombre'] ?><span  class="ui-li-count">*</span></a>
				<input type="hidden" name="redirect" value="comun/mensaje/<?= $value['emisor'] ?>" />
				<input type="hidden" name="receptor" value="<?= $value['receptor'] ?>" />
				<input type="hidden" name="emisor" value="<?= $value['emisor'] ?>" />
				</form>
		    <?php }else{ ?>
				<a rel="external" href="<?= base_url()."comun/mensaje/".$value['emisor'] ?>#formsend" class="ui-btn ui-shadow ui-corner-all"><?= $value['emisornombre'] ?></a>
			<?php } ?>
		    <?php } }?>
		</div>
	</div>
	
</div>