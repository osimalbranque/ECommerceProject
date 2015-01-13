<!DOCTYPE html>


<?php
  session_start();
    include('session.php');
    include('Fonctions.php');
?>
<html>
    <head>
    <?php
    affichageHeadHtml();
    ?>
    </head>
    <body>
        <?php
        affichageBarreNav();
        ?>
        <header>
            <div id="HomeTitle">
    <h1>Lien avec Amazon</h1>   
                <h1 id='nomSite'>e-Cappella</h1>
            </div>
        </header>

<article id="DescriptionAmazon">
<?php
include ('AmazonECS.php');

$client = new AmazonECS("AKIAIWYU42S4K5GU6CHA", "AoevaX9ZG0GTS8CD/nbQdhZ5K5vVZwMrsl5JA1NP", 'fr', "ecappella-20");

$client->category("Music");

$response=null;
$compo=0;

if(isset($_GET['Prenom']) && isset($_GET['Nom']))
{
  $compo=1;
  $nom=$_GET['Nom'];
  $prenom=$_GET['Prenom'];
}

if($compo==1)
{
  $response = $client->responseGroup('Large')->search($nom.' '.$prenom);
}

if(isset($_GET['search']))
  $response = $client->responseGroup('Large')->search($_GET['search']);


if(isset($response->Items->Item))
  foreach ($response->Items->Item as $It)
  {
    //echo "---------------------- \n";

    echo '<div class="thumbnail">';
    if(isset($It->DetailPageURL)) echo '<a href='.$It->DetailPageURL.'><button class="btn btn-default"> Aller sur Amazon ! </button></a><br><br>';
    if(isset($It->MediumImage)) echo '<img src='.$It->MediumImage->URL.'><br>';
    if(isset($It->ItemAttributes->Binding)) echo $It->ItemAttributes->Binding.'<br>';
    if(isset($It->ItemAttributes->Brand)) echo $It->ItemAttributes->Brand.'<br>';    

    if(isset($It->ItemAttributes->Title)) 
      echo 'Titre du CD :'.$It->ItemAttributes->Title.'<br><br>';

    if(isset($It->Tracks))
    {
      if(isset($It->Tracks->Disc))
      {
        $unDisque=1;
        foreach ($It->Tracks->Disc as $Disque) 
        {
          $unDisque=0;
          if(isset($Disque->Number))
            echo "<br>Disque n°".$Disque->Number."<br>";

          if(isset($Disque->Track))
            foreach ($Disque->Track as $Trac) 
            {
              echo $Trac->_."<br>";
            }
          }
          if(isset($It->Tracks->Disc->Track))
          {
            
            foreach ($It->Tracks->Disc->Track as $trac) 
            {
              if(is_object($trac))
              echo $trac->_."<br>";
              else
              echo $trac;

            }
          }
        }

      }
      echo '</div>';
    }
    
    


    ?>
  </article>
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>  
  </body>
  </html>