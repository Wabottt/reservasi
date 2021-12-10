<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Paket extends CI_Model {

    public function tampilData(){

        $this->db->select('*');
        $this->db->from('paket');
        $query=$this->db->get();
        return $query->result();
    }
}