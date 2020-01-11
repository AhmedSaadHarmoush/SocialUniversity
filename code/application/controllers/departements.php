<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of departements
 *
 * @author Mohamed Iessam
 */
class departements extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        if (!isLogged()|| perm(3));
        $this->load->model('departement');
        $this->load->library('form_validation');
        $this->load->model('subject');
    }
    public function index() {
        $data['deps']=  $this->departement->fetchAll();
        $data['template']='departement/index';
        if ($data) {
            $this->load->view('view_home',array('data'=>  $data));
        }
        else {
            redirect(base_url().'index.php/departements/add');
        }
    }
    public function add() {
        $docs=  $this->departement->getDocs();
        $data=array('docs'=>$docs,'func'=>'add','template'=>'departement/save');
        if (!$docs) {
            redirect(base_url().'index.php/admin/');
        }
        if ($this->input->post('submit')) {
            if ($this->validationConfig()&& $this->form_validation->run()==FALSE){
                $this->load->view('view_home',array('data'=>$data));
            }
            else {
                if($this->departement->add($this->getPost())) {
                    redirect(base_url().'index.php/departements');
                }
                else {
                    $error="Something went wrong";
                    $data['error']=$error;
                    $this->load->view('view_home',array('data'=>$data));
                }
            }
        }
        else {
             //print_r($data);
            $this->load->view('view_home',array('data'=>$data));
           
        }
    }
    public function edit($id=FALSE) {
        $id=(int) $id;
        $docs=  $this->departement->getDocs();
        $dep=  $this->departement->getOne($id);
        $data1=array('docs'=>$docs,'func'=>'edit/'.$id);
        $data1['template']='departement/save';
        if (!$dep) {
            redirect(base_url().'index.php/departements');
        }
        if (!$docs) {
            redirect(base_url().'index.php/admin/');
        }
        $data1['dep']=$dep;
        $data=  $this->getPost();
        if ($data['name']!=$dep[0]['name'] && $data['manager']!=$data[0]['manager']) {
            $this->validationConfig();
        }
        else if ($data['name']==$dep[0]['name'] && $data['manager']!=$dep[0]['manager']){
            $this->validationConfig(1);
        }
        else if ($data['name'==$dep[0]['name']] && $data['manager'==$dep[0]['manager']])
            $this->validationConfig (3);
        else
            $this->validationConfig (2);
        if ($this->input->post('submit')) {
            if ($this->validationConfig('edit')&& $this->form_validation->run()==FALSE){
                $this->load->view('view_home',array('data'=>$data1));
            }
            else {
                if($this->departement->save($id,$data)) {
                    redirect(base_url().'index.php/departements');
                }
                else {
                    $error="Something went wrong";
                    $data1['error'];
                    $this->load->view('view_home',array('data'=>$data1));
                }
            }
        }
        else {
            $this->load->view('view_home',array('data'=>$data1));
        }
    }
    public function delete($id=FALSE) {
        $id=(int) $id ;
        if ($this->departement->delete($id) && $this->subject->deleteAllBy($id)) {
            redirect(base_url().'index.php/departements/');
        }
        else {
            redirect(base_url().'index.php/departements/');
        }
    }
    private function validationConfig($function=NULL) {
        
        if ($function==NULL) {
            $config=array (
                array(
                    'field'=>'name',
                    'label'=>'Debartement name',
                    'rules'=>'required|strip_tags|xss_clean|is_unique[departements.name]'
                ),
                array (
                   'field'=>'manager',
                   'label'=>'manager name',
                   'rules'=>'required|strip_tags|xss_clean|is_unique[departements.manager]' 
                )
            );
        }
        else if ($function==1) {
           $config=array (
                array(
                    'field'=>'name',
                    'label'=>'Debartement name',
                    'rules'=>'required|strip_tags|xss_clean'
                ),
                array (
                   'field'=>'manager',
                   'label'=>'manager name',
                   'rules'=>'required|strip_tags|xss_clean|is_unique[departements.manager]', 
                )
            ); 
        }
        else if ($function==2) {
           $config=array (
                array(
                    'field'=>'name',
                    'label'=>'Debartement name',
                    'rules'=>'required|strip_tags|xss_clean|is_unique[departements.name]'
                ),
                array (
                   'field'=>'manager',
                   'label'=>'manager name',
                   'rules'=>'required|strip_tags|xss_clean', 
                )
            ); 
        }
        else {
            $config=array (
                array(
                    'field'=>'name',
                    'label'=>'Debartement name',
                    'rules'=>'required|strip_tags|xss_clean'
                ),
                array (
                   'field'=>'manager',
                   'label'=>'manager name',
                   'rules'=>'required|strip_tags|xss_clean', 
                )
            ); 
        }
        
        $this->form_validation->set_rules($config);
        return TRUE;
    }
    private function getPost() {
        $data=  $this->input->post();
        unset($data['submit']);
        return $data;
    }
}
