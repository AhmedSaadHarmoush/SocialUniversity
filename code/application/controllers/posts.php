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
        perm(3);
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
        $this->seePosts();  
    }
    
    public function seePosts() {
       $po = $this->getPosts() ;
       $data["po"] = $po;
       $data['template']='view_posts';
       $this->load->view("view_home" ,array('data'=>$data));
    }
     function getPosts() {
        $this->mange->setTable("posts");
        if($this->mange->fetch(array('id','title','type','post','user_id','groupe_id','quiz'))){
        return $this->mange->fetch(array('id','title','type','post','user_id','groupe_id','quiz'));}
    }
     function add() {
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
                    }
		} 
    }
    function delete($id) {
        $this->mange->setTable("posts");
        $ids = array($id);
        if($this->mange->delete($ids)){
          $this->seePosts();  
        }else{
          $this->seePosts();    
        }
        
    }
    function update($id) {
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
}
