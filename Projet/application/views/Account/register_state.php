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
        <ul id="main_menu">
		<li><a href="#">Orchestre</a>
			<ul>
				<li><a href="orchestra.php">Tous les orchestres</a></li>
				<li class="container">
					<div id="menu_bandmaster">
						<a href="bandmaster.php">Tous les chefs d'orchestre</a>
						<ul>
							<li><a href="A">A</a></li>
							<li><a href="#">.</a></li>
							<li><a href="#">.</a></li>
							<li><a href="#">.</a></li>
							<li><a href="Z">Z</a></li>
						</ul>
					</div>
				</li>
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
				
					<li><a href="#">A</a></li>
					<li><a href="#">.</a></li>
					<li><a href="#">.</a></li>
					<li><a href="#">.</a></li>
					<li><a href="#">Z</a></li>
				
			</ul>
		</li>
		<li>
			<a href="registration.php">S'inscrire</a>
		</li>
		<li>
			<a href="connection.php">Connexion</a>
		</li>
	</ul>
        
        <section>
            <h3>Votre inscription a bien été prise en compte.</h3>
        
        <p><?php echo anchor('register', 'Il y a des erreurs sur le formulaire'); ?></p>
        </section>
    </body>
</html>
