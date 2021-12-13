<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model(['M_Kamar', 'M_Paket', 'M_Tamu']);
    }

	public function index()
	{
        $data=[
            'nama' => $this->input->post('nama'),
            'nik' => $this->input->post('nik'),
            'alamat' => $this->input->post('alamat'),
            'telpon' => $this->input->post('telpon'),   
            'role' => $this->input->post('role'), 
        ];

        $this->db->insert('tamu', $data);

		$data=[
			'title' => 'Pesan Kamar',
            'kamar'=> $this->M_Kamar->PilihKamar(),
            'paket'=> $this->M_Paket->tampilData(),
            'tamu'=> $this->M_Tamu->tampilData(),
            'sesi' => $this->db->get_where('user', ['id_karyawan' => $this->session->userdata('id_karyawan')] )->row_array()
		];
        
		$this->template->load('template', 'pesan_kamar', $data);
	}


    public function pesanKamar()
	{

        $data=[
            'nama_karyawan' => $this->input->post('nama_karyawan'),
            'nama' => $this->input->post('nama'),
            'nik' => $this->input->post('nik'),
            'alamat' => $this->input->post('alamat'),
            'telpon' => $this->input->post('telpon'),  
            'tipe' => $this->input->post('tipe'),
            'nomor_kamar' => $this->input->post('nomor_kamar'),
            'paket' => $this->input->post('paket'), 
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'tgl_keluar' => $this->input->post('tgl_keluar'),
            'lama' => $this->input->post('lama'),
            'request' => $this->input->post('request')
        ];

        $data2=[
            'nama' => $this->input->post('nama'),
            'role' => 2];

        $data3=[
            'nomor_kamar' => $this->input->post('nomor_kamar'),
            'status' => "chekout" ];

        $where=[
            'nomor_kamar' => $this->input->post('nomor_kamar'),
        ];

        $this->db->update('tamu', $data2);
        $this->M_Kamar->update_data($where, $data3, 'kamar');

        $this->db->insert('data_pesanan', $data);
        $this->db->insert('transaksi', $data);
        redirect('home');
	}
    
}