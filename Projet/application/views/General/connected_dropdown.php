
<body>
    <div class="row"></class>
    <ul id="main_menu">
        <li class="col-xs-8 col-sm-12 col-md-12 col-lg-12">
                <a href="<?php site_url('index.php/General/dropdown'); ?>">Accueil</a>
        </li>
        <li><a href="#">Liste alphabétique</a>
            <ul>
                <li><a href="#">Albums</a>
                    <ul id="menu_albums">
                        <li><a href="../Musician/albums.php">Tous les albums</a></li>
                            <?php
                                foreach (range('A', 'Z') as $letter) {
                                    echo '<li><a href="albums.php?lettre='.$letter.'">'.$letter.'</a></li>"\n"';
                                }
                            ?>
                    </ul>
                </li>
                <li>Chefs d'orchestre
                    <ul id="menu_bandmaster">
                        <li><a href="../Orchestra/bandmaster.php">Tous</a></li>
                        <?php
                            foreach (range('A', 'Z') as $letter) {
                                echo '<li><a href="bandmaster.php?lettre='.$letter.'">'.$letter.'</a></li>"\n"';
                            }
                        ?>
                    </ul>
                </li>
                <li>Compositeurs
                    <ul>    
                        <li><a href="<?php echo site_url('Musician/Composer'); ?>">Tous les compositeurs</a></li>
                        <?php
                            foreach (range('A', 'Z') as $letter) {
                                echo '<li><a href="../Orchestra/orchestra.php?lettre='.$letter.'">'.$letter.'</a></li>';
                            }
                        ?>
                    </ul>
                </li>
                <li>Interprètes
                    <ul>
                        <li><a href="<?php echo site_url('Musician/Singer'); ?>">Tous les interprètes</a></li>
                        <?php
                            foreach (range('A', 'Z') as $letter) {
                                echo '<li><a href="../Orchestra/orchestra.php?lettre='.$letter.'">'.$letter.'</a></li>';
                            }
                        ?>
                    </ul>
                </li>
                <li>Orchestres
                    <ul id="menu_orchestra">
                        <li><a href="../Orchestra/orchestra.php">Tous les orchestres</a></li>
                        <?php
                            foreach (range('A', 'Z') as $letter) {
                                echo '<li><a href="orchestra.php?lettre='.$letter.'">'.$letter.'</a></li>';
                            }
                        ?>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="kind.php">Par époques</a>
            <ul>
                <li><a href="<?php echo site_url('Musician/Composer'); ?>">Compositeurs</a>
                    <ul id="menu_composers">
                        <li><a href="../Musician/composers.php">Tous les compositeurs</a></li>
                        <li><a href="../Musician/composers.php?=antiquite">Antiquité</a></li>
                        <li><a href="../Musician/composers.php?=moyenage">Moyen-Age</a></li>
                        <li><a href="../Musician/composers.php?16">16 ème siècle</a></li>
                        <li><a href="../Musician/composers.php?17">17 ème siècle</a></li>
                        <li><a href="../Musician/composers.php?18">18 ème siècle</a></li>
                        <li><a href="../Musician/composers.php?19">19 ème siècle</a></li>
                        <li><a href="../Musician/composers.php?20">20 ème siècle</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo site_url('Musician/Singer'); ?>">Interprètes</a>
                    <ul id="menu_interpreters">
                        <li><a href="../Musician/singers.php">Tous les interprètes</a></li>
                        <li><a href="../Musician/composers.php?=antiquite">Antiquité</a></li>
                        <li><a href="../Musician/composers.php?=moyenage">Moyen-Age</a></li>
                        <li><a href="../Musician/composers.php?16">16 ème siècle</a></li>
                        <li><a href="../Musician/composers.php?17">17 ème siècle</a></li>
                        <li><a href="../Musician/composers.php?18">18 ème siècle</a></li>
                        <li><a href="../Musician/composers.php?19">19 ème siècle</a></li>
                        <li><a href="../Musician/composers.php?20">20 ème siècle</a></li>
                    </ul>
                </li>			
            </ul>
        </li>
        <li><a href="../Instrument/instruments.php">Instruments</a></li>
        <li><a href="../Kind/kind.php">Genres</a></li>
        <li>
            <a href="<?php echo site_url('Cart/Purchases'); ?>">Mes achats</a>
        </li>
        <li>
            <a href="<?php echo site_url('index.php/Account/Logout'); ?>">Déconnexion</a>
        </li>
    </ul>