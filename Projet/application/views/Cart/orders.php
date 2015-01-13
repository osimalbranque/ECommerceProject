<body>
        <?php
            foreach($data->result_array() as $row)
            {
                foreach($row as $key => $value)
                    echo $key.'<br />';
                echo $row['Titre'].' ('.$row['Prix'].')';
                echo ' <a href="'.site_url('index.php/Cart/BuyPurchase/'.$row['Code_Morceau']).'">Acheter'.'</a>';
                echo ' <a href="'.site_url('index.php/Cart/CancelPurchase/'.$row['Code_Morceau']).'">Retirer au panier'.'</a><br />';
            }
        ?>
    </body>
</html>
