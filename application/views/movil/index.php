<?php 
	    		$logo ="";
	    		if (isset($disenonuevo['logo']) && $disenonuevo['logo'] != ""){
	    			$logo = $disenonuevo['logo'];
	    		}else if (isset($diseno['logo']) && $diseno['logo'] != ""){
	    			$logo = $diseno['logo'];
	    		}
	    		 ?>
<body> 

<div data-role="page" id="page1">
            <div data-role="header">
                <h1>Eyekinder</h1>
            </div>
            <div data-role="content">
                <img style="width:100%;" src="<?php echo base_url(); ?>images/logos/<?= $logo ?>">
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
                    <div data-role="fieldcontain">
                        <label for="usuario">Email</label>
                        <input type="text"  required="" id="usuario" name="usuario" placeholder="Email">
                    </div>
                    <div data-role="fieldcontain">
                        <label for="password">Contraseña</label>
                        <input type="password"  required="" id="password" name="password"  placeholder="Contraseña">
                    </div>
                    <a data-theme="b" onclick="document.forms[0].submit();return false;" data-role="button">Entrar</a>
                </form>
            </div>
            <div class="footer" data-role="footer">
                <small>
                Sitio web diseñado y credo por <a class="link" href="http://www.maxline.es" target="_blank" rel="nofollow">Maxline Soluciones S.L.</a>
                </small>
            </div>
        </div>

</body>
</html>