<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pesan extends CI_Model {

    public function tampilData(){

        $this->db->select('*');
        $this->db->from('data_pesanan');
        $query=$this->db->get();
        return $query->result();
    }

    public function chekout($chekout)
    {
        // query hapus
        $this->db->where($chekout);
        $this->db->delete('data_pesanan');
    }
}