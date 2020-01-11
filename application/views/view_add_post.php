<div class="post-container">
    <?php echo heading("ADD POST :", 3,'class="side-title"') ?> <br>
    <?php echo form_open('/posts/add'); ?>
        <input name='id' type="hidden" value="<?php echo $_SESSION['usci']['user_data']['id'];?>">
        <?php echo heading("Title :",3, 'class="side-title"');?>
        <input name='title' type="text" placeholder="title" value="" class="textbox"><br>
        <br>
        <?php echo heading("Post :",3, 'class="side-title"');?>
        <input name='post' type="text" placeholder="post" value="" class="textbox"><br><br>
        <input name='go' type="submit" value="add" class="btn">
        <?php echo  anchor("/posts", "Back", "class='btn'") ?>
        <div style="clear: both;"></div>
        <?php echo validation_errors(); ?>
    </form>
</div>

