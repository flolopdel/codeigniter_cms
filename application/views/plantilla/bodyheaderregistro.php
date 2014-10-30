<body id="bodyprincipal">
  <div class="main">
  <!--==============================header=================================-->
    <header>
    	<div class="container_12">
	    	<div class="logoTop">
	        <h1><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logos/eyekinder.png" alt=""></a></h1>
	        </div>
	        <div id="loginTop2" class="formularioEstandar">
		        <div class="container">
					<div class="contentTop">
						
						<?php 
							$this->load->helper("form");
							
							echo form_open("usuario/comprobar_login");
							$this->form_validation->set_error_delimiters('<div><p class="errorForm">','</p></div>');
						?>
						<?php if(isset($error) && $error != "" && isset($error1)){ ?>
						<?php } else if(isset($error) && $error != "" ){ ?>
							echo validation_errors();
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
    </header>  
    <section id="content">
        <div class="container_12">	