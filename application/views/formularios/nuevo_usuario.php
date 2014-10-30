
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
<link rel="stylesheet" href="<?= base_url()?>css/acordeon.css" />
<script src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
 <style>
			#accordion-resizer {
				padding: 0px;
				width: 100%;
			}
		</style>
		<script>
			$(function() {
				$("#accordion").accordion({
					heightStyle : "fill"
				});
			});
		</script>
 <style>
			#accordion-resizer2 {
				padding: 0px;
				width: 100%;
			}
		</style>
		<script>
			$(function() {
				$("#accordion2").accordion({
					heightStyle : "fill"
				});
			});
		</script>

<div class="contenidoBasico1">
				<div class="formularioEstandar" id="registro-form">
		        <div class="container">
					<div class="contentEstandar">
						<?php
						$this->load->helper("form");
				        echo form_open_multipart($action);
						echo form_hidden("form", "ok");
						if(isset ($error['erroremail']) && $error['erroremail'] != ""){
						echo '<div class="cuadroErrores">'.$error['erroremail'].'</div>';
						}
						echo validation_errors('<div class="cuadroErrores">','</div>');
						echo'<p><div class="texto-form">Completa el siguiente formulario con sus datos de usuario:</div></p>';
						if (isset($guarderia_invitado) && ($guarderia_invitado != "")){
							
							echo form_hidden('guarderia', $guarderia_invitado);
							echo form_hidden('iduser', $id_invitado);
							echo form_hidden('token', $token);
							//MOSTRAR TODAS GUARDES
						}else if (isset($after) && ($after == "after")){
							
							echo form_hidden('guarderia', $idGuarderia);
							echo form_hidden('nino', $idNino);
							//MOSTRAR TODAS GUARDES
						}else{
							if(isset($idAsoc) && $idAsoc != null){
								echo form_hidden('idAsoc', $idAsoc);
							}
							if(isset($rol) && ($rol == "4" || $rol=="3")){
								echo form_hidden('guarderia', $idGuarderia);
							}else if (isset($rol) && ($rol == "1" || $rol == "5")){
								
						       	echo '<div class="label">'; echo form_label('Guarderia', 'guarderia');echo '</div>';
						        echo form_dropdown('guarderia', $opciones,$error['guarderia']);echo '<br>';  
								//MOSTRAR TODAS GUARDES
							}
						}
				       echo '<div class="label">'; echo form_label('Nombre*', 'nombre');echo '</div>';
				        echo form_input('nombre',$error['nombre']);echo '<br>';
				       echo '<div class="label">'; echo form_label('Apellidos*', 'apellidos');echo '</div>';
				        echo form_input('apellidos',$error['apellidos']);echo '<br>';
				       echo '<div class="label">'; echo form_label('Email*', 'email');echo '</div>';
				        echo form_input('email',$error['email']);echo '<br>';
				       echo '<div class="label">'; echo form_label('Contraseña*', 'pass1');echo '</div>';
				        echo form_password('pass1');echo '<br>';
				       echo '<div class="label">'; echo form_label('Confirma contraseña*', 'pass2');echo '</div>';
				        echo form_password('pass2');echo '<br>';    
				       echo '<div class="label">'; echo form_label('Fecha de nacimiento', 'fechanac');echo '</div>';
					   ?>
					   <input type="date" name="fechanac" />
					   <?php
				       echo '<div class="label">'; echo form_label('Imagen', 'imagen0');echo '</div>';
				        echo form_upload('imagen0');echo '<br>';    
						
				       echo '<div class="label">'; echo form_label('Sexo', 'sexo');echo '</div>';
					   $opciones = array(
									'h' => 'Hombre',
									'm' => 'Mujer'
									                 );
				        echo form_dropdown('sexo', $opciones,$error['sexo'], 'h');echo '<br>';   
						echo '<div class="label">'; echo form_checkbox('condiciones','1',true); 
						echo "  He leido y acepto las <a class='fancybox' href='#accordion-resizer'  class='fancybox' role='button'>condiciones de uso</a> y 
								<a class='fancybox' href='#accordion-resizer2'  class='fancybox' role='button'> política de privacidad</a>";
						echo '</div>';
						
				        echo form_submit('botonSubmit', 'Enviar');
						?>
						<?php
					        echo form_close();
					    ?>
						<div id="accordion-resizer2" class="ui-widget-content" style="display:none;">
							<div id="accordion2">
								<h3>
									PRIMERA.- OBJETO:
								</h3>
								<div>
									<p>
										La presente política de privacidad (en adelante la “Política de Privacidad”) regula las normas de protección de datos y medidas de seguridad aplicadas por JPTECH, S.L.U. en sus páginas web.								
									</p>
									<p>
										La utilización de las páginas de JPTECH, S.L.U. atribuye al visitante la condición de usuario y supone la aceptación y cumplimiento de las Condiciones de Uso, así el conocimiento y aceptación de la Política de Privacidad. Se recomienda por tanto al usuario (en adelante “el Usuario” o “los Usuarios”) que lea detenidamente estas normas antes de acceder a las páginas de JPTECH, S.L.U. así como a consultarlas regularmente. En el supuesto de que el Usuario no sea mayor de edad y/o no esté conforme con estos términos, el Usuario no deberá hacer uso de las páginas JPTECH, S.L.U.							
									</p>
									<p>
										JPTECH, S.L.U. en calidad de propietaria y responsable de los datos personales que se obtienen de forma automatizada a través de sus páginas, se compromete al cumplimiento de su obligación de responsable de tratamiento de dichos datos de conformidad con lo establecido en la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal (en adelante “LOPD”) y el Real Decreto 1720/2007, de 21 de diciembre, por el que se aprueba el Reglamento de desarrollo de la Ley Orgánica 15/1999, de 13 de diciembre, de protección de datos de carácter personal (en adelante “RPDP”). Por su parte, el Usuario asume en las actividades y usos que realice de las páginas de JPTECH, S.L.U. las obligaciones derivadas de la LOPD, RPDP, así como cualquier otra normativa de desarrollo, incluidas aquellas recomendaciones e instrucciones emitidas por la Agencia Española de Protección de Datos.							
									</p>
								</div>
								<h3>
									SEGUNDA.- DATOS IDENTIFICATIVOS:
								</h3>
								<div>
									<p>
										JPTECH, S.L.U. es una sociedad anónima debidamente registrada y establecida conforme a lo dispuesto en la legislación española, con CIF núm. B-90110305 e inscrita en el registro mercantil de Sevilla, Tomo 5791, folio 63, hoja SE-99604, inscripción 1ª.							
									</p>
									<p>
										A efectos de comunicaciones y notificaciones en relación a la Política de Privacidad, se establece la siguiente dirección de contacto: info@jptech.es							
									</p>
								</div>
								<h3>
									TERCERA.- INFORMACIÓN CORPORATIVA
								</h3>
								<div>
									<p>
										La página www.jptech.es de la que JPTECH, S.L.U. es titular, ofrece información corporativa de la sociedad, en especial de su actividad empresarial facilitando, entre otros, datos dirigidos a sus clientes. La referida página, por el contenido que ofrece, está dirigida exclusivamente a los Usuarios mayores de 18 años.							
									</p>
								</div>
								<h3>
									CUARTA.- PROTECCIÓN DE DATOS:
								</h3>
								<div>
									<p>
										Al facilitar sus datos personales, el Usuario autoriza a JPTECH, S.L.U. a almacenar esa información en uno o varios ficheros automatizados con el objetivo de agilizar su acceso a los contenidos de las páginas web; gestionar o mejorar los contenidos y/o servicios ofrecidos en ellas; estudiar el uso que hace de los contenidos y servicios que las páginas ofrecen; mantener en correcto funcionamiento las propias páginas y enviarle información publicitaria, es decir, comunicaciones que promocionan de forma directa las páginas web o la compra de productos o servicios de JPTECH, S.L.U., o de terceros con los que JPTECH, S.L.U. tenga acuerdos comerciales. JPTECH, S.L.U. se hace responsable de estos ficheros.								
									</p>
									<p>
										JPTECH, S.L.U. informará a los Usuarios de las páginas web si es obligatorio o no que faciliten los datos solicitados en los formularios que deberán rellenar para registrarse en las páginas y acceder a los contenidos y/o servicios que se ofrecen. En el momento en el que faciliten los datos, esta información se les señalará mediante indicadores visuales, como ventanas emergentes, asteriscos o símbolos situados junto a la información obligatoria o con cualquier método similar. La negativa del Usuario a facilitar estos datos de carácter personal, o la introducción de datos incompletos o erróneos, puede impedir su acceso a los contenidos y/o servicios que se ofrecen en las páginas de JPTECH, S.L.U. o afectar a la prestación o el funcionamiento correcto de los mismos.								
									</p>
									<p>
										El Usuario responderá de la veracidad y exactitud de los datos facilitados, que podrá modificar en caso necesario comunicándolo por correo electrónico a info@jptech.es o responderá de ninguna consecuencia o daño que pueda derivarse del no ejercicio de esta obligación del Usuario.							
									</p>
									<p>
										El Usuario puede ejercitar los derechos de acceso, cancelación y rectificación comunicándolo por escrito al domicilio social mencionado anteriormente o a la siguiente dirección de correo electrónico: info@jptech.es. La seguridad y confidencialidad de la información que el Usuario proporcione son importantes para JPTECH, S.L.U. Se han adoptado medidas técnicas, administrativas y de seguridad para proteger la información del Usuario, conforme a lo dispuesto en la LOPD y el RPDP.							
									</p>
									<p>
										Las medidas de seguridad se revisan regularmente para considerar la posibilidad de introducir nuevas tecnologías o métodos de protección. No obstante, el Usuario debe tener en cuenta que, aunque JPTECH, S.L.U. haga todo lo que esté en sus manos, ninguna medida de seguridad es absolutamente perfecta o inquebrantable.								
									</p>
									<p>
										JPTECH, S.L.U., de conformidad con la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y de Comercio Electrónico, no enviará a los Usuarios de las páginas web ningún tipo de información publicitaria, comercial o promocional sin la autorización o el consentimiento previo de los Usuarios. JPTECH, S.L.U. comunica a los Usuarios que podrán ejercitar su derecho a oponerse a recibir esta información publicitaria. Para ello, deberán seguir las instrucciones indicadas en el momento en el que se les solicite su consentimiento o notificarlo por escrito a info@jptech.es. Con cada envío publicitario, JPTECH, S.L.U. facilita asimismo a los Usuarios la posibilidad de darse de baja de dichas comunicaciones a través de mecanismos específicos.								
									</p>
									<p>
										Usuarios menores de edad. En lo que respecta a los datos de carácter personal de los Usuarios menores de edad, JPTECH, S.L.U. garantiza que esta información no se utilizará con fines inapropiados para sus edades y tendrá particularmente en cuenta dicha edad, así como el entendimiento, conciencia y madurez de este tipo de público y nunca solicitará información relativa a la situación económica o datos de carácter personal sobre sus familias. Además, JPTECH, S.L.U. facilitará a los padres o tutores legales el ejercicio de los derechos jurídicos de acceso, cancelación, oposición y rectificación de los datos y advierte a los Usuarios menores de edad sobre la conveniencia de consultar con sus padres o tutores antes de facilitar cualquier información de ese tipo.								
									</p>
								</div>
								<h3>
									QUINTA.- POLÍTICA DE COOKIES:
								</h3>
								<div>
									<p>
										Esta Política de Cookies es parte de las Condiciones de Uso y de la Política de Privacidad de JPTECH, S.L.U. Las páginas de JPTECH, S.L.U. utilizan cookies.							
									</p>
									<p>
										¿Qué son las cookies? Las cookies son ficheros de datos que la página web envía al ordenador del Usuario cuando visita la web. Las cookies se emplean para muchos fines. Por ejemplo, cuando el Usuario regresa a una de las páginas de JPTECH, S.L.U., una vez se haya aceptado la Política de Cookies y/o se haya registrado, las cookies facilitan información a la página de JPTECH, S.L.U. para que pueda recordar de quién se trata y guarda información relativa a la frecuencia con que visita  la página web o sobre sus preferencias dentro de la misma.							
									</p>
									<p>
										Las cookies son esenciales para el funcionamiento de Internet, no pueden dañar el equipo del Usuario y, si se encuentran activadas, ayudan a detectar y resolver los posibles errores de funcionamiento que ocurran de las páginas de JPTECH, S.L.U. Para más información sobre las cookies visite www.allaboutcookies.org								
									</p>
									<p>
										JPTECH, S.L.U. utiliza las cookies para, entre otros, mejorar la funcionalidad de sus páginas, facilitar la navegación eficiente, recordar las preferencias del Usuario y, en general, mejorar la experiencia de uso.							
									</p>
									<p>
										JPTECH, S.L.U. siempre solicitará el permiso previo al Usuario como condición previa al uso de cookies. Ninguna cookie puede extraer información de un disco duro u obtener información personal. Como garantía adicional, el registro del Usuario está sujeto a la aceptación de cookies durante la instalación o puesta al día del navegador usado, y esta aceptación puede ser revocada en todo momento mediante las opciones de configuración de contenidos, gestión y eliminación de cookies y asimismo las opciones de privacidad disponibles.								
									</p>
									<p>
										JPTECH, S.L.U. utiliza varios tipos de cookies, que podrán modificarse en función de la incorporación o exclusión de servicios en las páginas de JPTECH, S.L.U.:							
									</p>
									<p>
										A.- Cookies estrictamente necesarias – Son esenciales para moverse por el sitio web y usar los servicios que el Usuario solicita, como acceder a zonas seguras del sitio web.							
									</p>
									<p>
										B.- Cookies de Personalización - Permiten al Usuario acceder al sitio web con un idioma predefinido en función de los criterios que haya seleccionado y ofrecer así prestaciones mejoradas y más personales. Estas cookies también podrán usarse para ofrecer servicios solicitados por el usuario, como ver un video o escribir un comentario en un blog. La información que utilizan estas cookies es anónima y no pueden rastrear la actividad del Usuario en otros sitios web. Estas cookies pueden ser persistentes, de servicio o de sesión, propias o de terceros.							
									</p>
									<p>
										C.- Cookies analíticas - Permiten al Usuario navegar por las páginas de JPTECH, S.L.U., y acceder a  áreas seguras  como los pagos. JPTECH, S.L.U. utiliza estas cookies para recordar: la información ingresada en los formularios de pedido cuando el Usuario se desplaza a diferentes páginas durante una sola sesión del navegador web, o que el navegante se ha identificado como Usuario de las páginas de JPTECH, S.L.U.							
									</p>
									<p>
										D.- Cookies técnicas - Facilitan información sobre el uso que el Usuario realiza de las páginas de JPTECH, S.L.U., como por ejemplo qué páginas visita, si ha accedido a las mismas sin problemas técnicos, etc. Estas cookies no permiten identificarle, puesto que la información que recogen es anónima y se utiliza únicamente a efectos de mejorar el diseño de las páginas y su navegación, o la elaboración de estadísticas de uso, entre otros.								
									</p>
									<p>
										E.- Cookies de gestión publicitaria – Son cookies,  propias o de terceros, utilizadas para la provisión de publicidad en las páginas de JPTECH, S.L.U. y aplicaciones. Permiten recoger datos anónimos, estadísticos sobre las visitas recibidas para realizar el seguimiento de una campaña publicitaria. También pueden recoger información que incluya IP del Usuario y proveedor de internet, normalmente para objetivos de geotargeting o medición de la exposición de ciertos anuncios dependiendo de la configuración de su navegador y de su comportamiento ante la exposición de campañas publicitarias en Internet: como el número de impresiones de un determinado soporte publicitario, el número de clicks, visitantes a la página, etc.							
									</p>
									<p>
										F.- Cookies de terceros – Es posible que en ciertos sites de las páginas de JPTECH, S.L.U. haya contenido de servicios como Linkedin, Youtube, Google, DoubleClick, Addthis o Facebook. Es importante recordar que no controlamos las cookies usadas por estos servicios. Recomendamos visitar los sitios web que hayan generado las cookies en cuestión para obtener más información sobre ellas.								
									</p>
									<p>
										G.- Cookies por vencimiento – Las cookies utilizadas pueden tener diferentes tipos de vencimientos:
										<ul>
											<li>
												De sesión: con vencimiento una vez que el Usuario sale de la sesión.
											</li>
											<li>
												De servicio: relacionadas con algún servicio personalizado dentro del site, con vencimiento inferior a veinticuatro (24) horas.
											</li>
											<li>
												Persistentes: quedan permanentemente instaladas en el navegador el Usuario y quedan activadas siempre que visita la web siempre y cuando no se desactive su uso.
											</li>
										</ul>							
									</p>
									<p>
										¿Cómo gestionar y eliminar las cookies?  Se pueden restringir, bloquear o eliminar las cookies desde los ajustes del navegador web. Para obtener información sobre la gestión de cookies en su navegador, recomendamos consultar el manual de usuario de éste.							
									</p>
									<p>
										Para cualquier otra consulta sobre las cookies de las páginas de JPTECH, S.L.U. diríjase a esta dirección de correo electrónico:  info@jptech.es							
									</p>
								</div>
								<h3>
									SEXTA.- MENSAJERÍA ELECTRÓNICA Y SERVICIOS DE COMUNICACIONES:
								</h3>
								<div>
									<p>
										El Usuario que participe en cualquier grupo de mensajería que forme parte de las páginas de JPTECH, S.L.U. se compromete a cumplir los términos establecidos a continuación.							
									</p>
									<p>
										Los grupos destinados a padres de niños menores de edad ofrecen la posibilidad de comunicarse mediante textos cerrados y predefinidos para preservar en todo momento la intimidad y privacidad de los niños.                                                                                                         							
									</p>
									<p>
										En cuanto a los mensajes, los Usuarios serán los únicos responsables del contenido de los mismos. JPTECH, S.L.U. no se responsabiliza en ningún caso del contenido o las opiniones publicados. El Usuario es, por tanto, el único y exclusivo responsable del contenido de los mensajes que publique con su nombre de usuario y del uso que haga de la información contenida. JPTECH, S.L.U. se reserva el derecho a eliminar o modificar el contenido de cualquier mensaje en cualquier momento y por cualquier motivo, a su exclusiva discreción. Así como el derecho de adoptar las medidas legales pertinentes.						
									</p>
									<p>
										Quedan estrictamente prohibidos el uso comercial y los reenvíos masivos de mensajes mediante programas automatizados. Los mensajes no deben contener un lenguaje inapropiado o contenidos titularidad de terceros ni podrán promover actividades ilegales, siendo responsabilidad del Usuario dichos envíos.								
									</p>
								</div>
								<h3>
									SEPTIMA.- USO DE LA INFORMACIÓN
								</h3>
								<div>
									<p>
										Los datos personales recogidos en las páginas de JPTECH, S.L.U. son incluidos en uno o varios ficheros automatizados que han sido dados de alta en la Agencia Española de Protección de Datos.								
									</p>
									<p>
										JPTECH, S.L.U. utilizará los datos recogidos a través de sus páginas web para las siguientes finalidades:								
									</p>
									<p>
										<ul>
											<li>
												La verificación del consentimiento de los padres en relación al uso de las páginas de JPTECH, S.L.U. por sus hijos;
											</li>
											<li>
												La activación de la cuenta para el acceso a áreas especificas de las páginas de JPTECH, S.L.U.;
											</li>
											<li>
												La remisión de información sobre los productos, bienes, servicios y/o las páginas de JPTECH, S.L.U.;
											</li>
											<li>
												La actualización de los perfiles de los Usuarios de las páginas de JPTECH, S.L.U.;
											</li>
											<li>
												El seguimiento y monitorización de los usos efectuados por los Usuarios a través de las páginas de JPTECH, S.L.U.;
											</li>
											<li>
												La remisión de dicha información a las autoridades públicas o administrativas competentes en relación a la comisión de un ilícito en la forma permitida por la normativa aplicable;
											</li>
											<li>
												El cumplimiento de un deber público;
											</li>
											<li>
												Cualesquiera otros fines descritos más específicamente en las Condiciones de Uso o cualesquiera otros términos y condiciones específicas aplicables a determinados productos o servicios.
											</li>
										</ul>							
									</p>
									<p>
										En el supuesto de que JPTECH, S.L.U. transfiera parte de su negocio, o en los supuestos de fusión o transformación de empresas, JPTECH, S.L.U. quedará facultada para transferir los datos personales al nuevo grupo de empresas, en la medida en que lo permita la normativa aplicable. En todo caso, el Usuario acepta expresamente la incorporación de sus datos personales a los ficheros de los que sea titular JPTECH, S.L.U. Asimismo, el Usuario reconoce que JPTECH, S.L.U. podrá encargar a terceros el tratamiento de sus datos para una mejor prestación del servicio ofrecido a través de las páginas de JPTECH, S.L.U., dentro de las exigencias legales de la LOPD y del RPDP y de las finalidades aquí previstas.							
									</p>
								</div>
								<h3>
									OCTAVA.- VIGENCIA
								</h3>
								<div>
									<p>
									JPTECH, S.L.U. puede modificar esta política de protección de datos en cualquier momento con el objetivo de introducir mejoras comerciales o adaptarse a normativas nuevas y/o instrucciones que publique la Agencia Española de Protección de Datos, de modo que se aconseja al Usuario revisarla periódicamente.
									</p>
								</div>
								<h3>
									NOVENA.- DISPOSICIONES GENERALES
								</h3>
								<div>
									<p>
									Si cualquiera de los términos que conforman la Política de Privacidad fuera declarado nulo, ilícito o inaplicable, dicha disposición se entenderá por no puesta sin que afecte a la validez y la vigencia de las disposiciones restantes.
									</p>
									<p>
									La renuncia puntual de JPTECH, S.L.U. a la aplicación de cualquiera de estas disposiciones no podrá ser interpretada como una renuncia total a la Política de Privacidad ni a cualquiera de sus disposiciones por parte de JPTECH, S.L.U.
									</p>
								</div>
								<h3>
									DÉCIMA.- LEY APLICABLE Y JURISDICCIÓN
								</h3>
								<div>
									<p>
									La presente Política de Privacidad se rige por la legislación española y serán interpretadas conforme a la misma. Cualquier controversia que pueda surgir sobre la Política de Privacidad se someterá a la jurisdicción española. Los Usuarios renuncian expresamente al foro que pudiera corresponderles, de tal forma que cualquier acción o reclamación que en su caso se interponga deberá presentarse ante los juzgados y tribunales de Madrid (Capital) en España.
									</p>
								</div>
							</div>  
					   </div>
						<div id="accordion-resizer" class="ui-widget-content" style="display:none;">
							<div id="accordion">
							  <h3>Información previa</h3>
								<div>
									<p>
									Ámbito de aplicación- La presente política de seguridad afecta a cualquier dato de carácter personal recogido a través de la página web (www.eyekinder.com), de los usuarios que navegan por la misma. El responsable del fichero es JPTECH, S.L.U., empresa española con domicilio en la Calle Rotonda de la Era, 53 C.P. 41940 de Tomares (España), con CIF núm. B90110305.
									</p>
								</div>
								<h3>1.1.- Información al usuario de la existencia del fichero y solicitud de su consentimiento para el tratamiento automatizado de los datos:</h3>
								<div>
									<p>
									En relación con los datos de carácter personal facilitados por el Usuario en los formularios que puedan existir en el sitio web, JPtech, S.L.U. cumple estrictamente la normativa vigente establecida en la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal (en adelante “LOPD”) y demás legislación que la desarrolla, e informa al Usuario que los referidos datos serán incluidos dentro de un fichero de su titularidad para su tratamiento automatizado, prestando el Usuario consentimiento mediante la aceptación de estas condiciones generales a dicho tratamiento.	
									</p>
								</div>
								<h3>
									1.2.- Finalidad de los datos:
								</h3>
								<div>
									<p>
										Los datos personales facilitados por el Usuario serán tratados por JPTECH, S.L.U. con la finalidad de gestionar las consultas y formalizar la compraventa de sus productos y/o servicios, así como para el envío periódico de ofertas y comunicaciones comerciales por cualquier medio, incluido el electrónico. En todo caso, los datos recogidos y tratados por el JPTECH, S.L.U. son los básicos para las finalidades, señaladas anteriormente.								
									</p>
								</div>
								<h3>
									1.3.- Derechos de acceso, rectificación, cancelación y oposición:
								</h3>
								<div>
									<p>
									El Usuario que introduzca sus datos personales en los distintos formularios de alta tendrá pleno derecho a ejercitar sus derechos de acceso, rectificación, cancelación y oposición en cualquier momento, solicitándolo a la dirección de correo electrónico (info@jptech.es) o por correo postal en la Calle Rotonda de la Era, 53 C.P. 41940 de Tomares (España), incluyendo en ambos casos copia del DNI o NIF del titular de los datos. JPtech, S.L.U. reitera que se compromete al respeto y confidencialidad absoluta en la recogida y tratamiento de los datos personales.	
									</p>
								</div>
								<h3>
									1.4.- Responsable del tratamiento:
								</h3>
								<div>
									<p>
										JPtech, S.L.U. ha inscrito debidamente sus ficheros ante el Registro General de Protección de Datos pudiéndose consultar los mismos en http://www.agpd.es.							
									</p>
								</div>
								<h3>
									1.5.- Cesión de datos
								</h3>
								<div>
									<p>
										Los datos nunca serán cedidos a terceros, sin el previo consentimiento del Usuario y cumpliendo, en todo caso, los requisitos establecidos en la legislación vigente.								
									</p>
								</div>
								<h3>
									1.6.- Seguridad
								</h3>
								<div>
									<p>
										JPtech, S.L.U. asegura la absoluta confidencialidad y privacidad de los datos personales recogidos y por ello se han adoptado medidas técnicas y organizativas de seguridad para evitar la alteración, pérdida, tratamiento o acceso no autorizado y garantizar así su integridad y seguridad; especialmente las previstas en el Real Decreto 1720/2007, de 21 de diciembre, por el que se aprueba el Reglamento de desarrollo de la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal. JPtech, S.L.U. no será responsable en ningún caso, de las incidencias que puedan surgir en torno a los datos personales cuando se deriven, bien de un ataque o acceso no autorizado a los sistemas de tal forma que sea imposible detectar por las medidas de seguridad implantadas, o bien cuando se deba a una falta de diligencia del Usuario en cuanto a la guardia y custodia de sus claves de acceso o de sus propios datos personales.							
									</p>
								</div>
								<h3>
									1.7. Veracidad de los datos:
								</h3>
								<div>
									<p>
										El Usuario es responsable de la veracidad de sus datos, comprometiéndose a no introducir datos falsos y a proceder a la modificación de los mismos si, fuera necesario.								
									</p>
								</div>
								<h3>
									1.8 Política uso de cookies:
								</h3>
								<div>
									<p>
										De acuerdo con lo previsto en el articulo 22.2 de la Ley 34/2002, de 11 de julio, de Servicios a la Sociedad de la Información y Comercio Electrónico, se informa al usuario de la presente página web que la empresa JPtech, S.L.U, titular de la página web, por su propia cuenta, puede utilizar “cookies” cuando el Usuario navega por el presente Sitio Web. Las cookies son ficheros enviados a su equipo por medio de un servidor web con la finalidad de registrar las actividades del Usuario durante su tiempo de navegación. En nuestro caso, asocian únicamente a un usuario anónimo y su ordenador, por lo que no proporcionan por sí mismas datos personales del Usuario. Así mismo, se trata de cookies de sesión por lo que, una vez se cierra esta página web, desaparecen del ordenador del Usuario. De acuerdo con la normativa antes indicada, es necesario que, para que podamos instalar estas cookies, el Usuario nos otorgue su consentimiento cosa que ocurrirá si acepta la presente política de uso. La no aceptación de esta política no implicará la imposibilidad de acceder a la web pero puede que alguna de sus funcionalidades se vean limitadas. En todo caso le recordamos que a través de su navegador puede configurar las políticas de aceptación y borrado automático de cookies, por lo que le recomendamos que reajuste la política de aceptación de cookies de su navegador, según su voluntad.							
									</p>
								</div>
							</div>  
					   </div>
					</div><!-- content -->
				</div><!-- container -->
	        </div> 
</div>