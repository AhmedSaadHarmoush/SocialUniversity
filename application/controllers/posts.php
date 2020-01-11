<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of posts
 *
 * @author mimo
 */
class posts extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!isLogged()) exit('No direct script access allowed');
        $this->load->helper(array('form','tables'));
	$this->load->library('form_validation');
        // for changing rules just ghange the parameters in the function
        $this->log_rule();
    }
     private function log_rule() {
            $this->form_validation->set_rules('title', 'title', 'trim|required|min_length[3]|max_length[32]|xss_clean');
            $this->form_validation->set_rules('post', 'post', 'trim|required|xss_clean');
            $this->form_validation->set_rules('id', 'id', 'trim|xss_clean');
        }
    function index() {
        perm(3);
        $this->seePosts();  
    }
    
    public function seePosts() {
        perm(3);
       $po = $this->getPosts() ;
       $data["po"] = $po;
       $data['template']='view_posts';
       $this->load->view("view_home" ,array('data'=>$data));
    }
     function getPosts() {
         perm(3);
        $this->mange->setTable("posts");
        if($this->mange->fetch(array('id','title','type','post','user_id','groupe_id','quiz'))){
        return $this->mange->fetch(array('id','title','type','post','user_id','groupe_id','quiz'));}
    }
    function add() {
        perm(3);
        $this->mange->setTable("posts");
        if ($this->form_validation->run() == FALSE)
		{
                    $data['template']='view_add_post';
                    $this->load->view("view_home" ,array('data'=>$data));
		}
		else
		{
                    $title = $this->input->post("title");
                    $post = $this->input->post("post");
                    $user_id = $this->input->post("id");
                    $posta = array("user_id" => $user_id , "title" => $title , "post" => $post);
                    if($this->mange->insert($posta)){
                        $this->seePosts();
                    }else{
                        $this->seePosts();
                    }
		} 
    }
    function delete($id) {
        perm(1);
        $this->mange->setTable("posts");
        $ids = array($id);
        if($this->mange->delete($ids)){
          $this->seePosts();  
        }else{
          $this->seePosts();    
        }
        
    }
    function update($id) {
        perm(3);
        $this->mange->setTable("posts");
        $ids = array($id);
        $post = $this->mange->fetch(NULL , $ids);
        $data = array("post" => $post) ;
        if ($this->form_validation->run() == FALSE)
		{
                    $data['template']='view_update_post';
                    $this->load->view("view_home" ,array('data'=>$data));
		}
		else
		{
                    $title = $this->input->post("title");
                    $post = $this->input->post("post");
                    $posta = array( "title" => $title , "post" => $post);
                    if( $this->mange->update($posta , $ids)){
                        $this->seePosts();
                    } else {
                       $this->seePosts(); 
                    }
    }
    }
    function like($post_id , $c = 0){
      $id = $_SESSION['usci']['user_data']['id'];
      if($c == 1){
          $s = $this->mange->query("SELECT id FROM likes WHERE post_id= $post_id");
          if($s > 0) {
              echo $s;
          }  else {
              echo '0';
          }
          return;
      }
      if($this->mange->query("SELECT id FROM likes WHERE (user_id = $id && post_id = $post_id)") > 0 ){
        if($this->mange->query("DELETE FROM likes WHERE (user_id = $id && post_id = $post_id)")>0){
            echo 'Like';
        }
      }  else {
        if($this->mange->query("INSERT INTO likes(user_id,post_id) VALUES($id ,$post_id)")>0){
            echo 'Unlike';
            }
      }
    }
    function comment($p){
      $id = $_SESSION['usci']['user_data']['id'];
      $com = $this->mange->query("SELECT * FROM comments WHERE user_id= $id && post_id = $p",TRUE);
      ?>
          
    <input type="text" class="input floatLeft commentin" p='<?=$p?>' placeholder="leave a comment"
           to='<?=base_url("index.php/posts/addcomment/$p")?>'> <br> <br>
    <div style="clear:both"></div>
    <script>
$(document) .ready(function (){
   $(".commentin").keyup(function(ev){
       ev.preventDefault();
         var path= $(this).attr('to');
         var p = $(this).attr('p');
        var v = $(this).val();
    console.log(v);
    if(ev.which===13 && $(this).val().length > 0){
        $.ajax({url:path,
            type:'POST',
            data:{comt:v},
            lode:'loding...',
        success:function(ret3){
             $(".comments"+p).html(ret3);
            }});
        $(this).val("");
    }
    }); 

});

</script>
    
    <div style="clear:both"></div>
      <?php
      if(!empty($com)){
          $this->fet_com($com);
      }
    }
    function addcomment($p){
        $post_id = $p;
        $id = $_SESSION['usci']['user_data']['id'];
        $comment = $this->input->post("comt");
        $data_array = array(
            "post_id" => $post_id ,
            "user_id" => $id,
            "comment" => $comment
        );
        if(insert("comments", $data_array)) $this->comment ($p);
    }
    function delcomment($p,$i){
        if(delet("comments", $i)) $this->comment ($p);
    }

    private function fet_com($coms){ ?>
    <div class="comments"> <ul>
    <?php foreach ($coms as $com) : $u = $com['user_id']; $p = $com['post_id']; $i = $com['id'] ?>
       <li>
            <div class="user">
                 <div class="user-img floatLeft">
                     <img src="<?= base_url().select_item('users', 'profile_url',$u); ?>" style="width: 22px; height: 22px;">
                 </div>
                 <div class="user_info floatLeft">
                     <p class="user-name block"><?=select_item('users','username',$u)?></p>
                     <p class="post-date block"><?=$com['created']?><?php
                     if($_SESSION['usci']['user_data']['id'] == $u){
                        echo " <span to='".base_url()."index.php/posts/delcomment/$p/$i"."' class = 'post-date error delcomment'> Delete </span>" . "<br>";  
                    } ?></p> 
                 </div>
                <script>
                $(document) .ready(function (){
                    $('.delcomment').click(function (event){
                       event.preventDefault();
                       var path= $(this).attr('to');
                       var p = $(this).attr('p');
                       var s = $(this);
                       $.ajax({
                         url : path ,
                         success : function (result) {
                             $(".comments"+p).html(result);
                             s.parent().parent().parent().parent().remove();
                         },
                         error : function (result) {
                           console.log('fail');  
                         }
                       });
                    });
                 });

</script>
                 <div style="clear:both"></div>
             </div>
            <p class="comment-body"><?=$com['comment']?></p>
        </li>
    <?php endforeach;?>
    </ul></div>   
    <?php }
}
