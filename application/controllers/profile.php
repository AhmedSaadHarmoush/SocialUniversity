<?php


class profile extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
    public function index() {
        $this->load->helper('tables');
        $data['template']='view_pro_stu';
        $this->load->view("view_home" ,array('data'=>$data));
    } 
    function user($id){
        /*$get = array(
            'username',
            'profile_url',
            'age',
            'fname_en',
            'farher_name_en',
            'lname_en',
            'gov_id',
            'mob_num',
            'phone_num',
            'address',
            'email'
        );*/
        $this->mange->setTable('users');
        $data['user']= $this->mange->fetch(NULL , array($id));
        $this->load->helper('tables');
        $data['template']='view_pro_stu';
        $this->load->view("view_home" ,array('data'=>$data));
    }
    function update() {
        $id = $this->input->post("id");
        $item = $this->input->post("col");
        $to = $this->input->post("upto");
        if($this->update_item($id,$item, $to)){
            $this->index();  
        }
    }
    function update_item($id,$item, $to) {
        $this->load->model('user');
        if (update('users',$item ,$to,$id))
            $this->index ();
    }
    function propic($user_id) {
                $config['upload_path'] = 'C:\xampp\htdocs\code\files\img';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '2048';
		$config['max_width']  = '2048';
		$config['max_height']  = '2048';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
                        $data['error'] = $this->upload->display_errors();
                        $data['template']='view_pro_stu';
                        $this->load->view("view_home" ,array('data'=>$data));
		}
		else
		{
			$dit =  $this->upload->data();
                        $dat = array(
                            'url'=>$dit['full_path'],
                            'name'=>$dit['file_name'],
                            'user_id'=>$user_id,
                            'ext'=>$dit['file_ext'],
                            'size'=>$dit['file_size']
                        );
                        if(insert('imgs',$dat)==1)
                        {
                            $pr_url="./files/img/".$dit['file_name'];
                            if(update('users','profile_url',$pr_url,$user_id)==1)
                            {
                                $this->index();
                            }
                            else
                            {
                                echo 'failed!';
                            }
                        }
                        else 
                            {
                            echo 'genral filed';
                            }
                        
		}
    }

}

