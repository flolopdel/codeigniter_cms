<body id="bodyprincipal">
	<div class="main">
		<!--==============================header=================================-->
		<header>
			<div class="container_12">
				<div class="logoTop">
					<script>
						function mensaje() {
							$(this).children(0).toggle("fast");
							if ($(this).hasClass("seleccionado")) {
								$(this).removeClass("seleccionado");
							} else {
								$(this).addClass("seleccionado");
							}
						}


						$(document).on("ready", main);

						function main() {
							$(".boton").botonMenu();
						}


						$.fn.extend({
							botonMenu : function() {
								this.each(function() {
									$(this).on("click", mensaje);
								});
							}
						});
						$(document).ready(function() {
					        var posicion = $("#caja_flotante").offset();
						    var margenSuperior = 15;
						     $(window).scroll(function() {
						         if ($(window).scrollTop() > posicion.top) {
						             $("#caja_flotante").stop().animate({
						                 marginTop: $(window).scrollTop() - posicion.top + margenSuperior
						             });
						         } else {
						             $("#caja_flotante").stop().animate({
						                 marginTop: 0
						             });
						         };
						     });
						});
					</script>
					

					<h1><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logos/logo22.png" alt=""></a></h1>
					<script>
						$(document).ready(function() {
							$(".search").keyup(function() {
								var box = $(this).val();
								var dataString = 'query=' + box;
								if (box != '') {
									$.ajax({
										type : "POST",
										url : "<?php echo base_url(); ?>usuario/buscador",
										data : dataString,
										cache : false,
										success : function(contenido) {
											$("#display2").html(contenido).show();
										}
									});
								}
								return false;
							});
						});
					</script>
				</div>
				<div id="loginTop2" class="formularioEstandar">
					<div class="container">
						<div class="contentTop">
							<form>
								<div class="fotoTop">
									<img src = "<?php echo base_url().$this -> session -> userdata('imagenurl'); ?>" alt = "<?= $this -> session -> userdata('nombre') ?>" title="<?= $this -> session -> userdata('nombre') ?>" />
								</div>
								<div class="textoTop">
									
									<?php $nummen = $this->comunes->mensajes_nuevos($this -> session -> userdata('id')); ?>
									<div class="boton">
										<?php if($nummen > 0){ ?>
											<?= $this -> session -> userdata('nombre') ?><span class="spannotis" style="margin-left:10px; font-size:20px;"><?= $nummen ?></span>
										<?php }else{ ?>
											<?= $this -> session -> userdata('nombre') ?>
										<?php } ?>
										<div class="info">
											<div class="content">
												<div class="arrow_box"></div>
												<div class="titulo">
													<?= $this -> session -> userdata('nombre'). " " .$this -> session -> userdata('apellidos') ?>
												</div>
												<ul>
													<?php if($this -> session -> userdata('rol') == '4'){ ?>
														<a href="<?php echo base_url(); ?>registro/personalizar">
													<li>
														Personalizar web
													</li>
													</a>
													<?php } ?>
													<a data-rel="popup" rel="external" href="<?php echo base_url(); ?>usuario/mensaje">
														<li>														
															<?php if($nummen > 0){ ?>
																Mensajes<span class="spannotis" style="margin-left:10px; font-size:20px;"><?= $nummen ?></span>
															<?php }else{ ?>
																Mensajes
															<?php } ?>
														</li>
													</a>
													<a href="<?php echo base_url(); ?>usuario/editar">
														<li>
															Mi cuenta
														</li>
													</a>
													<a href="<?php echo base_url(); ?>usuario/editarpass">
														<li>
															Cambiar contraseña
														</li>
													</a>
													<a href="<?php echo base_url(); ?>usuario/logout">
														<li>
															Salir
														</li>
													</a>
												</ul>
											</div>
										</div>
									</div>
								</div>
								
					
								<input type="text" style="background: bisque; margin:5px;" class="search" id="searchbox"  onkeyup="lookup(this.value);" type="text" value="Buscar..." onfocus="if (this.value == 'Buscar...') {this.value = '';}" onblur="{this.value = 'Buscar...';}"/>
								<div id="display2">
								</div>
							</form><!-- form -->
						</div><!-- content -->
					</div><!-- container -->
				</div>
					<?php if($nummen > 0){ ?>
						
						
					<div id="caja_flotante">
				    	<div id="cont_caja_flotante">
				    		<a data-rel="popup" rel="external" href="<?php echo base_url(); ?>usuario/mensaje">
				    			Tienes mensajes nuevos
				    		</a>
														
				    	</div>
					 </div>
				 	<?php }?>
				<div class="menuNormal shadow">
					<center><ul class="menu">
						<li class="current">
							<a href="<?php echo base_url(); ?>" class="clr-1">Inicio</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>comun/pizarra" class="clr-2">Pizarra
								<?php $numnotis = $this->comunes->notificaciones_nueva($this -> session -> userdata('id')); ?>
								<?php if($numnotis > 0){ ?>
								<span class="spannotis"><?= $numnotis ?></span>
								<?php } ?>
								</a>
						</li>
						<li>
							<?php if($this -> session -> userdata('rol') == '2'){ ?>
							<a href="<?php echo base_url(); ?>comun/album/salgo" class="clr-3">Galería</a>
							<?php }else{ ?>
							<a href="<?php echo base_url(); ?>comun/galeria" class="clr-3">Galería</a>
							<?php } ?>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>comun/acciones" class="clr-4">Acciones</a>
						</li>
					</ul></center>
				</div>
			</div>
		</header>
		<section id="content">
			<div class="container_12">
