        <section>
            <?php
                if(isset($data))
                {
                    foreach($data->result_array() as $row)
                    {
                        echo '<div class="musician_info">';
                        echo '<img src="'
                              .site_url('index.php/Media/Image/Musician')
                              .'/'
                              .$row['Code_Musicien']
                              .'" alt ="" /> <br />';
                        echo '<a href="'.site_url('index.php/Musician/About_Composer/'.$row['Code_Musicien']).'">'.$row['Nom_Musicien']. ' '. $row[utf8_decode('Prénom_Musicien')].'</a>';
                        echo '</div>';
                    }
                }
            ?>
        </section>
    </body>
</html>
