<!DOCTYPE html> 
<html>
<head> 
  <meta name="viewport" content="user-scalable=no,width=device-width" />
	<meta charset="utf-8">
  <script src="<?= base_url() ?>js/jquery-1.7.min.js"></script>
  <script src="<?= base_url() ?>js/jquery.mobile-1.4.0.js"></script>
  <link rel="stylesheet" href="<?= base_url() ?>css/jqmobile/jquery.mobile-1.4.0.min.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/cajalogin.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/style.css">

	<link href="<?php echo base_url(); ?>css/galeria/photoswipe.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="<?php echo base_url(); ?>js/galeria/simple-inheritance.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/galeria/code-photoswipe-1.0.11.min.js"></script>
	<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', function(){
			
			Code.photoSwipe('a', '#Gallery');
			
		}, false);
		
	</script>
</head> 