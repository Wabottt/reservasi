<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model(['M_Kamar', 'Data_Kamar']);
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
        redirect('kamar/form');
	}

    public function Status1()
	{
        $data=[
			'title' => 'Kamar Ready',
            'kamar'=> $this->Data_Kamar->Status1(),
            'sesi' => $this->db->get_where('user', ['id_karyawan' => $this->session->userdata('id_karyawan')] )->row_array()
		];

        $this->template->load('template', 'kamar/ready', $data);
	}

    public function Status2()
	{
        $data=[
			'title' => 'Chek in',
            'kamar'=> $this->Data_Kamar->Status2(),
            'sesi' => $this->db->get_where('user', ['id_karyawan' => $this->session->userdata('id_karyawan')] )->row_array()
		];

        $this->template->load('template', 'kamar/chekin', $data);
	}

    public function Status3()
	{
        $data=[
			'title' => 'Chek out',
            'kamar'=> $this->Data_Kamar->Status3(),
            'sesi' => $this->db->get_where('user', ['id_karyawan' => $this->session->userdata('id_karyawan')] )->row_array()
		];

        $this->template->load('template', 'kamar/chekout', $data);
	}

    public function Status4()
	{
        $data=[
			'title' => 'Maintenance',
            'kamar'=> $this->Data_Kamar->Status4(),
            'sesi' => $this->db->get_where('user', ['id_karyawan' => $this->session->userdata('id_karyawan')] )->row_array()
		];

        $this->template->load('template', 'kamar/maintenence', $data);
	}

    public function ubahinfo($nomor_kamar)
	{

        $where = ['nomor_kamar' => $nomor_kamar];

		$data=[
			'title' => 'Ubah Status Kamar',
            'kamar'=> $this->M_Kamar->editData($where,'kamar')->result(),
            'sesi' => $this->db->get_where('user', ['id_karyawan' => $this->session->userdata('id_karyawan')] )->row_array()
		];

        $this->template->load('template', 'kamar/form_ubah', $data);

	}

    public function UpdateStatus()
	{
        $data=[
            'nomor_kamar' => $this->input->post('nomor_kamar'),
            'status' => $this->input->post('status'),
            'keterangan' => $this->input->post('keterangan'),
		];

        $where=[
            'nomor_kamar' => $this->input->post('nomor_kamar'),
        ];

        $this->db->update('kamar', $data, $where);
        redirect('kamar');
	}

    public function Upkamar($nomor_kamar)
	{
        $data=[
            'status' => "ready",
            'keterangan' => ""
		];

        $where=[
            'nomor_kamar' => $nomor_kamar,
        ];

        $this->db->update('kamar', $data, $where);
        redirect('home');

	}


    


}
