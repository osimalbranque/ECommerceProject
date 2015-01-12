<body>
    <div class="row">
        <ul id="main_menu" class="col-xs-8 col-sm-12 col-md-12 col-lg-12">
            <a href="<?php echo site_url('index.php'); ?>">Accueil</a>
            <li><a href="#">Liste alphabétique</a>
                <ul>
                    <li><a href="#">Albums</a>
                    <ul id="menu_albums">
                        <li><a href="<?php echo site_url('index.php/Album/Everything'); ?>">Tous les albums</a></li>
                            <?php
                                foreach (range('A', 'Z') as $letter) {
                                    echo '<li><a href="'.site_url('index.php/Album/Albums'.'/'.$letter).'">'.$letter.'</a></li>"\n"';
                                }
                            ?>
                    </ul>
                </li>
                    <li>Chefs d'orchestre
                    <ul id="menu_bandmaster">
                        <li><a href="<?php echo site_url('index.php/Musician/AllBandmasters'); ?>">Tous</a></li>
                        <?php
                            foreach (range('A', 'Z') as $letter) {
                                echo '<li><a href="'.site_url('index.php/Musician/Bandmasters'.'/'.$letter).'">'.$letter.'</a></li>"\n"';
                            }
                        ?>
                    </ul>
                </li>
                    <li>Compositeurs
                    <ul>    
                        <li><a href="<?php echo site_url('index.php/Musician/AllComposers'); ?>">Tous les compositeurs</a></li>
                        <?php
                            foreach (range('A', 'Z') as $letter) {
                                echo '<li><a href="'.site_url('index.php/Musician/Composer').'/'.$letter.'">'.$letter.'</a></li>';
                            }
                        ?>
                    </ul>
                </li>
                    <li>Interprètes
                    <ul>
                        <li><a href="<?php echo site_url('index.php/Musician/AllSingers'); ?>">Tous les interprètes</a></li>
                        <?php
                            foreach (range('A', 'Z') as $letter) {
                                echo '<li><a href="'.site_url('index.php/Musician/Singer').'/'.$letter.'">'.$letter.'</a></li>';
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
            <li><a href="about.php">A propos</a></li>
            <li><a href="<?php echo site_url('index.php/Instruments/Instruments'); ?>">Instruments</a></li>
            <li><a href="<?php echo site_url('index.php/Kind/Kinds'); ?>">Genres</a></li>
            <li>
                <a href="<?php echo site_url('index.php/Account/Register'); ?>">S'inscrire</a>
            </li>
            <li>
                <a href="<?php echo site_url('index.php/Account/Login'); ?>">Connexion</a>
            </li>
        </ul>
    </class>
    <?php //require_once('carousel.php'); ?>