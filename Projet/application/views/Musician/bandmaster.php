
<?php require_once('../General/dropdown.php'); ?>
        <section>
            <form method="post" action="<?php echo site_url('index.php/Musician/Bandmaster');?>">
                <input type="text" name="initial" id="initial" maxlength="1" />
                <input type="submit" value="Rechercher" />
            </form>
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
	<?php require_once('../General/footer.php'); ?>
</html>