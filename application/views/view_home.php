<html>
<head>
    <meta charset="UTF-8">
    <title> Usci - <?php echo select_item('users', 'username',$_SESSION['usci']['user_data']['id']);?></title>
    <link rel="shortcut icon" href="<?= base_url()?>img/logo.png">
    <script src="<?php echo base_url();?>js/jquery.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>js/bootstrap.js" type="text/javascript"></script>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">
    <script src="<?php echo base_url();?>js/script.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/chat.css">    
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.min.css">    
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/main.css">
    <meta name="viewport" content="100%" />
    </head>
<body>
<aside class="sidebar">
   <center>
       <a href="<?=base_url("index.php/profile");?>">
       <div class="prof-pic section">
           <div class="prof-pic-img header_logo">
               <img src="<?php echo base_url().select_item('users', 'profile_url',$_SESSION['usci']['user_data']['id']);?> "><!--progile-picture-->
           </div>
           <div class="cheack"><i class="icon-check-mark"></i></div>
           <h3 class="prof-name"><?php echo select_item('users', 'username',$_SESSION['usci']['user_data']['id']);?></h3><!--user-name-->
       </div>
       </a>
   </center>
    <?php if($_SESSION['usci']['user_data']['type'] > 0) { ?>   
     <?php } ?>
       <?php if($_SESSION['usci']['user_data']['type'] == 1){?>
       <div class="info section">
           <ul>
               <li><i class="icon-right-open"></i>ID <span><?= $_SESSION['usci']['type_data'][0]['student_id']?></span> </li>
               <li><i class="icon-right-open"></i> CGPA <span><?= $_SESSION['usci']['type_data'][0]['cgpa']?></span> </li>
               <li><i class="icon-right-open"></i> Department <span><?= select_item('departements','name',$_SESSION['usci']['type_data'][0]['department_id'])?></span></li>
               <li><i class="icon-right-open"></i><?= $_SESSION['usci']['type_data'][0]['hours']?> <span>Hours</span></li>
           </ul><!--user-information-->
       </div>
       <?php } ?>
    <?php if($_SESSION['usci']['user_data']['type'] != 3 ){ ?>
       <div class="group section">
           <i class="icon-folder3"></i><h3 class="side-title">Groupes</h3>
           <div class="group-container">
               <ul id="groups-elements">
                    <?php $groups=$this->mange->getGroups();?>
                    <?php if(!empty($groups[0])){ ?>
                    <?php foreach ($groups as $group) :?>
                    <li id="<?=$group['name']?>"><a href="<?= base_url().'index.php/groups/get/'.$group['groupid']?>">
                    <?=$group['name'].' | '.$group['code']?></a></li>
                    <?php endforeach;?>
                    <?php } else { ?>
                    <li id="no-groups">No groups to show :/ </li>
                    <?php } ?>
               </ul><!--user-groupes-->
           </div>
       </div>
    <?php } ?>
    <div class="feeds section">
        <h3 class="side-title">New feeds</h3>
        <div class="fends-container">
            <!--notification-items-->
            <li>
                <i class="icon-bell-1"></i>
                <p><span>mohamed</span> just posted in theroy of compitiotn </p>
                <div style="clear:both"></div>
            </li>
            <li>
                <i class="icon-bell-1"></i>
                <p><span>mimo</span> posted in Graphics at 2:00 am </p>
                <div style="clear:both"></div>
            </li>
            <li>
                <i class="icon-bell-1"></i>
                <p><span>Dr.yasser</span> posted at java 3:23 pm </p>
                <div style="clear:both"></div>
            </li>
            <!--end-of-notification-item-->
        </div>
    </div>
    <div class="section">
           <?=  anchor("/log", "Home", "class='btn'"); ?>
    </div>
    <?php if($_SESSION['usci']['user_data']['type'] == 3) { ?>
    <div class="section"><?php
          echo anchor("/departements", "Departements", "class='btn'").'<br><br>';
          echo anchor('/users','Users', "class='btn'").'<br><br>';
          echo anchor("/posts", "Posts", "class='btn'");?></div><?php } ?>
    <?php if($_SESSION['usci']['user_data']['type'] == 3) { ?>   
    <div class="section"><?=  anchor("/subjects", "Supjects", "class='btn'");?> </div><?php }?>
    <?php if($_SESSION['usci']['user_data']['type'] == 1) { ?>   
    <div class="section"><?=  anchor("/subjects/regsubject", "Subjects", "class='btn'");?></div><?php }?>
    <?php if ($_SESSION['usci']['user_data']['type']==2) : ?>
    <div class="section"><?=  anchor("/subjects/docregister", "Subjects", "class='btn'");?></div>
    <?php endif ; ?>
    <div class="section"><?php echo  anchor("/msg", "Masseges", "class='btn'") ?></div>
    <div class=" section"><?php echo  anchor("/log/logout", "Logout", "class='btn'") ?></div>
