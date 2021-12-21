<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('M_Laporan');
    }

    public function index(){

        error_reporting(0);

        if(empty($_GET['tanggal'])) {
            $transaksi = $this->M_Laporan->view_all();
            
        }
        else{         
            $tgl_masuk = $_GET['tanggal'];
            $url_cetak = '/cetak?tanggal='.$tgl_masuk;
            $transaksi = $this->M_Laporan->view_by_date($tgl_masuk);
        }

            $data=[
                'title' => 'Laporan Transaksi',
                'url_cetak' => base_url('laporan'.$url_cetak),
                'transaksi' => $transaksi,
                'sesi' => $this->db->get_where('user', ['id_karyawan' => $this->session->userdata('id_karyawan')] )->row_array()
            ];

            $this->template->load('template', 'tamu/laporan', $data);
    }   

public function cetak()
	{
        if(empty($_GET['tanggal'])) {
        $transaksi = $this->M_Laporan->view_all();
                        
        }

        else{         
            $tgl_masuk = $_GET['tanggal'];
            $transaksi = $this->M_Laporan->view_by_date($tgl_masuk);
        }

        $data['transaksi'] = $transaksi;

        $this->load->view('tamu/print', $data);
	}


    //------------------------------------ batas ---------------------------------


}