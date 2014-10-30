<body id="bodyfancybox">
	<div class="main">
		<!--==============================header=================================-->
		<section id="content2">
			<div class="container_122">
			<div class="logoTop">
	    		<?php 
	    		$logo ="";
	    		if (isset($disenonuevo['logo']) && $disenonuevo['logo'] != ""){
	    			$logo = $disenonuevo['logo'];
	    		}else if (isset($diseno['logo']) && $diseno['logo'] != ""){
	    			$logo = $diseno['logo'];
	    		}
	    		 ?>
	        <h1><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logos/<?= $logo ?>" alt=""></a></h1>
	        </div>
