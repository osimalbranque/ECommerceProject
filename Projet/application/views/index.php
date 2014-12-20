<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="<?php echo css_url('bootstrap'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo css_url('stylesheet'); ?>" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <nav>
                    <p>Rechercher par : </p>
                    <p>
                        <ul>
                            Musicien
                            <li>Nom</li>
                            <li>Prénom</li>
                        </ul>    
                    </p> 
                    <p>Instrument</p>
                    <p>Date de parution</p>
                    <p>Inscription</p>
                    <p>Connexion</p>
                </nav>
            </div>
            <?php echo base_url(); ?>
        </div>
    </body>
</html>
