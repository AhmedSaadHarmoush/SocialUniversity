<div class="post-container" >
   
    <h3 class="side-title">Account Information</h3>
    <div class="ifno">
        <table class="table">
            <tr>
                <td class="prof-pic" width="180px" rowspan="6">
                    <?php
                        
                        echo " <img src='". base_url().select_item('users', 'profile_url',$_SESSION['usci']['user_data']['id']) ."' style='width:170px;height:170px;'>".PHP_EOL;
                    
                    ?>
                    
                </td>
                <td class="side-title ">
                  username :  
                </td>
                <td>
                    <?= select_item('users', 'username',$_SESSION['usci']['user_data']['id']) ?>
                </td>
                
                   
            </tr>
            <tr>
                <td class="side-title">
                    first name :
                </td>
                <td>
                     <?= select_item('users', 'fname_en',$_SESSION['usci']['user_data']['id']) ?>
                </td>
            </tr>
            <tr>
                <td class="side-title">
                    last name :
                </td>
                <td>
                     <?= select_item('users', 'lname_en',$_SESSION['usci']['user_data']['id']) ?>
                </td>
            </tr>
            <tr>
                <td class="side-title">
                   age : 
                </td>
                <td>
                     <?=select_item('users', 'age',$_SESSION['usci']['user_data']['id'])?>
                </td>
            </tr>
            <tr>
                <td class="side-title">
                     email :
                </td>
                <td>
                     <?=select_item('users', 'email',$_SESSION['usci']['user_data']['id'])?>
                </td>
            </tr>
            <tr>
                <td class="side-title">
                    gender :
                </td>
                <td>
                     <?=select_item('users', 'gender',$_SESSION['usci']['user_data']['id'])?>
                </td>
            </tr>
        </table>
        
      <div class="clearfix"></div>
    </div>
</div>
    <div class="clearfix"></div>
    <div class="post-container" >  
        <form action="<?= base_url("index.php/profile/update")?>" method="post">
        <input type="hidden" name="id" value="<?= $_SESSION['usci']['user_data']['id'] ;?>">
        <?= heading("Update :", 3, 'class="side-title"')?>
        <select name="col" class="select textbox">
            <option value="fname_en" selected>first name</option>
            <option value="lname_en" >last name</option>
            <option value="username" >username</option>
            <option value="email" > e-mail</option>
            <option value="gender" >gender</option>
            <option value="age" >age</option>
        </select> <br>
        <?= heading("update it to :", 3, 'class="side-title"')?>
        <input name="upto" type="text" placeholder="update to" class="textbox">
        <br><br>
        <input type="submit" name="update" value="update" class="btn">
          <div class="clearfix"></div>             
                       
    </form> 
    </div>
     <div class="post-container" >
         
     <?= heading("Update profile pic :", 3, 'class="side-title"')?>
         <?php /*
    <form method="post" action="<?=base_url("index.php/profile/propic")?>" enctype="multipart/form-data">
        <input type="file" name="userfile" multiple="" class="textbox" style="widows: 80%"> <br> <br>
        <input type="submit" name="addphoto" value="add" class="btn"> <br>
        <div class="clearfix"></div>      
    </form> */ ?>
         <?php// echo $error;?>

        <?php echo form_open_multipart(base_url("index.php/profile/propic/".$_SESSION['usci']['user_data']['id']));?>

         <input type="file" name="userfile" size="20" class="textbox" style="width: 80%" />

        <br /><br />

        <input type="submit" value="upload" class="btn" />
        <div class="clearfix"></div>   
        <?php if(isset($error)) echo $error?>
        </form>
                
                       
    </div>

