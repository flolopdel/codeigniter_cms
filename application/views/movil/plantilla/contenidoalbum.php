

<?php if($album == "subir"){ ?>
<div data-role="content">
	<h3 class="ui-bar ui-bar-a ui-corner-all"><center>GALERÍA</center></h3>
	<?php if($this->session->userdata('rol') != "2"){ ?>
	<div class="ui-grid-b">
	<div class="ui-block-a"><div class="ui-bar ui-bar-a"><a rel="external" href="<?php echo base_url(); ?>comun/album/salgo">Etiquetas</a></div></div>
	<div class="ui-block-b"><div class="ui-bar ui-bar-a"><a href="<?php echo base_url(); ?>comun/album/subidas">Subidas</a></div></div>
	<div class="ui-block-c"><div class="ui-bar ui-bar-a"><a href="<?php echo base_url(); ?>comun/album/subir">Subir</a></div></div>
	</div>
	<? } ?>
		<div class="album2" style="overflow:auto; max-height:700px;">
					
				<?php
				$this -> load -> helper("form");
				echo form_open_multipart("comun/subirimagen1","data-ajax='false'");
						echo form_hidden("form", "ok");
				echo '<h3 class="ui-bar ui-bar-a ui-corner-all">1. Selecciona la imagen</h3>';
						echo validation_errors('<div class="cuadroErrores">','</div>');
						if(isset ($errorpass) && $errorpass != ""){
							echo '<div class="cuadroErrores">'.$errorpass.'</div>';
						}
				 echo '<div data-role="fieldcontain">'; echo form_label('Imagen', 'imagen0');
				 echo form_upload('imagen0');echo '</div>';
				 ?>
				 <!-- TODO cargar imagen antes de subirlas -->
				 <!-- <input type="file" capture="camera" accept="image/*" id="takePictureField">
        
				<img id="yourimage">
		 
				<div id="swatches">
					<div id="swatch0" class="swatch"></div>
					<div id="swatch1" class="swatch"></div>
					<div id="swatch2" class="swatch"></div>
					<div id="swatch3" class="swatch"></div>
					<div id="swatch4" class="swatch"></div>
				</div>
				<script>
					var desiredWidth;
				 
				    $(document).ready(function() {
				        console.log('onReady');
						$("#takePictureField").on("change",gotPic);
						$("#yourimage").load(getSwatches);
						desiredWidth = window.innerWidth;
				        
				        if(!("url" in window) && ("webkitURL" in window)) {
				            window.URL = window.webkitURL;   
				        }
						
					});
				 
					function getSwatches(){
						var colorArr = createPalette($("#yourimage"), 5);
						for (var i = 0; i < Math.min(5, colorArr.length); i++) {
							$("#swatch"+i).css("background-color","rgb("+colorArr[i][0]+","+colorArr[i][1]+","+colorArr[i][2]+")");
							console.log($("#swatch"+i).css("background-color"));
						}
					}	
					
				    //Credit: https://www.youtube.com/watch?v=EPYnGFEcis4&feature=youtube_gdata_player
					function gotPic(event) {
				        if(event.target.files.length == 1 && 
				           event.target.files[0].type.indexOf("image/") == 0) {
				            $("#yourimage").attr("src",URL.createObjectURL(event.target.files[0]));
				        }
					}
					
					
				        
				    </script>  -->
				 <?php
				echo '<br>';
				echo form_submit('botonSubmit', 'Siguiente','data-theme="b" data-icon="arrow-r"');
				echo form_close();
				?>
		</div>		   
</div>
<?php }else{ ?>
<script src="<?php echo base_url(); ?>lightbox/js/lightbox-2.6.min.js"></script>
<link href="<?php echo base_url(); ?>lightbox/css/lightbox.css" rel="stylesheet" />
<style>
	.lightbox{
		display:none;
	}
</style>
<div data-role="content">
	<h3 class="ui-bar ui-bar-a ui-corner-all"><center>GALERÍA</center></h3>
	<?php if($this->session->userdata('rol') != "2"){ ?>
	<div class="ui-grid-b">
		<div class="ui-block-a"><div class="ui-bar ui-bar-a"><a rel="external" href="<?php echo base_url(); ?>comun/album/salgo">Etiquetas</a></div></div>
		<div class="ui-block-b"><div class="ui-bar ui-bar-a"><a href="<?php echo base_url(); ?>comun/album/subidas">Subidas</a></div></div>
		<div class="ui-block-c"><div class="ui-bar ui-bar-a"><a href="<?php echo base_url(); ?>comun/album/subir">Subir</a></div></div>
	</div>
	<? } ?>
		<div class="album2" style="overflow:auto; max-height:700px;">
					
				<?php
				$this -> load -> helper("form");
				echo form_open("registro/invitacion");
				if($album == "subidas"){
					echo '<h3 class="ui-bar ui-bar-a ui-corner-all">Subidas por mi</h3>';
				}else{
					echo '<h3 class="ui-bar ui-bar-a ui-corner-all">Fotos en las que aparezco</h3>';
				}
				if(isset ($errorpass) && $errorpass != ""){
					echo '<div class="cuadroErrores">'.$errorpass.'</div>';
				}else{
					foreach ($listaimagenes as $imagen) {
						?>
						<a id="<?=$imagen['imagen']?>" href="<?= base_url().'images/galeria/'.$imagen['imagen']?>" data-lightbox="album" title="<?=$imagen['imagen']?>" name="<?=$imagen['etiquetas']?>">
							<img src="<?= base_url().'images/galeria/'.$imagen['imagen']?>"/>
						</a>	
					<?php }} ?>
				</div>		   
</div>
<?php } ?>

