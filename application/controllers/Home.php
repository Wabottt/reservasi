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
			'kamar'=> $this->M_Kamar->PilihKamar(),
			'status1'=> $this->M_Kamar->status1(),
			'status2'=> $this->M_Kamar->status2(),
			'status3'=> $this->M_Kamar->status3(),
			'status4'=> $this->M_Kamar->status4(),
			'sesi' => $this->db->get_where('user', ['id_karyawan' => $this->session->userdata('id_karyawan')] )->row_array()
		];
		$this->template->load('template', 'home', $data);
	}
}


