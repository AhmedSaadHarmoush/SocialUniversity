<html>
<head>
    <meta charset="UTF-8">
   
    <title> Usci - <?php echo select_item('users', 'username',$_SESSION['usci']['user_data']['id']);?></title>
        <link rel="shortcut icon" href="<?= base_url()?>img/logo.png">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css">
        <script src="<?php echo base_url();?>js/jquery.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css">
        <script src="<?php echo base_url();?>js/script.js" type="text/javascript"></script>
        
    </head>
<body>
         <aside class="sidebar">
            <center>
                <div class="prof-pic section">
                    <div class="prof-pic-img header_logo">
                        <img src="<?php echo base_url().select_item('users', 'profile_url',$_SESSION['usci']['user_data']['id']);?> "><!--progile-picture-->
                    </div>
                    <div class="cheack"><i class="icon-check-mark"></i></div>
                    <h3 class="prof-name"><?php echo select_item('users', 'username',$_SESSION['usci']['user_data']['id']);?></h3><!--user-name-->
                </div>
            </center>
             <?php if($_SESSION['usci']['user_data']['type'] > 0) { ?>   
             <div class="section">
                    <?=  anchor("/profile/", "Profile", "class='btn'"); ?>
             </div>
              <?php } ?>
                <?php if($_SESSION['usci']['user_data']['type'] == 1){?>
                <div class="info section">
                    <ul>
                        
                        <li><i class="icon-right-open"></i><span><?= $_SESSION['usci']['type_data'][0]['student_id']?></span> </li>
                        <li><i class="icon-right-open"></i> CGPA <span><?= $_SESSION['usci']['type_data'][0]['cgpa']?></span> </li>
                        <li><i class="icon-right-open"></i><span><?= select_item('departements','name',$_SESSION['usci']['type_data'][0]['department_id'])?></span></li>
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
                            <li id="<?=$group['name']?>"><a href="<?= base_url().'index.php/groups/get/'.$group['groupid']?>"><?=$group['name'].' | '.$group['code']?></a></li>
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
                        <!--end-of-notification-item-->
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
                        <li>
                            <i class="icon-bell-1"></i>
                            <p><span>Dr.yasser</span> posted at java 3:23 pm </p>
                            <div style="clear:both"></div>
                        </li>
                    </div>
                </div>
             <?php if($_SESSION['usci']['user_data']['type'] == 3) { ?>
             <div class="section">
               <?php
                   echo anchor("/departements", "Departements", "class='btn'").'<br><br>';
                   echo anchor('/users','users', "class='btn'").'<br><br>';
                   echo  anchor("/posts", "posts", "class='btn'");
                ?>
             </div>
            <?php } ?>
               
              <?php if($_SESSION['usci']['user_data']['type'] == 3) { ?>   
             <div class="section">
                    <?=  anchor("/subjects", "Supjects", "class='btn'"); ?>
             </div>
              <?php } ?>
             <?php if($_SESSION['usci']['user_data']['type'] == 1) { ?>   
             <div class="section">
                    <?=  anchor("/subjects/regsubject", "Subjects", "class='btn'"); ?>
             </div>
              <?php } ?>
                
             <div class="section">
                <?php echo  anchor("/msg", "Masseges", "class='btn'") ?>
             </div>
             <div class=" section">
                 <?php echo  anchor("/log/logout", "log out", "class='btn'") ?>
             </div>
        </aside>
    <div class="warpper">
            <!-----------------------------------usernav--------------------->
            <nav class="navs">
                <div class="foatRight mob-menu">
                   <i class="icon-menu"></i>
                </div>
            </nav><!--end of user nav-->
            <?php
            if(isset($data))$this->load->view($data['template'],$data);
            
            ?>
    </div>
    
    

</body>
</html>