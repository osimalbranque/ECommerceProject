        <section>
            <?php
                if(isset($data))
                {
                    foreach($data->result_array() as $row)
                    {
                        echo '<div class="orchestra_info">';
                        echo $row['Nom_Orchestre'];
                        echo '</div>';
                    }
                }
            ?>
        </section>
    </body>
</html>
