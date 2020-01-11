<?php //echo isset($msgs) . empty($msgs)."hena";print_r($msgs); ?>
<section class="chat-module">
        <a  href="<?=base_url("index.php/msg/");?>"  >
         <header class="top-chat"> <!--username-->
			<i class="fa fa-chevron-circle-left"></i> <h3><?=select_item('users', 'username',$fd_id);?></h3>
         </header>
        </a>
            <ul id="chat">
             <div class="force-overflow"></div>
                <?php if(isset($msgs) && !empty($msgs)):
                    foreach ($msgs as $msg) :
                    if($msg['from_id']== $fd_id): ?>
                    <li class="other">
                        <div class="avatar">
                            <img src="<?=base_url().select_item('users', 'profile_url',$fd_id);?>" style="width: 40px ;height: 40px;">
                         </div>
                         <div class="message">
                             <p>
                                 <?=$msg['msg'];?>
                             </p>
                             <h6 class="post-date"><?=$msg['sent'];?></h6>
                         </div>
                         <div style="clear:both"></div>
                     </li>
                     <div style="clear:both"></div>
                        
                    <?php else : ?>
                    <li class="self">
                        <div class="message">
                         <p> <?=$msg['msg'];?></p>
                         <h6 class="post-date"><?=$msg['sent'];?></h6>
                        </div>
                          <div class="avatar">
                        <img src="<?=base_url().select_item('users', 'profile_url',$us_id);?>" style="width: 40px ;height: 40px;">
                        </div>
                          <div style="clear:both"></div>
                    </li>
                    <div style="clear:both"></div>
                    <?php endif;
                    endforeach; ?>
                    
                    <?php else : ?>
                <h2 class="side-title"> Sorry no msg to show :/</h2>
                <?php endif;
                ?>   
            </ul>
            <div style="clear:both"></div>
            
            <footer class="bottom-chat" >
                <input type="hidden" name="from_id" id="from_id" value="<?=$us_id?>">
                <input type="hidden" name="to_id" id='to_id' value="<?=$fd_id?>">
                <input type="text" to='<?= base_url("index.php/msg/send")?>' id="msg-body" name="msg" placeholder="Send a massege">
                <script>
                    $(document).ready(function(){
                                $("#msg-body").keyup(function (ev){
                                    var msg = $(this).val();
                                    var to = $("#to_id").val();
                                    var from = $("#from_id").val();
                                    var path = $(this).attr('to')
                                    console.log(msg);
                                    if(ev.which===13 && $(this).val().length > 0){
                                        $.ajax({
                                            url:path,
                                            type:'POST',
                                            data:{from_id:from,to_id:to,msg:msg},
                                            lode:'loding...',
                                            success:function(ret3){
                                             $("#chat").html(ret3);
                                            }},100);
                                        $(this).val("");
                                    }
                                }); 
                        });
                </script>
                <div style="clear:both"></div>
            </footer>
    </section>