<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of msg
 *
 * @author mimo
 */
class msg extends CI_Controller{
    public function __construct() {
        parent::__construct();
        if (!isLogged()) exit('No direct script access allowed');
        $this->load->model('msgs');
    }
    function index(){
        $data['template']='view_msgs';
       $this->load->view("view_home" ,array('data'=>$data));
    }
    function send(){
        $user_id = $this->input->post("from_id");
        $fd_id = $this->input->post("to_id");
        $msg = $this->input->post("msg");
        if($this->isend($msg, $user_id, $fd_id)){
        $msgs =$this->msgs->msgs_fetch_array($user_id , $fd_id); 
            $this->fet_msg($msgs , $fd_id , $user_id);
        }else{
        $msgs =$this->msgs->msgs_fetch_array($user_id , $fd_id);
           $this->fet_msg($msgs , $fd_id , $user_id); 
        }
        
    }
    private function isend($msg, $from_id, $to_id){
        return $this->msgs->send($msg, $from_id, $to_id);  
    }
    function get($user_id , $fd_id){
        $data['fd_id']=$fd_id;
        $data['us_id']=$user_id;
        $data['msgs']=$this->msgs->msgs_fetch_array($user_id , $fd_id); 
        $data['template']='view_chat';
       $this->load->view("view_home" ,array('data'=>$data));
    }
    private function fet_msg($msgs , $fd_id , $us_id){ ?>
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
        
    <?php }
    
}
