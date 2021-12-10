<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent:: __construct();
		cek_belum_login();
		$this->load->model('M_Kamar');
    }

	public function index()
	{
		$data=[
			'title' => 'Home',
			'detail'=> $this->M_Kamar->detailKamar(),
			'kamar'=> $this->M_Kamar->Kamar(),
			'sesi' => $this->db->get_where('user', ['id_karyawan' => $this->session->userdata('id_karyawan')] )->row_array()
		];
		$this->template->load('template', 'home', $data);
	}
}


