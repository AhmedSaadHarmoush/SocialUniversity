<html>
    <head>
        <meta charset="UTF-8">
            <title> Usci</title>
            <link rel="shortcut icon" href="<?= base_url()?>img/logo.png">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css">
            <script src="<?php echo base_url();?>js/jquery.js" type="text/javascript"></script>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/main.css">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">
            <script src="<?php echo base_url();?>js/script.js" type="text/javascript"></script>      
    </head>
    <body>
        <div class="cont">
             <center>
            <div class="post-container" style="margin-top: 10%; width:auto; float: none;">
           
                <?php echo form_open('log'); ?>
                <?php echo heading("Username :",3, 'class="side-title"');?>
                <input type="text" name="username" value="" size="50" class="textbox" placeholder="username" style="text-align: center; width:auto;" /> <br> <br>
                <?php echo heading("Password :",3, 'class="side-title"');?>
                <input type="password" name="password" value="" size="50" class="textbox" placeholder="Password" style="text-align: center;width:auto;" /> <br> <br>
                <br>
                <center><input type="submit" value="Login" class="btn" style="float: none; width:auto;"/> <div class="clearfix"></div></center>
                
                <?php echo validation_errors(); ?>
                </form>
            
            </div>
                 </center>
        </div>
    </body>
</html>