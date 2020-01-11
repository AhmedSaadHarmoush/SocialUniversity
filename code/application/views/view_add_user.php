
<div class="post-container">
    <?php echo heading("ADD User :", 3,'class="side-title"') ?> <br>
    <?php echo form_open('/users/add'); ?>
    <?php echo heading("Username :",3, 'class="side-title"');?>
    <input name='username' type="text" placeholder="username" value="" class="textbox"><br>
    <br>
    <?php echo heading("Password :",3, 'class="side-title"');?>
    <input name='password' type="password" placeholder="password" value="" class="textbox"><br>
    <?php echo heading("Type :",3, 'class="side-title"');?>
    <input name='type' type="number" placeholder="type" value="" class="textbox"><br><br>
    <input name='go' type="submit" value="add" class="btn">
    <?php echo  anchor("/users", "Back", "class='btn'") ?>
    <div style="clear: both;"></div>
    <?php echo validation_errors(); ?>
    </form>
</div>

