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
    <style>
* { margin: 0; padding: 0; }

    .main{
        width: 95%;
        margin-left: 2.5%;
    }
/***************** slider ***************/
    
.slider{
    display: block;
    height: 90%;
    min-width: 260px;
    max-width: 100%;
    position: relative;
       }
/***************** slider inside ***************/
.sliderinside{
    width: 100%;
    height: 100%;
    overflow: hidden;
    position: relative;
              }
    
    
.sliderinside>ul{
    position: absolute;
    list-style: none;
    width: 1500%;
    height: 100%;
    overflow: hidden;
    left: 0px;
    transition: left .5s cubic-bezier(0.77, 0, 0.175, 1);
                }
    
    
.sliderinside>ul>li {
    position: relative;
    width: 6.66%;
    height: 100%;
    float: left;
                   }
    
    
.sliderinside>ul>li>img {
    margin: auto;
    height: 100%;
    width: 100%;
                        }
/***************** slider input ***************/
.slider input[type=radio]{
    position: relative;
    left: 92%;
    bottom: -8px;
    z-index: 2;
    visibility: hidden;
                         }
.slider label {
    position: absolute;
    left: 10%;
    bottom: -53px;
    z-index: 2;
    width: 12px;
    height: 12px;
    background-color:#ccc;
    border-radius: 50%;
    cursor: pointer;
    box-shadow: 0px 0px 3px rgba(0,0,0,.8);
    transition: background-color .2s;
                   }
    
.slider input[type=radio]#button1:checked~label[for=button1] { background-color: #30cbbd; }
.slider input[type=radio]#button2:checked~label[for=button2] { background-color: #30cbbd; }
.slider input[type=radio]#button3:checked~label[for=button3] { background-color: #30cbbd; }
.slider input[type=radio]#button4:checked~label[for=button4] { background-color: #30cbbd; }
.slider input[type=radio]#button5:checked~label[for=button5] { background-color: #30cbbd; }
.slider input[type=radio]#button6:checked~label[for=button6] { background-color: #30cbbd; }
.slider input[type=radio]#button7:checked~label[for=button7] { background-color: #30cbbd; }
.slider input[type=radio]#button8:checked~label[for=button8] { background-color: #30cbbd; }
.slider input[type=radio]#button9:checked~label[for=button9] { background-color: #30cbbd; }
.slider input[type=radio]#button10:checked~label[for=button10] { background-color: #30cbbd; }
.slider input[type=radio]#button11:checked~label[for=button11] { background-color: #30cbbd; }
.slider input[type=radio]#button12:checked~label[for=button12] { background-color: #30cbbd; }
.slider input[type=radio]#button13:checked~label[for=button13] { background-color: #30cbbd; }
.slider input[type=radio]#button14:checked~label[for=button14] { background-color: #30cbbd; }
.slider input[type=radio]#button15:checked~label[for=button15] { background-color: #30cbbd; }
.slider label[for=button1] { margin-left: -36px }
.slider label[for=button2] { margin-left: -18px }
.slider label[for=button4] { margin-left: 18px }
.slider label[for=button5] { margin-left: 36px }
.slider label[for=button6] { margin-left: 54px }
.slider label[for=button7] { margin-left: 72px }
.slider label[for=button8] { margin-left: 90px }
.slider label[for=button9] { margin-left: 108px }
.slider label[for=button10] { margin-left: 126px }
.slider label[for=button11] { margin-left: 144px }
.slider label[for=button12] { margin-left: 162px }
.slider label[for=button13] { margin-left: 180px }
.slider label[for=button14] { margin-left: 198px }
.slider label[for=button15] { margin-left: 216px }
.slider input[type=radio]#button1:checked~.sliderinside>ul { left: 0 }
.slider input[type=radio]#button2:checked~.sliderinside>ul { left: -100% }
.slider input[type=radio]#button3:checked~.sliderinside>ul { left: -200% }
.slider input[type=radio]#button4:checked~.sliderinside>ul { left: -300% }
.slider input[type=radio]#button5:checked~.sliderinside>ul { left: -400% }
.slider input[type=radio]#button6:checked~.sliderinside>ul { left: -500% }
.slider input[type=radio]#button7:checked~.sliderinside>ul { left: -600% }
.slider input[type=radio]#button8:checked~.sliderinside>ul { left: -700% }
.slider input[type=radio]#button9:checked~.sliderinside>ul { left: -800% }
.slider input[type=radio]#button10:checked~.sliderinside>ul { left: -900% }
.slider input[type=radio]#button11:checked~.sliderinside>ul { left: -1000% }
.slider input[type=radio]#button12:checked~.sliderinside>ul { left: -1100% }
.slider input[type=radio]#button13:checked~.sliderinside>ul { left: -1200% }
.slider input[type=radio]#button14:checked~.sliderinside>ul { left: -1300% }
.slider input[type=radio]#button15:checked~.sliderinside>ul { left: -1400% }
    
    
.info {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    z-index: 3;
}
.info-text {
    background-color: rgba(0,0,0,.8);
    padding:10px;
    top: 0;
    z-index: 1;
    transition: opacity .2s;
    color: #fff;
}
#control{
     background-color: #ccc;
     width:100%;
     height: 50px;
    
        
        }    
    @media (max-width: 600px) {
        .main{
            width: 100%;
            margin-left: 0px;
            margin: 5px;
        }
        .slider{
            height: 350px;
        }
        
        
    }
