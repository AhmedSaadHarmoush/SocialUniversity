<?php 
    class info extends CI_Controller{
        function index(){
        $data['template']='view_info';
        $this->load->view("view_home" ,array('data'=>$data));
        }
    }
        

?>