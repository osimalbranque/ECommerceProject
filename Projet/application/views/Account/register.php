        <section>
        <?php echo validation_errors(); ?>
        <?php echo form_open('index.php/Account/Register'); ?>
        
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
        
        <input type="submit" value="S'inscrire" name="form_validation" />
        
        </form>
        </section>
    </body>
</html>