</style>
    </head>
<body>

     <div class="main">
   <div class="slider"> 
        <input type="radio" id="button1" name="button" checked="checked"/>
        <label for="button1"></label>
        <input type="radio" id="button2" name="button"/>
        <label for="button2"></label>
        <input type="radio" id="button3" name="button"/>
        <label for="button3"></label>
        <input type="radio" id="button4" name="button"/>
        <label for="button4"></label>
        <input type="radio" id="button5" name="button"/>
        <label for="button5"></label>
        <input type="radio" id="button6" name="button"/>
        <label for="button6"></label>
        <input type="radio" id="button7" name="button"/>
        <label for="button7"></label>
        <input type="radio" id="button8" name="button"/>
        <label for="button8"></label>
        <input type="radio" id="button9" name="button"/>
        <label for="button9"></label>
        <input type="radio" id="button10" name="button"/>
        <label for="button10"></label>
        <input type="radio" id="button11" name="button"/>
        <label for="button11"></label>
        <input type="radio" id="button12" name="button"/>
        <label for="button12"></label>
        <input type="radio" id="button13" name="button"/>
        <label for="button13"></label>
        <input type="radio" id="button14" name="button"/>
        <label for="button14"></label>
        <input type="radio" id="button15" name="button"/>
        <label for="button15"></label>
        <div class="sliderinside">
            <ul>
            <li>
                <img src="<?= base_url()?>img/1.jpg" />
                 
            </li>
            <li>
                <img src="<?= base_url()?>img/2.jpg" />
                 
            </li>
            <li>
                <img src="<?= base_url()?>img/3.jpg" />
                  
            </li>
            <li>
                <img src="<?= base_url()?>img/4.jpg" />
                
            <li>
                <img src="<?= base_url()?>img/5.jpg" />
                  
            </li> 
            <li>
                <img src="<?= base_url()?>img/6.jpg" />
                  
            </li>
            <li>
                <img src="<?= base_url()?>img/7.jpg" />
                  
            </li>
            <li>
                <img src="<?= base_url()?>img/8.jpg" />
                  
            </li>
            <li>
                <img src="<?= base_url()?>img/9.jpg" />
                  
            </li>
            <li>
                <img src="<?= base_url()?>img/10.jpg" />
                  
            </li>
            <li>
                <img src="<?= base_url()?>img/11.jpg" />
                  
            </li>
            <li>
                <img src="<?= base_url()?>img/12.jpg" />
                  
            </li>
            <li>
                <img src="<?= base_url()?>img/13.jpg" />
                  
            </li>
            <li>
                <img src="<?= base_url()?>img/14.jpg" />
                  
            </li>
            <li>
                <img src="<?= base_url()?>img/15.jpg" />
                  
            </li>
            </ul>
        </div>
 </div
    </div>
 <div id="control"></div>
    
 

           </div>
        
    

  
</div>
</body>
</html>

