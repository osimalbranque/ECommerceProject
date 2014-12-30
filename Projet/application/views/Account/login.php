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
        <?php echo validation_errors(); ?>
        <?php echo form_open('login'); ?>
        
        <input type="text" name="subscriber_login" value="" /> <br />
        <input type="password" name="subscriber_password" value="" /> <br />
        
        <input type="submit" value="form_validation" name="Se connecter" />
        
        </form>
        </section>
    </body>
</html>
