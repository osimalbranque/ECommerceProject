        <section>
        <?php echo validation_errors(); ?>
        <?php echo form_open('index.php/Account/Register'); ?>
        
            <label for="subscriber_name">Nom : </label>
        <input type="text" name="subscriber_name" value="" /> <br />
        
        <label for="subscriber_surname">Prénom : </label>
        <input type="text" name="subscriber_surname" value="" /> <br />
        
        <label for="subscriber_login">Login : </label>
        <input type="text" name="subscriber_login" value="" /> <br />
        
        <label for="subscriber_password">Mot de passe : </label>
        <input type="password" name="subscriber_password" value="" /> <br />
        
        <label for="subscriber_email">Email : </label>
        <input type="text" name="subscriber_email" value="" /> <br />
        
        <label for="subscriber_address">Adresse : </label>
        <input type="text" name="subscriber_address" value="" /> <br />
        
        <label for="subscriber_postcode">Code postal : </label>
        <input type="number" name="subscriber_postcode" value="" /> <br />
        
        <label for="subscriber_town">Ville : </label>
        <input type="text" name="subscriber_town" value="" /> <br />
        <select name="subscriber_country">
            <option></option>
        </select> <br />
        
        <input type="submit" value="S'inscrire" name="form_validation" />
        
        </form>
        </section>
    </body>
</html>
