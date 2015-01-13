<!DOCTYPE html>


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
    
        <?php
        include("fonctionsCart.php");

        $erreur = false;

        $action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
        if($action !== null)
        {
           if(!in_array($action,array('ajout', 'suppression', 'refresh')))
           $erreur=true;

           //récuperation des variables en POST ou GET
           $c = (isset($_POST['code'])? $_POST['code']:  (isset($_GET['code'])? $_GET['code']:null )) ;
           $l = (isset($_POST['nom'])? $_POST['nom']:  (isset($_GET['nom'])? $_GET['nom']:null )) ;
           $p = (isset($_POST['prix'])? $_POST['prix']:  (isset($_GET['prix'])? $_GET['prix']:null )) ;
           $q = (isset($_POST['qte'])? $_POST['qte']:  (isset($_GET['qte'])? $_GET['qte']:null )) ;

           //Suppression des espaces verticaux
           $l = preg_replace('#\v#', '',$l);
           //On verifie que $p soit un float
           $p = floatval($p);

           //On traite $q qui peut etre un entier simple ou un tableau d'entier

           if (is_array($q)){
              $QteArticle = array();
              $i=0;
              foreach ($q as $contenu){
                 $QteArticle[$i++] = intval($contenu);
              }
           }
           else
           $q = intval($q);

        }

        if (!$erreur){
           switch($action){
              Case "ajout":
                 ajouterArticle($c,$l,$q,$p);
                 break;

              Case "suppression":
                 supprimerArticle($c);
                 break;

              Case "refresh" :
                 for ($i = 0 ; $i < count($q) ; $i++)
                 {
                    modif_qte($_SESSION['panier']['Code Album'][$i],round($q[$i]));
                 }
                 break;

              Default:
                 break;
           }
        }
        ?>

        <form method="post" action="cart.php">
            <table style="width: 400px">
            <tr>
                    <td colspan="4">Votre panier</td>
            </tr>
            <tr>
                    <td>Référence de l'album</td>
                    <td>Nom de l'album</td>
                    <td>Quantité</td>
                    <td>Prix Unitaire</td>
                    <td>Action</td>
            </tr>


	<?php
	if (creationPanier())
	{
	   $nbArticles=count($_SESSION['panier']['Code Album']);
	   if ($nbArticles <= 0)
	   echo "Votre panier est vide.";
	   else
	   {
	      for ($i=0 ;$i < $nbArticles ; $i++)
	      {
	         echo "<tr>";
                 echo "<td>".htmlspecialchars($_SESSION['panier']['Code Album'][$i])."</ td>";
	         echo "<td>".htmlspecialchars($_SESSION['panier']['Nom Album'][$i])."</ td>";
	         echo "<td>".htmlspecialchars($_SESSION['panier']['Quantité'][$i])."</ td>";
	         echo "<td>".htmlspecialchars($_SESSION['panier']['Prix'][$i])."</td>";
	         echo "<td><a href=\"".htmlspecialchars("cart.php?action=suppression&code=".rawurlencode($_SESSION['panier']['Code Album'][$i]))."\">Supprimer</a></td>";
	         echo "</tr>";
	      }

	      echo "<tr><td colspan=\"2\"> </td>";
	      echo "<td colspan=\"2\">";
	      echo "Total : ".MontantGlobal();
	      echo "</td></tr>";

      }
              
        echo '<a href="confirmPurchase.php">Acheter</a>';	   
            }
	?>
</table>
</form>
</body>
</html>