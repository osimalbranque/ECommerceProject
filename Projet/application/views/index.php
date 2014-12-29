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
    </head>
    <body>
        <div class="container">
            <!--<div class="row">
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
            </div>-->
			<ul id="main_menu">
				<li><a href="#">Orchestre</a>
					<ul>
						<li><a href="orchestra.php">Tous les orchestres</a></li>
						<div id="menu_bandmaster">
							<li>
								<a href="bandmaster.php">Tous les chefs d'orchestre</a>
								
									<li><a href="A">A</a></li>
									<li><a href="#">.</a></li>
									<li><a href="#">.</a></li>
									<li><a href="#">.</a></li>
									<li><a href="Z">Z</a></li>
								
							</li>
						</div>
					</ul>
				</li>
				<li><a href="#">Rechercher par</a>
					<ul>
						<li><a href="#">Compositeur</a></li>
						<li><a href="#">Date de parution</a></li>
						<li><a href="#">Genre</a></li>
						<li><a href="#">Instrument</a></li>
						<li><a href="#">Interprète</a></li>
					</ul>
				</li>
				<li><a href="#">Albums</a>
					<ul id="menu_albums">
						<li><a href="#">Tous les albums</a></li>
						<ul>
							<li><a href="#">A</a></li>
							<li><a href="#">.</a></li>
							<li><a href="#">.</a></li>
							<li><a href="#">.</a></li>
							<li><a href="#">Z</a></li>
						</ul>
					</ul>
				</li>
				<li>
					<a href="registration.php">S'inscrire</a>
				</li>
				<li>
					<a href="connection.php">Connexion</a>
				</li>
			</ul>			
            <img src="../../assets/img/background.jpg" alt="First slide">
			</img>
            <?php echo base_url(); ?>
        </div>
    </body>
</html>
