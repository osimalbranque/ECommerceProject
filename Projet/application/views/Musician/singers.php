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
            <?php require_once('../General/dropdown.php'); ?>		
	<img src="background.jpg" alt="First slide">
        </img>
            <?php echo base_url(); ?>
        </div>
        
        <section>
            <form method="post" action="<?php echo site_url('index.php/Musician/Singer');?>">
                <input type="text" name="initial" id="initial" maxlength="1" />
                <input type="submit" value="Rechercher" />
            </form>
            <?php
                if(isset($data))
                {
                    foreach($data->result_array() as $row)
                    {
                        echo '<div class="musician_info">';
                        echo '<img src="'
                              .site_url('index.php/Media/Image/Musician')
                              .'/'
                              .$row['Code_Musicien']
                              .'" alt ="" /> <br />';
                        echo $row['Nom_Musicien']. ' '. $row[utf8_decode('Prénom_Musicien')];
                        echo '</div>';
                    }
                }
            ?>
        </section>
    </body>
</html>
