<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Rekap extends CI_Model {


    public function view_by_month($month, $year){
        $this->db->where('MONTH(tgl_masuk)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tgl_masuk)', $year); // Tambahkan where tahun
        
    return $this->db->get('transaksi')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
  }
    
  public function view_by_year($year){
        $this->db->where('YEAR(tgl_masuk)', $year); // Tambahkan where tahun
        
    return $this->db->get('transaksi')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
  }
    
    public function option_tahun(){
        $this->db->select('YEAR(tgl_masuk) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('transaksi'); // select ke tabel transaksi
        $this->db->order_by('YEAR(tgl_masuk)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tgl_masuk)'); // Group berdasarkan tahun pada field tgl
        
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }

    public function view_all(){
        return $this->db->get('transaksi')->result(); // Tampilkan semua data transaksi
    }
}