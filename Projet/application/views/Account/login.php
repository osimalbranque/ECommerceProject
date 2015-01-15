        <section>
        <?php echo validation_errors(); ?>
        <?php echo form_open('index.php/Account/Login'); ?>
        
            <label for="subscriber_login">Login : </label>
        <input type="text" name="subscriber_login" value="" /> <br />
        
        <label for="subscriber_login">Mot de passe : </label>
        <input type="password" name="subscriber_password" value="" /> <br />
        
        <input type="submit" value="Se connecter" name="form_validation" />
        
        </form>
        </section>
    </body>
</html>
