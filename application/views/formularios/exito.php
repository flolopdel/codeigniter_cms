<div class="contenidoBasico1">
	<div class="infoclases">
		<div class="formularioEstandar" id="registro-form">
			<div class="container">
				<div class="contentEstandar">
					<form>
					<?php if ($this -> session -> userdata('exito')){ ?>
						<p style="color:red;">
							<center>
								<h2><?= $this -> session -> userdata('exito')  ?></h2>
								<h3>Se le ha enviado un email al usuario con los datos correspondiente</h3>
							</center>
						</p>
						<?php 
							$array_items = array('exito' => '');
							$this->session->unset_userdata($array_items);
						 ?>
					<?php }else{ redirect(base_url()); } ?>
					</form>
				</div><!-- content -->
			</div><!-- container -->
		</div>
	</div>
</div>