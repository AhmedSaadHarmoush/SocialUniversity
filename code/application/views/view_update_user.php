

            <div class="post-container">
                 <?php echo heading("Update User :", 3,'class="side-title"') ?> <br>
                <?php echo form_open('/users/update/'.$user[0]['id']); ?>
                <?php echo heading("Username :",3, 'class="side-title"');?>
                <input name='username' type="text" placeholder="username" value="<?php echo $user[0]['username']?>" class="textbox"><br>
                <br>
                <?php echo heading("Password :",3, 'class="side-title"');?>
                <input name='password' type="password" placeholder="password" value="" class="textbox"><br><br>
                <input name='go' type="submit" value="Update" class="btn">
                <?php echo  anchor("/users", "Back", "class='btn'") ?>
                <div style="clear: both;"></div>
                <?php echo validation_errors(); ?>
                </div>
    