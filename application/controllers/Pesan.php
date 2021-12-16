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
        redirect('pesan/lanjut_pesan');

	}

    public function lanjut_pesan(){
        
		$data=[
			'title' => 'Pesan Kamar',
            'kamar'=> $this->M_Kamar->Kamar(),
            'paket'=> $this->M_Paket->tampilData(),
            'tamu'=> $this->M_Tamu->tampilData(),
            'sesi' => $this->db->get_where('user', ['id_karyawan' => $this->session->userdata('id_karyawan')] )->row_array()
		];
        
		$this->template->load('template', 'pesan_kamar', $data);

    }


    public function pesanKamar() {
        
            $nama_karyawan = $_POST['nama_karyawan'];
            $nama = $_POST['nama'];
            $nik = $_POST['nik'];
            $alamat = $_POST['alamat'];
            $telpon = $_POST['telpon']; 
            $tipe = $_POST['tipe'];
            $nomor_kamar = $_POST['nomor_kamar'];
            $paket = $_POST['paket'];
            $tgl_masuk = $_POST['tgl_masuk'];
            $tgl_keluar = $_POST['tgl_keluar'];
            $lama = $_POST['lama'];
            $request = $_POST['request'];
            $total = $_POST['total'];
            $data = array();

            $index = 0 ;
            foreach ($nama_karyawan as $datanama){
                array_push($data, array(
                    'nama_karyawan' => $datanama,
                    'nama' => $nama[$index],
                    'nik' => $nik[$index],
                    'alamat' => $alamat[$index],
                    'telpon' => $telpon[$index],
                    'tipe' => $tipe[$index],
                    'nomor_kamar' => $nomor_kamar[$index],
                    'paket' => $paket[$index],
                    'tgl_masuk' => $tgl_masuk[$index],
                    'tgl_keluar' => $tgl_keluar[$index],
                    'lama' => $lama[$index],
                    'request' => $request[$index],
                    'total' => $total[$index],
                ));
                $index++;
            }

            $nama = $_POST['nama'];
            $data2=[];
            foreach($nama as $datak){
                array_push($data2, $datak );
            }
            
            $nomor_kamar2 = $_POST['nomor_kamar'];
            $chekout = $_POST['chekin'];
            $data3=array ();
            foreach($nomor_kamar2 as $dkam){
                array_push($data3, array(
                    'nomor_kamar' => $dkam,
                    'status' => $chekout
                ));
            }
       
        $this->db->update_batch('kamar', $data3, 'nomor_kamar');

        $this->db->insert_batch('data_pesanan', $data);
        $this->db->insert_batch('transaksi', $data);
        $this->db->delete('tamu', $data2);
        redirect('data_pesanan');
	}
    
}