<section>
    <?php
        if(isset($data))
        {
            foreach($data->result_array() as $row)
            {
                echo '<div class="instrument_info">';
                echo '<img src="'
                      .site_url('index.php/Media/Image/Instrument')
                      .'/'
                      .$row['Code_Instrument']
                      .'" alt ="" /> <br />';
                echo '<a href="'.site_url('index.php/Instrument/Instruments/'
                                .$row['Code_Instrument']).'">'
                                .$row['Nom_Instrument']
                                .'</a>';
                echo '</div>';
            }
        }
    ?>
</section>
