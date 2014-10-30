<?php

include_once ('include/funcionesview.php');

if (false) {
	$textoFinal = '
	<br/><br/><br/>
	<center>
	No tiene permiso para acceder al portal o ha caducado su sesi&oacute;n<br/><br/>Vuelva a logarse en el portal<br/>
	</center>
	<br/><br/><br/>
	';

	// echo "<script>window.location='index.php?e=1';</script>";
	//header ("Location: index.php?error=".$textoFinal."");
} else {
	head("Registro");
	bodyHeaderRegistro("Registro de Usuarios");
	?>
	<div class="contenidoBasico1">
		<div class="contenidoformulario">
			Contenido del formulario
		</div>
	</div>
	<?php
	footer();
}

?>

