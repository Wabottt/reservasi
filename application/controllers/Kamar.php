<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('M_Kamar');
    }

	public function index()
	{
		$data=[
			'title' => 'Informasi Kamar',
            'kamar'=> $this->M_Kamar->tampilData(),
            'sesi' => $this->db->get_where('user', ['id_karyawan' => $this->session->userdata('id_karyawan')] )->row_array()
		];
        
		$this->template->load('template', 'kamar/kamar', $data);
	}

    // batas fungsi tambah
    public function Form()
	{
		$data=[
			'title' => 'Tambah Kamar',
            'sesi' => $this->db->get_where('user', ['id_karyawan' => $this->session->userdata('id_karyawan')] )->row_array()
		];

        $this->template->load('template', 'kamar/form_kamar', $data);
	}

    public function Tambah()
	{
		$data=[
            'nomor_kamar' => $this->input->post('nomor_kamar'),
            'tipe' => $this->input->post('tipe'),
            'harga' => $this->input->post('harga'),
            'lantai' => $this->input->post('lantai'),
            'status' => $this->input->post('status')
		];
        
        $this->db->insert('kamar',$data);
        redirect('kamar');
	}

    


}
