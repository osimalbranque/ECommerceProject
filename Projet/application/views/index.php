<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bienvenue sur le site de ClassicoFolies</title>
        <link rel="stylesheet" type="text/css" href="<?php echo css_url('bootstrap'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo css_url('stylesheet');?>" />
	<link rel="icon" href="../../assets/img/favicon.jpg">
        <style type="text/css">
		li.container {list-style: none; display: inline}
	</style>
    </head>
    <body>
        <div class="container">
            <?php require_once('/General/dropdown.php'); ?>	
	<img src="background.jpg" alt="First slide">
        </img>
            <?php echo base_url(); ?>
        </div>
    </body>
</html>
