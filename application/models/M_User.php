<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function tampilData(){

        $this->db->select('*');
        $this->db->from('user');
        $query=$this->db->get();
        return $query->result();
    }

    public function editPassword($where,$table){
        return $this->db->get_where($table,$where);
    }

    public function update_password($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}
