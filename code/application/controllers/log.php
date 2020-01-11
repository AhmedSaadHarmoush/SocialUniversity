<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Description of log
 *
 * this class manage loginig in and setting seisstions
 * @author mimo
 */
class log extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
	$this->load->library('form_validation');
        // for changing rules just ghange the parameters in the function
        $this->log_rule();
        // encrip key is 123 to change go to config/conging.php
        $this->load->library('session');
        
    }
	function index()
	{
                if(!isLogged()){
                    $this->log();
                }else{
                    $this->goHome(); 
                }
	}
        function log() {
            if ($this->form_validation->run() == FALSE)
		{
                    $this->load->view('view_log');
		}
		else
		{
                    $this->load->model("user");
                    $username = $this->input->post("username");
                    $password = $this->input->post("password");
                    $this->login($username, $password); 
		}
        }
        
        //log in
        function login($username , $password) {
           if($this->user->login($username,$password)){
                    $data['user_data'] = $this->user->user_fetch_array($this->user->user_id($username));
                    $type= $this->user->user_type($username);
                     if($type == 1){
                            $type='students';
                            $data['type_data'] = $this->mange->query("SELECT * FROM $type WHERE user_id =". $this->user->user_id($username),TRUE);
                        }else if($type == 2){
                            $type='docs';
                            $data['type_data'] = $this->mange->query("SELECT * FROM $type WHERE user_id =". $this->user->user_id($username),TRUE);
                        }
                    
                    $this->session->set_userdata($data);
                    $this->sess->set_sess($data);
                    $this->goHome();
                    }  else {
                       $this->load->view('view_log');
                       $this->funck->msg("wrong username or password");
                    }
        }
        private function goHome() {
            $this->load->view('view_home');
        }
        //log out
        
        function logout() {
            $this->session->sess_destroy();
            $this->sess->dest_sess();
            $this->load->view('view_log' );
        }
        
        private function log_rule() {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[32]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
        }
        
}