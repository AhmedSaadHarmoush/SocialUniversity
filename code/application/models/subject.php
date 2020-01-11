<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of departement
 *
 * @author Mohamed Iessam
 */
class subject extends CI_Model {
    private $table='subjects';
    public function fetchAll() {
        $query=  $this->db->get($this->table);
        if ($query->num_rows()>=1) {
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }
    public function fetchAllBy($data){
        $query=  $this->db->select('*')->from($this->table)->where($data)->get();
        if ($query->num_rows>=1){
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }
    public function getOne($id) {
        $query=$this->db->select('*')->from($this->table)->where(array('id'=>$id))->get();
        if ($query->num_rows==1){
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }
    public function getOneBy($data) {
        $query=$this->db->select('*')->from($this->table)->where($data)->get();
        if ($query->num_rows>=1){
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }
    public function delete($id) {
        if($this->getOne($id)){
            $this->db->delete($this->table,array('id'=>$id));
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    public function deleteAllBy($dep_id) {
        if ($this->db->delete($this->table,array('departement'=>$dep_id)))
            return TRUE;
        else 
            return FALSE;
    }
    public function getDocs() {
        $query=  $this->db->select('*')->from('users')->where(array('type'=>2))->get();
        if ($query->num_rows()>=1) {
            return $query->result_array();
        }
        else 
            return FALSE;
    }
    public function add($data) {
        $query=  $this->db->insert($this->table,$data);
        if ($query) {
            return TRUE;
        }
        else
            return FALSE;
    }
    public function edit($id,$data) {
        $id=(int) $id ;
        if ($this->getOne($id)) {
            $this->db->where(array('id'=>$id));
            $this->db->update($this->table,$data);
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    public function getSubjectsJoins($user_id,$dep_id){
        $this->db->select(array('subjects.id','subjects.name','code','code_old','set_subjects.active','groupid'))->from($this->table)->join('set_subjects','set_subjects.subject_id=require_id')->join('groups','groups.subject_id=subjects.id')->where(array('user_id'=>$user_id,'departement'=>$dep_id,'total >'=>50,'active_set'=>1));
        $query=  $this->db->get();
        if($query->num_rows>=0){
            $filtered= $this->sperate($query->result_array(), $user_id, $this->getSuccess($user_id));
            $second=  $this->fetchAllRegistered($user_id);
            return $this->sperate($filtered, $user_id,$second);
        }
        else {
            return FALSE;
        }
    }
    public function getSubjectsNotrequire ($user_id) {
        $query= $this->db->select(array('subjects.id','subjects.name','code','code_old','groupid'))->from($this->table)->where(array('active_set'=>1,'require_id'=>0))->join('groups','groups.subject_id=subjects.id')->get();
        //echo 'hena';
        if ($query->num_rows()>0){
            $filtered= $this->sperate($query->result_array(), $user_id, $this->getSuccess($user_id));
            //print_r($filtered);
            //echo '<br><br>';
            $second=  $this->fetchAllRegistered($user_id);
            //print_r($this->sperate($filtered,$user_id));
            return $this->sperate($filtered,$user_id,$second);
        }
        else {
            return FALSE;
        }
    }
   /* public function getRegisteredSubjects ($user_id) {
        $this->db->select('*')->from($this->table)->join('set_subjects','set_subjects.subject_id=subjects.id')->where(array('user_id'=>$user_id));
        $query=$this->db->where(array('require_id'=>0,'active_set'=>1))->get();
        if($query->num_rows()>0) {
            
           return $query->result_array();
        }
        else {
           return FALSE;
        }
    }*/
    public function checkReg($data) {
        $query=  $this->db->select('*')->from('set_subjects')->where($data)->get();
        if ($query->num_rows()>=1){
            return $query->result_array();
        }
        else {
            return FALSE;
        }  
    } 
    public function register($data,$group_id) {
        if (!$this->checkReg($data)) {
            $query=  $this->db->insert('set_subjects',$data);
            $group= $this->db->insert('group_members',array('group_id'=>$group_id,'user_id'=>$data['user_id'],'type'=>0));
            return TRUE;
        }
        else
            return FALSE;
    }
    public function unRegister($user_id,$group_id,$subject_id) {
        if ($this->checkReg(array('user_id'=>$user_id,'subject_id'=>$subject_id))){
            $query=  $this->db->delete('set_subjects',array('user_id'=>$user_id,'subject_id'=>$subject_id));
            $group= $this->db->delete('group_members',array('group_id'=>$group_id,'user_id'=>$user_id));
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
   public function fetchAllRegistered($user_id) {
       $query=  $this->db->select(array('subjects.id','subjects.name','code','code_old','set_subjects.subject_id','groupid'))->from($this->table)->join('set_subjects','set_subjects.subject_id=subjects.id')->join('groups','groups.subject_id=subjects.id')->where(array('user_id'=>$user_id,'set_subjects.active'=>1))->get();
       if($query->num_rows()>=0){
           //print_r($query->result_array());
           return $query->result_array();
       }
       else {
           return FALSE;
       }
   }
   private function sperate ($first,$user_id,$second=NULL) {
        if (count($second)>0 && !empty($second)) {
            $n=  count($first);
            foreach  ($second as $subject) {
                for ($i=0 ; $i<=$n ; $i++) {
                    if (!empty($first[$i]) && $subject['subject_id']==$first[$i]['id']) {
                        unset ($first[$i]);
                        break;
                    }
                }   
            }
            return $first;
        }
        else {
            return $first;
        }
   }
    public function getSuccessPublic ($user_id) {
        $query= $this->db->select(array('subjects.name','subjects.code','gpa','tearm','total'))->from('set_subjects')->join('subjects','set_subjects.subject_id=subjects.id')->where(array('user_id'=>$user_id,'active'=>0))->get();
        if ($query->num_rows()>0) {
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }
    private function getSuccess($user_id) {
       $query=  $this->db->select('subject_id')->from('set_subjects')->where(array('user_id'=>$user_id,'total >'=>50))->get();
       if ($query->num_rows()>0) {
           return $query->result_array();
       }
       else {
           return FALSE;
       }
   }
    public function getDoctorSubjects($dep_id) {
       $query=  $this->db->select (array('id','subjects.name','groupid','subjects.name','code','code_old'))->from($this->table)->join('groups','groups.subject_id=subjects.id')->where(array('departement'=>$dep_id,'active_set'=>1))->get();
       if ($query->num_rows()>=1) {
           $registered=  $this->getDoctorSubjectsAdmin($_SESSION['usci']['user_data']['id']);
           
           return $this->activate($query->result_array(), $registered);
       }
       else {
           return FALSE;
       }
   }
   private function getDoctorSubjectsAdmin ($user_id) {
       $query= $this->db->select('group_id')->from('group_members')->where(array('user_id'=>$user_id))->get();
       if($query->num_rows()>=1) {
           return $query->result_array();
       }
       else {
           return FALSE;
       }
   }
   private function checkAdmin ($data) {
       //print_r($data);
       $query = $this->db -> select('user_id')->from('group_members')->where($data)->get();
       //print_r($query->result_array());
       if($query->num_rows()>=1) {
           return TRUE ;
       }
       else {
           return FALSE;
       }
   }
   public function dregister ($data) {
       //print_r($data);
       if (!$this->checkAdmin($data)) {
           $query = $this->db->insert('group_members',$data);
           return TRUE;
       }
       else {
           return TRUE;
       }
   }
   public function activate ($first, $second) {
       $n=  count($first);
       if (empty($second))
           return $first;
       for ($i=0; $i< $n; $i++) {
           foreach ($second as $registered) {
               if ($first[$i]['groupid']==$registered['group_id']) {
                   $first[$i]['reg']=TRUE;
               }
           }
       }
       return $first;
   }
   public function dunregister($data) {
       if ($this->checkAdmin($data)) {
           if($this->db->delete('group_members',$data)) {
               return TRUE;
           }
           else {
               return FALSE;
           }
       }
   }
}
