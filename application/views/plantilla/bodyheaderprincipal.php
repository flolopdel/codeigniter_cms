<script type="text/javascript">
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
</script>
<body id="bodyprincipal">
  <div class="main">
  <!--==============================header=================================-->
    <header>
    	<div class="container_12">
	    	<div class="logoTop">
	    		<?php 
	    		$logo ="";
	    		if (isset($disenonuevo['logo']) && $disenonuevo['logo'] != ""){
	    			$logo = $disenonuevo['logo'];
	    		}else if (isset($diseno['logo']) && $diseno['logo'] != ""){
	    			$logo = $diseno['logo'];
	    		}
	    		 ?>
	        <h1><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logos/<?= $logo ?>" alt=""></a></h1>
	        </div>
	        <div id="loginTop2" class="formularioEstandar">
		        <div class="container">
					<div class="contentTop">
						
						<?php 
							$this->load->helper("form");
							
							echo form_open("usuario/comprobar_login");
							$this->form_validation->set_error_delimiters('<div><p class="errorForm">','</p></div>');
							echo validation_errors();
						?>
						<?php if(isset($error) && $error != ""){ ?>
							<div>
								<p class="errorForm"><?= $error ?> </p>
							</div>
						<?php } ?>
							<div>
								<input type="text" placeholder="Usuario" required="" id="usuario" name="usuario" />
							</div>
							<div>
								<input type="password" placeholder="Contraseña" required="" id="password" name="password" />
							</div>
							<div>
								<input type="submit" value="Entrar" />
							</div>
							<a class="fancybox" href="#form-olvido" role="button">¿Olvidó su contraseña?</a>
						
						<?php
							echo form_close();
						?><!-- form -->						
				    	<div id="form-olvido" class="form-olvido" name="form-olvido">
				    		<p>Despues de enviar este formulario recibirás un email que contendrá un enlace. Al pulsar ese enlace podrás modificar tu clave.</p>
				    		<?php
							$this->load->helper("form");
							echo form_open("usuario/olvido_contrasena");
							$this->form_validation->set_error_delimiters('<div><p class="errorFormPassForgotten">','</p></div>');
							echo validation_errors();?>
							<div>
								<input type="text" placeholder="Introduce tu email" required="" id="email" name="email" />
							</div>
							<div>
							<?php
						    echo form_submit('botonSubmit', 'Enviar');
							?>
							</div>
							<?php
							echo form_close();
						    ?>
						</div>	
					</div><!-- content -->
				</div><!-- container -->
	        </div>
	    </div>    
        <div class="nav2">  
            <div id="slide">		
                <div class="slider">
                    <ul class="items">
                        <?php if(isset($diseno['imagen1']) && $diseno['imagen1'] != "") {?><li><img src="<?php echo base_url(); ?>images/<?= $diseno['imagen1'] ?>" alt="" /></li>
                        <?php }else if(isset($disenonuevo['imagen1']) && $disenonuevo['imagen1'] != "") {?><li><img src="<?php echo base_url(); ?>images/<?= $disenonuevo['imagen1'] ?>" alt="" /></li><?php } ?>
                      	<?php if(isset($diseno['imagen2']) && $diseno['imagen2'] != "") { ?> <li><img src="<?php echo base_url(); ?>images/<?= $diseno['imagen2'] ?>" alt="" /></li>
                      	<?php }else if(isset($disenonuevo['imagen2']) && $disenonuevo['imagen2'] != "") { ?> <li><img src="<?php echo base_url(); ?>images/<?= $disenonuevo['imagen2'] ?>" alt="" /></li><?php } ?>
                      	<?php if(isset($diseno['imagen3']) && $diseno['imagen3'] != "") { ?>  <li><img src="<?php echo base_url(); ?>images/<?= $diseno['imagen3'] ?>" alt="" /></li>
                      	<?php }else if(isset($disenonuevo['imagen3']) && $disenonuevo['imagen3'] != "") { ?>  <li><img src="<?php echo base_url(); ?>images/<?= $disenonuevo['imagen3'] ?>" alt="" /></li><?php } ?>
                      	<?php if(isset($diseno['imagen4']) && $diseno['imagen4'] != "") { ?>  <li><img src="<?php echo base_url(); ?>images/<?= $diseno['imagen4'] ?>" alt="" /></li>
                      	<?php }else if(isset($disenonuevo['imagen4']) && $disenonuevo['imagen4'] != "") { ?>  <li><img src="<?php echo base_url(); ?>images/<?= $disenonuevo['imagen4'] ?>" alt="" /></li><?php } ?>
                    </ul>
                </div>	
                <a href="#" class="prev"></a><a href="#" class="next"></a>
            </div>
         </div>
    </header>  
    <section id="content">
        <div class="container_12">	