<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Laporan extends CI_Model {

    public function view_all(){
        return $this->db->get('transaksi')->result(); // Tampilkan semua data transaksi
    }

    public function view_by_date($date){
        $this->db->where('DATE(tgl_masuk)', $date);
        return $this->db->get('transaksi')->result();
    }
}