<div data-role="content" >
	<?php $primen = true; foreach ($clases as $clase) {
		if($primen){
			$primen=false;
			?>
			
			<div data-role="collapsible"  data-collapsed="false">
		    <h4>Clase: <?= $clase['nombre'] ?></h4>
		          <p><b>Tutor: </b><a href="<?= base_url() ?>usuario/perfil/<?= $clase['idtutor'] ?>" title="<?= $clase['nombretutor'] ?>"><?= $clase['nombretutor'] ?></a></p>
		          <p><b>Nº de alumnos: </b><?= $clase['numeroalumnos'] ?></p>
		          <p><b><a class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-arrow-r ui-btn-icon-left ui-btn-a" href="<?= base_url() ?>comun/clase/<?= $clase['id'] ?>" title="<?= $clase['nombre'] ?>"> Ir a la clase <?= $clase['nombre'] ?></a></p>
			</div>
			<?php
		}else{
			?>
			
			<div data-role="collapsible">
		    <h4>Clase: <?= $clase['nombre'] ?></h4>
		          <p><b>Tutor: </b><a href="<?= base_url() ?>usuario/perfil/<?= $clase['idtutor'] ?>" title="<?= $clase['nombretutor'] ?>"><?= $clase['nombretutor'] ?></a></p>
		          <p><b>Nº de alumnos: </b><?= $clase['numeroalumnos'] ?></p>
		          <p><b><a class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-arrow-r ui-btn-icon-left ui-btn-a" href="<?= base_url() ?>comun/clase/<?= $clase['id'] ?>" title="<?= $clase['nombre'] ?>"> Ir a la clase <?= $clase['nombre'] ?></a></p>
			</div>
			<?php
		}
	?>
	<?php	
	}
	?>
</div>