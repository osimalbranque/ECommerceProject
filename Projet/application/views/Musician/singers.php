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
                        echo $row['Nom_Musicien']. ' '. $row[utf8_decode('Prénom_Musicien')];
                        echo '</div>';
                    }
                }
            ?>
        </section>
    </body>
</html>
