<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of subjects
 *
 * @author Mohamed Iessam
 */
class subjects extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!isLogged()) {
            redirect(base_url().'index.php/log');
        }
        $this->load->model('subject');
        $this->load->model('departement');
        $this->load->model('group');
        $this->load->library('form_validation');
        $this->load->helper('date');
        
    }
    public function add($dep_id=FALSE) {
        perm(3);
        $data['deps']=  $this->departement->getOne($dep_id);
        $data['subjects']=  $this->subject->getOneBy(array('departement'=>$dep_id));
        $data['id']=0;
        $data['func']='add/'.$dep_id;
        $data['template']='subject/save';
        if (!$data['deps']) {
            redirect(base_url().'index.php/departements/add');
        }
        if ($this->input->post('submit')){
            if ($this->validationConfig()&& $this->form_validation->run()==FALSE){
                $this->load->view('view_home',array('data'=>$data));
            }
            else {
                $data1=  $this->getPost();
                $data1['departement']=$dep_id;
                if ($this->subject->add($data1)) {
                    redirect(base_url().'index.php/subjects/');
                }
                else {
                    $data['error']='Something went wrong';
                    $this->load->view('view_home',array('data'=>$data));
                }
            }
        }
        else {
            $this->load->view('view_home',array('data'=>$data));
        }
    }
    public function edit($id=FALSE,$dep_id=FALSE) {
        perm(3);
        $data['deps']=  $this->departement->getOne($dep_id);
        $data['subjects']=  $this->subject->getOneBy(array('departement'=>$dep_id));
        $data['func']='edit/'.$id.'/'.$dep_id;
        $data['subject']=  $this->subject->getOne($id);
        $data['id']=$id;
        $data['template']='subject/save';
        if (!$data['subject']) {
            redirect(base_url().'index.php/subjects/');
        }
        if (!$data['deps']) {
            redirect(base_url().'index.php/subjects/');
        }
        if(!$data['subjects']) {
            redirect(base_url().'index.php/subjects/');
        }
        if ($this->input->post('submit')){
            $nsubject=  $this->getPost();
            if ($data['subject'][0]['name']==$nsubject['name']&&$data['subject'][0]['code']!=$nsubject['code']){
                $this->validationConfig(1);
            }
            else if ($data['subject'][0]['name']!=$nsubject['name']&&$data['subject'][0]['code']==$nsubject['code']){
                $this->validationConfig(2);
            }
            else if ($data['subject'][0]['name']==$nsubject['name']&&$data['subject'][0]['code']!=$nsubject['code']) {
                $this->validationConfig();
            }
            else
                $this->validationConfig (3);
            if ($this->form_validation->run()==FALSE){
                unset($data['subject']);
                $this->load->view('view_home',array('data'=>$data));
            }
            else {
                $this->subject->edit($id,$nsubject);
                redirect(base_url().'index.php/subjects/');
            }
            
        }
        else {
            $this->load->view('view_home',array('data'=>$data));
        }
    }
    public function delete($id=FALSE) {
        perm(3);
        $id=(int) $id ;
        if ($this->subject->delete($id)&&$this->group->deleteBy($id)) {
            redirect(base_url().'index.php/subjects/');
        }
        else {
            redirect(base_url().'index.php/subjects/');
        }
    }
    private function validationConfig($function=NULL) {
        if ($function==NULL) {
            $config=array (
                array(
                    'field'=>'name',
                    'label'=>'Subject name',
                    'rules'=>'required|strip_tags|xss_clean|is_unique[subjects.name]|alpha_numeric'
                ),
                array (
                   'field'=>'code',
                   'label'=>'Code',
                   'rules'=>'required|strip_tags|xss_clean|is_unique[subjects.code]' 
                )
            );
        }
        else if ($function==1) {
           $config=array (
                array(
                    'field'=>'name',
                    'label'=>'Subject name',
                    'rules'=>'required|strip_tags|xss_clean|alpha_numeric'
                ),
                array (
                   'field'=>'manager',
                   'label'=>'Code',
                   'rules'=>'required|strip_tags|xss_clean|is_unique[subjects.code]', 
                )
            ); 
        }
        else if ($function==2) {
           $config=array (
                array(
                    'field'=>'name',
                    'label'=>'Subject name',
                    'rules'=>'required|strip_tags|xss_clean|is_unique[subjects.name]|alpha_numeric'
                ),
                array (
                   'field'=>'code',
                   'label'=>'Code',
                   'rules'=>'required|strip_tags|xss_clean', 
                )
            ); 
        }
        else {
            $config=array (
                array(
                    'field'=>'name',
                    'label'=>'Subject name',
                    'rules'=>'required|strip_tags|xss_clean|alpha_numeric'
                ),
                array (
                   'field'=>'code',
                   'label'=>'Code',
                   'rules'=>'required|strip_tags|xss_clean', 
                )
            ); 
        }
        
        $this->form_validation->set_rules($config);
        return TRUE;
    }
    public function index(){
        perm(3);
        $data['subjects']=  $this->subject->fetchAll();
        $data['deps']=  $this->departement->fetchAll();
        $data['template']=  'subject/index';
        if(! $data['deps']) {
            redirect(base_url().'index.php/departements/add');
        }
        $this->load->view('view_home',array('data'=>$data));
    }
    public function active($id=FALSE){
        perm(3);
        if ($this->subject->edit($id,array('active_set'=>1))) {
            $subject=  $this->subject->getOne($id);
            $group['name']=$subject[0]['name'];
            $group['subject_id']=$subject[0]['id'];
            date_default_timezone_set ('Africa/Cairo') ;
            $group['active']=  time();
            if ($this->group->add($group)) {
                redirect(base_url().'index.php/subjects/');
             }
            else {
                redirect(base_url().'index.php/subjects/');
            }
        }
        redirect(base_url().'index.php/subjects/');
    }
    public function deactive($id=FALSE) {
        perm(3);
        if ($this->subject->edit($id,array('active_set'=>0))){
            redirect(base_url().'index.php/subjects/');
        }
        redirect(base_url().'index.php/subjects/');
    }
    public function regSubject () {
        perm(1);
        $data['template']='subject/reg';
        $data['subjects']=  $this->getSubjectToReg();
        $data['success']=  $this->subject->getSuccessPublic($_SESSION['usci']['user_data']['id']);
        //print_r($data['subjects']['free']);
        if (!empty($data['subjects'])){
            $this->load->view('view_home',array('data'=>$data));
        }
        else {
            $data['error']='Regestration is off';
            $this->load->view('view_home',array('data'=>$data));
        }
    }
    public function register ($subject_id,$group_id) {
        perm(1);
        $data['user_id']=$_SESSION['usci']['user_data']['id'];
        $data['subject_id']=$subject_id;
        $data['active']=1;
        if ($this->subject->register($data,$group_id)) {
            if ($this->input->post())
                echo 'Unregister';
            else
                redirect(base_url().'index.php/subjects/regsubject');
        }
        else {
            echo 'false';
            //redirect(base_url().'index.php/subjects/regsubject');
        }
    }
    public function unRegister ($subject_id,$group_id) {
        perm(1);
        $user_id=$_SESSION['usci']['user_data']['id'] ;
        if ($this->subject->unRegister($user_id,$group_id,$subject_id)) {
            if ($this->input->post()) 
                echo 'Register';
            else 
                redirect(base_url().'index.php/subjects/regsubject');
        }
        else {
            echo 'false';
        }
    }
    private function getPost() {
        $data=  $this->input->post();
        unset($data['submit']);
        return $data;
    }
    private function getSubjectToReg () {
        $user_id=  $_SESSION['usci']['user_data']['id'];
        $dep_id= $_SESSION['usci']['type_data'][0]['department_id'];
        $subjects['departement']=  $this->subject->getSubjectsJoins($user_id,$dep_id);
        $subjects['registered']=  $this->subject->fetchAllRegistered($user_id);
        $subjects['free']=  $this->subject->getSubjectsNotrequire($user_id);
        //print_r($subjects['free']);
        
        if (!empty($subjects)) {
            return $subjects;
        }
        else {
            return FALSE;
        }
    }
    public function docRegister () {
        perm(2);
        $dep_id=$_SESSION['usci']['type_data'][0]['department_id'];
        $data['template']='subject/docreg';
        $data['subjects']=  $this->subject->getDoctorSubjects($dep_id);
        if (!empty($data['subjects'])) {
            $this->load->view('view_home',array('data'=>$data));
        }
        else {
            $this->load->view('view_home',array('data'=>$data));
        }
    }
    public function dregister ($group_id) {
        perm(2);
        $data['user_id']=$_SESSION['usci']['user_data']['id'];
        $data['group_id']=$group_id;
        $data['type']=1;
        if ($this->subject->dregister($data)) {
            if ($this->input->post())
                echo 'Unregister';
            else
                
                redirect(base_url().'index.php/subjects/docregister');
        }
        else {
            //echo 'false';
            redirect(base_url().'index.php/subjects/docregister');
        }
    }
    public function dunregister ($group_id) {
        perm(2);
        $data['user_id']=$_SESSION['usci']['user_data']['id'];
        $data['group_id']=$group_id;
        if ($this->subject->dunregister($data)) {
            if ($this->input->post()) {
                echo 'Register';
            }
            else{
                redirect(base_url().'index.php/subjects/docregister');
            }
        }
        else {
            redirect(base_url().'index.php/subjects/docregister');
        }
    }
}
