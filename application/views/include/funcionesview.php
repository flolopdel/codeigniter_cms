<?php

function head($titulo){
	echo '	<!DOCTYPE html>
			<html lang="en">
			<head>
			    <title>'.$titulo.'</title>
			    <meta charset="utf-8">
			    <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
			    <link rel="stylesheet" type="text/css" media="screen" href="css/cajalogin.css">
			    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
			    <link rel="stylesheet" type="text/css" media="screen" href="css/grid_12.css">
			    <link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
			    <link href="http://fonts.googleapis.com/css?family=Cabin+Sketch:400,700" rel="stylesheet" type="text/css">
			    <script src="js/jquery-1.7.min.js"></script>
			    <script src="js/jquery.easing.1.3.js"></script>
			    <script src="js/tms-0.4.1.js"></script>
			    <script>
					$(document).ready(function(){				   	
						$(".slider")._TMS({
							show:0,
							pauseOnHover:true,
							prevBu:".prev",
							nextBu:".next",
							playBu:false,
							duration:800,
							preset:"fade",
							pagination:true,
							pagNums:false,
							slideshow:7000,
							numStatus:false,
							banners:false,
							waitBannerAnimation:false,
							progressBar:false
						})		
					});
				</script>
				<!--[if lt IE 8]>
			       <div style=" clear: both; text-align:center; position: relative;">
			         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
			           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
			        </a>
			      </div>
			    <![endif]-->
			    <!--[if lt IE 9]>
			   		<script type="text/javascript" src="js/html5.js"></script>
			    	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
				<![endif]-->
			</head>';
}
function bodyHeaderPrincipal(){
echo '<body>
  <div class="main">
  <!--==============================header=================================-->
    <header>
    	<div class="container_12">
	    	<div class="logoTop">
	        <h1><a href="index.html"><img src="images/logo.png" alt=""></a></h1>
	        </div>
	        <div id="loginTop">
		        <div class="container">
					<div class="contentTop">
						<form action="">
							<div>
								<input type="text" placeholder="Usuario" required="" id="username" />
							</div>
							<div>
								<input type="password" placeholder="Contraseña" required="" id="password" />
							</div>
							<div>
								<input type="submit" value="Entrar" />
								<a href="#">¿Olvidó su contraseña?</a>
								<a href="registro.php">Registrarse</a>
							</div>
						</form><!-- form -->
					</div><!-- content -->
				</div><!-- container -->
	        </div>
	    </div>    
        <div class="nav2">  
            <div id="slide">		
                <div class="slider">
                    <ul class="items">
                        <li><img src="images/slider-1.jpg" alt="" /></li>
                        <li><img src="images/slider-2.jpg" alt="" /></li>
                        <li><img src="images/slider-3.jpg" alt="" /></li>
                    </ul>
                </div>	
                <a href="#" class="prev"></a><a href="#" class="next"></a>
            </div>
         </div>
    </header>  
    <section id="content">
        <div class="container_12">	';	
}
function bodyHeaderRegistro($texto){
echo '<body>
  <div class="main">
  <!--==============================header=================================-->
    <header>
    	<div class="container_12">
	    	<div class="logoTop">
	        <h1><a href="index.html"><img src="images/logo.png" alt=""></a></h1>
	        </div>
	        <div id="loginTop">
		        <div class="container">
					<div class="contentTop">
						<form action="">
							<h1> '.$texto.' </h1>
						</form><!-- form -->
					</div><!-- content -->
				</div><!-- container -->
	        </div>
	    </div>
    </header>  
    <section id="content">
        <div class="container_12">	';	
}
function bodyHeaderMenu($texto){
echo '<body>
  <div class="main">
  <!--==============================header=================================-->
    <header>
    <div class="container_12">
        	<div class="logoTop">
	        <h1><a href="index.html"><img src="images/logo.png" alt=""></a></h1>
	        </div>
	        <div id="loginTop">
		        <div class="container">
					<div class="contentTop">
						<form action="">
							<div class="fotoTop"><img src = "images/icofinder/nino.png" alt = "'.$texto.'" title="'.$texto.'" /> </div><div class="textoTop"><h1> '.$texto.' </h1></div>
						</form><!-- form -->
					</div><!-- content -->
				</div><!-- container -->
	        </div>
        <div class="menuNormal">
            <ul class="menu">
                <li class="current"><a href="index.html" class="clr-1">Home</a></li>
                <li><a href="about.html" class="clr-2">About</a></li>
                <li><a href="schedule.html" class="clr-3">Schedule</a></li>
                <li><a href="gallery.html" class="clr-4">Gallery</a></li>
                <li><a href="contacts.html" class="clr-5">Contacts</a></li>
            </ul>
         </div>
     </div>
    </header>  
    <section id="content">
        <div class="container_12">	';	
}
function bodyHeaderSliderMenu(){
echo '<body>
  <div class="main">
  <!--==============================header=================================-->
    <header>
        <div class="logoTop">
	        <h1><a href="index.html"><img src="images/logo.png" alt=""></a></h1>
	    </div>
	    <div class="loginTop">
	    </div>
        <div class="nav1">  
            <div id="slide">		
                <div class="slider">
                    <ul class="items">
                        <li><img src="images/slider-1.jpg" alt="" /></li>
                        <li><img src="images/slider-2.jpg" alt="" /></li>
                        <li><img src="images/slider-3.jpg" alt="" /></li>
                    </ul>
                </div>	
                <a href="#" class="prev"></a><a href="#" class="next"></a>
            </div>
            <ul class="menu">
                <li class="current"><a href="index.html" class="clr-1">Home</a></li>
                <li><a href="about.html" class="clr-2">About</a></li>
                <li><a href="schedule.html" class="clr-3">Schedule</a></li>
                <li><a href="gallery.html" class="clr-4">Gallery</a></li>
                <li><a href="contacts.html" class="clr-5">Contacts</a></li>
            </ul>
         </div>
    </header>  
    <section id="content">
        <div class="container_12">	';	
}

function footer(){
	echo '<!--==============================footer=================================-->
            <footer>
                <p>© 2012 Art School</p>
                <p>Website Template by <a class="link" href="http://www.templatemonster.com/" target="_blank" rel="nofollow">www.templatemonster.com</a></p>
            </footer>
          <div class="clear"></div>
        </div>  
        </section>
   </div>      
</body>
</html>';
}

?>