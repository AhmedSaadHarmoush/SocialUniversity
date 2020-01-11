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
class departement extends CI_Model {
    private $table='departements';
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
        $query=$this->db->select('*')->from($this->table)->where(array('id'=>$id))->get();
        if ($query->num_rows==1){
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
    public function save($id,$data) {
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
}
