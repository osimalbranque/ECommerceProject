<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    	session_start();
        
        if(isset($_SESSION['LOGIN'])) {
            echo '<li><a href="#"><span class="glyphicon glyphicon-pencil"> </span> Bonjour '.$_SESSION['LOGIN'].' !</a></li>';
            echo '<li><a href="..Account/logout.php"><span class="glyphicon glyphicon-log-out"> </span> Deconnexion</a></li>';
            echo '<li><a href="cart.php">Accéder au panier</a>';
        }
        else {
            echo '<li><a href="../Account/register.php"><span class="glyphicon glyphicon-pencil"> </span> Inscription</a></li>';
            echo '<li><a href="../Account/login.php"><span class="glyphicon glyphicon-log-in"> </span> Connexion</a></li>';
        } 
?>
    <?php echo site_url('header.php/Cart');?>
    <?php echo site_url('index.php/Cart');?>
    
    include('fonctionsCart.php');
    acheterArticles();
?>
<html>
    <head>
        <?php echo site_url('General/header.php'); ?>
    </head>
    <body>
        <?php echo site_url('index.php'); ?>
        <header>
            <h1>Panier</h1>
        </header>
        <article>
            Achat confirmé.<br>
            <a href="<?php echo site_url('General/index.php'); ?>"><button class="btn btn-default">Retour à l'accueil</button></a>
        </article>
    </body>
</html>