</aside>
<div class="warpper">
   <!-----------------------------------usernav--------------------->
   <nav class="navs">
       <div class="foatRight mob-menu">
          <i class="icon-menu"></i>
       </div>
       <ul class="nav1">
           <li class="headerbtn">
              <?=  anchor("/log", "Home"); ?> 
           </li>
           <li class="headerbtn">
              <?=  anchor("/profile", "Profile"); ?> 
           </li>
           <li class="headerbtn">
              <?=  anchor("/msg", "Massenger"); ?> 
           </li>
           <li class="headerbtn">
              <?=  anchor("/info", "Info"); ?> 
           </li>
           <li class="headerbtn">
              <?=  anchor("/log/logout", "Logout"); ?> 
           </li>
           
       </ul>
   </nav><!--end of user nav-->
   <?php
   if(isset($data['template']))$this->load->view($data['template'],$data);
   else{?>
   <div class="post-container dit floatRight">
       <p> Faculty of scince &copy; 2014 </p>
   </div>
    <div style="clear:both"></div>
   
   
   <?php
       $uid = $_SESSION['usci']['user_data']['id'];
       $fhome = $this->mange->query("SELECT posts.id,posts.user_id,posts.groupe_id,posts.created,posts.post,posts.img_url,posts.type FROM posts JOIN group_members ON (posts.groupe_id = group_members.group_id )|| (!(posts.groupe_id = group_members.group_id ) &&(posts.groupe_id=0)) WHERE (group_members.user_id = $uid ) ORDER BY id DESC",TRUE);
       if(isset($fhome) && !empty($fhome)){
           
            $n = count($fhome);
            for($i=0 ; $i<$n ;$i++){
                for($j=0 ; $j < $n ; $j++){
                    if(isset($fhome[$i]) && isset($fhome[$j])&& ($i != $j) && ($fhome[$i]['id'] == $fhome[$j]['id']) ){
                        unset($fhome[$j]);
                    }
                }
            }
           foreach ($fhome as $post) : $p = $post['id']; ?>
    
               <div class="post-container post" id="<?= $post['id']?>">
        <div class="user-img floatLeft" style="width: 57.5px; height: 57.5px;">
            <img src="<?= base_url().select_item('users', 'profile_url',$post['user_id']); ?>" style="width: 50px; height: 50px;"><!-- user img-->
        </div>
        <div class="user_info floatLeft">
            <p class="user-name block"><?php echo  "<a href='".base_url("index.php/msg/get/$uid/".$post['user_id'])."' >".select_item('users', 'username',$post['user_id'])."</a>";
            if($post['groupe_id'] != 0)echo' > '."<a href = '".base_url('index.php/groups/get/'.$post['groupe_id'])."' >" .select_gitem("groups","name",$post['groupe_id'])."</a>";?></p><!--user name-->
            <p class="post-date"><?=$post['created']; ?></p> <!--date--> 
        </div>
        <div style="clear:both"></div>
    <div class=" input">
            <p> <?=$post['post'];?> </p>
        <?php
         if (!empty($post['img_url']) && $post['type'] == 1) {
                        echo "<center><img src='" . base_url($post['img_url'] . "' style='max-width:100%;'></center>");
                    } else if (!empty($post['img_url']) && $post['type'] == 2) {
                        echo "<center><a href='" . base_url($post['img_url'] . "' style='max-width:100%;' class='input'> Dowenload file</a></center>");
                    }
        ?>
        <div style="clear:both"></div>
        </div><!--text-->
    <div class="add-comment">
        
        <span class="like" p="<?=$p?>" to="<?=base_url("index.php/posts/like/".$post['id'])?>"><?php if($this->mange->query("SELECT id FROM likes WHERE (user_id = $uid && post_id = $p)")== 1 ){echo'Unlike';}else{echo 'Like';}
            ?>
        </span>
        (<span id="likes<?=$p?>"><?php
        $s = $this->mange->query("SELECT id FROM likes WHERE post_id= $p");
          if($s > 0) {
              echo $s;
          }  else {
              echo '0';
          }
                ?></span>)
        . 
        <span class="comment" p="<?=$p?>"  to="<?=base_url("index.php/posts/comment/$p")?>">Comment</span <br>
        <div>
        <div class="comments<?=$p?>">    
        </div>
        </div>
    </div>
   <div style="clear:both"></div>
    </div>
         <?php endforeach;
       }
   }
   ?>
</div>
</body>
</html>