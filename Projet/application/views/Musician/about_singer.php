        <section>
            <?php
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