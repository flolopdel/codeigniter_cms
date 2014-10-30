<div data-role="content">
	<h3 class="ui-bar ui-bar-a ui-corner-all">
	<center>
		BUSCAR
	</center></h3>
	<div class="ui-body ui-body-a ui-corner-all">
		<form>
		    <input data-type="search" id="filterControlgroup-input">
		</form>
		<div data-role="controlgroup" data-filter="true" data-input="#filterControlgroup-input">
			
			<?php 
			$cprimen = true;
			$tprimen = true;
			$fprimen = true;
			$nprimen = true;
			foreach ($listaTotal as $key => $value) { ?>
				<?php if($value['tipo'] == "clase"){?>
				<?php if($cprimen){?>
				<li data-role="list-divider" role="heading" class="ui-li-divider ui-bar-a ui-first-child">Clases</li>
				<?php $cprimen =false;}?>
		    			<a href="<?= base_url()."comun/clase/".$value['id'] ?>" class="ui-btn ui-shadow ui-corner-all"><?= $value['desc'] ?></a>
				<?php }else if($value['tipo'] == "nino"){?>
				<?php if($nprimen){?>
				<li data-role="list-divider" role="heading" class="ui-li-divider ui-bar-a ui-first-child">Niños</li>
				<?php $nprimen =false;}?>
						<a href="<?= base_url()."usuario/perfilnino/".$value['id'] ?>" class="ui-btn ui-shadow ui-corner-all"><?= $value['desc'] ?></a>
				<?php }else if($value['tipo'] == "familiar"){?>
				<?php if($fprimen){?>
				<li data-role="list-divider" role="heading" class="ui-li-divider ui-bar-a ui-first-child">Familiar</li>
				<?php $fprimen =false;}?>
						<a href="<?= base_url()."usuario/perfil/".$value['id'] ?>" class="ui-btn ui-shadow ui-corner-all"><?= $value['desc'] ?></a>
				<?php }else if($value['tipo'] == "tutor"){?>
				<?php if($tprimen){?>
				<li data-role="list-divider" role="heading" class="ui-li-divider ui-bar-a ui-first-child">Tutores</li>
				<?php $tprimen =false;}?>
						<a href="<?= base_url()."usuario/perfil/".$value['id'] ?>" class="ui-btn ui-shadow ui-corner-all"><?= $value['desc'] ?></a>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>