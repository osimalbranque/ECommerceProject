        <section>
        <?php echo validation_errors(); ?>
        <?php echo form_open('index.php/Account/Login'); ?>
        
        <input type="text" name="subscriber_login" value="" /> <br />
        <input type="password" name="subscriber_password" value="" /> <br />
        
        <input type="submit" value="Se connecter" name="form_validation" />
        
        </form>
        </section>
    </body>
</html>
