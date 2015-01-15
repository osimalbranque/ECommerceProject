<section>
    <?php
        if(isset($data))
        {
              /*echo '<img src="'
                      .site_url('index.php/Media/Image/Album')
                      .'/'
                      .$row['Code_Album']
                      .'" alt ="" /> <br />';
                echo '<a href="'.site_url('index.php/Album/'
                                .$row['Code_Album']).'">'
                                .$row['Titre_Album']
                                . ' '
                                . $row[utf8_decode('Année_Album')].'</a>';*/
            foreach($data->result_array() as $row)
            {
                echo '<div class="sample_info">';
                echo '<audio controls="controls">'
                        . '<source src="'.site_url('index.php/Media/Sample/index').'/'.$row['Code_Morceau'].
                        '" type="audio/mp3" /> Votre navigateur est non compatible</audio>';
                
                if($subscriber_online)
                    echo '<a href="'.site_url('index.php/Cart/AddOrder/'.$row['Code_Morceau']).'">Ajouter au panier</a>';
                echo '</div>';
            }
        }
    ?>
</section>
