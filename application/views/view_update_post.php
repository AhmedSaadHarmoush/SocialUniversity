
<div class="post-container">
     <?php echo heading("Update POST :", 3,'class="side-title"') ?> <br>
    <?php echo form_open('/posts/update/'.$post[0]['id']); ?>
        <input name='id' type="hidden" value="<?php echo $_SESSION['user_data']['id'];?>">
         <?php echo heading("Title :",3, 'class="side-title"');?>
        <input name='title' type="text" placeholder="title" value="<?php echo $post['0']['title']?>" class="textbox"><br>
         <br>
             <?php echo heading("Post :",3, 'class="side-title"');?>
         <input name='post' type="text" placeholder="post" value="<?php echo $post['0']['post']?>" class="textbox"><br>
        <input name='go' type="submit" value="update" class="btn">
        <?php echo  anchor("/posts", "Back", "class='btn'") ?>
        <div style="clear: both;"></div>
        <?php echo validation_errors(); ?>
        </form>
    </div>
   
    