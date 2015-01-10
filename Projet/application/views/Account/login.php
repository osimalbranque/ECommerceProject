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
        <?php echo validation_errors(); ?>
        <?php echo form_open('login'); ?>
        
        <input type="text" name="subscriber_login" value="" /> <br />
        <input type="password" name="subscriber_password" value="" /> <br />
        
        <input type="submit" value="form_validation" name="Se connecter" />
        
        </form>
        </section>
    </body>
</html>
