<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php require_once('../General/dropdown.php'); ?>        
        <section>
            <h3>Connexion réussie !</h3>
            <p>
                <?php echo anchor('login', "Un des deux champs n'a pas été renseigné"); ?>
            </p>
        </section>
    </body>
</html>
