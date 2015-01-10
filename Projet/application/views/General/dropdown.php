<body>
    <div class="row">
        <ul id="main_menu" class="col-xs-8 col-sm-12 col-md-12 col-lg-12">
            <a href="<?php echo site_url('index.php/General/dropdown'); ?>">Accueil</a>
            <li><a href="#">Liste alphabétique</a>
                <ul>
                    <li><a href="#">Albums</a>
                        <ul id="menu3">
                            <li><a href="../Musician/albums.php">Tous les albums</a></li>
                                <?php
                                    foreach (range('A', 'Z') as $letter) {
                                        echo '<li><a href="albums.php?lettre='.$letter.'">'.$letter.'</a></li>"\n"';
                                    }
                                ?>
                        </ul>
                    </li>
                    <li>Chefs d'orchestre
                        <ul id="menu3">
                            <li><a href="../Orchestra/bandmaster.php">Tous</a></li>
                            <?php
                                foreach (range('A', 'Z') as $letter) {
                                    echo '<li><a href="bandmaster.php?lettre='.$letter.'">'.$letter.'</a></li>"\n"';
                                }
                            ?>
                        </ul>
                    </li>
                    <li>Compositeurs
                        <ul id="menu3">    
                            <li><a href="<?php echo site_url('Musician/Composer'); ?>">Tous les compositeurs</a></li>
                            <?php
                                foreach (range('A', 'Z') as $letter) {
                                    echo '<li><a href="../Orchestra/orchestra.php?lettre='.$letter.'">'.$letter.'</a></li>';
                                }
                            ?>
                        </ul>
                    </li>
                    <li>Interprètes
                        <ul id="menu3">
                            <li><a href="<?php echo site_url('Musician/Singer'); ?>">Tous les interprètes</a></li>
                            <?php
                                foreach (range('A', 'Z') as $letter) {
                                    echo '<li><a href="../Orchestra/orchestra.php?lettre='.$letter.'">'.$letter.'</a></li>';
                                }
                            ?>
                        </ul>
                    </li>
                    <li>Orchestres
                        <ul id="menu3">
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
            <li><a href="about.php">A propos</a></li>
            <li><a href="<?php echo site_url('Instruments/Instruments'); ?>">Instruments</a></li>
            <li><a href="<?php echo site_url('Kind/Kinds'); ?>">Genres</a></li>
            <li>
                <a href="<?php echo site_url('Account/Register'); ?>">S'inscrire</a>
            </li>
            <li>
                <a href="<?php echo site_url('Account/Login'); ?>">Connexion</a>
            </li>
        </ul>
    </class>
    <?php require_once('carousel.php'); ?>