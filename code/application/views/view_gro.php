
<div class="post-container dit floatRight">
    <h3 class="post-title">
      Supject datilse  :
    </h3>
    <li class="post-title">
        subject : <span style="color : #002166;"> <?= select_gitem("groups", "name", $gro_id )?>  </span>
    </li>
    <li class="post-title">
      code :<span style="color : #002166;"> <?=select_item( "subjects","code",select_gitem("groups", "subject_id", $gro_id ))?>  </span>
    </li>
   <?php $admins =$this->mange->query("SELECT fname_en,lname_en FROM users JOIN group_members ON users.id = group_members.user_id WHERE group_members.group_id=$gro_id && users.type = '2' " ,TRUE);?>
    <?php if(!empty($admins)){ ?>
    <li class="post-title">
      Admins :<span style="color : #002166;"> <?php
      
      foreach ($admins as $admin) {
              echo $admin['fname_en']." ".$admin['lname_en']."<br>";
      }
    }
      ?>  </span>
    </li>
    <li class="post-title">
        lecture time  :<span style="color : #002166;"> mon 9-11 modarag 2 shatpy </span>
    </li>
    
</div>
<div style="clear:both"></div>
<div class=" post post-container ">
    <h3 class="post-title">Add post :</h3>
    <form action="<?=base_url('index.php/groups/add')?>" method="POST">
        <input name='id' type="hidden" value="<?= $_SESSION['usci']['user_data']['id'];?>">
        <input name='goid' type="hidden" value="<?= $gro_id;?>">
        <textarea class="post-txt input" name="post"></textarea>
        <input type="submit" class="btn floatRight" value="post">
        <div style="clear:both"></div>
    </form>
</div>
<div class="all-posts">
    <?php
    if(isset($posts) && !empty($posts)):
        foreach ($posts as $post) : ?>
    
    <div class="post-container post">
        <div class="user-img floatLeft">
            <img src="<?= base_url().select_item('users', 'profile_url',$post['user_id']); ?>"><!-- user img-->
        </div>
        <div class="user_info floatLeft">
            <p class="user-name block"><?=select_item('users', 'username',$post['user_id']);?></p><!--user name-->
            <p class="post-date"><?=$post['created'];
            if($_SESSION['usci']['user_data']['id'] == $post['user_id']){
                echo " ".anchor("/groups/delete/$gro_id/".$post['id'], "delete", "class = 'post-date error'") . "<br>";
                
            }
            ?></p> <!--date-->
            
            
        </div>
        <div style="clear:both"></div>
    <p class=" input">
        <?=$post['post'];?>
        
    </p><!--text-->
    <div class="add-comment">
    <form>
            
    <input type="text" class="input floatLeft" placeholder="leave a comment"><!--comment input-->
    <input type="submit" class="btn floatleft" value="comment"><!--comment submit-->
      <div style="clear:both"></div>
    </form>
    </div>
   <div style="clear:both"></div>
                        

    </div>
    <?php endforeach;
    else :
     echo heading("Sorry no posts to show :\ " , 1,"class='post-title'" );
    endif;
    ?>
</div>

                
               