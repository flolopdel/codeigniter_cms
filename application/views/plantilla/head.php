<!DOCTYPE html>
			<html lang="en">
			<head>
			    <title><?= $titulo ?></title>
			    <meta charset="utf-8">
			    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/reset.css">
			    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/cajalogin.css">
			    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/style.css">
			    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/grid_12.css">
			    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/slider.css">
			    <script src="<?php echo base_url(); ?>js/jquery-1.7.min.js"></script>
			    <!-- ADD JQuery mobile -->
				<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>css/jqmobile/jquery.mobile-1.4.0.min.css">
				<script src="<?php echo base_url(); ?>js/jquery.mobile-1.4.0.min.js"></script> -->
			    <!-- FIN JQuery mobile -->
			     <!-- Add fancyBox -->
				<link rel="stylesheet" href="<?php echo base_url(); ?>fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
				<script type="text/javascript" src="<?php echo base_url(); ?>fancybox/source/jquery.fancybox.pack.js"></script>
				<!-- Fin FancyBox -->
				<!-- Add imagen resize -->
				<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/resize/imgareaselect-default.css" />
				<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.imgareaselect.pack.js"></script>
				<!-- Fin imagen resize -->  
    			<link rel="stylesheet" href="<?php echo base_url(); ?>css/token-input.css" type="text/css" />
   				<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.tokeninput.js"></script>
			    <script src="<?php echo base_url(); ?>js/jquery.easing.1.3.js"></script>
			    <script src="<?php echo base_url(); ?>js/tms-0.4.1.js"></script>
			    <script src="<?php echo base_url(); ?>js/comun.js"></script>
			  
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
			</head>