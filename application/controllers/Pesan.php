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
        ];

        $this->db->insert('tamu', $data);

		$data=[
			'title' => 'Pesan Kamar',
            'kamar'=> $this->M_Kamar->tampilData(),
            'paket'=> $this->M_Paket->tampilData(),
            'tamu'=> $this->M_Tamu->tampilData(),
            'sesi' => $this->db->get_where('user', ['id_karyawan' => $this->session->userdata('id_karyawan')] )->row_array()
		];
        
		$this->template->load('template', 'pesan_kamar', $data);
	}


    public function pesanKamar()
	{
        $data=[
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

        $this->db->insert('data_pesanan', $data);
        redirect('home');
	}
    
}