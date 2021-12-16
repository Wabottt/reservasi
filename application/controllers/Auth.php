<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        
    }
    public function index(){
        cek_sudah_login();

        $this->form_validation->set_rules('id_karyawan','id_karyawan','required|trim',['required'=>'tidak boleh kosong']);
        $this->form_validation->set_rules('password','Password','required|trim',['required'=>'tidak boleh kosong']);

        if($this->form_validation->run() == false){

            $this->load->view('auth/login');

        }else{
            $this->login();
        }
    }

    private function login() {

        $id_karyawan=$this->input->post('id_karyawan');
        $password=$this->input->post('password');

        $user=$this->db->get_where('user', ['id_karyawan' => $id_karyawan])->row_array();

        if($user){

            if(password_verify($password, $user['password'])) {
                $data=array(
                    'id_karyawan'=>$user['id_karyawan'],
                    'role_id'=>$user['role_id']
                );

                $this->session->set_userdata($data);

                if($user['role_id'] > 0 ){
                echo "<script>
                alert('Login Berhasil');
                window.location='".base_url('home')."';
                </script>";

                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="callout callout-success">
                        <h4>Masukkan Username dan Password dengan benar</h4>
                      </div>'
                        );
                    redirect('auth');
                }
            }

        }else{
                $this->session->set_flashdata(
                   'pesan',
                   '<div class="callout callout-success">
                   <h4>Password Anda Salah</h4>
                 </div>'
                   );
               redirect('auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('id_karyawan','id_karyawan','required|trim|is_unique[user.id_karyawan]',[
            'required'=>'tidak boleh kosong','is_unique'=>'id Sudah ada']);
        $this->form_validation->set_rules('nama_karyawan','nama_karyawan','required',[
            'required'=>'tidak boleh kosong']);
        $this->form_validation->set_rules('username','username','required|trim',[
            'required'=>'tidak boleh kosong']);
        $this->form_validation->set_rules('password','pasword','required|trim|min_length[5]|matches[password2]',[
            'min_length' =>'Pasword terlalu pendek',
            'matches'=>'Pasword harus sama'
            ]);
        $this->form_validation->set_rules('password2','Password','required|trim|matches[password]');
        $this->form_validation->set_rules('keterangan','keterangan','required|trim',[
            'required'=>'tidak boleh kosong']);
        $this->form_validation->set_rules('email','email','required|trim|valid_email',[
            'required'=>'tidak boleh kosong']);

        if($this->form_validation->run() == false){
            $title= array(
                'title' => 'Halaman Registrasi', );
            $this->load->view('auth/register',$title);
        } else {
                $data=array(

                'id_karyawan'=>htmlspecialchars($this->input->post('id_karyawan')),
                'nama_karyawan'=> htmlspecialchars($this->input->post('nama_karyawan')),
                'username'=> htmlspecialchars($this->input->post('username')),
                'password'=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'keterangan'=>htmlspecialchars($this->input->post('keterangan')),
                'email'=>htmlspecialchars($this->input->post('email')),
                'role_id' => '1' );

                $this->db->insert('user',$data);
                redirect('user');
        }
    }

    public function Logout()
    {
        $this->load->library('session');
        session_destroy();

        redirect('auth');
    }
}