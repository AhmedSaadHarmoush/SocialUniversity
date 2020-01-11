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
    function send($msg, $from_id, $to_id){
        $this->msgs->send($msg, $from_id, $to_id);  
    }
    function get($user_id , $fd_id){
        foreach ($this->msgs->msgs_fetch_array($user_id , $fd_id) as $v){
            print_r($v);
                        echo '<br>';
        }
    }

    
}
