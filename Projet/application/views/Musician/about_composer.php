        <section>
            
            <h3>Résultats de la recherche Amazon</h3>
            <?php
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
        $one_disc=1;
        foreach ($It->Tracks->Disc as $Disc) 
        {
          $one_disc=0;
          if(isset($Disc->Number))
            echo "<br>Disque n°".$Disc->Number."<br>";

          if(isset($Disc->Track))
            foreach ($Disc->Track as $Trac) 
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
    
    if(isset($data))
    {
        foreach($data->result_array() as $row)
        {
            echo '<div class="album_info">';
            echo '<img src="'
                  .site_url('index.php/Media/Image/Album')
                  .'/'
                  .$row['Code_Album']
                  .'" alt ="" /> <br />';
            echo '<a href="'.site_url('index.php/Album/test/'
                            .$row['Code_Album']).'">'
                            .$row['Titre_Album']
                            . ' '
                            . $row[utf8_decode('Année_Album')].'</a>';
            echo '</div>';
        }
    }
            ?>
        </section>
    </body>
</html>
