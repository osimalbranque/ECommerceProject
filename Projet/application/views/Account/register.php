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
        <?php echo form_open('register'); ?>
        
        <input type="text" name="subscriber_name" value="" /> <br />
        <input type="text" name="subscriber_surname" value="" /> <br />
        <input type="text" name="subscriber_login" value="" /> <br />
        <input type="password" name="subscriber_password" value="" /> <br />
        <input type="text" name="subscriber_email" value="" /> <br />
        
        <input type="text" name="subscriber_address" value="" /> <br />
        <input type="number" name="subscriber_postcode" value="" /> <br />
        <input type="text" name="subscriber_town" value="" /> <br />
        <select name="subscriber_country">
            <option></option>
        </select> <br />
        
        <input type="submit" value="form_validation" name="S'inscrire" />
        
        </form>
        </section>
    </body>
</html>
