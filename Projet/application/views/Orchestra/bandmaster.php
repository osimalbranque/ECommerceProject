
<?php require_once('../General/dropdown.php'); ?>
<div id= "contenu">
<?php 
    // Connexion odbc
    $conn = odbc_connect('Classique_Web','ETD','ETD',SQL_CUR_USE_ODBC) or die ("raté");
    // Accès à 	la table

	$lettre= $_REQUEST['lettre'];
    $result = odbc_exec($conn,"Select Musicien.Nom_Musicien ,Musicien.Code_Musicien , Musicien.Prénom_Musicien
from Musicien Join Direction on Direction.Code_Musicien = Musicien.Code_Musicien
 Where Musicien.Nom_Musicien Like '$lettre%'
group by Musicien.Nom_Musicien, Musicien.Code_Musicien, Musicien.Prénom_Musicien
order by Musicien.Nom_Musicien;");
    // boucle de lecture
    while (odbc_fetch_row($result)) {

	$nom = odbc_result($result,1);
	$code = odbc_result($result,2);
	$prenom= odbc_result($result,3);

	
	
 	
		echo ' <a href="Description_Chefs.php?Code='.htmlentities($code).'&Nom='.htmlentities($nom).'&Prenom='.htmlentities($prenom).'">'.htmlentities($nom).' '.htmlentities($prenom).'</a>';
		echo '<img src="image_musicien.php?code='.$code.'" height="80" width="80"alt="image"/>';
		echo '<p> </p>';
		//htmlentities convertit les caractères éligibles en entités HTML
    }
    // Deconnexion de la base de données 
    odbc_close($conn);
?>
</div>
<br><br>
<?php require_once('../General/footer.php'); ?>