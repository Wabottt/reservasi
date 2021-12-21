<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_Data extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model('M_Rekap');
    }

    public function index(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter'];
            
            if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                // $url_cetak = 'transaksi/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->M_Rekap->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }
            else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                // $url_cetak = 'transaksi/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->M_Rekap->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }
        else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->M_Rekap->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        

        $data=[
            'ket' => $ket,
            'title' => 'Laporan Transaksi',
            'option_tahun' => $this->M_Rekap->option_tahun(),
            'transaksi' => $transaksi,
            'sesi' => $this->db->get_where('user', ['id_karyawan' => $this->session->userdata('id_karyawan')] )->row_array()
        ];
        $this->template->load('template', 'data/rekap', $data);

  }
}