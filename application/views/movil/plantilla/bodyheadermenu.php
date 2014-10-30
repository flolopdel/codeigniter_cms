<body>

				<?php $nummen = $this->comunes->mensajes_nuevos($this -> session -> userdata('id')); ?>
	<div data-role="header">
		<a href="#" data-rel="back" data-icon="arrow-l">Volver</a>
		<h1><a rel="external" href="<?php echo base_url(); ?>">Eyekinder</a></h1>
		<?php if($nummen > 0){ ?>
			<a data-theme="b" href="#popupMenu" data-transition="pop" data-rel="popup" class="ui-btn-right" data-icon="gear">Menu</a>
		<?php }else{ ?>
			<a href="#popupMenu" data-transition="pop" data-rel="popup" class="ui-btn-right" data-icon="gear">Menu</a>
		<?php } ?>
		<div data-role="popup" id="popupMenu" style="min-width:210px;">
			<ul data-role="listview" data-inset="true">
				<li>
					Menu
				</li>
				
				<li>
					<?php if($nummen > 0){ ?>
						<a style="background: #373737; color:white;" data-rel="popup" rel="external" href="<?php echo base_url(); ?>usuario/mensaje">Mensajes</a>
					<?php }else{ ?>
						<a data-rel="popup" rel="external" href="<?php echo base_url(); ?>usuario/mensaje">Mensajes</a>
					<?php } ?>
				</li>
				<li>
					<a data-rel="popup" rel="external" href="<?php echo base_url(); ?>usuario/editar">Mi cuenta</a>
				</li>
				<li>
					<a data-rel="popup" rel="external" href="<?php echo base_url(); ?>usuario/editarpass">Cambiar contraseña</a>
				</li>
				<li>
					<a data-rel="popup" rel="external" href="<?php echo base_url(); ?>usuario/logout">Salir</a>
				</li>
			</ul>
		</div>
		<div data-role="navbar">
			<ul>
				
					<?php $numnotis = $this->comunes->notificaciones_nueva($this -> session -> userdata('id')); ?>
								<?php if($numnotis > 0){ ?>
								<li><a data-theme="b" data-icon="star"  data-rel="popup" rel="external" href="<?php echo base_url(); ?>comun/pizarra" >
									<span  class="ui-li-count"><?= $numnotis ?></span>
								</a></li>
								<?php }else{ ?>
								<li><a data-theme="a" data-icon="star"  data-rel="popup" rel="external" href="<?php echo base_url(); ?>comun/pizarra" >
								</a></li>
								<?php } ?>
								<?php if($this->session->userdata("rol") == "2"){ ?>
									<li><a data-icon="grid" data-rel="popup" rel="external" href="<?php echo base_url(); ?>comun/album/salgo"></a></li>
								<?php }else{ ?>
									<li><a data-icon="grid" data-rel="popup" rel="external" href="<?php echo base_url(); ?>comun/galeria"></a></li>
								<?php } ?>
				<li><a  data-icon="action" data-rel="popup" rel="external" href="<?php echo base_url(); ?>comun/acciones"></a></li>
				<li><a  data-icon="search" data-rel="popup" rel="external" href="<?php echo base_url(); ?>comun/buscar"></a></li>
			</ul>
		</div><!-- /navbar -->
	</div>