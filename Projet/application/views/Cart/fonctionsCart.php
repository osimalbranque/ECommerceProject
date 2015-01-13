<?php
/**
 * Verifie si le panier existe, le créé sinon
 * @return booleen
 */
function creationPanier(){
   if (!isset($_SESSION['panier'])){
      $_SESSION['panier']=array();
      $_SESSION['panier']['Code Album'] = array();
      $_SESSION['panier']['Nom Album'] = array();
      $_SESSION['panier']['Quantité'] = array();
      $_SESSION['panier']['Prix'] = array();
   }
   return true;
}


/**
 * Ajoute un album dans le panier
 * @param int $codeAlbum
 * @param string $nomAlbum
 * @param int $qte
 * @param float $prixAlbum
 * @return void
 */
function ajouterArticle($codeAlbum, $nomAlbum,$qte,$prixAlbum){

   //Si le panier existe
   if (creationPanier())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($codeAlbum,  $_SESSION['panier']['Code Album']);

      if ($positionProduit !== false)
      {
         $_SESSION['panier']['Quantité'][$positionProduit] += $qte ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['panier']['Code Album'],$codeAlbum);
         array_push( $_SESSION['panier']['Nom Album'],$nomAlbum);
         array_push( $_SESSION['panier']['Quantité'],$qte);
         array_push( $_SESSION['panier']['Prix'],$prixAlbum);
      }
   }
}



/**
 * Modifie la quantité d'un article dans le panier
 *
 * @param String $codeAlbum   Identifiant de l'article à modifier
 * @param Int $qte              Nouvelle quantité à enregistrer
 * @return Boolean              Retourne VRAI si la modification a bien eu lieu, FAUX sinon.
 */
function modif_qte($codeAlbum, $qte)
{
    /* On compte le nombre d'articles différents dans le panier */
    $nb_articles = count($_SESSION['panier']['Code Album']);
    /* On initialise la variable de retour */
    $ajoute = false;
    /* On parcoure le tableau de session pour modifier l'article précis. */
    for($i = 0; $i < $nb_articles; $i++)
    {
        if($codeAlbum == $_SESSION['panier']['Code Album'][$i])
        {
            $_SESSION['panier']['Quantité'][$i] = $qte;
            $ajoute = true;
            echo 'Voici la quantité modifiée :'.$_SESSION['panier']['Quantité'][$i];
        }
    }
    return $ajoute;
} 

/**
 * Supprimer un article du panier
 *
 * @param String    $codeAlbum numéro de référence de l'article à supprimer
 * @return Boolean  Retourn TRUE si la suppression a bien été effectuée, FALSE sinon
 */
function supprimerArticle($codeAlbum)
{
    $suppression = false;
    /* création d'un tableau temporaire de stockage des articles */
    $panier_tmp = array("Code Album"=>array(),"Nom Album"=>array(),"Quantité"=>array(),"Prix"=>array());
    /* Comptage des articles du panier */
    $nb_articles = count($_SESSION['panier']['Code Album']);
    /* Transfert du panier dans le panier temporaire */
    for($i = 0; $i < $nb_articles; $i++)
    {
        /* On transfère tout sauf l'article à supprimer */
        if($_SESSION['panier']['Code Album'][$i] != $codeAlbum)
        {
            array_push($panier_tmp['Code Album'],$_SESSION['panier']['Code Album'][$i]);
            array_push($panier_tmp['Nom Album'],$_SESSION['panier']['Nom Album'][$i]);
            array_push($panier_tmp['Quantité'],$_SESSION['panier']['Quantité'][$i]);
            array_push($panier_tmp['Prix'],$_SESSION['panier']['Prix'][$i]);
        }
    }
    /* Le transfert est terminé, on ré-initialise le panier */
    $_SESSION['panier'] = $panier_tmp;
    /* Option : on peut maintenant supprimer notre panier temporaire: */
    unset($panier_tmp);
    $suppression = true;
    return $suppression;
} 


/**
 * Montant total du panier
 * @return int
 */
function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['Code Album']); $i++)
   {
      $total += $_SESSION['panier']['Quantité'][$i] * $_SESSION['panier']['Prix'][$i];
   }
   return $total;
}


/**
 * Fonction de suppression du panier
 * @return void
 */
function supprimePanier(){
   unset($_SESSION['panier']);
}

/**
 * Compte le nombre d'articles différents dans le panier
 * @return int
 */
function compterArticles()
{
   if (isset($_SESSION['panier']))
   return count($_SESSION['panier']['Code Album']);
   else
   return 0;

}

function acheterArticles() {
    $dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
    
    if (count($_SESSION['panier']['Code Album']) != 0)
    {
        $log = $_SESSION['LOGIN'];
        $sousreq = "SELECT Code_Abonné as Code FROM Abonné WHERE Login = '".$log."'";
        foreach($dbh->query($sousreq) as $row) {
            $codeabo = $row['Code'];
        }
        for($i = 0; $i < count($_SESSION['panier']['Code Album']); $i++) {
            $stmt = "SELECT Enregistrement.Code_Morceau FROM Enregistrement 
                JOIN Composition_Disque ON Enregistrement.Code_Morceau=Composition_Disque.Code_Morceau
                JOIN Disque ON Composition_Disque.Code_Disque =Disque.Code_Disque
                JOIN Album ON Disque.Code_Album=Album.Code_Album
                WHERE Album.Code_Album=".$_SESSION['panier']['Code Album'][$i];
            foreach($dbh->query($stmt) as $row) {
                $code = $row['Code_Morceau'];
                $stmt2 = $dbh->prepare("INSERT INTO Achat(Code_Enregistrement, Code_Abonné) VALUES ('".$code."','".$codeabo."')");
                $stmt2->execute();
            }
        }
    }
    
}