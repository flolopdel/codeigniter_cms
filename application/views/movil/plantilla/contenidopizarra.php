<div data-role="content">
	 <div data-inline="true">
		<h3 class="ui-bar ui-bar-a ui-corner-all"><center>NOTIFICACIONES RECIENTES
		
		
		<a style="width:40%;"  data-role="button" href="<?= base_url()?>comun/marcar_notificaciones/<?= $this -> session -> userdata('id') ?>">Marcar todas como leidas</a>
		</center>
		</h3>
	</div>
	
			<div class="ui-body ui-body-a ui-corner-all notificaciones">
						<?php if (isset($notificaciones)){
						foreach ($notificaciones as $key => $value) { 
			?>
			<?php if ($value['tipo'] == 1){?>
				<form id="form<?= $value['id'] ?>" action="<?= base_url() ?>comun/ver_notificaciones" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<?php
				if($value['notinueva'] != ""):
				?>
				<a alt="marcar como leida" title="marcar como leida" href="<?= base_url()?>comun/marcar_notificacion_id/<?= $value['id'] ?>"><span alt="marcar como leida" title="marcar como leida" class="ico-insert"></span></a>
				<?php
				else:
				?>
				<span class="ico-insert"></span>
				<?php	
				endif;
				?>
				<p onclick="form<?= $value['id'] ?>.submit();" <?= $value['notinueva'] ?>>
					[<?= $value['fecha']." ". $value['hora'] ?>] - <?= $value['autor_nombre'] ?> (<?= $value['autor_rol'] ?>) ha insertado la información 
					<?php if($value['objetivo_sexo'] == "h"){ ?> del niño <?php }else{ ?> de la niña <?php } ?><?= $value['objetivo_nombre'] ?> correspondiente al 
					<?= $this -> comunes -> fechaElegida($value['year'], $value['mon'], $value['day']) ?>
				</p>
				<input type="hidden" name="redirect" value="<?= $value['objetivo_enlace'] ?>" />
				<input type="hidden" name="idnoti" value="<?= $value['id'] ?>" />
				</form>
			<?php }else if ($value['tipo'] == 2){?>
				<form id="form<?= $value['id'] ?>" action="<?= base_url() ?>comun/ver_notificaciones" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<?php
				if($value['notinueva'] != ""):
				?>
				<a alt="marcar como leida" title="marcar como leida" href="<?= base_url()?>comun/marcar_notificacion_id/<?= $value['id'] ?>"><span alt="marcar como leida" title="marcar como leida" class="ico-edit"></span></a>
				<?php
				else:
				?>
				<span class="ico-edit"></span>
				<?php	
				endif;
				?>
				<p onclick="form<?= $value['id'] ?>.submit();" <?= $value['notinueva'] ?>>
					[<?= $value['fecha']." ". $value['hora'] ?>] - <?= $value['autor_nombre'] ?> (<?= $value['autor_rol'] ?>) ha modificado la información 
					<?php if($value['objetivo_sexo'] == "h"){ ?> del niño <?php }else{ ?> de la niña <?php } ?><?= $value['objetivo_nombre'] ?> correspondiente al 
					<?= $this -> comunes -> fechaElegida($value['year'], $value['mon'], $value['day']) ?>
				</p>
				<input type="hidden" name="redirect" value="<?= $value['objetivo_enlace'] ?>" />
				<input type="hidden" name="idnoti" value="<?= $value['id'] ?>" />
				</form>
			<?php }else if ($value['tipo'] == 3){?>
				<form id="form<?= $value['id'] ?>" action="<?= base_url() ?>comun/ver_notificaciones" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<?php
				if($value['notinueva'] != ""):
				?>
				<a alt="marcar como leida" title="marcar como leida" href="<?= base_url()?>comun/marcar_notificacion_id/<?= $value['id'] ?>"><span alt="marcar como leida" title="marcar como leida" class="ico-nuevonino"></span></a>
				<?php
				else:
				?>
				<span class="ico-nuevonino"></span>
				<?php	
				endif;
				?>
				<p onclick="form<?= $value['id'] ?>.submit();" <?= $value['notinueva'] ?>>
					[<?= $value['fecha']." ". $value['hora'] ?>] - <?= $value['autor_nombre'] ?> (<?= $value['autor_rol'] ?>) ha registrado 
					<?php if($value['objetivo_sexo'] == "h"){ ?> un nuevo niño, <?php }else{ ?> una nueva niña <?php } ?><?= $value['objetivo_nombre'] ?>, debe asignarle una clase para que pueda disponer de los servicios de la aplicación.
				</p>
				<input type="hidden" name="redirect" value="<?= $value['objetivo_enlace'] ?>" />
				<input type="hidden" name="idnoti" value="<?= $value['id'] ?>" />
				</form>
			<?php }else if ($value['tipo'] == 4){?>
				<form id="form<?= $value['id'] ?>" action="<?= base_url() ?>comun/ver_notificaciones" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<?php
				if($value['notinueva'] != ""):
				?>
				<a alt="marcar como leida" title="marcar como leida" href="<?= base_url()?>comun/marcar_notificacion_id/<?= $value['id'] ?>"><span alt="marcar como leida" title="marcar como leida" class="ico-nuevonino"></span></a>
				<?php
				else:
				?>
				<span class="ico-nuevonino"></span>
				<?php	
				endif;
				?>
				<p onclick="form<?= $value['id'] ?>.submit();" <?= $value['notinueva'] ?>>
					[<?= $value['fecha']." ". $value['hora'] ?>] - <?= $value['autor_nombre'] ?> (<?= $value['autor_rol'] ?>) ha asignado una clase para 
					<?php if($value['objetivo_sexo'] == "h"){ ?> el niño, <?php }else{ ?> la niña <?php } ?><?= $value['objetivo_nombre'] ?>, ya puede acceder a su perfil.
				</p>
				<input type="hidden" name="redirect" value="<?= $value['objetivo_enlace'] ?>" />
				<input type="hidden" name="idnoti" value="<?= $value['id'] ?>" />
				</form>
			<?php }else if ($value['tipo'] == 5){?>
				<form id="form<?= $value['id'] ?>" action="<?= base_url() ?>comun/ver_notificaciones" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<?php
				if($value['notinueva'] != ""):
				?>
				<a alt="marcar como leida" title="marcar como leida" href="<?= base_url()?>comun/marcar_notificacion_id/<?= $value['id'] ?>"><span alt="marcar como leida" title="marcar como leida" class="ico-etiq"></span></a>
				<?php
				else:
				?>
				<span class="ico-etiq"></span>
				<?php	
				endif;
				?>
				<p onclick="form<?= $value['id'] ?>.submit();" <?= $value['notinueva'] ?>>
					[<?= $value['fecha']." ". $value['hora'] ?>] - <?= $value['autor_nombre'] ?> (<?= $value['autor_rol'] ?>) le ha etiquetado en una foto.
				</p>
				<input type="hidden" name="redirect" value="<?= $value['objetivo_enlace'] ?>" />
				<input type="hidden" name="idnoti" value="<?= $value['id'] ?>" />
				</form>
			<?php }else if ($value['tipo'] == 6){?>
				<form id="form<?= $value['id'] ?>" action="<?= base_url() ?>comun/ver_notificaciones" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<?php
				if($value['notinueva'] != ""):
				?>
				<a alt="marcar como leida" title="marcar como leida" href="<?= base_url()?>comun/marcar_notificacion_id/<?= $value['id'] ?>"><span alt="marcar como leida" title="marcar como leida" class="ico-etiq"></span></a>
				<?php
				else:
				?>
				<span class="ico-etiq"></span>
				<?php	
				endif;
				?>
				<p onclick="form<?= $value['id'] ?>.submit();" <?= $value['notinueva'] ?>>
					[<?= $value['fecha']." ". $value['hora'] ?>] - <?= $value['autor_nombre'] ?> (<?= $value['autor_rol'] ?>) le ha enviado un mensaje privado
				</p>
				<input type="hidden" name="redirect" value="<?= $value['objetivo_enlace'] ?>" />
				<input type="hidden" name="idnoti" value="<?= $value['id'] ?>" />
				</form>
			<?php } ?>
			
			
			
			
			<?php 
						}		
				echo $this->pagination->create_links();
			}else{
				?>
				<p>No hay nofificaciones recientes</p>
				<?php
			}
			 ?>
		</div>
	</div>