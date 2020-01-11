<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of users
 *
 * @author mimo
 */
class users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!isLogged()) exit('No direct script access allowed');
        perm(3);
        $this->load->model("user");
        $this->load->helper(array('form','tables'));
	$this->load->library('form_validation');
        // for changing rules just ghange the parameters in the function
        $this->log_rule();
    }
     private function log_rule() {
            $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[3]|max_length[32]|xss_clean');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[3]|max_length[32]|xss_clean');
            $this->form_validation->set_rules('type', 'type', 'trim|xss_clean');
        }
    function index() {
        $this->seeUsers();  
    }
    
    public function seeUsers() {
       $po = $this->getUsers() ;
       $data["po"] = $po;
       $data['template']='view_users';
       $this->load->view("view_home" ,array('data'=>$data));
    }
     function getUsers() {
        $this->mange->setTable("users");
        return $this->mange->fetch(array('id','username','type'));
    }
     function add() {
        $this->mange->setTable("users");
        if ($this->form_validation->run() == FALSE)
		{
                    $data['template']='view_add_user';
                    $this->load->view("view_home" ,array('data'=>$data));
		}
		else
		{
                    $username = $this->input->post("username");
                    $password = $this->input->post("password");
                    $type = $this->input->post("type");
                    $posta = array('username'=>$username , 'password'=> md5($password) , 'type'=> $type);
                    if($this->mange->insert($posta)){
                        $this->setType($type, $username);
                        $this->seeUsers();
                    }
		} 
    }
    private function setType($type,$username){
        
        if($type == 1){
            $this->mange->setTable('students');
        }else if($type == 2){
            $this->mange->setTable('docs');
        }
        $id = $this->user->user_id($username);
        $stu = array('user_id' => $id );
        return ($this->mange->insert($stu))? TRUE : FALSE ;
    }
    function delete($id) {
                $this->mange->setTable("users");
                $ids = array($id);
                $type = $this->user->user_type($id);
                if($this->mange->delete($ids)){
                if($type == 1){
                    $this->mange->query("DELETE FROM students WHERE user_id = $id");
                }else if($type == 2){
                    $this->mange->query("DELETE FROM docs WHERE user_id = $id");
                }  
          $this->seeUsers();  
        }else{
          $this->seeUsers();    
        }
        
    }
    function update($id) {
        $this->mange->setTable("users");
        $ids = array($id);
        $user = $this->mange->fetch(NULL , $ids);
        $data = array("user" => $user) ;
        if ($this->form_validation->run() == FALSE)
		{
                    $data['template']='view_update_user';
                    $this->load->view("view_home" ,array('data'=>$data));
                    
		}
		else
		{
                    $username = $this->input->post("username");
                    $password = $this->input->post("password");
                    $posta = array('username'=>$username , 'password'=> md5($password));
                    if( $this->mange->update($posta , $ids)){
                        $this->updateType($type, $username);
                        
                        $this->seeUsers();
                    } else {
                       $this->seeUsers(); 
                    }
    }
    }
    private function updateType($type,$username){
        
        if($type == 1){
            $this->mange->setTable('students');
        }else if($type == 2){
            $this->mange->setTable('docs');
        }
        $id = $this->user->user_id($username);
        $stu = array('user_id' => $id );
        $ids = array($id);
        return ($this->mange->update($stu , $ids))? TRUE : FALSE ;
    }
   
}
