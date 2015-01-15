        <section>
            <h3>Liste des genres disponibles</h3>
            <?php
            if(isset($data))
            {
                foreach($data->result_array() as $row)
                {
                    echo '<a href="'.site_url('Kind/About_Kind/'.$row['Code_Genre']).'">'.
                            $row[utf8_decode('Libellé_Abrégé')].'</a>';
                }
            }
            ?>
        </section>
