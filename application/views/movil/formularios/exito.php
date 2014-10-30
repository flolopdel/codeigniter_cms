<div data-role="content">
					<?php if ($this -> session -> userdata('exito')){ ?>
						<p>
							<center style="color:red;">
								<?= $this -> session -> userdata('exito')  ?>
							</center>
						</p>
						<?php 
							$array_items = array('exito' => '');
							$this->session->unset_userdata($array_items);
						 ?>
					<?php }else{ redirect(base_url()); } ?>
</div>