<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of group
 *
 * @author Mohamed Iessam
 */
class group extends CI_Model{
    private $table='groups';
    public function fetchAll() {
        $query=  $this->db->get($this->table);
        if ($query->num_rows()>=1) {
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }
    public function getOne($id) {
        $query=$this->db->select('*')->from($this->table)->where(array('groupid'=>$id))->get();
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
            $this->db->delete($this->table,array('groupid'=>$id));
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    public function deleteBy($subject_id) {
        if ($this->db->delete($this->table,array('subject_id'=>$subject_id)))
            return TRUE;
        else 
            return FALSE;
    }
    public function add($data) {
        $group=$this->getOneBy(array('subject_id'=>$data['subject_id']));
        if(!$group){
            $query=  $this->db->insert($this->table,$data);
            if ($query) {
                return TRUE;
            }
            else
                return FALSE;
        }
        else {
            date_default_timezone_set ('Africa/Cairo') ;
            if($this->edit($group[0]['groupid'],array('active' => time()))) {
                return TRUE;
            }
            else {
                return FALSE;
            }
        }
        
    }
    public function edit($id,$data) {
        $id=(int) $id ;
        if ($this->getOne($id)) {
            $this->db->where(array('groupid'=>$id));
            $this->db->update($this->table,$data);
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    public function getSub_id ($group_id) {
        $query=  $this->db->select('subject_id')->from('groups')->where(array('groupid'=>$group_id))->get();
        if($query->num_rows()>=1) {
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }
    public function getMembersResults ($group_id) {
        $subject=$this->getSub_id($group_id);
        $subject_id=$subject['0']['subject_id'];
        $this->db->select(array('set_subjects.user_id','set_subjects.subject_id','users.username','quiz1','med','quiz2','oural','pract','thery','total'))->from('set_subjects');
        $this->db->join('group_members','group_members.user_id=set_subjects.user_id');
        $this->db->join('users','users.id=set_subjects.user_id')->where(array('group_members.group_id'=>$group_id,'set_subjects.active'=>1,'set_subjects.subject_id'=>$subject_id));
        $query=$this->db->get();
        if ($query->num_rows > 0) {
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }
    public function getStudentsId ($group_id) {
        $subject=$this->getSub_id($group_id);
        $subject_id=$subject['0']['subject_id'];
        $this->db->select('set_subjects.user_id')->from('set_subjects');
        $this->db->join('group_members','group_members.user_id=set_subjects.user_id');
        $this->db->join('users','users.id=set_subjects.user_id')->where(array('group_members.group_id'=>$group_id,'set_subjects.active'=>1,'set_subjects.subject_id'=>$subject_id));
        $query=$this->db->get();
        if ($query->num_rows > 0) {
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }
    public function saveResult($student,$group_id) {
        $subject_id = $this->getSub_id($group_id);
        if($subject_id) {
            $user=$student['user_id'] ;
            unset($student['user_id']);
            $this->db->where(array('subject_id'=>$subject_id[0]['subject_id'],'user_id'=>$user));
            $this->db->update('set_subjects',$student);
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    public function checkAdmin ($user_id,$group_id) {
        $query=$this->db->select('type')->from('group_members')->where(array('user_id'=>$user_id,'group_id'=>$group_id,'type'=>1))->get();
        if ($query->num_rows()>0) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    public function banStudent ($group_id,$student_id) {
        $subject_id=  $this->getSub_id($group_id);
        if ($this->db->delete('set_subjects',array('subject_id'=>$subject_id[0]['subject_id'],'user_id'=>$student_id)) && $this->db->delete('group_members',array('group_id'=>$group_id,'user_id'=>$student_id)) ) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    public function deleteAdmins ($group_id) {
        if ($this->db->delete('group_members',array('group_id'=>$group_id,'type'=>1))) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
}
