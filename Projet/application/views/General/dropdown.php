<ul id="main_menu">
		<li><a href="#">Orchestre</a>
			<ul>
				<li>Les orchestres
					<ul id="menu_orchestra">
						<li><a href="orchestra.php">Tous</a></li>
						<?php
						foreach (range('A', 'Z') as $letter) {
							echo '<li><a href="formulaire_Compositeurs.php?lettre='.$letter.'">'.$letter.'</a></li>';
						}
                                                ?>
					</ul>
				</li>
				<li>Les chefs d'orchestre
					<ul id="menu_bandmaster">
						<li><a href="bandmaster.php">Tous</a></li>
						<?php
						foreach (range('A', 'Z') as $letter) {
							echo '<li><a href="formulaire_Chefs.php?lettre='.$letter.'">'.$letter.'</a></li>"\n"';
						}
					?>
					</ul>
				</li>
			</ul>
		</li>
		<li><a href="#">Rechercher par</a>
			<ul>
				<li><a href="<?php echo site_url('Musician/Composer'); ?>">Compositeur</a></li>
				<li><a href="#">Date de parution</a></li>
				<li><a href="#">Genre</a></li>
				<li><a href="#">Instrument</a></li>
				<li><a href="<?php echo site_url('Musician/Singer'); ?>">Interprète</a></li>
			</ul>
		</li>
		<li><a href="#">Albums</a>
			<ul id="menu_albums">
				<li><a href="#">Tous les albums</a></li>
				<?php
						foreach (range('A', 'Z') as $letter) {
							echo '<li><a href="formulaire_Albums.php?lettre='.$letter.'">'.$letter.'</a></li>"\n"';
						}
					?>
			</ul>
		</li>
		<li>
			<a href="registration.php">S'inscrire</a>
		</li>
		<li>
			<a href="<?php echo site_url('Account/login'); ?>">Connexion</a>
		</li>
	</ul>