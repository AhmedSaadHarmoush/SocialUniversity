<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of groups
 *
 * @author mimo
 */
class groups extends CI_Controller {
    private $gro_id;
    public function __construct() {
        parent::__construct();
        if(!isLogged())exit('you donot have permision '.'<a href="'.  base_url().'index.php/log'.'">Back to home</a>');
    $this->load->model('group');    
    }
    public function get($gro_id , $error = 0) {
        $gro_id;
        $this->gro_id = $gro_id;
        $data['gro_id']=$gro_id;
        if($error){ $data['error'] = $error ;}
        $data['posts'] = $this->getPosts();
        $data['template']='view_gro';
        $this->load->view("view_home" ,array('data'=>$data));
        
    }
    public function add(){
        
        $id = $this->input->post('id');
        $post = $this->input->post('post');
        $go_id = $this->input->post('goid');
              
        if($this->mange->query("INSERT INTO posts(user_id,groupe_id,post,type) VALUES($id,$go_id,'$post',1)"))$this->get ($go_id);
        
    }
    public function addphoto(){
        
        $id = $this->input->post('id');
        $post = $this->input->post('post');
        $go_id = $this->input->post('goid');     
        //if($this->mange->query("INSERT INTO posts(user_id,groupe_id,post,type) VALUES($id,$go_id,'$post',1)"))$this->get ($go_id);
        $config['upload_path'] = 'C:\xampp\htdocs\code\files\img';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']	= '2048';
        $config['max_width']  = '2048';
        $config['max_height']  = '2048';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload())
        {
                $data['error']= $this->upload->display_errors();
                $data['template']='view_pro_stu';
                $this->load->view("view_home" ,array('data'=>$data));
        }else{
                $dit =  $this->upload->data();
                $dat = array('url'=>$dit['full_path'],'name'=>$dit['file_name'],'user_id'=>$id,'ext'=>$dit['file_ext'],'size'=>$dit['file_size']);
                if(insert('imgs',$dat)==1)
                {
                $pr_url="./files/img/".$dit['file_name'];
                 //your sucsess
                if($this->mange->query("INSERT INTO posts(user_id,img_url,groupe_id,post,type) VALUES($id,'$pr_url',$go_id,'$post',1)"))$this->get ($go_id);
                }else{
                    echo 'Failed';
                }
        }
    }
        public function addfile(){
        
        $id = $this->input->post('id');
        $post = $this->input->post('post');
        $go_id = $this->input->post('goid');     
        //if($this->mange->query("INSERT INTO posts(user_id,groupe_id,post,type) VALUES($id,$go_id,'$post',1)"))$this->get ($go_id);
        $config['upload_path'] = 'C:\xampp\htdocs\code\files\file';
        $config['allowed_types'] = 'pdf|txt|docx|xls|pptx)';
        $config['max_size']	= '20480';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload())
        {
                $data['error']= $this->upload->display_errors();
                $this->get ($go_id , $data['error']);
        }else{
                $dit =  $this->upload->data();
                $dat = array('url'=>$dit['full_path'],'name'=>$dit['file_name'],'user_id'=>$id,'ext'=>$dit['file_ext'],'size'=>$dit['file_size']);
                if(insert('imgs',$dat)==1)
                {
                $pr_url="./files/file/".$dit['file_name'];
                 //your sucsess
                if($this->mange->query("INSERT INTO posts(user_id,img_url,groupe_id,post,type) VALUES($id,'$pr_url',$go_id,'$post',2)"))$this->get ($go_id);
                }else{
                    echo 'Failed';
                }
        }
    }
    private  function getPosts(){
        //perm(1);
        return $this->mange->query("SELECT * FROM posts WHERE groupe_id = $this->gro_id ORDER BY created DESC",TRUE);
    }
    
    function delete($gro_id,$id) {
        
        $this->mange->setTable("posts");
        $ids = array($id);
        if($this->mange->delete($ids)){
          $this->get ($gro_id);  
        }else{
          $this->get ($gro_id);    
        }
    }
    public function results ($group_id) {
        if (!$group_id) {
            redirect(base_url().'index.php/');
        }
        if ($_SESSION['usci']['user_data']['type']!=2 || !$this->group->checkAdmin($_SESSION['usci']['user_data']['id'],$group_id) ) {
            exit('You donot have permission to access this page');
        }
        $group_id=$group_id;
        $data['template']='group/results';
        $data['group_id']=$group_id;
        $data['students']=$this->group->getMembersResults($group_id);
        if (!empty($data['students'])) {
            $this->load->view('view_home',array('data'=>$data));
        }
        else {
            $data['error']='No Students Yet' ; 
            $this->load->view('view_home',array('data'=>$data));
        }
    }
    public function banStudent ($group_id,$student_id) {
        if ($this->group->banStudent($group_id,$student_id)){
            echo 'done';
            redirect(base_url().'index.php/groups/results/'.$group_id);
        }
        else {
            echo 'false';
        }
    }

    public function saveresults ($group_id=FALSE) {
        if (!$group_id) {
            redirect(base_url().'index.php/');
        }
        if ($_SESSION['usci']['user_data']['type']!=2 || !$this->group->checkAdmin($_SESSION['usci']['user_data']['id'],$group_id) ) {
            exit('You donot have permission to access this page');
        }
        $students=  $this->group->getStudentsId($group_id) ;
        if ($this->input->post('done')) {
            $active = 0 ;
            if (!$this->group->deleteAdmins($group_id)) {
                exit('something went wrong');
            }
        }
        else {
            $active =1 ;
        }
        if ($this->input->post()){
            foreach ($students as $student) {
                $student['quiz1']=(int)$this->input->post($student['user_id'].'quiz1');
                $student['med']=(int) $this->input->post($student['user_id'].'med');
                $student['quiz2']= (int) $this->input->post($student['user_id'].'quiz2');
                $student['oural']= (int)$this->input->post($student['user_id'].'oural');
                $student['pract']= (int)$this->input->post($student['user_id'].'pract');
                $student['thery']= (int)$this->input->post($student['user_id'].'thery');
                $student['active']=$active;
                $student['total']=(int) ($student['quiz1']+$student['med']+$student['quiz2']+$student['oural']+$student['pract']+$student['thery']);
                if ($student['total']>100) {
                    $student['total']=(int)100;
                }
                else if ($student['total']<0) {
                    $student['total']= (int) 0;
                }
                if (!$this->group->saveResult($student,$group_id)) {
                    exit('Something went wrong');
                }
            }
            if ($active) {
                redirect(base_url().'index.php/groups/results/'.$group_id);
            }
            else {
                redirect(base_url().'index.php/');
            }    
                
        }
        else {
            redirect(base_url().'index.php/groups/results/'.$group_id);
        }
    }
    public function doneresults ($group_id) {
        if (!$group_id) {
            redirect(base_url().'index.php/');
        }
        
    }
}
