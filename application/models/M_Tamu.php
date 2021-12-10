<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tamu extends CI_Model {

    public function tampilData(){

        $this->db->select('*');
        $this->db->from('tamu');
        $this->db->where('role = 1');
        $query=$this->db->get();
        return $query->result();
    }
}