<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pesanan extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model(['M_Pesan', 'M_Kamar', 'M_Tamu']);
    }

	public function index()
	{
		$data=[
			'title' => 'Daftar Tamu',
            'tamu'=> $this->M_Pesan->tampilData(),
            'sesi' => $this->db->get_where('user', ['id_karyawan' => $this->session->userdata('id_karyawan')] )->row_array()
		];
        
		$this->template->load('template', 'tamu/daftar_tamu', $data);
	}

    public function Chekout($id_pesanan, $nomor_kamar)
	{
		$chekout=[
			'id_pesanan' => $id_pesanan
		];

        $data=[
            'nomor_kamar' => $nomor_kamar,
            'status' => "chekout"
        ];

        $where=[
            'nomor_kamar' => $nomor_kamar,
        ];

        $this->M_Kamar->chekout($where, $data, 'kamar');
        $this->M_Pesan->chekout($chekout);

        redirect('Data_Pesanan');
        
	}
}