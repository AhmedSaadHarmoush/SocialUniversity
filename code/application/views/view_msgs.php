

            <div class="chat">
                <div class="chat-side">
                   <ul>
                       <center> 
                           <!--------------------------------------list of users ------------------------------------>
                            <li>
                                <div class="user-img block logo" id="4">
                                    <img src="<?php echo base_url().  select_item("users","profile_url", 24);?>"><!-- user img-->
                                </div>
                                <p class="user-name-chat"><?php echo select_item("users","username", 24);?></p><!--first name-->
                            </li>
                           
                      </center>
                    </ul>
                </div>
                <div class="chat-body">
                    <h3 class="user-name-chat"><?php echo select_item("users","username", 24);?></h3>
                    <div class="chat-box">
                        <!--------------------------------------from him------------------------------------>
                        <div class="message-box left-img">
                          <div class="picture">
                            <img src="<?php echo base_url().  select_item("users","profile_url", 24);?>"> <!--img-->
                            <span class="time">10 mins</span><!--time-->
                          </div>
                          <div class="message">
                            <span><?php echo select_item("users","username", 24);?></span><!--sender-user-name-->
                            <p>Hey Artits , how are you doing?</p><!--message-->
                          </div>
                        </div>
                        <!--------------------------------------from me------------------------------------>
                        <div class="message-box right-img">
                          <div class="picture">
                            <img src="<?php echo base_url().$_SESSION['usci']['user_data']['profile_url'];?>" title="user name"/>
                            <span class="time">2 mins</span>
                          </div>
                          <div class="message floatRight">
                              <span><?php echo$_SESSION['usci']['user_data']['username'];?></span><!--my-user-name-->
                            <p>Pretty good, Eating nutella, nommommom</p>
                          </div>
                            <div style="clear:both"></div>
                        </div>
                    </div>
                    
                    <center>
                    <!--------------------------------------message controller------------------------------------>
                    <div class="enter-message">
                      <input type="text" placeholder="Enter your message.." class="send-message">
                      <input type="submit" class="send" value="Send">
                    </div>
                        
                    </center>
                </div>
            </div>
    
